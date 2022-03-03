<head>
    <title>でいれぽくん | 日報</title>
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
                @if(Session::has('user_id'))
                <a class="btn-post" href="/post/new/{{ $item['user_id'] }}">投稿する</a>
                <a href="/mypage/{{ $item['user_id'] }}">マイページ</a>
                <a href="{{ route('logout') }}">ログアウト</a>
                @else
                <a href="{{ route('login.showLogin') }}">ログイン</a>
                <a href="{{ route('signup.showSignup') }}">会員登録</a>
                @endif
            </div>
        </div>
    </div>
</header>

<div class="container ops-main">
    <div class="row">
        <div class="col-md-11">
            @if(Session::has('user_id'))
            <div class="support_fee_amount">
                <a class="support_fee_amount_item" href="/post/{{ $item->id }}/support/100">¥100</a>
                <a class="support_fee_amount_item" href="/post/{{ $item->id }}/support/500">¥500</a>
                <a class="support_fee_amount_item" href="/post/{{ $item->id }}/support/1000">¥1000</a>
            </div>
            @endif
            <h2>{{ $item->post_title }}</h2>
            <p>{!! nl2br($item['post_data']) !!}</p>
        </div>
    </div>