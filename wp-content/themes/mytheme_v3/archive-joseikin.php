<?php
/**
 * The template for displaying Archive joseikin
 */
get_header();

$areas = get_terms( array(
    'taxonomy'   => 'area',
    'hide_empty' => false,
    'parent'     => 0,
));

$args = array(
    'post_status' => 'publish',
    'post_type' => 'joseikin',
    'posts_per_page' => '5',
    'paged' => get_query_paged(),
);
$area = isset($_GET['area']) ? $_GET['area'] : '';
if (!empty($area)) {
    $args['tax_query'] = array(
        'relation' => 'And',
        array(
            'taxonomy' => 'area',
            'field' => 'slug',
            'terms' => $area,
        ),
    );
}

$prefecture = isset($_GET['prefecture']) ? $_GET['prefecture'] : '';
if(!empty($prefecture)){
    if (!isset($args['tax_query'])) {
        $args['tax_query'] = array();
    }

    $args['tax_query'][] = array(
        'taxonomy' => 'area',
        'field' => 'slug',
        'terms' => $prefecture,
    );
};

$listJoseikin = new WP_Query($args);

// var_dump($listJoseikin->query);

?>

<div id="content">
    <?php get_template_part('site-breadcrumb'); ?>
    <!-- #breadcrumbs -->
    <div class="bigInner">
        <div class="wrapContent">
            <div class="contentLetf areaInfomation">
                <h2 class="infoTitle">新着助成金制度</h2>
                <div class="boxNarrow">
                    <h3 class="narrowTitle">絞り込み</h3>
                    <form action="<?php echo home_url('/joseikin/') ?>" id="searchArea">
                        <div class="narrowSearch">
                            <div class="rowSearch">
                                <select id="region" name="area">
                                <option value="">都道府県で選択</option>
                                <?php foreach ( $areas as $area ): ?>
                                    <option value="<?php echo $area->slug ?>" <?php isset($_GET['area']) ? selected($_GET['area'], $area->slug) : ''; ?>>
                                        <?php echo $area->name ?>
                                    </option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- AJAX -->
                            <div class="rowSearch">
                                <select id="prefecture" name="prefecture">
                                    <option value="">都道府県で選択</option>
                                    <?php if(!empty($_GET['area'])): 
                                        $prefectures = get_prefectures_by_region($_GET['area']);
                                        foreach($prefectures as $prefecture): ?>
                                            <option value="<?php echo $prefecture->slug ?>" <?php selected($_GET['prefecture'], $prefecture->slug); ?>>
                                                <?php echo $prefecture->name ?>
                                            </option>
                                        <?php endforeach; 
                                    endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="boxaction">
                            <div class="clear"><a href= "<?php echo home_url('/joseikin/') ?>" class="noto">クリア<</a></div>
                            <div class="find"><input type="submit" value="検索する" class="noto"></div>
                        </div>
                    </form>
                </div>
                <!-- boxNarrow -->
                 
                <?php if( $listJoseikin->have_posts() ):  ?>
                <ul class="listInfo">
                    <?php while( $listJoseikin->have_posts() ): $listJoseikin->the_post(); ?>
                    <li>
                        <div class="cateInfo">  
                            <p class="region"><a href="#" class="hover">
                            <?php 
                            $area = get_first_area();
                            if($area):
                            ?>
                            <a href="<?php echo get_term_link($area); ?>" class="hover">
                                <?php echo $area->name; ?>
                            </a>
                            <?php endif; ?>
                            </p>
                            <p class="date">公募期間：<?php the_field('application_period') ?> </p>
                        </div>
                        <h3 class="infoTitleNews"><?php the_title() ?></h3>
                        <div class="infoIntro"><?php the_excerpt() ?></div>
                        <div class="boxDetail">
                            <p class="maxPrice"><span class="max">上限金額・助成額</span>
                                <?php if(get_field('max_price'))  : ?>
                                    <span class="price">    
                                            <?php the_field('max_price'); ?>
                                    </span>
                                <?php endif; ?>
                            </p>
                            <p class="btnDetail"><a href="<?php the_permalink() ?>"><span>詳細はこちら</span></a></p>
                        </div>
                    </li>
                    <?php endwhile; wp_reset_postdata();?>
                </ul>
                <?php endif; ?>
                <!-- listInfo -->

                <?php theme_pagination( $listJoseikin ); ?>
                <!-- pagingNav -->

                <?php get_template_part('template-parts/search-map'); ?>
            </div>
            <?php get_sidebar('joseikin'); ?>
        </div>
    </div>
</div>
<!-- #content -->

<?php get_footer() ?>