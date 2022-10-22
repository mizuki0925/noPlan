<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BookSearchHistory extends Model
{
    use HasFactory;

    /**
     * ログの書き込み(内容未完成)
     *
     * @param [type] $request
     * @return void
     */
    public function set($keyword)
    {
        try {
            $log = new BookSearchHistory();
            // ユーザID
            $log->userId = (Auth::check()) ? Auth::id() : null;
            // 検索ワード
            $log->body = $keyword;

            $log->save();
        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
