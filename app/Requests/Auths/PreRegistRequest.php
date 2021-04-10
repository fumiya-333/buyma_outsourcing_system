<?php
/**
 * ユーザー情報仮登録用リクエスト
 *
 * @version 1.0
 * @author tsuji
 */
namespace App\Requests\Auths;

use App\Bases\BaseRequest;
use App\Constants\AppConstants;
use App\Rules\EmailVerifiedRule;
use App\Models\User;

/**
 * ユーザー情報仮登録用リクエスト
 *
 * ユーザー情報仮登録用リクエストパラメータ処理を記載
 */
class PreRegistRequest extends BaseRequest
{
    /**
     * ユーザーがこのリクエストの権限を持っているかを判断する
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * リクエストに適用するバリデーションルールを取得
     *
     * @return array
     */
    public function rules(){
        return [
            User::COLUMN_EMAIL => [self::VALIDATION_RULE_KEY_REQUIRED, self::VALIDATION_RULE_KEY_EMAIL, new EmailVerifiedRule($this->input(User::COLUMN_EMAIL))],
            User::COLUMN_PASSWORD => [self::VALIDATION_RULE_KEY_REQUIRED, self::VALIDATION_RULE_KEY_CONFIRMD]
        ];
    }

    /**
     * 定義済みバリデーションルールのエラーメッセージ取得
     *
     * @return array
     */
    public function messages(){
        return [
            User::COLUMN_EMAIL . '.' . self::VALIDATION_RULE_KEY_REQUIRED => self::VALIDATION_ATTRIBUTE . self::ERR_MSG_REQUIRED,
						User::COLUMN_EMAIL . '.' . self::VALIDATION_RULE_KEY_EMAIL => '有効な' . self::VALIDATION_ATTRIBUTE . self::ERR_MSG_REQUIRED,
            User::COLUMN_PASSWORD . '.' . self::VALIDATION_RULE_KEY_REQUIRED => self::VALIDATION_ATTRIBUTE . self::ERR_MSG_REQUIRED,
            User::COLUMN_PASSWORD . '.' . self::VALIDATION_RULE_KEY_CONFIRMD => self::VALIDATION_ATTRIBUTE . self::ERR_MSG_PASSWORD_CONFIRMD,
        ];
    }

    /**
     * バリデーションエラーのカスタム属性の取得
     *
     * @return array
     */
    public function attributes(){
      return [
          User::COLUMN_EMAIL => User::COLUMN_JP_EMAIL,
          User::COLUMN_PASSWORD => User::COLUMN_JP_PASSWORD
      ];
    }
}
