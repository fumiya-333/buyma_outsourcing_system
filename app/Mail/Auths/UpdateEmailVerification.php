<?php
/**
 * パスワードリセット仮登録メール送信クラス
 *
 * @version 1.0
 * @author tsuji
 */
namespace App\Mail\Auths;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Constants\AppConstants;

/**
 * パスワードリセット仮登録メール送信クラス
 *
 * パスワードリセット情報仮登録メール送信を記載
 */
class UpdateEmailVerification extends Mailable
{
    use Queueable, SerializesModels;
    /** 件名 */
    private $_subject;
    /** メールアドレス */
    private $email;
    /** トークン */
    private $email_password_reset_token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $email, $email_password_reset_token){
        $this->_subject = $subject;
        $this->email = $email;
        $this->email_password_reset_token = $email_password_reset_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
      return $this
          ->subject($this->_subject)
          ->text('emails.send_update')
          ->with([User::COLUMN_EMAIL => $this->email, User::COLUMN_EMAIL_PASSWORD_RESET_TOKEN => $this->email_password_reset_token]);
    }

    /**
     * メール本文の取得
     *
     * @return メール本文
     */
    public function getMessage(){
        return $this->view('emails.send_update')->render();
    }
}
