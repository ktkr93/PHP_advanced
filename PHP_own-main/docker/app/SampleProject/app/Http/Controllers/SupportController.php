<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostDatum;
use App\Models\SupportFeeArchive;
use Illuminate\Support\Facades\DB;

class SupportController extends Controller
{
    public function show100($id)
    {
        // DBよりpost_dataテーブルの値を全て取得
        $item = PostDatum::find($id);
        return view('SupportFee/show100', compact('item'));
    }

    public function show500($id)
    {
        // DBよりpost_dataテーブルの値を全て取得
        $item = PostDatum::find($id);
        return view('SupportFee/show500', compact('item'));
    }

    public function show1000($id)
    {
        // DBよりpost_dataテーブルの値を全て取得
        $item = PostDatum::find($id);
        return view('SupportFee/show1000', compact('item'));
    }

    public function showComplete(Request $request)
    {
        //ここでメールを送信するなどを行う
        DB::table('support_fee_archives')->insert([
            'user_id' =>  $request["user_id"],
            'support_fee' => $request["support_fee"],
            'support_fee_post_id' => $request["support_fee_post_id"],
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // 二重送信防止
        $request->session()->regenerateToken();

        //セッションを空にする
        // $request->session()->forget("form_input");

        // view('user/complete');
        // return redirect()->action([PostController::class, 'postComplete']);
        return view("SupportFee/show100Complete", compact('request'));
    }
}
