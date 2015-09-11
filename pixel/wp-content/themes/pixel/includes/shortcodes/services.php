<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_services extends WPBakeryShortCode {
		
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
					'img_url' => '',
					'heading'=>'',
					'para'=>'',
					'left_right'=>''
			), $atts ) );
			$src = wp_get_attachment_image_src ( $img_url, 'full' );
			if($left_right=='img_right'){
			$html ='	<div class="servHolder clearfix ofsTop ofsBottom "><div class="clearfix  servHolderInner">
								<div class="content tLeft seven columns">
									<h1>'.esc_html($heading).'</h1>
										' . wpb_js_remove_wpautop ( $content, true ) . '
								</div>
								<div class="shot tLeft nine columns ">
									<img src="'.esc_url($src[0]).'" alt=""/>
								</div>
								</div></div>';
			}else{
				$html ='	<div class="servHolder clearfix ofsTop ofsBottom "><div class="clearfix  servHolderInner">
								<div class="shot tLeft nine columns ">
									<img src="'.esc_url($src[0]).'" alt=""/>
								</div>
								<div class="content tLeft seven columns">
									<h1>'.esc_html($heading).'</h1>
										' . wpb_js_remove_wpautop ( $content, true ) . '
								</div>
								</div></div>';
			}
			
			return $html;
		}
	}
}