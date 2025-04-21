<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;

// ルートディレクトリにアクセスされたらviewディレクトリのwelcome.blade.phpを開く

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/member', function () {
    return view('admin.member');
});

//Firstを作成
// url, localhost/firstにアクセスされたら
// アクセスさせるURL
// index：メソッド

// controllerにアクセスしたらファーストコントローラークラスを呼び出す
// 呼び出したい処理をグループ化
// firstにアクセスされたらindexに接続

Route::controller ( Firstcontroller::class ) -> group ( function ( ) {
    Route::get ( 'first', 'index' );
} );

// Route::get ( 'first', [ FirstController::class, 'index']);
// 上と同じ処理
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
