<?php 
get_header();

$listNews = new WP_Query(array(
    'post_status' => 'publish',
    'post_type' => 'news',
    'posts_per_page' => 5,
    'paged' => get_query_paged()
));
?>

<div id="content">
    <div id="breadcrumbs">
        <div class="bigInner">
            <ul class="bcList">
                <li><a href="#">知財パークTOP</a></li>
                <li>知財ニュースTOP</li>
            </ul>
        </div>
    </div>
    <!-- #breadcrumbs -->

    <div class="areaVenture">
        <div class="inner">
            <div class="boxPost">
                <div class="boxName">
                    <h3 class="boxTitle">新着知財ニュース</h3>
                    
                </div>
                <?php box_count_post( $listNews ); ?>
                <?php if( $listNews->have_posts() ): ?>
                <ul class="boxList">
                    <?php while( $listNews->have_posts() ): $listNews->the_post(); ?>
                    <li>
                        <p class="datePost"><a href="javascript:void(0);"><?php the_time('Y年m月d日') ?></a></p>
                        <div class="linkPost"><a href="<?php the_permalink() ?>"><?php the_excerpt() ?></a></div>
                    </li>
                   <?php endwhile; wp_reset_postdata(); ?>
                </ul>
                <?php endif; ?>

                <?php theme_pagination( $listNews ); ?>
            </div>
        </div>
    </div>
</div>
<!-- #content -->
<?php get_footer(); ?>