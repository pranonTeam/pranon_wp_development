<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header ();
get_template_part ( 'menu-section' ); ?>
<section class="headerSingle hSingleHeight overlay tCenter" style="background-image: url('<?php echo get_template_directory_uri()?>/images/teaserImages/r1.jpg');">

	<!--Hero-->
	<div class="hero">


		<!--Title-->
		<div class="title light ofsBottom ">
			<h1>
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<?php woocommerce_page_title(); ?>

		<?php endif; ?><span class="plus">+</span>
			</h1>
		</div>
		<!--End title-->
	</div>
	<!--End hero-->


</section>
<!--End header single-->
<section class="shop  bgWhite">
					

					<!--Product single-->
					<div class="prodSingle ofsInTop ofsInBottom bgGrey">
						

					<!--Container-->
					<div class="container clearfix">
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		 remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
		do_action( 'woocommerce_before_main_content','woocommerce_output_content_wrapper',10 );
		
	?>
<div class="eleven columns">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>
</div>
	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
<div class="five columns sidebar">
	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>
	</div>
</div>
</div>
</section>
				<section class="tCenter relatedShop bgWhite">


						<!--Related shop holder -->
						<div class="relatedShopHolder ofsTop">

<?php							
global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => 'ASC',
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = '4';

if ( $products->have_posts() ) : ?>

	<div class="related products">
									<div class="title dark ">
										<h1><?php _e( 'You May Also Like', 'woocommerce' ); ?><span class="plus">+</span></h1>
									</div>
<div class="prodHolder clearfix tLeft margTop ofsInBottom">



									<!--Container-->
									<div class="container clearfix">

		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>
	</div>
	</div>
	</div>

<?php endif;

wp_reset_postdata();?>
</div>
</section>
<?php get_footer(); ?>
