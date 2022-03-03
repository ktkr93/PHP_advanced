<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\ErrorController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// **** トップ **** //
// ログイン前：localhost/topにリクエストがきたら、TopControllerクラスのindexメソッドに処理を振り分けて
Route::get('/top', [TopController::class, 'index'])->name('top.index');
// ログイン後：
Route::post('/top/login', [TopController::class, 'indexLogin']);

// **** マイページ **** //
Route::get('/mypage/{user_id}', [MypageController::class, 'show']);
// ※{id}は投稿ID
Route::post('/mypage', [MypageController::class, 'delete']);



// **** 会員登録 **** //
// 会員登録
Route::get('/signup', [UserController::class, 'showSignup'])->name('signup.showSignup');
Route::post('/signup', [UserController::class, 'post'])->name('signup.post');
// 会員登録確認
Route::get('/signup/confirm', [UserController::class, 'confirm'])->name('signup.confirm');
Route::post('/signup/confirm', [UserController::class, 'send'])->name('signup.send');
// 会員登録完了
Route::get('/signup/complete', [UserController::class, 'complete'])->name('signup.complete');

// **** ログイン、ログアウト **** //
Route::get('/login', [UserController::class, 'showLogin'])->name('login.showLogin');
Route::post('/top', [UserController::class, 'postLogin'])->name('login.postLogin');
Route::get('/top', [UserController::class, 'logout'])->name('logout');



// **** 投稿表示、編集、完了 **** //
// 投稿表示
Route::get('/post/{id}', [PostController::class, 'show']);

// 新規投稿表示
Route::get('/post/new/{id}', [PostController::class, 'postNew']);
// 新規投稿から新規投稿確認へ遷移
Route::post('/post/postconfirm', [PostController::class, 'postSendNew']);

// 新規投稿確認表示
// Route::get('/post/confirm', [PostController::class, 'confirm'])->name('post.postConfirm');
// 新規投稿確認画面から遷移先
Route::post('/post/postcomplete', [PostController::class, 'postConfirmSendNew']);



// 投稿編集表示
Route::get('/post/{id}/edit', [PostController::class, 'postEdit']);
// 投稿編集から遷移先
Route::post('/post/confirm', [PostController::class, 'postEditSend'])->name('post.postEditSend');

// 投稿確認表示
// Route::get('/post/confirm', [PostController::class, 'confirm'])->name('post.postConfirm');
// 投稿確認画面から遷移先
Route::post('/post/complete', [PostController::class, 'postConfirmSend']);

// 投稿完了
// Route::get('/post/editComplete', [PostController::class, 'postComplete'])->name('post.complete');



// **** サポートフィー表示、完了、完了 **** //
// 投稿表示
Route::get('/post/{id}/support/100', [SupportController::class, 'show100']);
Route::get('/post/{id}/support/500', [SupportController::class, 'show500']);
Route::get('/post/{id}/support/1000', [SupportController::class, 'show1000']);
Route::post('/post/support/complete', [SupportController::class, 'showComplete']);



// **** エラー画面 **** //
Route::get('/error', [ErrorController::class, 'show'])->name('error');
