<?php
/**
 * The template for displaying Archive chizai
 */
get_header();

$listChizai = new WP_Query(array(
    'post_type' => 'chizai',
    'posts_per_page' => 5,
    'paged' => get_query_paged(),
));

// $categories = get_terms(array(
//     'taxonomy'   => 'categories',
//     'hide_empty' => false,
//     'parent'     => 0,
// ));
$categories = get_the_terms(get_the_ID(), 'category');

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
                    <form action="">
                        <div class="narrowSearch">
                            <div class="rowSearch">
                                <select id="cate">
                                    <option value="">カテゴリー</option>
                                    <?php foreach($categories as $cat): ?>
                                        <option value="<?php echo $cat->slug ?>"><?php echo $cat->name ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="boxaction">
                                <div class="clear"><input type="reset" name="reset" value="クリア" class="noto"></div>
                                <div class="find"><input type="submit" name="find" value="検索する" class="noto"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- boxNarrow -->
                <?php box_count_post( $listChizai ); ?>
                <?php if( $listChizai->have_posts() ): ?>
                <ul class="listPost">
                    <?php while( $listChizai->have_posts() ): $listChizai->the_post(); ?>
                    <li>
                        <p class="date"><?php the_time('Y年m月d日') ?></p>
                        <p class="cate">
                            <?php 
                            if ($categories && !is_wp_error($categories)) {
                                $first_category = reset($categories);
                                echo '<a href="' . esc_url(get_term_link($first_category)) . '">' . esc_html($first_category->name) . '</a>';
                            }
                            ?>
                        </p>
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