<?php
/**
 * The template for displaying Archive kigyou
 */
get_header();

$paged = get_query_paged();
$number_paged = 5;
$listKigyou = new WP_Query(array(
    'post_type' => 'kigyou',
    'posts_per_page' => $number_paged,
    'paged' => $paged,
));
$found_posts = $listKigyou->found_posts;
?>


<?php display_mainTitle('企業の知財紹介'); ?>
<!-- #main -->

<div id="content">
    <div id="breadcrumbs">
        <div class="bigInner">
            <ul class="bcList">
                <li><a href="#">知財パークTOP</a></li>
                <li>企業の知財紹介TOP</li>
            </ul>
        </div>
    </div>
    <!-- #breadcrumbs -->

    <div class="areaVenture">
        <div class="inner">
            <div class="boxPost">
                <?php if( $listKigyou->have_posts() ):?>
                <div class="boxName">
                    <h3 class="boxTitle">新着知財ニュース</h3>
                    <?php box_count_post($found_posts, $paged, $number_paged); ?>
                </div>
                <ul class="boxList">
                    <?php while( $listKigyou->have_posts() ): $listKigyou->the_post(); ?>
                    <li>
                        <div class="nameCompany"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></div>
                        <div class="linkPost"><a href="<?php the_permalink() ?>"><?php the_content() ?></a></div>
                    </li>
                    <?php endwhile; wp_reset_postdata(); ?>
                </ul>
                
                <?php theme_pagination( $listKigyou ); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- #content -->

<?php get_footer() ?>