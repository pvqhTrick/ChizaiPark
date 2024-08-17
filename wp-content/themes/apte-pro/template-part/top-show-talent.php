<?php 
$args = array(
    'post_type' => 'talent',
    'posts_per_page' => 12,
    'orderby' => 'rand',
);
$query = new WP_Query($args);

?>
<div class="areaCanvas">
    <div class="inner">
        <ul class="listCanvas">
            <?php 
            while ($query->have_posts()): $query->the_post(); 
            get_template_part('template-part/talent-item');
            endwhile; wp_reset_postdata();
            ?>
        </ul>
        <h3 class="canvasTitle">
            <picture>
                <source media="(max-width:768px)" srcset="assets/images/index/canvas-title-sp.png">
                <img src="<?php echo get_theme_file_uri('/assets/images/index/canvas-title.png') ?>" alt="title">
            </picture>
        </h3>
    </div>
</div>
<!-- areaCanvas -->