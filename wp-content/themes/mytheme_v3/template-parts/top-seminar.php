<?php $listSeminar = new WP_Query(array(
    'post_status' => 'publish',
    'post_type' => 'seminar',
    'posts_per_page' => '5'
));
 ?> 
<div class="areaSeminar">
    <h2 class="infoTitle">セミナー情報</h2>
    <ul class="listSemina">
        <?php while ($listSeminar->have_posts()): $listSeminar->the_post(); ?>
            <?php get_template_part('template-parts/seminar-list'); ?>
        <?php endwhile; wp_reset_postdata(); ?>
    <p class="btnMore"><a href="<?php echo home_url('/seminar/') ?>"><span>セミナー情報へ</span></a></p>
</div>