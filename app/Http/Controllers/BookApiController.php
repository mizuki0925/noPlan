<?php

namespace App\Http\Controllers;

use Google\Service\CloudSourceRepositories\Repo;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\ApiHistory;
use App\Traits\BookApiTrait;

class BookApiController extends Controller
{

    /**
     * Undocumented function
     *
     * キーワードを入力するとapiのurlを自動で生成してくれるメソッド
     * 
     * @param [type] $Keyword
     * @return void
     */
    public function create(Request $request)
    {
        $url = BookApiTrait::makeUrl($request->keyword);

        $detailList = BookApiTrait::execApi($url);

        // 検索履歴の保存
        ApiHistory::set($request);

        dd($detailList);

        // 受け取ったjsonを$responceに配列で各要素を作成

        // 成形したデータをviewに出力
    }
}
