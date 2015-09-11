<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_price_table extends WPBakeryShortCode {
		
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
					'price_validity' => '',
					'price_amount' => '',
					'price_currency' => '',
					'options' => '',
					'highlight' => '',
					'sign_up_button_url' => '',
					'sign_up_button_text' => '',
					'plane_name' => '',
					'plan_theme' => '' 
			), $atts ) );
			
			$option_lists = explode ( ',', $options );
			
			if ($highlight == 'yes') {
				$highlight = 'featured';
				$selected = 'selected';
			} else {
				$highlight = '';
				$selected = '';
			}
			if ($plan_theme == 'theme1') {
				if (! empty ( $option_lists )) {
					$plan = '<ul> ';
					foreach ( $option_lists as $key => $option_list ) {
						if ($key % 2 == 0) {
							$plan .= '<li class="plSelected">' . esc_html ( $option_list ) . '</li>';
						} else {
							$plan .= '<li>' . esc_html ( $option_list ) . '</li>';
						}
					}
					$plan .= '</ul>';
				} else {
					$plan = '';
				}
				$html = '<div class="plansInner clearfix pixel_price_table ofsTop ofsBottom">
										<div class="plan">
												<div class="planName ' . esc_attr ( $highlight ) . '">
													<h1>' . esc_html ( $plane_name ) . '</h1>
												</div>
												<div class="planPrice ofsTMedium ofsBMedium">
													<div class="priceInner ' . esc_attr ( $selected ) . '">
													<h1>' . esc_html ( $price_currency ) . esc_html ( $price_amount ) . '<span class="mn">' . esc_html ( $price_validity ) . '</span></h1>
													</div>
												</div>
											<div class="planBody">
												' . $plan . '
												<div class="planBtn ofsTMedium ofsBMedium ' . esc_attr ( $highlight ) . '">
													<a class="btn" href="' . esc_url ( $sign_up_button_url ) . '">' . esc_html ( $sign_up_button_text ) . '</a>
												</div>
											</div>
										</div></div>';
			} else {
				if (! empty ( $option_lists )) {
					$plan = '<ul> ';
					foreach ( $option_lists as $key => $option_list ) {
						$plan .= '<li>' . esc_html ( $option_list ) . '</li>';
					}
					$plan .= '</ul>';
				} else {
					$plan = '';
				}
				$html = '<div class="ofsTop ofsBottom"><div class="plansInner alt offsetBottom margTop  clearfix pixel_price_table">
										<div class=" plan alt ' . esc_attr ( $highlight ) . '">
												<div class="planPriceAlt ofsTop">
													<h1>' . esc_html ( $price_amount ) . '<span class="cr">' . esc_html ( $price_currency ) . '</span><span class="mn"> / ' . esc_html ( $price_validity ) . '</span></h1>
												</div>
													<div class="planNameAlt ">
														<h1>' . esc_html ( $plane_name ) . '</h1>
													</div>
											<div class="planBodyAlt">
												' . $plan . '
												<div class="planBtn ofsTMedium ofsBMedium ' . esc_attr ( $highlight ) . '">
													<a class="btn" href="' . esc_url ( $sign_up_button_url ) . '">' . esc_html ( $sign_up_button_text ) . '</a>
												</div>
											</div>
										</div></div></div>';
			}
			return $html;
		}
	}
}