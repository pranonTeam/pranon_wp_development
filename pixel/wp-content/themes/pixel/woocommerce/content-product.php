<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array('prod  sb one-third column');

if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}
?>
<li <?php post_class( $classes ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
	
	<div class="prodDesc">

										<div class="prodDescInner">
											
										<h3><?php do_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10 );?></h3>
										
										<span class="priceDet">
											
											<?php remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 ); ?>
											<?php do_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 ); ?>
										</span>
										<div class="prodBtn ">
										<a  href="<?php the_permalink(); ?>" class="btn"><?php _e('Item Details','pranon')?></a>
										<br>
										<?php do_action( 'woocommerce_after_shop_loop_item' );?>
										</div>
										</div>
									</div>
									
										<div class="prodImg">
										<?php do_action( 'woocommerce_before_shop_loop_item_title' );?>
										</div>

</li>
