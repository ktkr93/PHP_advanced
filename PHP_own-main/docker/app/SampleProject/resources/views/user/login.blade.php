<head>
    <title>でいれぽくん | ログイン</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>

<body class="login">
    <div class="row">
        <div class="col-md-4">
            <h1>ログイン</h1>
            @if(url()->previous() == 'http://localhost/login')
            <div class="alert-danger">
                <p>ログインに失敗しました。</p>
                <p>ユーザーID、パスワードをご確認ください。</p>
            </div>
            @endif

            <form name="validation" action="{{ route('login.postLogin') }}" method="post" style="margin-top: 50px;">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="InputUserID">ユーザーID</label>
                    <div class="col-sm-9">
                        <input type="text" name="user_id" class="form-control" id="user_id" placeholder="ユーザーID">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="InputPassword">パスワード</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" class="form-control" id="password" placeholder="パスワード">
                    </div>
                    <!--/form-group-->
                </div>

                <div class="form-group">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary" onClick="return checkLogin();">ログイン</button>
                    </div>
                    <!--/form-group-->
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</body>