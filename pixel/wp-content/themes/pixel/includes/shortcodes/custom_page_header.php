<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_custom_page_header extends WPBakeryShortCode {
		
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
					'page_img' => '',
					'page_heading'=>'',
					'theme_op'=>'',
			), $atts ) );
			$src = wp_get_attachment_image_src ( $page_img, 'full' );
			if ($theme_op=='theme1'){
			$html ='<div class="abIntro2Holder ofsTopH ofsBottomL">
				<div class="container clearfix ">
					<div class="thirteen columns abIntro2">
					<div class="logo">
						<img src="'.esc_url($src[0]).'" alt=""/>
						<h2 class="est">'.esc_html($page_heading).'</h2>
					</div>
					' . wpb_js_remove_wpautop ( $content, true ) . '
					
					</div>
				</div>
			</div>';
			}else{
				$html ='<div class="hSingleHeight tCenter" style="clear:both;">
				<div class="hero wide">
						<div class="container clearfix ">
								<div class="thirteen columns ofsBottom long">	
									' . wpb_js_remove_wpautop ( $content, true ) . '
								</div>
						</div>					
				</div>	</div>';
			}
			return $html;
		}
	}
}