<?php
$listJoseikin = new WP_Query(array(
    'post_type' => 'joseikin',
    'posts_per_page' => '5'
));

if($listJoseikin->have_posts()):?>


<div class="areaGrant">
    <h2 class="grantTitle">新着助成金制度</h2>
    <ul class="listPost">
        <?php while ($listJoseikin->have_posts()):
            $listJoseikin->the_post(); ?>
            <li>
                <p class="date"><?php the_time('Y年m月d日'); ?></p>
                <p class="cate">
                    <?php
                    $area = get_first_area();
                    if ($area):
                        ?>
                        <a href="<?php echo get_term_link($area); ?>" class="hover">
                            <?php echo $area->name; ?>
                        </a>
                    <?php endif; ?>
                </p>
                <p class="text"><a href="<?php the_permalink() ?>" class="hover"><?php the_title(); ?></a></p>
            </li>
        <?php endwhile; wp_reset_postdata(); ?>
    </ul>
    <p class="btnMore"><a href="<?php echo home_url('joseikin') ?>"><span>助成金情報へ</span></a></p>
</div>
<!-- areaGrant -->
 <?php endif; ?>