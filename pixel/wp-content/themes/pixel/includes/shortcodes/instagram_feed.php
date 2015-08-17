<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_instagram_feed extends WPBakeryShortCode {
		
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
					'access_token' => '',
					'client_id'=>''
			), $atts ) );
			
			if (wp_script_is ( 'spectragram', 'enqueued' )) {
					
				$tweet_array = array (
						'accessToken' => esc_html($access_token),
						'clientID' => esc_html($client_id),
				);
				wp_localize_script ( 'script', 'instagram_obj', $tweet_array );
				wp_enqueue_script ( 'script' );
			}
			
			$html = '<div class="insta">
								<div class="instaInner">
									<ul class="instaFeed"></ul>
								</div>
								<div class="instaTitle">
								<div class="instaIco"><i class="icon-instagram"></i></div>
								' . wpb_js_remove_wpautop ( $content, true ) . '
							</div>
						</div>';
			return $html;
		}
	}
}