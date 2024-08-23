<?php
/*
 * The template for displaying Contact page
 */
get_header();
?>

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

            <div class="formContact"><?php the_content(); ?></div>
        </div>
    </div>
    <script type="text/javascript">
    $(".privacy").mCustomScrollbar({
    });
    </script>
</div>
<!-- #content -->
<?php get_footer() ?>
