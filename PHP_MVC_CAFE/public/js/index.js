$(function() {
    $('.ac-parent').on('click', function() {
        $(this).next().slideToggle();
    });

    $(window).scroll(function() {
        $(".scroll-block").each(function() {
            var scroll = $(window).scrollTop();
            var blockPosition = $(this).offset().top;
            var windowHeihgt = $(window).height();
            if (scroll > blockPosition - windowHeihgt + 300) {
                $(this).addClass("blockIn");
            }
        });
    });

    var mySwiper = new Swiper('.swiper-container', {
        // オプションパラメータ(一部のみ抜粋)
        loop: true, // 最後のスライドまで到達した場合、最初に戻らずに続けてスライド可能にするか。
        speed: 600, // スライドが切り替わるトランジション時間(ミリ秒)。
        slidesPerView: 2,
        breakpoints: {
            767: {
                slidesPerView: 1,
                spaceBetween: 0
            }
        },
        direction: 'horizontal', // スライド方向。 'horizontal'(水平) か 'vertical'(垂直)。effectオプションが 'slide' 以外は無効。
        effect: 'slide', // "slide", "fade"(フェード), "cube"(キューブ回転), "coverflow"(カバーフロー) または "flip"(平面回転)

        // スライダーの自動再生
        // autoplay: true 　のみなら既定値での自動再生
        autoplay: {
            delay: 3000, // スライドが切り替わるまでの表示時間(ミリ秒)
            stopOnLast: false, // 最後のスライドまで表示されたら自動再生を中止するか
            disableOnInteraction: true, // ユーザーのスワイプ操作を検出したら自動再生を中止するか
            adaptiveHeight: true
        },

        // ページネーションを表示する場合
        pagination: {
            el: '.swiper-pagination', // ページネーションを表示するセレクタ
        },

        // 前後スライドへのナビゲーションを表示する場合
        navigation: {
            nextEl: '.swiper-button-next', // 次のスライドボタンのセレクタ
            prevEl: '.swiper-button-prev', // 前のスライドボタンのセレクタ
        },

        // スクロールバーを表示する場合
        scrollbar: {
            el: '.swiper-scrollbar', // スクロールバーを表示するセレクタ
        }
    });

});

// バリデーション
function check() {
    if (document.form.name.value == "") {
        alert("お名前を入力してください。");
        return false;
    }
    if (document.form.name.value.length > 10) {
        alert("お名前を10文字以内で入力してください。");
        return false;
    }
    if (document.form.kana.value == "") {
        alert("フリガナを入力してください。");
        return false;
    }
    if (document.form.kana.value.length > 10) {
        alert("フリガナを10文字以内で入力してください。");
        return false;
    }
    if (document.form.tel.value.match(/[^0-9]+/)) {
        alert("正しい電話番号を入力してください。");
        return false;
    }
    if (document.form.email.value == "") {
        alert("メールアドレスを入力してください。");
        return false;
    }
    if (!(document.getElementById('email').value.match(/.+@.+\..+/))) {
        alert("正しいメールアドレスを入力してください。");
        return false;
    }
    if (document.form.body.value == "") {
        alert("お問い合わせ内容を入力してください。");
        return false;
    }
    return true;
}