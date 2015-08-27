<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_welcome_note extends WPBakeryShortCode {
		
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
					'welcome_heading' => '' 
			), $atts ) );
			
			$html = '<div class="aboutIntro bgGreyDark  ofsTop ofsBottom">
					<div class="container clearfix">
					<div class="title light ofsBMedium">
						<h1>' . esc_html ( $welcome_heading ) . '<span class="plus">+</span></h1>
					</div>
				<div class="aboutIntroContent">
					' . wpb_js_remove_wpautop ( $content, true ) . '
				</div>
				
				</div>
			</div>';
			
			return $html;
		}
	}
}