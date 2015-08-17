<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_what_we_do extends WPBakeryShortCode {
		
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
					'what_we_do_column_heading' => '',
					'icon_class' => '',
					'read_more_url' => '',
					'read_more_text' => '' 
			), $atts ) );
			
			$html = '<div class="expertiseHolder  what_we_do_column">
				<div class="exp column tCenter ">
					<div class="expIco ">
						<i class="' . esc_attr ( $icon_class ) . '"></i>
					</div>
					<div class="expDet">
					<h2 class="expTitle">' . esc_html ( $what_we_do_column_heading ) . '</h2>
					' . wpb_js_remove_wpautop ( $content, true ) . '
					<a href="' . esc_url ( $read_more_url ) . '">' . esc_html ( $read_more_text ) . '</a>
					</div>
				</div>
			</div>';
			return $html;
		}
	}
}