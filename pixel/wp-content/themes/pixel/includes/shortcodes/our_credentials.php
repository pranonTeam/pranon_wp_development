<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_our_credentials extends WPBakeryShortCode {
		
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
					'credentials_heading' => '',
					'credentials_url' => '',
					'credentials_text' => '',
					'credentials_bg' => '',
					'theme' => '' 
			), $atts ) );
			$src = wp_get_attachment_image_src ( $credentials_bg, 'full' );
			$content_bg = esc_url ( $src [0] );
			if ($theme == 'theme1') {
				$html = '<div class="shorten clearfix credentials">
				<div class="shortenInner">
				<div class="servSht">
					<div class="servImg overlay" style="background-image:url(' . $content_bg . ')"></div>
						<div class="inner">
							<h1>' . esc_html ( $credentials_heading ) . '</h1>
						</div>
				</div>
					</div>
					<div class="shortenBtn clearfix">
						<div class="servBtn">
						<a class="scroll" href="' . esc_url ( $credentials_url ) . '">' . esc_html ( $credentials_text ) . '</a>
						</div>
					</div>
				</div>
				<!--End shorten -->';
			}else {
				$html ='<div class="shorten clearfix credentials">
				<div class="shortenInner">
				<div class="servSht">
					<div class="servImg overlay" style="background-image:url(' . $content_bg . '); min-height:500px;"></div>
						<div class="inner">
							<h1>' . esc_html ( $credentials_heading ) . '</h1>
							<a class="pmore  btn" href="' . esc_url ( $credentials_url ) . '">' . esc_html ( $credentials_text ) . '</a>
						</div>
				</div>
					</div>
				</div>
				<!--End shorten -->';
			}
			
			return $html;
		}
	}
}