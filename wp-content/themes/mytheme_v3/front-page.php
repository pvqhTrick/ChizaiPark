<?php 
/**
 * The template for displaying TOP page
 */
get_header(); 
?>
<div id="content">
    <div class="bigInner">
        <div class="wrapContent">
            <div class="contentLetf">
                <?php get_template_part('template-parts/top-joseikin'); ?>
                
                <?php get_template_part('template-parts/search-map'); ?>

                <?php get_template_part('template-parts/top-news'); ?>

                <?php get_template_part('template-parts/top-seminar'); ?>
            </div>
            <?php get_sidebar() ?>
        </div>
    </div>
</div>
<!-- #content -->

<?php get_footer(); ?>