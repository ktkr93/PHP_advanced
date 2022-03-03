<head>
    <title>でいれぽくん | サポート完了</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <script src="https://kit.fontawesome.com/f66cdf6395.js" crossorigin="anonymous"></script>
</head>

<header>
    <div class="header">
        <div class="header-container">
            <div class="title">
                <h1><i class="fa-solid fa-book fa-xs"></i>でいれぽくん</h1>
            </div>
            <div class="menu">
                <a href="/post/new/{{ $request->user_id }}">投稿する</a>
                <a href="/mypage/{{ $request->user_id }}">マイページ</a>
                <a href="{{ route('logout') }}">ログアウト</a>
            </div>
        </div>
    </div>
</header>

<div class="container ops-main">
    <div class="row support_fee_flex text-center">
        <p>下記の金額をサポートしました！</p>
        <p class="support_fee_text">¥{{ $request->support_fee }}</p>
        <form action="/top/login" method="post" class="form-horizontal" style="margin-top: 50px;">
            @csrf
            <!-- user_idを送信する -->
            <input type="hidden" name="user_id" class="form-control" id="InputName" value="{{ $request->user_id }}">
            <button type="submit" class="btn btn-primary">トップへ戻る</button>
        </form>
    </div>
</div>