<?php
/**
 * The template for displaying Category pages
 */

get_header(); ?>


<div id="content">

	<?php if ( have_posts() ) : ?>
		<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', THEME_NAME ), single_cat_title( '', false ) ); ?></h1>

		<?php if ( category_description() ) : ?>
			<div class="archive-meta"><?php echo category_description(); ?></div>
		<?php endif; ?>

		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/item' ); ?>
		<?php endwhile; ?>

		<?php theme_pagination(); ?>

	<?php else : ?>
		<?php get_template_part( 'template-parts/item-none' ); ?>
	<?php endif; ?>

</div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>