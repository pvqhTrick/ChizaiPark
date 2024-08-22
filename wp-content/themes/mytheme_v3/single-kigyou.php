<?php
/**
 * The template for displaying Kigyou detail
 */
get_header();

?>
<?php display_mainTitle('知財パークとは') ?>

<div id="content">
    <div id="breadcrumbs">
        <div class="bigInner">
            <ul class="bcList">
                <li><a href="#">知財パークTOP</a></li>
                <li><a href="#">企業の知財紹介TOP</a></li>
                <li> キャッチフレーズを入れる記事のタイトルが表示される</li>
            </ul>
        </div>
    </div>
    <!-- #breadcrumbs -->

    <div class="areaDetail">
        <div class="bigInner">
            <?php while( have_posts() ): the_post(); ?>
            <div class="blockDetail">
                <h2 class="detailTitle"><?php the_title() ?></h2>
                <div class="boxContent">
                    <div class="boxName">
                        <h3 class="nameCompany"><?php the_content(); ?></h3>
                        <ul class="social">
                            <li><a href="javascript:void(0);" class="hover"><img src="<?php themeUrl() ?>/assets/images/venture-capital/icon-fb.svg" alt=""></a></li>
                            <li><a href="javascript:void(0);" class="hover"><img src="<?php themeUrl() ?>/assets/images/venture-capital/icon-tw.svg" alt=""></a></li>
                            <li><a href="javascript:void(0);" class="hover"><img src="<?php themeUrl() ?>/assets/images/venture-capital/icon-line.svg" alt=""></a></li>
                        </ul>
                    </div>
                    <!-- BOXNAME -->

                    <div class="boxCompany">
                        <h4 class="companyTitle">会社情報</h4>
                        <div class="companyWrap">
                            <p class="companyPhoto"><img src="<?php the_field('company_img') ?>" alt="会社情報"></p>
                            <div class="companyContent">
                                <p class="companyText"><?php the_field('company_info') ?></p>
                                <p class="companyLink"><a href="javascript:void(0);">コーポレートサイトへ</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- BOXCOMPANY -->

                    <div class="boxFieldContent">
                        <?php if( get_field('patent_application_history') && get_field('patent_application_history_img') ): ?>
                        <div class="itemField">
                            <h4 class="fieldTitle">特許申請の経緯</h4>
                            <p class="fieldText"><?php the_field('patent_application_history'); ?></p>
                            <p class="fieldPhoto"><img src="<?php the_field('patent_application_history_img'); ?>" alt=""></p>
                        </div>
                        <?php endif; ?>

                        <?php if( get_field('patent_application_history_2') && get_field('patent_application_history_img_2') ): ?>
                        <div class="itemField itemField2">
                            <h4 class="fieldTitle">特許申請の経緯</h4>
                            <p class="fieldText"><?php the_field('patent_application_history_2'); ?></p>
                            <p class="fieldPhoto"><img src="<?php the_field('patent_application_history_img_2'); ?>" alt=""></p>
                        </div>
                        <?php endif; ?>

                        <?php if( get_field('patent_application_history_3') && get_field('patent_application_history_img_3') ): ?>
                        <div class="itemField rPhoto">
                            <h4 class="fieldTitle">特許申請の経緯</h4>
                            <div class="fieldWrap">
                                <p class="fieldText fieldText2"><?php the_field('patent_application_history_3'); ?></p>
                                <p class="fieldPhoto"><img src="<?php the_field('patent_application_history_img_2'); ?>" alt=""></p>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if( get_field('patent_application_history_4') && get_field('patent_application_history_img_4') ): ?>
                        <div class="itemField lPhoto">
                            <h4 class="fieldTitle">特許申請の経緯</h4>
                            <div class="fieldWrap">
                                <p class="fieldText fieldText2"><?php the_field('patent_application_history_4'); ?></p>
                                <p class="fieldPhoto"><img src="<?php the_field('patent_application_history_img_4'); ?>" alt=""></p>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <!-- BOXFIELDCONTENT -->

                    <div class="boxTable">
                        <h4 class="tableTitle">ポイント</h4>
                        <p class="tableSub">
                            ポイントポイントポイントポイントポイントポイントポイントポイントポイントポイントポイントポイントポイントポイントポイントポイントポイントポイントポイントポイントポイントポイントポイントポイントポイントポイントポイントポイント
                        </p>
                        <ul class="tableList">
                            <li>・ポイントポイントポイントポイントポイント</li>
                            <li>・ポイントポイントポイントポイントポイント</li>
                            <li>・ポイントポイントポイントポイントポイント</li>
                            <li>・ポイントポイントポイントポイントポイント</li>
                        </ul>
                    </div>
                    <!-- BOXTABLE -->
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
                            <li><a href="javascript:void(0);" class="hover"><img src="<?php themeUrl() ?>/assets/images/venture-capital/icon-fb.svg" alt=""></a></li>
                            <li><a href="javascript:void(0);" class="hover"><img src="<?php themeUrl() ?>/assets/images/venture-capital/icon-tw.svg" alt=""></a></li>
                            <li><a href="javascript:void(0);" class="hover"><img src="<?php themeUrl() ?>/assets/images/venture-capital/icon-line.svg" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>

</div>
<!-- #content -->
<?php get_footer() ?>