<?php

defined ( 'ABSPATH' ) or die ( "No script kiddies please!" );
/*
 * Template name: Frontpage Template
 */
get_header ();

$count = 0;

?>
<?php

if (($locations = get_nav_menu_locations ())) {
	
	if (! empty ( $locations ['single_page'] )) {
		$menu = wp_get_nav_menu_object ( $locations ['single_page'] );
	}
	if (! empty ( $locations ['multi_page'] )) {
		$menu = wp_get_nav_menu_object ( $locations ['multi_page'] );
	}
	$menu_items = wp_get_nav_menu_items ( $menu->term_id );
	$include = array ();
	foreach ( $menu_items as $item ) {
		if ($item->object == 'page' && $item->menu_item_parent == 0)
			$include [] = $item->object_id;
	}
	$main_query = new WP_Query ( array (
			'post_type' => 'page',
			'post__in' => $include,
			'posts_per_page' => count ( $include ),
			'orderby' => 'post__in' 
	) );
} else {
	echo "menu setup incomplete!!";
	exit ();
}

$i = 1;
while ( $main_query->have_posts () ) :
	$main_query->the_post ();
	$count ++;
	global $post;
	
	$post_name = $post->post_name;
	
	$post_id = get_the_ID ();
	
	?>

<?php if($count==2){ get_template_part ( 'menu-section' );?>
<?php }?> <section
		id="<?php echo esc_attr($post->post_name);?>"> <?php global $more; $more = 0; the_content('');?>
</section> <?php $i++;  endwhile; wp_reset_postdata(); ?> <?php get_footer();