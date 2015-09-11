<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */


defined ( 'ABSPATH' ) or die ( "No script kiddies please!" );

get_header ();
get_template_part ( 'menu-section' );

$content_bg = esc_url (AfterSetupTheme::pranon_return_thme_option('shop-single-parallax','url') ) != null ? esc_url (AfterSetupTheme::pranon_return_thme_option('shop-single-parallax','url') ) : get_template_directory_uri().'/images/teaserImages/r1.jpg';
?>
<section class="headerSingle hSingleHeight overlay tCenter" style="background-image: url('<?php echo esc_url($content_bg)?>');">
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
<section class="shop tCenter bgWhite">
	<div class="products ">
		<!--Post navigation-->
		<div class="postNav ofsTop ofsBottom  bgGreyDark">
<?php Navigation::pranon_paging_nav(); ?>
		</div>
		<!--End post navigation-->
	<div class="prodSorting tLeft ofsTSmall ofsBSmall">
							
							
							<!--Container-->
		<div class="container clearfix">
								
									<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>
							
							</div>
							<!--End container-->
							
						</div>
		
		
		<div class="prodHolder clearfix tLeft ofsTop ofsInBottom bgGrey">
			<div class="container clearfix">
				<div class="eleven columns noMRight">
		<?php
			/**
			 * woocommerce_archive_description hook
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>

		<?php if ( have_posts() ) : ?>

			

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

				</div>
				<div class="five columns sidebar"><?php do_action( 'woocommerce_sidebar' );?></div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>