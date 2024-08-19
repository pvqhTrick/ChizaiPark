<?php
/**
 * The template for displaying all single posts
 */

get_header(); ?>


<div id="content">

	<?php /* The loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail(); ?>
		<?php endif; ?>

		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

		<?php the_time('Y-m-d'); ?>

		<?php the_excerpt(); ?>

		<?php the_content(); ?>

	<?php endwhile; ?>

</div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>