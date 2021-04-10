<?php
/**
 * ベースモデルクラス
 *
 * @version 1.0
 * @author tsuji
 */
namespace App\Bases;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
* ベースモデルクラス
*
* モデルクラスの共通部分を記載
 */
class BaseModel extends Model
{
    use HasFactory;

    /** 削除フラグ */
    const COLUMN_DEL_FLG = "del_flg";
}
