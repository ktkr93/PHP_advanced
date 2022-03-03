<head>
    <title>でいれぽくん | サポートフィーのご確認</title>
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
                <a href="/post/new/{{ $item['user_id'] }}">投稿する</a>
                <a href="/mypage/{{ $item['user_id'] }}">マイページ</a>
                <a href="{{ route('logout') }}">ログアウト</a>
            </div>
        </div>
    </div>
</header>

<div class="container ops-main">
    <div class="row">
        <div class="col-md-12">
            <p>下記の金額をサポートしますか？</p>
            <p class="support_fee_text">¥1000</p>
        </div>
    </div>
    <div class="row support_fee_flex">
        <div class="col-md-11 col-md-offset-1">
            <h2>{{ $item->post_title }}</h2>
            <p>{!! nl2br($item['post_data']) !!}</p>
        </div>
        <form action="/post/support/complete" method="post" class="form-horizontal" style="margin-top: 50px;">
            @csrf
            <label class="col-sm-3 control-label" for="post_title"></label>

            <!-- idを送信する -->
            <input type="hidden" name="id" class="form-control" id="InputName" value="{{ $item['id'] }}">
            <!-- user_idを送信する -->
            <input type="hidden" name="user_id" class="form-control" id="InputName" value="{{ $item->user_id }}">
            <!-- support_feeを送信する -->
            <input type="hidden" name="support_fee" class="form-control" id="InputName" value="1000">
            <!-- support_fee_post_idを送信する -->
            <!-- ※support_fee_post_idはpost_dataのidと等しい -->
            <input type="hidden" name="support_fee_post_id" class="form-control" id="InputName" value="{{ $item->id }}">

            <div class="form-group">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary btn-block">サポートする</button>
                </div>
                <!--/form-group-->
            </div>
        </form>
    </div>