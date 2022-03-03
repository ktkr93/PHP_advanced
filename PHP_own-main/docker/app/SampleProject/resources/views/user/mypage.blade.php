<head>
    <title>でいれぽくん</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&family=Sawarabi+Gothic&display=swap" rel="stylesheet">
    <!-- end google font -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/script.js"></script>
    <script src="https://kit.fontawesome.com/f66cdf6395.js" crossorigin="anonymous"></script>
</head>

<header>
    <div class="header">
        <div class="header-container">
            <div class="title">
                <h1><i class="fa-solid fa-book fa-xs"></i>でいれぽくん</h1>
            </div>
            <div class="menu">
                <a class="btn-post" href="/post/new/{{ $item }}">投稿する</a>
                <a href="{{ route('logout') }}">ログアウト</a>
            </div>
        </div>
    </div>
</header>

<body class="mypage">
    <div class="container ops-main">
        <div class="row">
            <div class="col-md-12">
                <h2 class="ops-title heading-mypage">マイページ</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-11">
                <h3 class="heading-nippo-list">投稿一覧</h3>
                <div class="wrap">
                    @foreach($items as $item)

                    <form action="/mypage" method="post" class="mypage_form">
                        @csrf

                        <!-- idを送信する -->
                        <input type="hidden" name="id" class="form-control" id="InputName" value="{{ $item->id }}">
                        <!-- user_idを送信する -->
                        <input type="hidden" name="user_id" class="form-control" id="InputName" value="{{ $item->user_id }}">

                        <div class="post-item-width">
                            <div class="post_item_menu">
                                <a href="/post/{{ $item->id }}/edit">編集</a>
                                <button onclick="deleteClick(event);return false;" type="submit" class="mypage_delete_btn">削除</button>
                            </div>
                            <a href="/post/{{ $item->id }}">
                                <div class="item">
                                    <p>{{ $item->post_title }}</p>
                                    <p>{{ $item->post_data }}</p>
                                </div>
                            </a>
                        </div>
                    </form>
                    @endforeach
                </div>
                <div class="support_fee_archives">
                    <h3 class="heading-support-fee-archive">受け取ったサポートフィー履歴</h3>
                    <div class="wrap">
                        @foreach($items as $item)
                        @foreach($fees as $fee)
                        @if($fee->support_fee_post_id == $item->id)
                        <div class="support_fee_width">
                            <p>¥{{ $fee->support_fee }}</p>
                            <a href="/post/{{ $item->id }}">
                                <div class="item">
                                    <p>{{ $item->post_title }}</p>
                                    <p>{{ $item->post_data }}</p>
                                </div>
                            </a>
                        </div>
                        @endif
                        @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</body>