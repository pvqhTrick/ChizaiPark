<?php get_header() ?>
<div id="content">
    <div id="breadcrumbs">
        <div class="bigInner">
            <ul class="bcList">
                <li><a href="#">知財パークTOP</a></li>
                <li><a href="#">ベンチャー・キャピタルTOP</a></li>
                <li> キャッチフレーズを入れる記事のタイトルが表示される</li>
            </ul>
        </div>
    </div>
    <!-- #breadcrumbs -->

    <div class="areaDetail">
        <div class="bigInner">
            <div class="blockDetail">
                <h2 class="detailTitle">特許を使った◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯<br class="pc">◯◯◯◯◯◯◯◯◯◯</h2>
                <div class="boxContent">
                    <?php get_template_part('template-parts/single-box-network'); ?>
                    <?php get_template_part('template-parts/single-box-company'); ?>
                    <?php get_template_part('template-parts/single-box-field-content'); ?>
                    <?php get_template_part('template-parts/single-box-table'); ?>
                </div>

                <div class="boxInfo">
                    <div class="colLeft">
                        <div class="infoName">
                            <p class="avatar"><img src="assets/images/venture-capital/company-avatar.png" alt=""></p>
                            <h3 class="name">弁理士 <span class="big">坂本 智弘</span><span class="small">全体・特許担当</span></h3>
                        </div>
                        <p class="linkInfo"><a href="javascript:void(0);">詳細</a></p>
                    </div>
                    <div class="colRight">
                        <p class="date"><span class="time">2020.07.31</span> UPDATE</p>
                        <ul class="social">
                            <li><a href="javascript:void(0);" class="hover"><img
                                        src="assets/images/venture-capital/icon-fb.svg" alt=""></a></li>
                            <li><a href="javascript:void(0);" class="hover"><img
                                        src="assets/images/venture-capital/icon-tw.svg" alt=""></a></li>
                            <li><a href="javascript:void(0);" class="hover"><img
                                        src="assets/images/venture-capital/icon-line.svg" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #content -->
<?php get_footer() ?>