<?php
/**
 * The template for displaying Archive pages
 */

get_header(); ?>


<div id="content">
	
	<?php if ( have_posts() ) : ?>

		<h1 class="archive-title"><?php
			if ( is_day() ) :
				printf( __( 'Daily Archives: %s', THEME_NAME ), get_the_date() );
			elseif ( is_month() ) :
				printf( __( 'Monthly Archives: %s', THEME_NAME ), get_the_date( _x( 'F Y', 'monthly archives date format', THEME_NAME ) ) );
			elseif ( is_year() ) :
				printf( __( 'Yearly Archives: %s', THEME_NAME ), get_the_date( _x( 'Y', 'yearly archives date format', THEME_NAME ) ) );
			else :
				_e( 'Archives', THEME_NAME );
			endif;
		?></h1>

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