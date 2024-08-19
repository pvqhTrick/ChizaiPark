<?php if ( has_post_thumbnail() ) : ?>
	<?php the_post_thumbnail(); ?>
<?php endif; ?>

<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

<?php the_time('Y-m-d'); ?>

<?php the_excerpt(); ?>