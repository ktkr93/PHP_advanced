<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use App\Models\PostDatum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validater;
use App\Jobs\SendThanksMail;

class UserController extends Controller
{
    private $formItems = ["name", "email", "user_id", "password"];
    private $validator = [
        "name" => "required|string|max:100",
        "email" => "required|string|max:100",
        "user_id" => "required|string|max:100",
        "password" => "required|string|max:100"
    ];

    public function showSignup()
    {
        return view('user/signup');
    }

    // セッションに書き込む
    public function post(Request $request)
    {
        $input = $request->only($this->formItems);
        /*
        $validator = Validator::make($input, $this->validator);
        if ($validator->fails()) {
            return redirect()->action("UserController@show")
                ->withInput()
                ->withErrors($validator);
        }
        */
        //セッションに書き込む
        $request->session()->put("form_input", $input);

        return redirect()->action([UserController::class, 'confirm']);
    }

    public function confirm(Request $request)
    {
        //セッションから値を取り出す
        $input = $request->session()->get("form_input");
        //セッションに値が無い時はsignupページに戻る
        if (!$input) {
            return redirect()->action([UserController::class, 'show']);
        }
        return view("user/confirm", ["input" => $input]);
    }

    public function send(Request $request)
    {
        //セッションから値を取り出す
        $input = $request->session()->get("form_input");

        //セッションに値が無い時はsignupページに戻る
        if (!$input) {
            return redirect()->action([UserController::class, 'show']);
        }

        // ユーザーデータをDBに登録する。
        DB::table('user_profiles')->insert([
            'name' =>  $input["name"],
            'email' => $input["email"],
            'user_id' => $input["user_id"],
            'password' => $input["password"],
            'created_at' => now(),
            'updated_at' => now()
        ]);


        //セッションを空にする
        // $request->session()->forget("form_input");

        // 二重送信防止
        $request->session()->regenerateToken();

        // view('user/complete');
        return redirect()->action([UserController::class, 'complete']);
    }

    public function complete(Request $request)
    {
        $input = $request->session()->get("form_input");

        // 二重送信防止
        $request->session()->regenerateToken();

        // 非同期でメール送信
        // dd($input, $userEmail);
        SendThanksMail::dispatch($input);

        return view("user/complete", ["input" => $input]);
    }

    // **** ログイン **** //
    public function showLogin()
    {
        return view('user/login');
    }

    public function postLogin(Request $request)
    {
        /*
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);
        */

        // 認証（attemptメソッド）
        $credentials = $request->only('user_id', 'password');
        /* Authでは正常に動作しないためコメントアウト
        if (Auth::attempt($credentials)) {
            echo $credentials['user_id'];
            echo $credentials['password'];
            return redirect()->route('top.index');
        }
        */
        // 該当するuser_idがあり、かつ該当するpasswordがあるとき、トップヘ移動する
        if (
            UserProfile::where('user_id', $credentials['user_id'])
            ->where('password', $credentials['password'])->first()
        ) {
            // DBよりpost_dataテーブルの値を全て取得
            $PostData = PostDatum::all();

            // 値を保存
            session()->put(['user_id' => $credentials['user_id']]);
            // IDを取得
            $user_id = $request->session()->get('user_id');

            return view('PostDatum/index', compact('credentials', 'PostData', 'user_id'));
            // return redirect()->route('top.index');
        }

        //ログイン失敗したらリダイレクトしてログインページに戻る
        return redirect()->back();
    }

    public function logout()
    {
        // セッションを削除
        session()->flush();
        // DBよりpost_dataテーブルの値を全て取得
        $PostData = PostDatum::all();
        // 取得した値(PostDatum)をビュー「PostData/index」に渡す
        return view('PostDatum/index', compact('PostData'));
    }
}
