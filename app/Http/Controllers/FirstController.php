<?php

namespace App\Http\Controllers;

use Illuminate\Http\RequesModelst;
// ModelsのProduct.phpのProductクラスを使う
use App\Models\Product;

class FirstController extends Controller
{
    public function index ( ) {
        $name = 'Gunji';
        
        // productテーブルで条件に合うデータを渡す
        $products = Product::WHERE ( 'price', '>=', 300 ) -> get ( );

        return view ( 'first', compact ( 'name', 'products' ) );
    }
}

// 引数に変数を渡したとときはcompact（連想配列を返す）
// $name => $name;