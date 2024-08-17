<?php
$slug = isset($args['slug']) ? $args['slug'] : '';

if($slug):
$args = array(
    'post_type' => 'talent',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'talent-category',
            'field' => 'slug',
            'terms' => $slug,
        ),
    ),
);
$query = new WP_Query($args);
?>
<div class="areaTalents">
    <div class="inner">
        <div class="areaTitle">
            <h2 class="titleMain maven"><span>T</span>alent</h2>
            <p class="titleSub">所属タレント</p>
        </div>
        <?php if ($query->have_posts()): ?>
        <ul class="listTalents">
            <?php 
            while ($query->have_posts()): $query->the_post(); 
            get_template_part('template-part/talent-box-info'); 
            endwhile; wp_reset_postdata();
            ?>
        </ul>
        <?php endif; ?>
    </div>
</div>
<!-- areaTalents -->
 <?php endif; ?>