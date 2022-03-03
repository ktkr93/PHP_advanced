<head>
    <title>でいれぽくん</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&family=Sawarabi+Gothic&display=swap" rel="stylesheet">
    <!-- end google font -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/f66cdf6395.js" crossorigin="anonymous"></script>
</head>

<header class="header">
    <div class="header-container">
        <div class="title">
            <h1><i class="fa-solid fa-book fa-xs"></i>でいれぽくん</h1>
        </div>
        <div class="menu">
            @if(isset($user_id))
            <a class="btn-post" href="/post/new/{{ $credentials['user_id'] }}">投稿する</a>
            <a href="/mypage/{{ $credentials['user_id'] }}">マイページ</a>
            <a href="{{ route('logout') }}">ログアウト</a>
            @else
            <a href="{{ route('login.showLogin') }}">ログイン</a>
            <a href="{{ route('signup.showSignup') }}">会員登録</a>
            @endif
        </div>
    </div>
</header>

<body class="top">
    <div class="top-container">
        <div class="container ops-main">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="ops-title heading-nippo">みんなの日報</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11">
                    <div class="wrap">
                        @foreach($PostData as $PostDatum)
                        <a href="/post/{{ $PostDatum->id }}">
                            <div class="item">
                                <p>{{ $PostDatum->post_title }}</p>
                                <p>{{ $PostDatum->post_data }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</body>