<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_pixel_fun_facts extends WPBakeryShortCode {
		
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
					'fun_icon_class' => '',
					'fun_count'=>'',
					'fun_heading'=>''
			), $atts ) );
			
			$html ='<div class="facts tCenter ofsTopL ofsBottomL"><div class="factsInner clearfix pixel_fun_fact">
											<div class="fact">
												<div class="factIco">
													<div class="factIcoInner">
														<i class="'.esc_attr($fun_icon_class).'"></i>
													</div>
												</div>
												
												<h1><span class="plus">+</span>
													<span class="count">'.esc_html($fun_count).'</span></h1>
												<span>'.esc_html($fun_heading).'</span>
											</div></div></div>';
			
			return $html;
		}
	}
}