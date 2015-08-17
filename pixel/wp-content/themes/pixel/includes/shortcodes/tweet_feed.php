<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_tweet_feed extends WPBakeryShortCode {
		
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
					'tweet_username' => ''
			), $atts ) );
			
			if (wp_script_is ( 'tweet-theme', 'enqueued' )) {
					
				$tweet_array = array (
						'url' => get_template_directory_uri () . '/twitter/index.php',
						'number_tweet' => 2,
						'username'=>esc_html($tweet_username)
				);
				wp_localize_script ( 'script', 'tweet_obj', $tweet_array );
				wp_enqueue_script ( 'script' );
			}
			
			$html = '<div class="twitter ofsTopL ofsBottomL bgGrey">
							<div class="twitterIco"><i class="icon-twitter"></i></div>
								<div class="container clearfix">
							<div class="feedTw thirteen columns ">
								' . wpb_js_remove_wpautop ( $content, true ) . '
								<p class="tweets"></p>
							</div>

							</div>
						</div>';
			return $html;
		}
	}
}