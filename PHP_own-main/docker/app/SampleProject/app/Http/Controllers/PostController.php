<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MypageController;
use App\Models\UserProfile;
use App\Models\PostDatum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validater;

class PostController extends Controller
{
    private $formItems = ["id", "user_id", "post_title", "post_data"];
    private $validator = [
        "name" => "required|string|max:100",
        "email" => "required|string|max:100",
        "user_id" => "required|string|max:100",
        "password" => "required|string|max:100"
    ];

    public function show($id)
    {
        $item = PostDatum::find($id);
        return view('PostDatum/show', compact('item'));
    }

    public function postNew($id)
    {
        $user_id = $id;
        return view('PostDatum/post', compact('user_id'));
    }

    // セッションに書き込む
    public function postSendNew(Request $request)
    {
        $input = $request->only($this->formItems);
        //セッションに書き込む
        $request->session()->put("form_input", $input);
        //セッションから値を取り出す
        $input = $request->session()->get("form_input");
        //セッションに値が無い時は投稿編集ページに戻る
        if (!$input) {
            // return redirect()->action([PostController::class, 'postEdit']);
            echo "セッションに値がありません";
        }
        return view("PostDatum/postConfirm", ["input" => $input]);
        // return redirect()->action([PostController::class, 'confirm']);
    }

    // public function confirm(Request $request)
    // {
    //セッションから値を取り出す
    // }

    public function postConfirmSendNew(Request $request)
    {
        //セッションから値を取り出す
        $input = $request->session()->get("form_input");

        //セッションに値が無い時は投稿編集ページに戻る
        if (!$input) {
            return redirect()->action([PostController::class, 'postEdit']);
        }

        // 投稿データをDBに書き込む
        DB::table('post_data')->insert([
            'user_id' => $input["user_id"],
            'post_title' => $input["post_title"],
            'post_data' => $input["post_data"],
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // 二重送信防止
        $request->session()->regenerateToken();

        //セッションを空にする
        // $request->session()->forget("form_input");

        // view('user/complete');
        // return redirect()->action([PostController::class, 'postComplete']);
        return view("PostDatum/postComplete", ["input" => $input]);
    }



    public function postEdit($id)
    {
        $item = PostDatum::find($id);
        return view('PostDatum/edit', compact('item'));
    }

    // セッションに書き込む
    public function postEditSend(Request $request)
    {
        $input = $request->only($this->formItems);
        //セッションに書き込む
        $request->session()->put("form_input", $input);
        $input = $request->session()->get("form_input");
        //セッションに値が無い時は投稿編集ページに戻る
        if (!$input) {
            // return redirect()->action([PostController::class, 'postEdit']);
            echo "セッションに値がありません";
        }
        return view("PostDatum/editConfirm", ["input" => $input]);
        // return redirect()->action([PostController::class, 'confirm']);
    }

    public function postConfirmSend(Request $request)
    {
        //セッションから値を取り出す
        $input = $request->session()->get("form_input");

        //セッションに値が無い時は投稿編集ページに戻る
        if (!$input) {
            return redirect()->action([PostController::class, 'postEdit']);
        }

        // DBの投稿データを更新する
        DB::table('post_data')
            ->where('id', $input["id"])
            ->update([
                'post_title' =>  $input["post_title"],
                'post_data' => $input["post_data"],
                'updated_at' => now()
            ]);

        // 二重送信防止
        $request->session()->regenerateToken();
        //セッションを空にする
        // $request->session()->forget("form_input");

        // view('user/complete');
        // return redirect()->action([PostController::class, 'postComplete']);

        return view("PostDatum/editComplete", ["input" => $input]);
    }
}
