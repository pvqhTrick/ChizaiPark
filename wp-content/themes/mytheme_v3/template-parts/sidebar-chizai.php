<?php 
$listChizai = new WP_Query(array(
	'post_status' => 'publish',
	'post_type' => 'chizai',
	'posts_per_page' => 3,
	'meta_query'=> array(
		array(
			'key' => 'pickup',
            'value' => true,
		)
	),
));
?>

<?php if( $listChizai->have_posts() ): ?>
<div class="areaIntell">
    <h2 class="intellTitle">知財の活用事例</h2>
    <ul class="listIntell">
        <?php while( $listChizai->have_posts() ): $listChizai->the_post(); ?>
        <li>
            <p class="date"><?php the_time('Y年m月d日') ?></p>
            <?php  $categories = get_the_terms(get_the_ID(), 'chizai_cat'); ?>
            <p class="cate">
                <a href="#"> 
                <?php if ($categories) : ?>
                    <?php echo $categories[0]->name ?>
                <?php endif; ?>
                </a>
            </p>
            <p class="text"><a href="<?php the_permalink() ?>" class="hover"><?php the_title() ?>/</a></p>
        </li>
        <?php endwhile; wp_reset_postdata(); ?>
    </ul>
    <p class="btnMore"><a href="<?php echo home_url('/chizai/') ?>"><span>知財活用事例へ</span></a></p>
</div>
<!-- areaChizai -->
<?php endif; ?>