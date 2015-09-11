<?php
/**
 * Navigation Menu template functions
 *
 * @package WordPress
 * @subpackage Nav_Menus
 * @since 3.0.0
 */

/**
 * Create HTML list of nav menu items.
 *
 * @package WordPress
 * @since 3.0.0
 * @uses Walker
 */
class Pranon_Nav_Menu extends Walker_Nav_Menu {
	var $value;
	function __construct($value = NULL) {
		return $this->value = $value;
	}
	function start_lvl(&$output, $depth = 0, $args = array()) {
		
		$indent = str_repeat ( "\t", $depth );
		$output .= "\n$indent<ul class=\"dropDown\" role=\"menu\">\n";
	}
	function start_el(&$output, $object, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$dropdown_value = 0;
		$indent = ($depth) ? str_repeat ( "\t", $depth ) : '';
		
		$class_names = $value = '';
		
		$classes = empty ( $object->classes ) ? array () : ( array ) $object->classes;
		if (isset ( $classes [0] )){
			$icon_class = $classes [0];
		}
		else
			$icon_class = null;
		$classes = array_slice ( $classes, 1 );
		
		
		$class_names = join ( ' ', apply_filters ( 'nav_menu_css_class', array_filter ( $classes ), $object ) );
		
		$class_names = ' class="' . esc_attr ( $class_names ) . ' ' . $icon_class . '"';
		
		$attributes = ! empty ( $object->attr_title ) ? ' data-anchor="' . esc_attr ( $object->attr_title ) . '"' : '';
		$attributes .= ! empty ( $object->target ) ? ' target="' . esc_attr ( $object->target ) . '"' : '';
		$attributes .= ! empty ( $object->xfn ) ? ' rel="' . esc_attr ( $object->xfn ) . '"' : '';
		
		if ($icon_class != '') {
			$icon_classes = '<i class="' . $icon_class . '"></i>';
		} else {
			$icon_classes = '';
		}
		
		if ($object->object == 'page' && $object->classes [0] != 'notsingle' && $this->value != 'alter') {
			
			$varpost = get_post ( $object->object_id );
			$separate_page = get_post_meta ( $object->object_id, "lg_separate_page", true );
			$disable_menu = get_post_meta ( $object->object_id, "lg_disable_section_from_menu", true );
			$current_page_id = get_option ( 'page_on_front' );
			
			if (($disable_menu != true) && ($varpost->ID != $current_page_id)) {
				
				$output .= $indent . '<li id="multi-menu-item-' . $object->ID . '"' . $value . ' class="to-section ' . $icon_class . '">';
				
				if ($separate_page == true)
					$attributes .= ! empty ( $object->url ) ? ' href="' . esc_attr ( $object->url ) . '"' : '';
				else {
					if (is_front_page ())
						$attributes .= ' href="#' . $varpost->post_name . '"';
					else
						$attributes .= ' href="' . home_url () . '/#' . $varpost->post_name . '"';
					// $attributes .= ' href="'. home_url().'"';
				}
				
				$object_output = $args->before;
				$object_output .= '<a' . $attributes . '>';
				$object_output .= $args->link_before . $icon_classes . '' . apply_filters ( 'the_title', $object->title, $object->ID ) . '';
				$object_output .= $args->link_after;
				$object_output .= '</a>';
				$object_output .= $args->after;
				
				$output .= apply_filters ( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );
			}
			
			if(is_woocommerce()){
					echo "okokokoko";
				 global $woocommerce;
				 // get cart quantity
				$qty = $woocommerce->cart->get_cart_contents_count();

				// get cart total
				$total = $woocommerce->cart->get_cart_total();

				// get cart url
				$cart_url = $woocommerce->cart->get_cart_url();
				 $object_output .= $indent . '<li id="multi-menu-item-' . $object->ID . '"' . $value . ' class="cart"><a href="'.esc_url($cart_url).'"><i class="icon-basket"></i><span class="count woocommerce">'.esc_html($qty).'</span></a>';
			 }else{
				 echo "else";
			 }
		} 

		else {
			
			if (strpos ( $class_names, 'menu-item-has-children' ) !== false) {
				$output .= $indent . '<li id="multi-menu-item-' . $object->ID . '" > ';
				$dropdown_value = 1;
			}elseif(strpos ( $class_names, 'cart_symbol' ) !== false && class_exists('Woocommerce')){
				
				 global $woocommerce;
				 // get cart quantity
				$qty = $woocommerce->cart->get_cart_contents_count();

				// get cart total
				$total = $woocommerce->cart->get_cart_total();

				// get cart url
				$cart_url = $woocommerce->cart->get_cart_url();
				
				$output .= $indent . '<li class="cart">';
				$dropdown_value = 0;
			
			}
			else {
				$output .= $indent . '<li id="multi-menu-item-' . $object->ID . '"' . $value . ' class="'.$icon_class.'">';
				$dropdown_value = 0;
				$qty =0;
			}
			$atts = array ();
			$atts ['title'] = ! empty ( $object->attr_title ) ? $object->attr_title : '';
			$atts ['target'] = ! empty ( $object->target ) ? $object->target : '';
			$atts ['rel'] = ! empty ( $object->xfn ) ? $object->xfn : '';
			$atts ['href'] = ! empty ( $object->url ) ? $object->url : '';
			
			/**
			 * Filter the HTML attributes applied to a menu item's <a>.
			 *
			 * @since 3.6.0
			 *       
			 * @param array $atts
			 *        	{
			 *        	The HTML attributes applied to the menu item's <a>, empty strings are ignored.
			 *        	
			 *        	@type string $title The title attribute.
			 *        	@type string $target The target attribute.
			 *        	@type string $rel The rel attribute.
			 *        	@type string $href The href attribute.
			 *        	}
			 * @param object $object
			 *        	The current menu item.
			 * @param array $args
			 *        	An array of arguments. @see wp_nav_menu()
			 */
			$atts = apply_filters ( 'nav_menu_link_attributes', $atts, $object, $args );
			// var_dump($object);
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if (! empty ( $value )) {
					$value = ('href' === $attr) ? esc_url ( $value ) : esc_attr ( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}
			
			$object_output = $args->before;
			if ($dropdown_value == 0) {
				
				if (strpos ( $class_names, 'icon' ) !== false) {
					$object_output .= '<a' . $attributes . ' target="_blank">';
					/**
					 * This filter is documented in wp-includes/post-template.php
					 */
					$object_output .= '<i class="icon ' . $classes [0].' '.$classes[1] . '"></i>';
					$object_output .= '</a>';
				}elseif(strpos ( $class_names, 'cart_symbol' ) !== false){
					$object_output .= '<a' . $attributes . '>';
					/**
					 * This filter is documented in wp-includes/post-template.php
					 */
					$object_output .= '<i class="icon-basket"></i><span class="count woocommerce" id="wc_cart">'.esc_html( $qty).'</span>';
					$object_output .= '</a>';
				}
				else {
					$object_output .= '<a' . $attributes . '>';
					/**
					 * This filter is documented in wp-includes/post-template.php
					 */
					$object_output .= $args->link_before . apply_filters ( 'the_title', $object->title, $object->ID ) . $args->link_after;
					$object_output .= '</a>';
				}
			} else {
				$object_output .= '<a' . $attributes . '>';
				/**
				 * This filter is documented in wp-includes/post-template.php
				 */
				$object_output .= $args->link_before . apply_filters ( 'the_title', $object->title, $object->ID ) . $args->link_after;
				$object_output .= '</a>';
			}
			$object_output .= $args->after;
			
			/**
			 * Filter a menu item's starting output.
			 *
			 * The menu item's starting output only includes $args->before, the opening <a>,
			 * the menu item's title, the closing </a>, and $args->after. Currently, there is
			 * no filter for modifying the opening and closing <li> for a menu item.
			 *
			 * @since 3.0.0
			 *       
			 * @param string $object_output
			 *        	The menu item's starting HTML output.
			 * @param object $object
			 *        	Menu item data object.
			 * @param int $depth
			 *        	Depth of menu item. Used for padding.
			 * @param array $args
			 *        	An array of arguments. @see wp_nav_menu()
			 */
			 

			$output .= apply_filters ( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );
		}
	}
}