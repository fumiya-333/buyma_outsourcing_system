<?php
/**
 * コンテンツステップモデルクラス
 *
 * @version 1.0
 * @author tsuji
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Bases\BaseModel;
use App\Models\Content;

/**
* コンテンツステップモデルクラス
*
* コンテンツステップテーブルのデータ処理を記載
*/
class ContentStep extends BaseModel
{
    use HasFactory;

    /** テーブル名 */
    const TABLE_NAME = 'content_steps';
    /** ステップID */
    const COLUMN_STEP_ID = "step_id";
    /** ステップ名 */
    const COLUMN_STEP_NAME = "step_name";

    protected $fillable = [self::COLUMN_STEP_NAME];
    /**
     * ステップ情報取得
     *
     * @param   $query クエリ
     * @return ステップ情報
     */
    public function scopeGetContentSteps($query){
        return $query->where(self::COLUMN_DEL_FLG, false)->get();
    }
}
