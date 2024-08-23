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
                    <p class="boxCount"><span class="quantity">200</span>件中<span class="fPost">1</span>〜<span
                            class="lPost">10</span>件</p>
                </div>
                <?php if( $listVentureCapital->have_posts() ): ?>
                <ul class="boxList">
                    <?php while ( $listVentureCapital->have_posts() ): $listVentureCapital->the_post(); ?>
                    <li>
                        <p class="nameCompany">
                            <a href=""><?php the_title() ?></a>
                        </p>
                        <p class="linkPost">
                            <a href="<?php the_permalink() ?>"><?php the_excerpt() ?></a>
                        </p>
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