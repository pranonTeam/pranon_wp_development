<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_pranon_clients extends WPBakeryShortCode {
		
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
					'clients_img' => '',
					'clients_links'=>'',
					'theme_client' => '' 
			), $atts ) );
			
			$images = explode ( ',', esc_html ( $clients_img ) );
			$client_link = '#';
			$links = explode ( ',', esc_url ( $clients_links ) );
			
			$count =1;
			$html ='add';
			if ($theme_client == 'theme1') {
				$html = '<div class="clients overlay  ofsTMedium ofsBMedium tCenter ">
								<div class="container clearfix">
								<div class="smallIntro margBottom ofsTSmall">
									' . wpb_js_remove_wpautop ( $content, true ) . '
								</div>
									<div class="clientHolder ofsBSmall">';
				if (!empty($images)){
					foreach ($images as $key=>$single_image){
						
						$src = wp_get_attachment_image_src ( $single_image, 'full' );
						$link = isset($links[$key])? $links[$key] :'#';
						$html .='<div class="four columns noGap">
											<div class="logoSingle">
												<a href="'.esc_url($link).'"><img alt="" src="'.esc_url($src[0]).'"></a>
											</div>
										</div>';
						$count++;
					}
				}
				$html .='</div></div></div>';
			}else{
				$html = '<section class="clientAlt  ofsTop ofsBottom"><div class="container clearfix">
						<div class="clientSlider clearfix flexslider"><ul class="slides">';
				if (!empty($images)){
					foreach ($images as $key=>$single_image){
						$link = isset($links[$key])? $links[$key] :'#';
						$src = wp_get_attachment_image_src ( $single_image, 'full' );
						$html .='<li><a href="'.esc_url($link).'"><img alt="" src="'.esc_url($src[0]).'"></a></li>';
					}
				}
				$html .='</ul></div></div></section>';
			}
			
			return $html;
		}
	}
}