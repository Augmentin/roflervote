<?php
namespace App\Logs;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\Log;

class LogQueryDatabase
{
    public function handle(QueryExecuted $query) {

        Log::info(__METHOD__, ['SQL' => $query->sql]);
        Log::info(__METHOD__, ['bindings' => $query->bindings]);
        Log::info(__METHOD__, ['time' => $query->time]);
    }
}