<?php
$chizai_query = new WP_Query(array(
    'post_status' => 'publish',
    'post_type' => 'chizai',
    'posts_per_page' => -1,
    'meta_query' => array(
        array(
            'key' => 'joseikin', 
            'compare' => 'EXISTS',
        ),
    ),
));

$joseikin_views = array();
if ($chizai_query->have_posts()) :
    while ($chizai_query->have_posts()) : $chizai_query->the_post(); 
        $joseikin_id = get_post_meta(get_the_ID(), 'joseikin', true);

        if ($joseikin_id) {
            $view_count = intval(get_post_meta($joseikin_id, 'view', true));

            if (isset($joseikin_views[$joseikin_id])) {
                $joseikin_views[$joseikin_id] += $view_count;
            } else {
                $joseikin_views[$joseikin_id] = $view_count;
            }
        }
    endwhile; wp_reset_postdata();
    var_dump($joseikin_views);
endif;

arsort($joseikin_views);

$joseikin_ids = array_slice(array_keys($joseikin_views), 0, 5);

if (!empty($joseikin_ids)) {
    $listJoseikin = new WP_Query(array(
        'post_type' => 'joseikin',
        'post__in' => $joseikin_ids,
        'orderby' => 'post__in',
        'posts_per_page' => 5,
    ));

    $rank = 1;
    $rankName=['numone', 'numtwo', 'numthree','',''];

    if ($listJoseikin->have_posts()) : ?>
    <div class="areaRanking">
        <h2 class="rankingTitle">Ranking custom</h2>
        <ul class="listRank">
            <?php while ($listJoseikin->have_posts()) : $listJoseikin->the_post(); ?>
            <li>
                <p class="numRank"><span class="num <?php echo $rankName[$rank-1] ?>"><?php echo $rank; $rank++ ?></span>位</p>
                <p class="rankDetail"><a href="<?php the_permalink() ?>" class="hover"><?php the_title() ?></a></p>
            </li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
    </div>
    <?php endif;
}
?>