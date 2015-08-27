<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_pranon_team extends WPBakeryShortCode {
		
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
					'team_img' => '',
					'name' => '',
					'designation' => '',
					'social_icons' => '',
					'social_links' => '',
					'theme_team' => '' 
			), $atts ) );
			if ($team_img != null) {
				$src = wp_get_attachment_image_src ( $team_img, 'full' );
				$team_img_src = esc_url ( $src [0] );
			} else {
				$team_img_src = '';
			}
			
			$icons = explode ( ',', esc_html ( $social_icons ) );
			$links = explode ( ',', esc_url ( $social_links ) );
			
			if ($social_links != 'no') {
				if ($theme_team == 'theme1') {
					$social_html = '<ul class="tSocials">';
				} else {
					$social_html = '<ul class="tSocials alt">';
				}
				foreach ( $icons as $key => $icon ) {
					$link = $links [$key] == null ? '#' : $links [$key];
					$social_html .= '<li><a href="' . esc_url ( $link ) . '"><i class="' . esc_attr ( $icon ) . '"></i></a></li> ';
				}
				$social_html .= '</ul>';
			} else {
				$social_html = '';
			}
			
			if ($theme_team == 'theme1') {
				$html = '<div class="teamSingle pranon_team ofsBottom">
									<div class="tImg">
									<img src="' . esc_url ( $team_img_src ) . '" alt="">
									<div class="polyLeft"></div>
									<div class="polyRight"></div>	
									</div>
									<div class="tDetails">
										<h3>' . esc_html ( $name ) . '<span>' . esc_html ( $designation ) . '</span></h3>
										' . wpb_js_remove_wpautop ( $content, true ) . '
										' . $social_html . '
									</div>
									
								</div>';
			} else {
				$html = '<div class="teamSingle tLeft pranon_team ofsBottom">
														<div class="tImg alt">
														<img src="' . esc_url ( $team_img_src ) . '" alt="">
														</div>
														<div class="tDetails">
															<h3>' . esc_html ( $name ) . '<span>' . esc_html ( $designation ) . '</span></h3>
															' . wpb_js_remove_wpautop ( $content, true ) . '
															' . $social_html . '
														</div>
													</div>';
			}
			
			return $html;
		}
	}
}