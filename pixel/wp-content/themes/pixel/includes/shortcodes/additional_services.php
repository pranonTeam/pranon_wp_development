<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_additional_services extends WPBakeryShortCode {
		
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
					'service_heading' => '',
					'icon_class' => '',
					'theme_service'=>'',
					'button_url'=>'',
					'button_text'=>''
			), $atts ) );
			if ($theme_service == 'theme1') {
				$html = '<div class="additionalList"><div class="add additional_services">
														<div class="addIco">
															<i class="'.esc_attr($icon_class).'"></i>
														</div>
														<div class="addDet">
															<h3>'.esc_html($service_heading).'</h3>
															' . wpb_js_remove_wpautop ( $content, true ) . '
														<a href="'.esc_url($button_url).'">'.esc_html($button_text).'</a>
														</div>
													</div></div>';
			} else {
				$html = '<div class="additionalListAlt"><div class="addAlt ">
															<div class="addDet">
																<div class="addDetIco">
																<i class="'.esc_attr($icon_class).'"></i>
																</div>
																<h3>'.esc_html($service_heading).'</h3>
																' . wpb_js_remove_wpautop ( $content, true ) . '
															</div>
														</div></div>';
			}
			
			return $html;
		}
	}
}