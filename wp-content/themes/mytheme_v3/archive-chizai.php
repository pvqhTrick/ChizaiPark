<?php
/**
 * The template for displaying Archive chizai
 */
get_header();
$args= array(
    'post_status' => 'publish',
    'post_type' => 'chizai',
    'posts_per_page' => 5,
    'paged' => get_query_paged(),
);

$cat=isset($_GET['cate']) ? $_GET['cate'] : '';
if($cat){
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'chizai_cat',
            'field'    => 'slug',
            'terms'    => $_GET['cate'],
        ),
    );
}

$listChizai = new WP_Query($args);
$categories_list = get_terms(
    array(
        'taxonomy' => 'chizai_cat',
        'hide_empty' => false,
    )
);

?>

<div id="content">
    <div id="breadcrumbs">
        <div class="bigInner">
            <ul class="bcList">
                <li><a href="#">知財パークTOP</a></li>
                <li>知財の活用事例TOP</li>
            </ul>
        </div>
    </div>
    <!-- #breadcrumbs -->
    <div class="bigInner">
        <div class="wrapContent">
            <div class="contentLetf areaIntell">
                <h2 class="infoTitle">新着情報</h2>
                <div class="boxNarrow">
                    <h3 class="narrowTitle">絞り込み</h3>
                    <form action="<?php echo home_url('/chizai/?') ?>">
                        <div class="narrowSearch">
                            <div class="rowSearch">
                                <select id="cate" name="cate">
                                    <option value="">カテゴリー</option>
                                    <?php foreach($categories_list as $cat): ?>
                                        <option value="<?php echo $cat->slug ?>" <?php isset($_GET['cate']) ? selected( $_GET['cate'] , $cat->slug): ''; ?>>
                                            <?php echo $cat->name ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="boxaction">
                                <div class="clear"><input type="reset" value="クリア" class="noto"></div>
                                <div class="find"><input type="submit" value="検索する" class="noto"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- boxNarrow -->
                <?php box_count_post( $listChizai ); ?>
                <?php if( $listChizai->have_posts() ): ?>
                <ul class="listPost">
                    <?php while( $listChizai->have_posts() ): $listChizai->the_post(); 
                    $categories = get_the_terms(get_the_ID(), 'chizai_cat');
                    ?>
                    
                    <li>
                        <p class="date"><?php the_time('Y年m月d日') ?></p>
                        <p class="cate">
                            <?php 
                            if ($categories) : ?>
                                <?php echo $categories[0]->name ?>
                            <?php endif; ?>
                        <!-- </p> -->
                      <div class="text"><a href="<?php the_permalink() ?>" class="hover"><?php the_title() ?></a></div>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
                <!-- listPost -->
                <?php theme_pagination($listChizai); ?>
            </div>
            <?php get_sidebar('chizai'); ?>
        </div>
    </div>
</div>
<!-- #content -->
<?php get_footer() ?>