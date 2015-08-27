<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_contact extends WPBakeryShortCode {
		
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
					'form_heading' => '',
					'form_para'=>'',
					'contact_icon_class'=>''
			), $atts ) );
		
			if ($form_heading!='') {
				$heading = '<h3>'.esc_html($form_heading).'</h3>';
			}else{
				$heading ='';
			}
			
			if ($form_para!='') {
				$para = '<p>'.esc_html($form_para).'</p>';
			}else{
				$para ='';
			}
			$html ='<div class="container clearfix"><div class="contactInner fourteen columns ">
										<div class="contactIco"><i class="'.esc_attr($contact_icon_class).'"></i></div>
							<div class="contactIntro largeIntro  ">
								'.$heading.'
										'.$para.'
							</div>
' . wpb_js_remove_wpautop ( $content, true ) . '
	
						</div></div>';
			return $html;
		}
	}
}