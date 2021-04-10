<?php
/**
 * ユーザー情報仮登録用コントローラー
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
use App\Mail\Auths\RegistEmailVerification;
use App\Requests\Auths\PreRegistRequest;
use App\Constants\AppConstants;
use Carbon\Carbon;

/**
 * ユーザー情報仮登録用コントローラー
 *
 * ユーザー情報仮登録処理を記載
 */
class PreRegistController extends Controller
{

    /** 完了メッセージ */
    const INFO_MSG = '<div class="font-weight-bold mb-3">仮登録が完了しました。</div><div class="small"><p>入力して頂いたメールアドレス宛てに、本登録を行う為のURLをメールにてお送りしました。</p><p>24時間以内にメールのURLより本登録画面へ進んで頂き、アカウントの本登録を実施して下さい。</p>※仮登録受付完了メールが届かない場合は、管理者にご連絡下さい。</div>';

    /** エラーメッセージ */
    const ERR_MSG = '<div class="font-weight-bold mb-3">仮登録に失敗しました。</div><div class="small">管理者にご連絡下さい。</div>';

		/**
		 * 初期表示
		 *
		 * @return view
		 */
    public function show(){
			   return view('auths.pre_regist');
		}

    /**
     * ユーザー仮登録
     *
     * @param  PreRegistRequest $request リクエストパラメータ
     * @return view
     */
    public function preRegist(PreRegistRequest $request){

        $msg = "";

        // 仮登録実行
        if(!self::execPreRegist($request, $msg)){
            return Redirect::back()->with(AppConstants::KEY_ERR, self::ERR_MSG . $msg)->withInput();
        }

        return Redirect::back()->with([AppConstants::KEY_MSG => self::INFO_MSG]);
    }

    /**
     * 仮登録実行
     *
     * @param  PreRegistRequest $request リクエストパラメータ
     * @param  msg メッセージ
     * @return 仮登録完了フラグ
     */
    private function execPreRegist(PreRegistRequest $request, &$msg){

        try {
            // ユーザー情報登録
            $user = User::create([
              User::COLUMN_EMAIL => $request->email,
              User::COLUMN_PASSWORD => bcrypt($request->password),
              User::COLUMN_EMAIL_VERIFIED => User::EMAIL_VERIFIED_OFF,
              User::COLUMN_EMAIL_VERIFY_TOKEN => hash(AppConstants::HASH_KEY_SHA256, uniqid(rand(), true)),
              User::COLUMN_EMAIL_VERIFIED_AT => new Carbon(),
            ]);

            // メール送信処理実行
            $email = new RegistEmailVerification(SendMail::REGIST_EMAIL_SUBJECT, $user->email, $user->email_verify_token);
            Mail::to($user->email)->send($email);

            // メール送信情報登録
            SendMail::create([
              SendMail::COLUMN_EMAIL => $user->email,
              SendMail::COLUMN_SUBJECT => SendMail::REGIST_EMAIL_SUBJECT,
              SendMail::COLUMN_MESSAGE => $email->getMessage()
            ]);

            return true;
        } catch (\Exception $e) {
            $msg = '<div class="small">' . $e . '</div>';
            return false;
        }
    }
}
