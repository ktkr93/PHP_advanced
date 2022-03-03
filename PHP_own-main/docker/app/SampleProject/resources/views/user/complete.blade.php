<head>
    <title>でいれぽくん | 会員登録完了</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body class="signup">
    <div class="container ops-main">
        <div class="row signup-complete-flex">
            <h2>会員登録完了</h2>
            <p>会員登録が完了しました。<br>
                引き続きでいれぽくんをご利用ください。
            </p>
            <form action="/top/login" method="post" class="form-horizontal" style="margin-top: 50px;">
                @csrf
                <!-- user_idを送信する -->
                <input type="hidden" name="user_id" class="form-control" id="InputName" value="{{ $input['user_id'] }}">
                <button type="submit" class="btn btn-primary">トップへ戻る</button>
            </form>
        </div>
    </div>
</body>