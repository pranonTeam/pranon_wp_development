<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_section_heading extends WPBakeryShortCode {
		
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
					'what_we_do_heading' => '' 
			), $atts ) );
			
			if ($content != '') {
				$para_html = '<div class="largeIntro  ofsTSmall">
									' . wpb_js_remove_wpautop ( $content, true ) . '
								</div>';
			} else {
				$para_html = '';
			}
			
			if($what_we_do_heading!=''){
				$heading = '<div class="title dark">
									<h1>' . esc_html ( $what_we_do_heading ) . '<span class="plus">+</span></h1>
								</div>';
			}else{
				$heading = '';
				$para_html = '<div class="smallIntro tCenter">
										' . wpb_js_remove_wpautop ( $content, true ) . '
													</div>';
			}
			$html = '<div class="expertiseHolder margLTop">
					<div class="clearfix ofsBottom">
								'.$heading.'
											<div class="container clearfix">
											' . $para_html . '
													</div>
				    </div></div>';
			return $html;
		}
	}
}