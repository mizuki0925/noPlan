<?php

namespace App\Http\Controllers;

use Google\Service\CloudSourceRepositories\Repo;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\ApiHistory;
use App\Traits\BookApi;

class BookApiController extends Controller
{

    /**
     * 
     * 
     * @param [type] $Keyword
     * @return void
     */
    public function create(Request $request)
    {
        $url = BookApi::makeUrl($request->keyword);

        $detailList = BookApi::exec($url);

        // 検索履歴の保存
        ApiHistory::set($request);

        dd($detailList);

        // 受け取ったjsonを$responceに配列で各要素を作成

        // 成形したデータをviewに出力
    }
}
