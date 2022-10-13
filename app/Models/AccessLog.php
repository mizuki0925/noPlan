<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AccessLog extends Model
{
    protected $table = 'accessLogs';
    use HasFactory;

    /**
     * ログの書き込み
     *
     * @param [type] $request
     * @return void
     */
    public function set($request)
    {
        try {
            $log = new AccessLog();
            // ユーザID
            $log->userId = (Auth::check()) ? Auth::id() : null;
            // 内容
            $log->body = $request->fullUrl();
            // 実行クエリ(実装方法を考える)
            $log->query = null;
            // ユーザエージェント
            $log->userAgent = $request->userAgent();
            // IPアドレス(ロードバランサを考えたときは改善が必要)
            $log->ip = $request->ip();

            $log->save();
        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
