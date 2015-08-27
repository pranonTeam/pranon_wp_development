<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_pixel_skill_exprties extends WPBakeryShortCode {
		
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
					'icon_class' => '',
					'skill_heading' => '' 
			), $atts ) );
			
			$html = '<div class="servicesList pixel_skill_exprties margMBottom">
				<div class="servi">
													<div class="servIco">
														<i class="' . esc_attr ( $icon_class ) . '"></i>
													</div>

													<div class="servDet">
														<h3>' . esc_html ( $skill_heading ) . '</h3>
														' . wpb_js_remove_wpautop ( $content, true ) . '
													</div>

												</div>
				</div>';
			return $html;
		}
	}
}