<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_about_us_intro extends WPBakeryShortCode {
		
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
					'intro_img' => '',
					'intro_heading'=>''
			), $atts ) );
			$images = explode ( ',', esc_html ( $intro_img ) );
			if (! empty ( $images )) {
				$images_html = '<div class="halfSlider slider flexslider"><ul class="slides">';
				foreach ( $images as $single_image ) {
					$src = wp_get_attachment_image_src ( $single_image, 'float_slide' );
					$images_html .= '<li><img src="' . esc_url($src [0]) . '" width="' . esc_attr($src [1]) . '" height="' . esc_attr($src [2]) . '"  alt=""/></li>';
				}
				$images_html .= '</ul></div>';
			}else{
				$images_html ='';
			}
			$html ='<div class="officeHolder clearfix bgGrey">
			'.$images_html.'
			<div class="halfDesc tLeft  ">

				<div class="halfInner">
				<h3>'.esc_html($intro_heading).'</h3>
				' . wpb_js_remove_wpautop ( $content, true ) . '
				</div>

			</div>
			</div>';
			return $html;
		}
	}
}