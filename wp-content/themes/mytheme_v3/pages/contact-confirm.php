<?php
/*
 * The template for displaying Contact thank page
 */
get_header();
?>
<?php display_mainTitle('お問い合わせ'); ?>
<div id="content">

    <div id="breadcrumbs">
        <div class="bigInner">
            <ul class="bcList">
                <li><a href="#">知財パークTOP</a></li>
                <li>お問い合わせ</li>
            </ul>
        </div>
    </div>
    <!-- #breadcrumbs -->

    <div class="areaContact Step2">
        <div class="bigInner">
            <ul class="contactStep">
                <li class="step1">フォーム入力</li>
                <li class="step2">入力内容確認</li>
                <li class="step3 active">登録完了</li>
            </ul>

            <div class="formContact">
                <form action="">
                    <div class="formItem">
                        <p class="formName">お名前</p>
                        <div class="formInput">
                            <p class="formText">山田太郎</p>
                        </div>
                    </div>
                    <div class="formItem">
                        <p class="formName">会社名</p>
                        <div class="formInput">
                            <p class="formText">株式会社テスト</p>
                        </div>
                    </div>
                    <div class="formItem">
                        <p class="formName" style="font-weight: bold;">電話番号</p>
                        <div class="formInput">
                            <p class="formText">03-0000-1111</p>
                        </div>
                    </div>
                    <div class="formItem">
                        <p class="formName">メールアドレス</p>
                        <div class="formInput">
                            <p class="formText">test@testtest.com</p>
                        </div>
                    </div>
                    <div class="formItem">
                        <p class="formName">お問い合わせ種類</p>
                        <div class="formInput">
                            <p class="formText">見積もりについて</p>
                        </div>
                    </div>

                    <div class="formItem">
                        <p class="formName">お問い合わせ内容</p>
                        <div class="formInput">
                            <p class="formText">見積もりについてのお問い合わせです。<br>◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯<br
                                    class="pc">◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯<br
                                    class="pc">◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯<br
                                    class="pc">◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯<br
                                    class="pc">◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯<br class="pc">◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯</p>
                        </div>
                    </div>
                    <div class="formItem formSubmit">
                        <input type="submit" name="return" value="戻る" class="submitStyle">
                        <input type="submit" name="check" value="確認する" class="submitStyle check">
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
<!-- #content -->

<?php get_footer(); ?>