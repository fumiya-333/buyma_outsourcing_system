<?php
/**
 * ログイン用コントローラー
 *
 * @version 1.0
 * @author tsuji
 */
namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use Redirect;
use Auth;
use App\Requests\Auths\LoginRequest;
use App\Models\User;
use App\Http\Controllers\Studys\StudyListController;

/**
 * ログイン用コントローラー
 *
 * ログイン処理を記載
 */
class LoginController extends Controller
{
    /** エラーメッセージ */
    const ERR_MSG = '<div class="font-weight-bold mb-3">ログインに失敗しました。</div><div class="small">メールアドレスもしくはパスワードが異なります。</div>';

		/**
		 * 初期表示
		 *
		 * @return view
		 */
    public function show(){
			   return view('auths.index');
		}

    /**
     * ログイン
     *
     * @param  LoginRequest $request リクエストパラメータ
     * @return view
     */
    public function login(LoginRequest $request){

        if(Auth::attempt([User::COLUMN_EMAIL => $request->email, User::COLUMN_PASSWORD => $request->password])){
            return redirect()->action([StudyListController::class, 'show']);
        }else{
            return Redirect::back()->with('error', self::ERR_MSG)->withInput();
        }
    }

    /**
     * ログアウト
     *
     * @return view
     */
    public function logout(){
        Auth::logout();
        return view('auths.index');
    }
}
