<?php
/*
* The template for displaying Contact page
*/
get_header();
?>

<div id="fixH"></div>

<div id="main" class="df">
    <h2 class="mainTitle">お問い合わせ</h2>
</div>
<!-- #main -->
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

    <div class="areaContact Step1">
        <div class="bigInner">
            <ul class="contactStep">
                <li class="step1 active">フォーム入力</li>
                <li class="step2">入力内容確認</li>
                <li class="step3">登録完了</li>
            </ul>

            <div class="contactTable"></div>

            <h2 class="contactTitle">必須項目を入力して確認ボタンをクリックしてください。</h2>

            <div class="formContact">
                <form action="">
                    <div class="formItem">
                        <p class="formName">お名前<span class="require gothic">必須</span></p>
                        <div class="formInput">
                            <div class="inputWrap">
                                <input type="email" name="your_name" class="inputStyle">
                                <p class="inputNote">200文字以内</p>
                            </div>
                        </div>
                    </div>
                    <div class="formItem">
                        <p class="formName">会社名又は所属</p>
                        <div class="formInput">
                            <div class="inputWrap">
                                <input type="email" name="company_name" class="inputStyle">
                                <p class="inputNote">200文字以内</p>
                            </div>
                        </div>
                    </div>
                    <div class="formItem">
                        <p class="formName" style="font-weight: bold;">電話番号<span class="require gothic">必須</span></p>
                        <div class="formInput">
                            <div class="inputWrap">
                                <input type="email" name="your_phone" class="inputStyle">
                                <p class="inputNote">半角数字</p>
                            </div>
                        </div>
                    </div>
                    <div class="formItem">
                        <p class="formName">メールアドレス<span class="require gothic">必須</span></p>
                        <div class="formInput">
                            <div class="inputWrap">
                                <input type="email" name="your_mail" class="inputStyle">
                                <p class="inputNote">200文字以内</p>
                            </div>
                        </div>
                    </div>
                    <div class="formItem">
                        <p class="formName">お問い合わせ種類<span class="require gothic">必須</span></p>
                        <div class="formInput">
                            <select class="selectStyle">
                                <option>選択してください</option>
                            </select>
                        </div>
                    </div>
                    <div class="formItem">
                        <p class="formName">お問い合わせ内容<span class="require gothic">必須</span></p>
                        <div class="formInput">
                            <textarea name="content" class="areaStyle"></textarea>
                            <p class="inputNote">2000文字以内</p>
                        </div>
                    </div>
                    <div class="formItem">
                        <p class="formName" style="font-weight: bold;">利用規約<span class="require gothic">必須</span></p>
                        <div class="formInput">
                            <div class="inputWrap radioWrap">
                                <div class="radioButton">
                                    同意する
                                    <input type="radio" value="同意する" name="accept[]" class="radioStyle">
                                    <label for="同意する" class="labelStyle"></label>
                                </div>
                                <div class="radioButton disagree">
                                    同意しない
                                    <input type="radio" value="同意しない" name="accept[]" class="radioStyle">
                                    <label for="同意しない" class="labelStyle"></label>
                                </div>
                            </div>
                            <div class="privacy">
                                <p>＜利用規約＞<br>第1条（知財パークの定義）<br>知財パークとは、坂本国際特許事務所（以下「弊社」という）が提供する知財情報メディアサイト（知財パーク）およびそれに付随するメ
                                </p>
                                <p>＜利用規約＞<br>第1条（知財パークの定義）<br>知財パークとは、坂本国際特許事務所（以下「弊社」という）が提供する知財情報メディアサイト（知財パーク）およびそれに付随するメ
                                </p>
                                <p>＜利用規約＞<br>第1条（知財パークの定義）<br>知財パークとは、坂本国際特許事務所（以下「弊社」という）が提供する知財情報メディアサイト（知財パーク）およびそれに付随するメ
                                </p>
                                <p>＜利用規約＞<br>第1条（知財パークの定義）<br>知財パークとは、坂本国際特許事務所（以下「弊社」という）が提供する知財情報メディアサイト（知財パーク）およびそれに付随するメ
                                </p>
                                <p>＜利用規約＞<br>第1条（知財パークの定義）<br>知財パークとは、坂本国際特許事務所（以下「弊社」という）が提供する知財情報メディアサイト（知財パーク）およびそれに付随するメ
                                </p>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(".privacy").mCustomScrollbar({
                            });
                        </script>
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
<?php get_footer() ?>