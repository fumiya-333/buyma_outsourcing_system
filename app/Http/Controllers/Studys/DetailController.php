<?php
/**
 * 学習詳細用コントローラー
 *
 * @version 1.0
 * @author tsuji
 */
namespace App\Http\Controllers\Studys;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContentStep;
use App\Models\Content;
use App\Models\ContentFile;

/**
 * 学習詳細用コントローラー
 *
 * 学習詳細処理を記載
 */
class DetailController extends Controller
{
		/**
		 * 初期表示
		 *
		 * @return view
		 */
    public function show(Request $request){
        return view('studys.detail')->with([ContentStep::TABLE_NAME => ContentStep::getContentSteps(),
																						Content::TABLE_NAME => Content::getContents(),
																						Content::TABLE_NAME_SINGULAR => Content::getContent($request->contents_id),
                                            ContentFile::TABLE_NAME => ContentFile::getContentFiles($request->contents_id)
                                          ]);
		}
}
