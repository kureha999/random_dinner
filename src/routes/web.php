<?php

use Illuminate\Support\Facades\Route;
use App\Services\SpoonacularService;

Route::get('/', function () {
    return view('welcome');
});

// API接続テスト用（後で削除）
Route::get('/test-api', function (SpoonacularService $service) {
    if ($service->testConnection()) {
        return 'API接続成功！';
    }
    return 'API接続失敗...';
});
