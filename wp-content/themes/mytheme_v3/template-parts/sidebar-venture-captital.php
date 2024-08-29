<?php 
$listVentureCapital = new WP_Query(array(
	'post_status' => 'publish',
	'post_type' => 'venture-capital',
	'posts_per_page' => 3,
	'meta_query'=> array(
		array(
			'key' => 'pickup',
            'value' => true,
		)
	),
));

if( $listVentureCapital->have_posts() ): ?>
<div class="areaVentures">
    <h2 class="ventureTitle">ベンチャー・キャピタル</h2>
    <ul class="ventureList">
        <?php while( $listVentureCapital->have_posts() ): $listVentureCapital->the_post(); ?>
        <li><a href="<?php the_permalink()?>" class="hover"><?php the_title() ?></a></li>
        <?php endwhile; wp_reset_postdata(); ?>
    </ul>
    <p class="btnMore"><a href="<?php echo home_url('/venture-capital/') ?>"><span>ベンチャー・キャピタルへ</span></a></p>
</div>
<!-- areaVenture -->
<?php endif; ?>
