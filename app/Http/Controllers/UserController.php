<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // データベースの users テーブルから全データを取得
        return view('users', compact('users')); // 'users' ビューにデータを渡す
    }
}
