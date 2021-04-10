<?php
/**
 * パスワード仮更新用コントローラー
 *
 * @version 1.0
 * @author tsuji
 */
namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use Redirect;
use Auth;
use Mail;
use App\Models\User;
use App\Models\SendMail;
use App\Mail\Auths\UpdateEmailVerification;
use App\Requests\Auths\PreUpdateRequest;
use App\Constants\AppConstants;
use Carbon\Carbon;

/**
 * パスワードリセット用コントローラー
 *
 * パスワードリセット処理を記載
 */
class PreUpdateController extends Controller
{

    /** 完了メッセージ */
    const INFO_MSG = '<div class="font-weight-bold mb-3">パスワード仮更新が完了しました。</div><div class="small"><p>入力して頂いたメールアドレス宛てに、本登録を行う為のURLをメールにてお送りしました。</p><p>24時間以内にメールのURLより本登録画面へ進んで頂き、パスワードの本更新を実施して下さい。</p>※仮更新受付完了メールが届かない場合は、管理者にご連絡下さい。</div>';

    /** エラーメッセージ */
    const ERR_MSG = '<div class="font-weight-bold mb-3">パスワード仮更新に失敗しました。</div><div class="small">管理者にご連絡下さい。</div>';

		/**
		 * 初期表示
		 *
		 * @return view
		 */
    public function show(){
			   return view('auths.pre_update');
		}

    /**
     * ユーザー仮更新
     *
     * @param  PreUpdateRequest $request リクエストパラメータ
     * @return view
     */
    public function preUpdate(PreUpdateRequest $request){

        $msg = "";

        // 仮更新実行
        if(!self::execPreUpdate($request, $msg)){
            return Redirect::back()->with(AppConstants::KEY_ERR, self::ERR_MSG . $msg)->withInput();
        }

        return Redirect::back()->with([AppConstants::KEY_MSG => self::INFO_MSG]);
    }

    /**
     * 仮更新実行
     *
     * @param  PreUpdateRequest $request リクエストパラメータ
     * @param  msg メッセージ
     * @return 仮更新完了フラグ
     */
    private function execPreUpdate(PreUpdateRequest $request, &$msg){

        try {
            // パスワード更新画面の場合は、メールアドレスに紐づくユーザー情報取得
            $user = User::emailFindUser($request->email);

            // パスワードリセット情報登録
            $user->email_password_reset_verified = User::EMAIL_PASSWORD_RESET_VERIFIED_OFF;
            $user->email_password_reset_token = hash(AppConstants::HASH_KEY_SHA256, uniqid(rand(), true));
            $user->email_password_reset_at = new Carbon();
            $user->save();

            // メール送信処理実行
            $email = new UpdateEmailVerification(SendMail::PASSWORD_RESET_EMAIL_SUBJECT, $user->email, $user->email_password_reset_token);
            Mail::to($user->email)->send($email);

            // メール送信情報登録
            SendMail::create([
              SendMail::COLUMN_EMAIL => $user->email,
              SendMail::COLUMN_SUBJECT => SendMail::PASSWORD_RESET_EMAIL_SUBJECT,
              SendMail::COLUMN_MESSAGE => $email->getMessage()
            ]);

            return true;
        } catch (\Exception $e) {
            $msg = '<div class="small">' . $e . '</div>';
            return false;
        }
    }
}
