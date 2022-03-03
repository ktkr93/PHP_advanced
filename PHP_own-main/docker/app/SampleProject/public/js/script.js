// バリデーション
function check() {
    if (document.validation.name.value == "") {
        alert("氏名を入力してください。");
        return false;
    }
    if (document.validation.name.value.length > 10) {
        alert("氏名を10文字以内で入力してください。");
        return false;
    }
    if (document.validation.email.value == "") {
        alert("メールアドレスを入力してください。");
        return false;
    }
    if (!(document.getElementById('email').value.match(/^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/))) {
        alert("正しいメールアドレスを入力してください。");
        return false;
    }
    if (document.validation.user_id.value == "") {
        alert("ユーザーIDを入力してください。");
        return false;
    }
    if (document.validation.user_id.value.length > 13) {
        alert("ユーザーIDを12文字以内で入力してください。");
        return false;
    }
    if (document.getElementById('user_id').value.match(/[^A-Za-z0-9]+/)) {
        alert("ユーザーIDをアルファベットで入力してください。");
        return false;
    }
    if (document.validation.password.value == "") {
        alert("パスワードを入力してください。");
        return false;
    }
    if (document.validation.password.value.length > 13) {
        alert("パスワードを12文字以内で入力してください。");
        return false;
    }
    if (document.getElementById('password').value.match(/[^A-Za-z0-9]+/)) {
        alert("パスワードをアルファベットで入力してください。");
        return false;
    }
    return true;
}


function checkLogin() {
    if (document.validation.user_id.value == "") {
        alert("ユーザーIDを入力してください。");
        return false;
    }
    if (document.validation.user_id.value.length > 13) {
        alert("ユーザーIDを12文字以内で入力してください。");
        return false;
    }
    if (document.getElementById('user_id').value.match(/[^A-Za-z0-9]+/)) {
        alert("ユーザーIDをアルファベットで入力してください。");
        return false;
    }
    if (document.validation.password.value == "") {
        alert("パスワードを入力してください。");
        return false;
    }
    if (document.validation.password.value.length > 13) {
        alert("パスワードを12文字以内で入力してください。");
        return false;
    }
    if (document.getElementById('password').value.match(/[^A-Za-z0-9]+/)) {
        alert("パスワードをアルファベットで入力してください。");
        return false;
    }
    return true;
}

function checkPost() {
    if (document.validation.post_title.value == "") {
        alert("タイトルを入力してください。");
        return false;
    }
    if (document.validation.post_data.value == "") {
        alert("本文を入力してください。");
        return false;
    }
    return true;
}

function deleteClick(e) {
    if (!window.confirm('日報を削除しますか？')) {
        return false;
    }
    document.deleteform.submit();
}