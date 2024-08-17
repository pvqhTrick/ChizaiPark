<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'posts_per_page' => 16,
    'paged'=> $paged,
);
$query = new WP_Query($args);
?>


<div class="areaNews">
    <div class="inner">
        <div class="areaTitle">
            <h2 class="titleMain maven"><span>N</span>ews</h2>
            <p class="titleSub">お知らせ</p>
        </div>
        <div class="newsWrap">
            <?php if($query->have_posts()): ?>
            <ul class="newsList">
                <?php 
                while($query->have_posts()): $query->the_post(); 
                get_template_part('template-part/news-list-item'); 
                endwhile; 
                theme_pagination( $query ); 
                wp_reset_postdata(); 
                ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</div>
