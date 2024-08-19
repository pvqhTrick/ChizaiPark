<?php
/**
 * The sidebar containing the secondary widget area
 */

if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
<?php endif; ?>