<?php 

$listTopViewCustom = new WP_Query(array(
	'post_status' => 'publish',
	'post_type' => 'joseikin',
	'posts_per_page' => 5,
	// 'meta_query' => array(
    //     array(
    //         'key' => 'joseikin', 
    //         'value' => 10,
    //         'compare' => '='
    //     )
    // ),
    'orderby' => 'meta_value_num', 
    'order' => 'DESC',	
));

if( $listTopViewCustom->have_posts() ): 
$rank = 1;
$rankName=['numone', 'numtwo', 'numthree','',''];
?> 
<div class="areaRanking">
    <h2 class="rankingTitle">Ranking custom</h2>
    <ul class="listRank">
        <?php while( $listTopViewCustom->have_posts() ): $listTopViewCustom->the_post(); 
        $total_views=0;
        $views = get_post_meta(get_the_ID(), 'total_view', true); 
        $total_views += (int) $views;
        ?>
        <li>
            <p class="numRank"><span class="num <?php echo $rankName[$rank-1] ?>"><?php echo $rank; $rank++ ?></span>位</p>
            <p class="rankDetail"><a href="<?php the_permalink() ?>" class="hover"><?php the_title() ?></a></p>
        </li>
        <?php endwhile; wp_reset_postdata(); ?>
    </ul>
</div>
<!-- areaTopViewCustom -->
<?php endif; ?>
