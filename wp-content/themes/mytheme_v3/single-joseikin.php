<?php
/**
 * The template for displaying Joseikin detail
 */
get_header(); ?>
<div id="fixH"></div>
<div id="main" class="df">
    <h2 class="mainTitle">知財パークとは</h2>
</div>
<!-- main -->
<div id="content">

    <div id="breadcrumbs">
        <div class="bigInner">
            <ul class="bcList">
                <li><a href="#">知財パークTOP</a></li>
                <li><a href="javascript:void(0)">助成金情報TOP</a></li>
                <li><a href="javascript:void(0)">助成金情報 - 関東</a></li>
                <li>静岡県静岡市：「中小企業等事業継続強化事業補助金」</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumbs -->

    <div class="areaAfterLogin noto">
        <div class="bigInner">
            <div class="afterLoginWarp">
                <?php while( have_posts() ): the_post(); ?>
                <h2 class="infoTitle"><?php the_title() ?></h2>
                <div class="description">
                    <?php the_content() ?>
                </div>
                <table class="tableAfterLogin">
                    <tr>
                        <th>地域</th>
                        <td><?php the_field('region') ?></td>
                    </tr>
                    <tr>
                        <th>実施機関</th>
                        <td><?php the_field('implementing_agency') ?></td>
                    </tr>
                    <tr>
                        <th>公募期間</th>
                        <td><?php the_field('application_period') ?></td>
                    </tr>
                    <tr>
                        <th>上限金額・助成額</th>
                        <td><?php the_field('max_price') ?></td>
                    </tr>
                    <tr>
                        <th>補助率</th>
                        <td><?php the_field('subsidy_rate') ?></td>
                    </tr>
                    <tr>
                        <th>利用目的</th>
                        <td><?php the_field('surpose_of_use') ?></td>
                    </tr>
                    <tr>
                        <th>対象経費</th>
                        <td><?php the_field('eligible_expenses') ?></td>
                    </tr>
                    <tr>
                        <th>公式公募ページ</th>
                        <td><a href="<?php the_field('page_url') ?>" target="_blank"><?php the_field('page_url') ?></a></td>
                    </tr>
                </table>
                <p class="dateUpdate">2020.07.31 UPDATE</p>
                <p class="buttonAfterLogin"><a href="<?php home_url('/joseikin/') ?>">応募ページへ移動</a></p>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>

</div>
<!-- #content -->
<?php get_footer() ?>