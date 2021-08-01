<?php
/**
 * 出品リスト用コントローラー
 *
 * @version 1.0
 * @author tsuji
 */
namespace App\Http\Controllers\Managements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Constants\AppConstants;

/**
 * 出品リスト用コントローラー
 *
 * 出品リスト処理を記載
 */
class ListingController extends Controller
{
		/**
		 * 初期表示
		 *
		 * @return view
		 */
    public function show(Request $request){
      $this->menu_param_array[$request->path()][1] = AppConstants::FG_ON;
      return view(AppConstants::VIEW_FILE_PATH_MANAGEMENTS_INDEX)->with([AppConstants::KEY_MENU_PARAM_ARRAY => $this->menu_param_array]);
		}
}
