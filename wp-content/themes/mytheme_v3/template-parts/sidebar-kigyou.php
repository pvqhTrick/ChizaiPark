<?php 
$listKigyou = new WP_Query(array(
	'post_status' => 'publish',
	'post_type' => 'kigyou',
	'posts_per_page' => 3,
	'meta_query'=> array(
		array(
			'key' => 'pickup',
            'value' => true,
		)
	),
));
?>
<?php if( $listKigyou->have_posts() ): ?>
<div class="areaExamples">
    <h2 class="examplesTitle">企業の活用事例</h2>
    <ul class="examplesList">
        <?php while( $listKigyou->have_posts() ): $listKigyou->the_post(); ?>
        <li>
            <a href="#" class="hover">
                <p class="co"><?php the_title() ?></p>
                <p class="exLink"><?php the_excerpt() ?></p>
            </a>
        </li>
        <?php endwhile; ?>
    </ul>
    <p class="btnMore"><a href="<?php echo home_url('/kigyou/') ?>"><span>企業の活用事例</span></a></p>
</div>
<!-- areaKigyou -->
<?php endif; ?>