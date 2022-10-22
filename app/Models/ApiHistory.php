<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ApiHistory extends Model
{
    use HasFactory;

    public static function set($request)
    {
        try {
            $log = new ApiHistory();
            // 内容
            $log->keyword = $request->keyword;
            // ユーザID
            $log->userId = (Auth::check()) ? Auth::id() : null;
            // IPアドレス(ロードバランサを考えたときは改善が必要)
            $log->ip = $request->ip();

            $log->save();
        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
