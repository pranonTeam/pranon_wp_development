<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_slide_wrapper extends WPBakeryShortCode {
		
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
					'slide_text' => '',
					'slide_images' => '',
					'social_link' => '',
					'social_icons' => '',
					'social_links' => '' 
			), $atts ) );
			
			$images = explode ( ',', esc_html ( $slide_images ) );
			if (! empty ( $images )) {
				$images_html = '<ul class="slides">';
				foreach ( $images as $single_image ) {
					$src = wp_get_attachment_image_src ( $single_image, 'main_big_slide' );
					$images_html .= '<li class="overlay"><img src="' . $src [0] . '" width="' . $src [1] . '" height="' . $src [2] . '"  alt=""/></li>';
				}
				$images_html .= '</ul>';
			}
			
			$icons = explode ( ',', esc_html ( $social_icons ) );
			$links = explode ( ',', esc_url ( $social_links ) );
			
			if ($social_link != 'no') {
				$social_html = '<ul class="socialsSlider">';
				foreach ( $icons as $key => $icon ) {
					$link = $links [$key] == null ? '#' : $links [$key];
					$social_html .= '<li><a href="' . esc_url ( $link ) . '"><i class="' . esc_attr ( $icon ) . '"></i></a></li> ';
				}
				$social_html .= '</ul>';
			}
			
			$html = '<div class="mainSliderHolder">
		<div class="mainSlider flexslider">
			' . $images_html . '
				<div class="slidesInner">
						' . wpb_js_remove_wpautop ( $content, true ) . '
					' . $social_html . '
				</div>
			</div>
		</div>';
			
			return $html;
		}
	}
}