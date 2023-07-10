<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;

class BookApiController extends Controller
{
111
    /**
     * Undocumented function
     *
     * キーワードを入力するとapiのurlを自動で生成してくれるメソッド
     * 
     * @param [type] $Keyword
     * @return void
     */
    1111
    public function makeUrl($Keyword)
    {
        $baseurl = 'https://www.googleapis.com/books/v1/volumes';
        $params = [];
        $params['key'] = config('app.google_api_key');
        $params['maxResults'] = 20;
        $params['orderBy'] = 'relevance';
        $params['country'] = 'JP';
        $params['q'] = $Keyword;

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
     * Undocumented function
     * 
     * makeUrlで発行したurlを元に実際にAPIを叩く
     * 戻り値はとりあえず全部用意しておいた方が良いかも
     *
     * @param [type] $url
     * @return void
     */

    function apiExec($url)
    {
        
    }
}
