<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $woocommerce, $product;

?>
<div class="">

	<?php
		if ( has_post_thumbnail() ) {

			$image_title 	= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_caption 	= get_post( get_post_thumbnail_id() )->post_excerpt;
			$image_link  	= wp_get_attachment_url( get_post_thumbnail_id() );
			$image       	= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title'	=> $image_title,
				'alt'	=> $image_title
				) );
			
			$attachment_count = count( $product->get_gallery_attachment_ids() );

			if ( $attachment_count > 0 ) {
				$attachment_ids = $product->get_gallery_attachment_ids();
				//$gallery = '[product-gallery]';
				$html ='<div class="prodSlider slider sb flexslider ">';
				if ( $product->is_on_sale() ){
				$html .= apply_filters( 'woocommerce_sale_flash', '<span class="sale">' . __( 'Sale', 'woocommerce' ) . '</span>', $post, $product );

				}		
				$html .='<ul class="slides">';
				foreach( $attachment_ids as $attachment_id ) {
					$html .='<li>'.wp_get_attachment_image($attachment_id, 'shop_single').'</li>';
				}
				$html .='</ul></div>';
				echo $html;
			} else {
				$gallery = '';
				echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a>', $image_link, $image_caption, $image ), $post->ID );
				do_action( 'woocommerce_product_thumbnails' );
			}

			

		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );
			do_action( 'woocommerce_product_thumbnails' );

		}
	?>

	
</div>
