<?php
/**
 * The template for displaying Archive seminar
 */
get_header();

$listSeminar = new WP_Query(array(
    'post_status' => 'publish',
    'post_type' => 'seminar',
    'posts_per_page' => 5,
    'paged' => get_query_paged(),
));

?>

<!-- #main -->

<div id="content">
    <div id="breadcrumbs">
        <div class="bigInner">
            <ul class="bcList">
                <li><a href="#">知財パークTOP</a></li>
                <li>助成金情報TOP</li>
            </ul>
        </div>
    </div>
    <!-- #breadcrumbs -->
    
    <div class="bigInner">
        <div class="wrapContent">
            <div class="contentLetf areaSeminar">
                <?php if( $listSeminar ): ?>
                <h2 class="infoTitle">セミナー情報</h2> 
                <?php box_count_post( $listSeminar ) ?> 
                <ul class="listSemina">
                <?php while ($listSeminar->have_posts()): $listSeminar->the_post(); ?>
                    <?php get_template_part('template-parts/seminar-list'); ?>
                <?php endwhile; wp_reset_postdata(); ?>
                </ul>
                <!-- listSemina -->
                <?php theme_pagination( $listSeminar ); ?>
                <!-- pagingNav -->
                <?php endif; ?>
                
            </div>
            <?php get_sidebar('joseikin') ?>
        </div>
    </div>
</div>
<!-- #content -->

<?php get_footer() ?>