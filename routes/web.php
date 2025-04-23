<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Livewire\HelloTest;

// ✅ トップページで Livewire の HelloTest コンポーネントを直接表示
Route::get('/', HelloTest::class);

// ✅ 他のルートはそのまま残す
Route::get('admin/member', function () {
    return view('admin.member');
});

// ✅ FirstController 経由のルーティング
Route::controller(FirstController::class)->group(function () {
    Route::get('first', 'index');
});

// ✅ Jetstream 認証後のダッシュボード
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
