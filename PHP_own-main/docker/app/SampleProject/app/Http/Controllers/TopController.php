<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostDatum;

class TopController extends Controller
{
    public function index()
    {
        // DBよりpost_dataテーブルの値を全て取得
        $PostData = PostDatum::all();
        // 取得した値(PostDatum)をビュー「PostData/index」に渡す
        return view('PostDatum/index', compact('PostData'));
    }

    public function indexLogin(Request $request)
    {
        // DBよりpost_dataテーブルの値を全て取得
        $PostData = PostDatum::all();

        // POSTされたuser_idを変数へ代入
        // $credentials = $request->only('user_id');
        // $credentials = $request;
        // 値を保存
        // session()->put(['user_id' => $credentials['user_id']]);
        // IDを取得
        $user_id = $request;
        $credentials = $request;


        // 取得した値(PostDatum)をビュー「PostData/index」に渡す
        return view('PostDatum/indexLogin', compact('PostData', 'user_id', 'credentials'));
    }
}
