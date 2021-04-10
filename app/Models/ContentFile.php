<?php
/**
 * コンテンツファイルモデルクラス
 *
 * @version 1.0
 * @author tsuji
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Bases\BaseModel;

/**
* コンテンツファイルモデルクラス
*
* コンテンツファイルテーブルのデータ処理を記載
*/
class ContentFile extends BaseModel
{
    use HasFactory;

    /** テーブル名 */
    const TABLE_NAME = 'content_files';
    /** ファイルID */
    const COLUMN_FILE_ID = "file_id";
    /** ファイル名 */
    const COLUMN_FILE_NAME = "file_name";
    /** コンテンツID */
    const COLUMN_CONTENTS_ID = "contents_id";
    /** ファイルパス */
    const COLUMN_FILE_PATH = "file_path";

    protected $fillable = [self::COLUMN_FILE_ID, self::COLUMN_FILE_NAME, self::COLUMN_FILE_PATH];

    /**
     * ファイル情報取得
     *
     * @param   $query クエリ
     * @param   $contents_id コンテンツID
     * @return ファイル情報
     */
    public function scopeGetContentFiles($query, $contents_id){
        return $query->where(Content::COLUMN_CONTENTS_ID, $contents_id)->where(self::COLUMN_DEL_FLG, false)->get();
    }
}
