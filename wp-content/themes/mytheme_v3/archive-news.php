<?php 
get_header();

$listNews = new WP_Query(array(
    'post_type' => 'news',
    'posts_per_page' => 5,
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
                    <p class="boxCount"><span class="quantity">200</span>件中<span class="fPost">1</span>〜<span
                            class="lPost">10</span>件</p>
                </div>
                <?php if( $listNews->have_posts() ): ?>
                <ul class="boxList">
                    <?php while( $listNews->have_posts() ): $listNews->the_post(); ?>
                    <li>
                        <p class="datePost"><a href="javascript:void(0);">2020年07月13日</a></p>
                        <p class="linkPost"><a
                                href="javascript:void(0);">ノーベル賞・本庶氏が小野薬品提訴を表明　オプジーボ特許使用料226億円求めノーベル賞・本庶氏が小野薬品提訴を表明　オプジーボ特許使用料226億円求め</a>
                        </p>
                    </li>
                   <?php endwhile; ?>
                </ul>
                <?php endif; ?>

                <?php theme_pagination( $listNews ); ?>
            </div>
        </div>
    </div>
</div>
<!-- #content -->
<?php get_footer(); ?>