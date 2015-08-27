<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_get_in_touch extends WPBakeryShortCode {
		
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
					'heading' => '',
					'button_url' => '',
					'button_text' => '',
					'theme_g' => '',
					'bg_img' => '' 
			), $atts ) );
			if ($bg_img != null) {
				$src = wp_get_attachment_image_src ( $bg_img, 'full' );
				$content_bg = esc_url ( $src [0] );
			}else{
				$content_bg ='';
			}
			if ($theme_g == 'theme1') {
				$html = '<div class="persContact ofsTop ofsBottom bgGreyDarkL">
											<h1>' . esc_html ( $heading ) . '</h1>
											<a class="amore btn border" href="' . esc_url ( $button_url ) . '">' . esc_html ( $button_text ) . '</a>
										</div>';
			} elseif ($theme_g == 'theme2') {
				$html = '<div class="ctl clearfix">
										<div class="ctlContentL tLeft ofsInBottom" style="padding-top:46px;"><h1>' . esc_html ( $heading ) . '</h1></div>
										<div class="ctlContentR ofsInTop ofsInBottom"><a class="btn" href="' . esc_url ( $button_url ) . '">' . esc_html ( $button_text ) . '</a></div>
									</div>';
			} elseif ($theme_g == 'theme3') {
				$html = '<div class="heroBottom">
									<div class="heroBImg overlay" style="background-image:url(' . $content_bg . ')"></div>
									<div class="heroBInner">
									<h1>' . esc_html ( $heading ) . '</h1>
								<a href="' . esc_url ( $button_url ) . '" class="amore btn">' . esc_html ( $button_text ) . '</a>
								</div>
								</div>';
			} else {
				$html = '<div class="quickL  ofsTopM ofsBottomM">
							<h2>' . esc_html ( $heading ) . '</h2>
							<div class="quickBtn">
							<a class="btn border" href="' . esc_url ( $button_url ) . '">' . esc_html ( $button_text ) . '</a>
							</div>
						</div>';
			}
			
			return $html;
		}
	}
}