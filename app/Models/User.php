<?php
/**
 * ユーザー情報用モデル
 *
 * @version 1.0
 * @author tsuji
 */
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * ユーザー情報用モデル
 *
 * ユーザー情報テーブルのデータ処理を記載
 */
class User extends Authenticatable
{
    use Notifiable;

    /** テーブル名 */
    const TABLE_NAME = 'users';
    /** メールアドレス */
    const COLUMN_EMAIL = 'email';
    /** メール認証フラグ */
    const COLUMN_EMAIL_VERIFIED = 'email_verified';
    /** メールアドレスURLトークン */
    const COLUMN_EMAIL_VERIFY_TOKEN = 'email_verify_token';
    /** メール認証発行日 */
    const COLUMN_EMAIL_VERIFIED_AT = 'email_verified_at';
    /** パスワードリセットメール認証フラグ */
    const COLUMN_EMAIL_PASSWORD_RESET_VERIFIED = 'email_password_reset_verified';
    /** パスワードリセットメールアドレスURLトークン */
    const COLUMN_EMAIL_PASSWORD_RESET_TOKEN = 'email_password_reset_token';
    /** パスワードリセットメール認証発行日 */
    const COLUMN_EMAIL_PASSWORD_RESET_AT = 'email_password_reset_at';
    /** パスワード */
    const COLUMN_PASSWORD = 'password';
    /** ログイン保持用トークン */
    const COLUMN_REMENBER_TOKEN = 'remember_token';

    protected $fillable = [self::COLUMN_EMAIL, self::COLUMN_EMAIL_VERIFIED, self::COLUMN_EMAIL_VERIFY_TOKEN, self::COLUMN_EMAIL_VERIFIED_AT, self::COLUMN_PASSWORD, self::COLUMN_REMENBER_TOKEN, self::COLUMN_EMAIL_PASSWORD_RESET_VERIFIED, self::COLUMN_EMAIL_PASSWORD_RESET_TOKEN, self::COLUMN_EMAIL_PASSWORD_RESET_AT];

    /** メールアドレス（日本語） */
    const COLUMN_JP_EMAIL = 'メールアドレス';
    /** パスワード（日本語） */
    const COLUMN_JP_PASSWORD = 'パスワード';

    /** メール認証フラグ：オフ */
    const EMAIL_VERIFIED_OFF = '0';
    /** メール認証フラグ：オン */
    const EMAIL_VERIFIED_ON = '1';

    /** パスワードリセットメール認証フラグ：オフ */
    const EMAIL_PASSWORD_RESET_VERIFIED_OFF = '0';
    /** パスワードリセットメール認証フラグ：オン */
    const EMAIL_PASSWORD_RESET_VERIFIED_ON = '1';

    /**
     * メールアドレスに紐づくユーザー情報取得
     *
     * @param  $query クエリ
     * @param  $email メールアドレス
     * @return ユーザー情報
     */
    public function scopeEmailFindUser($query, $email){
        return $query->where(self::COLUMN_EMAIL, $email)->first();
    }

    /**
     * メールアドレスURLトークンに紐づくユーザー情報取得
     *
     * @param  $query クエリ
     * @param  $email_verify_token メールアドレスURLトークン
     * @return ユーザー情報
     */
    public function scopeEmailVerifyTokenFindUser($query, $email_verify_token){
        return $query->where(self::COLUMN_EMAIL_VERIFY_TOKEN, $email_verify_token)->first();
    }

    /**
     * パスワードリセットメールアドレスURLトークンに紐づくユーザー情報取得
     *
     * @param  $query クエリ
     * @param  $email_password_reset_token パスワードリセットメールアドレスURLトークン
     * @return ユーザー情報
     */
    public function scopeEmailPasswordResetTokenFindUser($query, $email_password_reset_token){
        return $query->where(self::COLUMN_EMAIL_PASSWORD_RESET_TOKEN, $email_password_reset_token)->first();
    }
}
