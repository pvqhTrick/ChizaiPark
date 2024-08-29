<?php $listKigyou = new WP_Query(array(
    'post_status' => 'publish',
    'post_type' => 'post',
    'posts_per_page' => '5'
));
?>

<div class="areaVenture">
    <h3 class="boxTitle">知財ニュース</h3>
    <ul class="boxList">
        <?php while ($listKigyou->have_posts()):
            $listKigyou->the_post(); ?>
            <li>
                <p class="date"><?php the_time('Y年m月d日') ?></p>
                <div class="linkPost"><a href="<?php the_permalink() ?>" class="hover"><?php the_content() ?></a></div>
            </li>
        <?php endwhile; wp_reset_postdata(); ?>
    </ul>
    <p class="btnMore"><a href="<?php echo home_url('/news/') ?>"><span>知財ニュース</span></a></p>
</div>