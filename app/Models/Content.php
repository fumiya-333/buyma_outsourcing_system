<?php
/**
 * コンテンツモデルクラス
 *
 * @version 1.0
 * @author tsuji
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Bases\BaseModel;

/**
* コンテンツモデルクラス
*
* コンテンツテーブルのデータ処理を記載
*/
class Content extends BaseModel
{
    use HasFactory;

    /** テーブル名 */
    const TABLE_NAME = 'contents';
    /** テーブル名（単数形） */
    const TABLE_NAME_SINGULAR = 'content';
    /** コンテンツID */
    const COLUMN_CONTENTS_ID = "contents_id";
    /** ステップID */
    const COLUMN_STEP_ID = "step_id";
    /** コンテンツ名 */
    const COLUMN_CONTENTS_NAME = 'contents_name';
    /** YOUTUBE動画ID */
    const COLUMN_YOUTUBE_VIDEO_ID = 'youtube_video_id';
    /** コンテンツテキスト */
    const COLUMN_CONTENTS_TEXT = 'contents_text';

    protected $fillable = [self::COLUMN_CONTENTS_ID, self::COLUMN_CONTENTS_NAME, self::COLUMN_YOUTUBE_VIDEO_ID, self::COLUMN_CONTENTS_TEXT];

    /**
     * コンテンツ情報取得
     *
     * @param   $query クエリ
     * @return コンテンツ情報
     */
    public function scopeGetContents($query){
        return $query->where(self::COLUMN_DEL_FLG, false)->get();
    }

    /**
     * コンテンツIDに紐づくコンテンツ情報取得
     *
     * @param   $query       クエリ
     * @param   $contents_id コンテンツID
     * @return  コンテンツ情報
     */
    public function scopeGetContent($query, $contents_id){
        return $query->where(Content::COLUMN_CONTENTS_ID, $contents_id)->where(self::COLUMN_DEL_FLG, false)->first();
    }
}
