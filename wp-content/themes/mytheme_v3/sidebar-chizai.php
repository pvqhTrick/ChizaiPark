<?php 
$categories = get_terms(array(
    'taxonomy'   => 'chizai_cat',
    'hide_empty' => false,
    'parent'     => 0,
));
 
$recommended_posts = new WP_Query(array(
    'post_type' => 'chizai',
    'meta_key' => 'pickup',
    'meta_value' => true,
    'posts_per_page' => 4,
));
?>

<div class="sideBar">
    <div class="cateBox">
        <h2 class="cateTitle">カテゴリー</h2>
        <ul class="listcate">
            <?php
            foreach ($categories as $category): ?>
                <li><a href="<?php echo home_url('/chizai/?cate=').$category->slug ?>"><span><?php echo $category->name ?></span></a></li>
            <?php endforeach; ?>
        </ul>

        <div class="boxCate">
            <h3 class="boxcateTitle">おすすめ記事</h3>
            <ul class="listCatenews">
                <?php
                if ($recommended_posts->have_posts()) :
                    while ($recommended_posts->have_posts()) : $recommended_posts->the_post();
                        ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" class="hover">
                                <p class="date"><?php echo get_the_date('Y年m月d日'); ?></p>
                                <p class="text"><?php the_title() ?></p>
                            </a>
                        </li>
                    <?php
                    endwhile; wp_reset_postdata();
                endif;
                ?>
            </ul>
        </div>
    </div>
</div>