<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostDatum;
use Illuminate\Support\Facades\DB;

class MypageController extends Controller
{
    public function show($user_id)
    {
        // マイページにuser_idをを渡す
        $item = $user_id;

        // DBよりpost_dataテーブルの特定のユーザーの値を全て取得
        $items = DB::table('post_data')
            ->where('user_id', $user_id)
            ->get();

        // user_idはサポートを受けたユーザー
        $fees = DB::table('support_fee_archives')
            ->where('user_id', $user_id)
            ->get();

        // 取得した値(items)をビュー「user/mypage」に渡す
        return view('user/mypage', compact('items', 'fees', 'item'));
    }

    public function delete(Request $request)
    {
        // 日報データ削除
        DB::table('post_data')
            ->where('id', $request->id)
            ->delete();

        $item = $request->user_id;

        // DBよりpost_dataテーブルの特定のユーザーの値を全て取得
        $items = DB::table('post_data')
            ->where('user_id', $request->user_id)
            ->get();

        // user_idはサポートを受けたユーザー
        $fees = DB::table('support_fee_archives')
            ->where('user_id', $request->user_id)
            ->get();

        // 取得した値(items)をビュー「user/mypage」に渡す
        return view('user/mypage', compact('items', 'fees', 'item'));
        // return redirect()->action([MypageController::class, 'show'], ['user_id' => $item]);
    }
}
