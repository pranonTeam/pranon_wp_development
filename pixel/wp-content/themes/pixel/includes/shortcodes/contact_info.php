<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_contact_info extends WPBakeryShortCode {
		
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
					'contact_icon_class' => '',
					'contact_info' => '',
					'contact_url' => '',
					'contact_theme' => '',
					'info_heading' =>'',
					'info_sub_heading'=>'',
					'info_phone'=>'',
					'contact_theme'=>''
			), $atts ) );
			if ($contact_theme == 'theme1') {
				
				$html ='<div class="lifebuoy ofsInTop ofsInBottom">

															<!--Container-->
															<div class="container clearfix">
															<span class="arrow"><i class="icon-up-bold"></i></span>
															<div class="lifeInner">
															<span><i class="'.esc_attr($contact_icon_class).'"></i></span>
															<h1>'.esc_html($info_heading).'<span>'.esc_html($info_sub_heading).'</span></h1>
															<span class="lifeTel">'.esc_html($info_phone).'</span>
														</div>

														</div>
														<!--End container-->

													</div>';
				
			} else {
				if ($contact_url != '') {
					$open_tag = '<div class="mail">';
					$end_tag = '</div>';
					$html = '<div class="infoHolder"><div class="infoInner">
					<div class="info">
					' . $open_tag . '<i class="' . esc_attr ( $contact_icon_class ) . '"></i><a href="' . esc_url ( $contact_url ) . '">' . esc_html ( $contact_info ) . '</a>' . $end_tag . '
					</div>
					</div></div>';
				} else {
					$open_tag = '<span>';
					$end_tag = '</span>';
					$html = '<div class="infoHolder"><div class="infoInner">
					<div class="info">
					' . $open_tag . '<i class="' . esc_attr ( $contact_icon_class ) . '"></i>' . esc_html ( $contact_info ) . '' . $end_tag . '
					</div>
					</div></div>';
				}
			}
			
			return $html;
		}
	}
}