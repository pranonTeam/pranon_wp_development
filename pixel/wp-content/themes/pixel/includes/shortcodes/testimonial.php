<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_testimonial extends WPBakeryShortCode {
		
		/*
		 * Thi methods returns HTML code for frontend representation of your shortcode.
		 * You can use your own html markup.
		 *
		 * @param $atts - shortcode attributes
		 * @param @content - shortcode content
		 *
		 * @access protected
		 * vc_filter: VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG vc_shortcodes_css_class - hook to edit element class
		 * @return string
		 */
		protected function content($atts, $content = null) {
			extract ( shortcode_atts ( array (
					'post_type' => '',
					'posts_per_page' => '',
					'orderby' => '',
					'order' => '',
					'column' => '' 
			), $atts ) );
			$numberOfPost = $posts_per_page != '' ? $posts_per_page : 3;
			
			$args = array (
					'posts_per_page' => $numberOfPost,
					'offset' => 0,
					'category' => '',
					'category_name' => '',
					'orderby' => $orderby!='' ? $orderby : 'date',
					'order' => $order!='' ? $order : 'DESC',
					'include' => '',
					'exclude' => '',
					'meta_key' => '',
					'meta_value' => '',
					'post_type' => $post_type,
					'post_mime_type' => '',
					'post_parent' => '',
					'author' => '',
					'post_status' => 'publish',
					'suppress_filters' => true 
			);
			$posts_array = get_posts ( $args );
			$html = '<div class="testimonials tCenter ofsBottom ofsTop" style="height:420px;">
							
								<div class="testiIco ofsInBottom ofsTSmall">
									<div class="testiIcoInner ">
									<i class="icon-quote-right"></i>
									</div>
								</div>
								<div class="testiSlider slider clearfix flexslider">
									<ul class="slides">';
			foreach ( $posts_array as $single_post ) {
				$html .= '<li>' . apply_filters('the_content', $single_post->post_content) . '
									<h3 class="testiProfile">' . esc_html ( $single_post->post_title ) . '</h3>
									 </li>';
			}
			$html .= '</ul></div></div>';
			
			return $html;
		}
	}
}