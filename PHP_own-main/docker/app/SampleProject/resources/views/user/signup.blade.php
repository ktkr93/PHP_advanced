<head>
    <title>でいれぽくん | 会員登録</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/script.js"></script>
</head>


<body class="signup">
    <div class="container ops-main">
        <div class="row">
            <div class="col-md-12">
                <h3 class="ops-title">会員登録</h3>
            </div>
        </div>
        <div class="row">
            <div class="form_container">
                <form name="validation" action="{{ route('signup.post') }}" method="post" class="form-horizontal" style="margin-top: 50px;">
                    @csrf

                    <div class="form-group">
                        <label class="" for="InputName">氏名</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" id="InputName" placeholder="氏名">
                            <!--/.col-sm-10--->
                        </div>
                        <!--/form-group-->
                    </div>

                    <div class="form-group">
                        <label class="" for="InputEmail">メールアドレス</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" id="email" placeholder="メールアドレス">
                        </div>
                        <!--/form-group-->
                    </div>

                    <div class="form-group">
                        <label class="" for="InputUserID">ユーザーID</label>
                        <div class="col-sm-9">
                            <input type="text" name="user_id" class="form-control" id="user_id" placeholder="ユーザーID">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="" for="InputPassword">パスワード</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="password" placeholder="パスワード">
                        </div>
                        <!--/form-group-->
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary btn-block" onClick="return check();">確認画面へ</button>
                        </div>
                        <!--/form-group-->
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</body>