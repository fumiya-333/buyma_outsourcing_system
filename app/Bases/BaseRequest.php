<?php
/**
 * ベースリクエストクラス
 *
 * @version 1.0
 * @author tsuji
 */
namespace App\Bases;

use Illuminate\Foundation\Http\FormRequest;
use App\Constants\AppConstants;

/**
 * ベースリクエストクラス
 *
 * リクエストクラスの共通部分を記載
 */
class BaseRequest extends FormRequest
{
		/**********************************************
		/* エラーメッセージ
		**********************************************/
		/** 未入力 */
		const ERR_MSG_REQUIRED = "を入力して下さい。";
		/** パスワードとパスワード（確認用不一致） */
		const ERR_MSG_PASSWORD_CONFIRMD = "とパスワード（確認用）の入力が異なります。";
		/** 未登録 */
		const ERR_MSG_NOT_REGIST = "は登録されていません。";

		/**********************************************
		/* バリデーションルールキー
		**********************************************/
		/** 入力チェック */
		const VALIDATION_RULE_KEY_REQUIRED = 'required';
		/** メールアドレス形式チェック */
		const VALIDATION_RULE_KEY_EMAIL = 'email';
		/** パスワードとパスワード（確認用）一致チェック */
		const VALIDATION_RULE_KEY_CONFIRMD = 'confirmed';
		/** データ存在チェック */
		const VALIDATION_RULE_KEY_EXISTS = 'exists';

		/** バリデーションエラーのカスタム属性 */
		const VALIDATION_ATTRIBUTE = ':attribute';
}
