<head>
    <title>でいれぽくん | 日報投稿</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&family=Sawarabi+Gothic&display=swap" rel="stylesheet">
    <!-- end google font -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/script.js"></script>
    <script src="https://kit.fontawesome.com/f66cdf6395.js" crossorigin="anonymous"></script>
</head>

<header>
    <div class="header">
        <div class="header-container">
            <div class="title">
                <h1><i class="fa-solid fa-book fa-xs"></i>でいれぽくん</h1>
            </div>
            <div class="menu">
                <a href="/mypage/{{ $user_id }}">マイページ</a>
                <a href="{{ route('logout') }}">ログアウト</a>
            </div>
        </div>
    </div>
</header>

<body class="post">
    <div class="container ops-main">
        <div class="row">
            <div class="col-md-12">
                <h3 class="ops-title">日報投稿</h3>
            </div>
        </div>
        <div class="row">
            <div class="form-container">
                <form name="validation" action="/post/postconfirm" method="post" class="post-form">
                    @csrf

                    <!-- user_idを送信する -->
                    <input type="hidden" name="user_id" class="form-control" id="InputName" value="{{ $user_id }}">

                    <input type="text" name="post_title" class="form-control" id="post_title">
                    <textarea name="post_data" class="form-control" id="post_data" rows="8"></textarea>
                    <button type="submit" class="btn btn-primary" onclick="return checkPost();">確認画面へ</button>
                </form>
            </div>
        </div>
</body>