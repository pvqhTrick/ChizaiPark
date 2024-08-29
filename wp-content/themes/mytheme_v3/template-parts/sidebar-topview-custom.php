<?php 

$listTopViewJoseikin = new WP_Query(array(
	'post_status' => 'publish',
	'post_type' => 'joseikin',
	'posts_per_page' => 5,
	'meta_key' => 'view', 
    'orderby' => 'meta_value_num', 
    'order' => 'DESC',	
));

if( $listTopViewJoseikin->have_posts() ): 
$rank = 1;
$rankName=['numone', 'numtwo', 'numthree','',''];
?> 
<div class="areaRanking">
    <h2 class="rankingTitle">アクセスランキング</h2>
    <ul class="listRank">
        <?php while( $listTopViewJoseikin->have_posts() ): $listTopViewJoseikin->the_post(); ?>
        <li>
            <p class="numRank"><span class="num <?php echo $rankName[$rank-1] ?>"><?php echo $rank; $rank++ ?></span>位</p>
            <p class="rankDetail"><a href="<?php the_permalink() ?>" class="hover"><?php the_title() ?></a></p>
        </li>
        <?php endwhile; wp_reset_postdata(); ?>
    </ul>
</div>
<!-- areaTop5Joseikin -->
<?php endif; ?>
