<head>
    <title>でいれぽくん | 会員登録情報のご確認</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body class="signup">
    <div class="container ops-main">
        <div class="row">
            <div class="col-md-12">
                <h3 class="ops-title">会員登録情報のご確認</h3>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('signup.send') }}" method="post" class="form-horizontal form-text" style="margin-top: 50px;">
                @csrf

                <div class="form-group ">
                    <label class="col-sm-3 " for="InputName">氏名</label>
                    <div class="col-sm-9">
                        <p>{{ $input["name"] }}</p>
                        <!--/.col-sm-10--->
                    </div>
                    <!--/form-group-->
                </div>

                <div class="form-group">
                    <label class="col-sm-3 " for="InputEmail">メールアドレス</label>
                    <div class="col-sm-9">
                        <p>{{ $input['email'] }}</p>
                    </div>
                    <!--/form-group-->
                </div>

                <div class="form-group">
                    <label class="col-sm-3 " for="InputUserID">ユーザーID</label>
                    <div class="col-sm-9">
                        <p>{{ $input['user_id'] }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 " for="InputPassword">パスワード</label>
                    <div class="col-sm-9">
                        <p>●●●●●●●●●●●●</p>
                    </div>
                    <!--/form-group-->
                </div>

                <div class="form-group">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary btn-block">登録する</button>
                    </div>
                    <!--/form-group-->
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</body>