<?php
/**
 * パスワードリセット用コントローラー
 *
 * @version 1.0
 * @author tsuji
 */
namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Constants\AppConstants;
use App\Models\User;
use Carbon\Carbon;

/**
 * パスワードリセット用コントローラー
 *
 * パスワードリセット処理を記載
 */
class UpdateController extends Controller
{
    /** ユーザー情報本登録完了 */
    const userINFO_MSG_PASSWORD_RESET_SUCCESS = 'パスワードリセットの本更新が完了しました。ログインを行いご利用下さい。';
    /** ユーザー情報本登録失敗 */
    const ERR_MSG_PASSWORD_RESET_FAILED = 'パスワードリセットの本更新に失敗しました。管理者に連絡を行って下さい。';
    /** メール認証失敗 */
    const ERR_MSG_EMAIL_AUTH_FAILED = 'メール認証に失敗しました。再度、メールからリンクをクリックしてください。';
    /** 無効なトークン */
    const ERR_MSG_EMAIL_VERIFY_TOKEN_VALID = '無効なトークンです。URLが途切れていないかご確認下さい。';
    /** 本登録済み */
    const ERR_MSG_PASSWORD_RESET_COMPLETED = '既にパスワードリセットの本登録がされています。ログインを行いご利用下さい。';
    /** メール認証発効後24時間以上経過 */
    const ERR_MSG_EMAIL_AUTH_24HOURS_PASSED = 'メール認証の発行から24時間以上経過しています。再度アカウント設定を行って下さい。';

		/**
		 * 初期表示
		 *
		 * @return view
		 */
    public function show(Request $request){

        $msg = "";

        // トークンに紐づくパスワードリセット情報取得
        $user = User::emailPasswordResetTokenFindUser($request->email_password_reset_token);

        $msg = '<p>' . $user->email . '様</p>';

        // メール認証チェック
        if($this->checkEmailAuth($msg, $user, $request)){
          // 本登録処理
          if($this->updateEmailVerified($user, $request)){
              $msg .= self::userINFO_MSG_PASSWORD_RESET_SUCCESS;
          }else{
              $msg .= self::ERR_MSG_PASSWORD_RESET_FAILED;
          }
        }else{
            $msg .= self::ERR_MSG_EMAIL_AUTH_FAILED;
        }

        return view('auths.regist')->with(AppConstants::KEY_MSG, $msg);
		}

    /**
     * メール認証チェック
     *
     * @param  $msg メッセージ
     * @param  $user ユーザー情報
     * @param  $request リクエストパラメータ
     * @return メール認証フラグ
     */
		private function checkEmailAuth(&$msg, $user, $request){

        // 登録されているトークンか
        if($user->count() == 0){
            $msg .= self::ERR_MSG_EMAIL_VERIFY_TOKEN_VALID;
            return false;
        }

        $now = new Carbon();
        $email_password_reset_at = new Carbon($user->email_password_reset_at);

				// 本登録されているか
				if($user->email_password_reset_verified){
  					$msg .= self::ERR_MSG_PASSWORD_RESET_COMPLETED;
  					return false;
				}

        // メール認証の発行から、24時間以上経過しているか
        if($now->gt($email_password_reset_at->addDay())){
            $msg .= self::ERR_MSG_EMAIL_AUTH_24HOURS_PASSED;
            return false;
        }

				return true;
		}

    /**
     * メールアドレスURLトークンの更新
     *
     * @param  $user ユーザー情報
     * @param  $request リクエストパラメータ
     * @return 更新フラグ
     */
    private function updateEmailVerified($user, $request){

        // メール認証済にして、更新
        $user->email_password_reset_verified = User::EMAIL_PASSWORD_RESET_VERIFIED_ON;
        return $user->save();
    }
}
