<?php
/**
 * 学習一覧用コントローラー
 *
 * @version 1.0
 * @author tsuji
 */
namespace App\Http\Controllers\Studys;

use App\Http\Controllers\Controller;
use App\Models\ContentStep;
use App\Models\Content;

/**
 * 学習一覧用コントローラー
 *
 * 学習一覧処理を記載
 */
class StudyListController extends Controller
{
		/**
		 * 初期表示
		 *
		 * @return view
		 */
    public function show(){
        return view('studys.index')->with([ContentStep::TABLE_NAME => ContentStep::getContentSteps(),
                                          Content::TABLE_NAME => Content::getContents()
                                        ]);
		}
}
