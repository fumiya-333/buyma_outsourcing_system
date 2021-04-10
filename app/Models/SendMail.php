<?php
/**
 * メール送信用モデル
 *
 * @version 1.0
 * @author tsuji
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * メール送信用モデル
 *
 * メール送信テーブルのデータ処理を記載
 */
class SendMail extends Model
{
    use HasFactory;

    /** メールアドレス */
    const COLUMN_EMAIL = "email";
    /** 件名 */
    const COLUMN_SUBJECT = "subject";
    /** 本文 */
    const COLUMN_MESSAGE = "message";

    protected $fillable = [self::COLUMN_EMAIL, self::COLUMN_SUBJECT, self::COLUMN_MESSAGE];

    /** 件名（仮登録） */
    const REGIST_EMAIL_SUBJECT = "【BUYMA物販学習サイト】仮登録の完了のお知らせ";
    /** 件名（パスワードリセット仮登録） */
    const PASSWORD_RESET_EMAIL_SUBJECT = "【BUYMA物販学習サイト】パスワードリセット仮登録の完了のお知らせ";
}
