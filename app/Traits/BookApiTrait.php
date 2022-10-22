<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait BookApiTrait
{

    /**
     * APIリクエスト用URL生成
     *
     * @param [type] $keyword
     * @return string
     */

    public static function makeUrl($keyword)
    {
        $baseurl = 'https://www.googleapis.com/books/v1/volumes';
        $params = [];
        $params['key'] = config('app.google_api_key');
        $params['maxResults'] = 2;
        $params['orderBy'] = 'relevance';
        $params['country'] = 'JP';
        $params['q'] = $keyword;

        ksort($params);

        $search = '';
        foreach ($params as $key => $value) {
            $search .= '&' . $key . '=' . $value;
        }
        $search = substr($search, 1);

        $url = $baseurl . '?' . $search;

        return $url;
    }

    /**
     * GoogleBooksAPIの実行
     *
     * @param [type] $url
     * @return json
     */
    public static function execApi($url)
    {
        try {
            $client = new Client();
            $response = $client->request('GET', $url);
            // 受け取りデータ
            $responseData = json_decode($response->getBody(), true);

            return $responseData;
        } catch (\Throwable $th) {
            report($th);
            return redirect()->back();
        }
    }
}
