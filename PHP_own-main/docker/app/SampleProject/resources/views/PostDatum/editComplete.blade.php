<head>
    <title>でいれぽくん | 日報編集完了</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&family=Sawarabi+Gothic&display=swap" rel="stylesheet">
    <!-- end google font -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/f66cdf6395.js" crossorigin="anonymous"></script>
</head>

<header>
    <div class="header">
        <div class="header-container">
            <div class="title">
                <h1><i class="fa-solid fa-book fa-xs"></i>でいれぽくん</h1>
            </div>
            <div class="menu">
                <a href="/mypage/{{ $input['user_id'] }}">マイページ</a>
                <a href="{{ route('logout') }}">ログアウト</a>
            </div>
        </div>
    </div>
</header>

<body class="post">
    <div class="container ops-main">
        <div class="row post-complete-flex">
            <h2>編集が完了しました。</h2>
            <form action="/top/login" method="post" class="form-horizontal" style="margin-top: 50px;">
                @csrf

                <!-- idを送信する -->
                <input type="hidden" name="id" class="form-control" id="InputName" value="{{ $input['id'] }}">
                <!-- user_idを送信する -->
                <input type="hidden" name="user_id" class="form-control" id="InputName" value="{{ $input['user_id'] }}">

                <button type="submit" class="btn btn-primary">トップへ戻る</button>
            </form>
        </div>
    </div>
</body>