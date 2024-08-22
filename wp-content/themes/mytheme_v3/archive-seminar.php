<?php
/**
 * The template for displaying Archive seminar
 */
get_header();


$paged = get_query_paged();
$number_paged = 3;
$listSeminar = new WP_Query(array(
    'post_type' => 'seminar',
    'posts_per_page' => $number_paged,
    'paged' => $paged,
));

?>

<?php display_mainTitle('セミナー情報'); ?>
<!-- #main -->

<div id="content">
    <div id="breadcrumbs">
        <div class="bigInner">
            <ul class="bcList">
                <li><a href="#">知財パークTOP</a></li>
                <li>助成金情報TOP</li>
            </ul>
        </div>
    </div>
    <!-- #breadcrumbs -->
    
    <div class="bigInner">
        <div class="wrapContent">
            <div class="contentLetf areaSeminar">
                <?php if( $listSeminar ): ?>
                <h2 class="infoTitle">セミナー情報</h2> <?php box_count_post($listSeminar->found_posts, $paged, $number_paged) ?>
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
                            <?php if( get_field('fee') ): ?>
                            <p class="price"><?php echo (get_field('fee')==0) ? '無料' : get_field('fee') .'円' ?></p>
                            <?php endif; ?>
                            <?php if( get_field('host_by') ): ?>
                            <p class="presided"><span>主宰：</span><?php the_field('host_by') ?></p>
                            <?php endif; ?>
                        </div>
                    </li> 
                    <?php endwhile; ?>
                </ul>
                <!-- listSemina -->
                <?php theme_pagination( $listSeminar ); ?>
                <!-- pagingNav -->
                <?php endif; ?>
            </div>
            <?php get_sidebar('joseikin') ?>
        </div>
    </div>
</div>
<!-- #content -->

<?php get_footer() ?>