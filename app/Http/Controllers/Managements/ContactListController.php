<?php
/**
 * お問い合わせ一覧用コントローラー
 *
 * @version 1.0
 * @author tsuji
 */
namespace App\Http\Controllers\Managements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Constants\AppConstants;

/**
 * お問い合わせ一覧用コントローラー
 *
 * お問い合わせ一覧処理を記載
 */
class ContactListController extends Controller
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
