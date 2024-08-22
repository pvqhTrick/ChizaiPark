<?php 
/**
 * The template for displaying TOP page
 */
get_header(); 


$listJoseikin = new WP_Query(array(
    'post_type' => 'joseikin',
    'posts_per_page' => '5'
));

$listKigyou = new WP_Query(array(
    'post_type' => 'kigyou',
    'posts_per_page' => '4'
));

$listSeminar = new WP_Query(array(
    'post_type' => 'seminar',
    'posts_per_page' => '3'
));
?>

<div id="content">
    <div class="bigInner">
        <div class="wrapContent">
            <div class="contentLetf">
                <?php if( $listJoseikin->have_posts() ): ?>
                <div class="areaGrant">
                    <h2 class="grantTitle">新着助成金制度</h2>
                    <ul class="listPost">
                        <?php while( $listJoseikin->have_posts() ): $listJoseikin->the_post(); ?>
                        <li>
                            <p class="date"><?php the_time('Y年m月d日'); ?></p>
                            <p class="cate">
                            <?php 
                            $area = get_first_area();
                            if($area):
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
                
                <?php get_template_part('template-parts/search-map'); ?>
                <?php if( $listKigyou->have_posts() ): ?>
                <div class="areaVenture">
                    <h3 class="boxTitle">知財ニュース</h3>
                    <ul class="boxList">
                        <?php while( $listKigyou->have_posts() ): $listKigyou->the_post(); ?>
                        <li>
                            <p class="date"><?php the_time('Y年m月d日') ?></p>
                            <p class="linkPost"><a href="javascript:void(0);" class="hover"><?php the_title() ?></a></p>
                        </li>
                        <?php endwhile; wp_reset_postdata();?> 
                    </ul>
                    <p class="btnMore"><a href="<?php echo home_url('/kigyou/') ?>"><span>知財ニュース</span></a></p>
                </div>
                <?php endif; ?>
                <!-- areaVenture -->

                <?php if( $listSeminar->have_posts() ): ?>
                <div class="areaSeminar">
                    <h2 class="infoTitle">セミナー情報</h2>
                    <ul class="listSemina">
                        <?php while( $listSeminar->have_posts() ): $listSeminar->the_post(); ?>
                        <li>
                            <p class="date"><?php the_date('Y年m月d日'); ?><span class="th">（木）</span></p>
                            <?php $cat = get_first_area(); 
                            if($cat): ?>
                            <p class="cate">  
                                <a href="<?php echo get_term_link($cat); ?>" class="hover"><?php echo $cat->name ?></a>
                            </p>
                            <?php endif; ?>

                            <p class="text"><a href="<?php the_permalink() ?>" class="hover"><?php the_title() ?></a></p>
                            <div class="rowInfo">
                                <?php if( get_field('time') ): ?>
                                <p class="time"><?php the_field('time') ?></p>
                                <?php endif; ?>
                                <?php if( get_field('location') ): ?>
                                <p class="address"><?php the_field('location') ?></p>
                                <?php endif; ?>
                                <?php if( get_field('fee') &&  get_field('fee') !== 0 ): ?>
                                <p class="price"><?php echo  get_field('fee') ?></p>
                                <?php else: ?>
                                <p class="price"><?php echo '無料' ?></p>
                                <?php endif; ?>
                                <?php if( get_field('host_by') ): ?>
                                <p class="presided"><span>主宰：</span><?php the_field('host_by') ?></p>
                                <?php endif; ?>
                            </div>
                        </li> 
                        <?php endwhile; ?>
                    <p class="btnMore"><a href="<?php echo home_url('/seminar/') ?>"><span>セミナー情報へ</span></a></p>
                </div>
                <?php endif; ?>
            </div>
            <!-- contentLetf -->

            <?php get_sidebar() ?>
        </div>
    </div>
</div>
<!-- #content -->

<?php get_footer(); ?>