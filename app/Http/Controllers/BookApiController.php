<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

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
    public function apiExec(Request $request)
    {
        // urlの作成とAPIの実行は切り離した方が良いかも？（url部分はモデルに書く？）
        $baseurl = 'https://www.googleapis.com/books/v1/volumes';
        $params = [];
        $params['key'] = config('app.google_api_key');
        $params['maxResults'] = 2;
        $params['orderBy'] = 'relevance';
        $params['country'] = 'JP';
        $params['q'] = $request->keyword;

        ksort($params);

        $search = '';
        foreach ($params as $key => $value) {
            $search .= '&' . $key . '=' . $value;
        }
        $search = substr($search, 1);
        
        $url = $baseurl . '?' . $search;

        // APIの実行

        $client = new Client();
        $response = $client->request('GET', $url);
        // 受け取りデータ
        $responseData = json_decode($response->getBody(), true);

        dd($responseData);
        return $responseData;

        // 検索実行データの保存を実行（検索ワードとかの保存程度でいいかも）

        // 受け取ったjsonを$responceに配列で各要素を作成

        // 成形したデータをviewに出力

    }
}
