<?php 
get_header();

$listVentureCapital = new WP_Query(array(
    'post_type' => 'venture-capital',
    'posts_per_page' => 5,
    'paged' => get_query_paged(),
));
?>
<div id="content">
    <div id="breadcrumbs">
        <div class="bigInner">
            <ul class="bcList">
                <li><a href="#">知財パークTOP</a></li>
                <li>ベンチャー・キャピタルTOP</li>
            </ul>
        </div>
    </div>
    <!-- #breadcrumbs -->

    <div class="areaVenture">
        <div class="inner">
            <div class="boxPost">
                <div class="boxName">
                    <h3 class="boxTitle">ベンチャー・キャピタル一覧</h3>
                    <?php box_count_post( $listVentureCapital ); ?>
                </div>
                <?php if( $listVentureCapital->have_posts() ): ?>
                <ul class="boxList">
                    <?php while ( $listVentureCapital->have_posts() ): $listVentureCapital->the_post(); ?>
                    <li>
                        <p class="nameCompany">
                            <a href=""><?php the_title() ?></a>
                        </p>
                        <div class="linkPost">
                            <a href="<?php the_permalink() ?>"><?php the_excerpt() ?></a>
                        </div>
                    </li>
                    <?php endwhile; wp_reset_postdata();?>
                </ul>
                <?php endif; ?>

                <?php theme_pagination( $listVentureCapital ); ?>
            </div>
        </div>
    </div>
</div>
<!-- #content -->
<?php get_footer(); ?>