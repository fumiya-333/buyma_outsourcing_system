<?php
/**
 * ファイル処理用コントローラー
 *
 * @version 1.0
 * @author tsuji
 */
namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use App\Constants\AppConstants;
use Log;

/**
 * ファイル処理用コントローラー
 *
 * ファイル処理を記載
 */
class FileController extends Controller
{
		/** エラーコード */
		const ERR_CODE = 500;

		/**
		 * ファイルダウンロード
		 *
		 * @return view
		*/
		public function downLoad(Request $request){
				try{
						return response()->download(Storage::path(AppConstants::STORAGE_DOWNLOAD_FILE_PATH . $request->file_path));
				} catch (\Exception $e) {
						return response()->json(self::ERR_CODE . '\n' . $e->getMessage(), self::ERR_CODE);
				}
		}
}
