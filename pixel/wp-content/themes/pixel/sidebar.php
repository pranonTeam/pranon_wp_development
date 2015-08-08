<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Vossen
 * @since Vossen
 */
if (is_active_sidebar ( 'blog-sidebar-id' )) :
	?>
<?php if ( is_active_sidebar( 'blog-sidebar-id' ) ) : ?>
<?php dynamic_sidebar( 'blog-sidebar-id' ); ?>
<?php endif; ?>
<?php endif; ?>
