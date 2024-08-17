<?php 
$args = array(
    'posts_per_page' => 8,
);
$query = new WP_Query($args);
?>
<div class="areaNews">
    <div class="inner">
        <div class="areaTitle">
            <h2 class="titleMain maven">News</h2>
            <p class="titleSub">お知らせ</p>
        </div>
        <div class="newsWrap">
            <?php if($query->have_posts()): ?>
            <ul class="newsList">
                <?php 
                while($query->have_posts()): $query->the_post(); 
                get_template_part('template-part/news-list-item');
                endwhile; wp_reset_postdata(); 
                ?>
            </ul>
            <?php endif; ?>
        </div>
        <p class="areaBtn"><a href="<?php echo home_url('/news/') ?>">過去のお知らせを見る</a></p>
    </div>
</div>