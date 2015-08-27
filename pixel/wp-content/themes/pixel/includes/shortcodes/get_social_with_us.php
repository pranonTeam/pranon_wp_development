<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_get_social_with_us extends WPBakeryShortCode {
		
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
					'social_icon_class' => '',
					'social_links'=>'',
					'social_heading'=>''
			), $atts ) );
			
			$icons = explode(',', $social_icon_class);
			$links = explode(',', $social_links);
			$social = '<ul>';
			if (isset($icons)) {
				$social = '<ul class="socialsHolder margTop ofsBSmall clearfix eleven columns  ">';
				foreach ($icons as $key=>$icon){
					$link = isset($links[$key])?$links[$key]:'#';
					$social .='<li class="two columns social ">
												<a class="gpl" href="'.esc_url($link).'"><i class="'.esc_attr($icon).'"></i></a>
											</li>';
				}
				$social .='</ul>';
			}else{
				$social ='';
			}
			
			$html ='<section class="socials tCenter ofsBottom ofsTop">
								<div class="container clearfix">
											<div class="title light ">
												<h1>'.esc_html($social_heading).'<span class="plus">+</span></h1>
											</div>
														'.$social.'
								</div>
				</section>';
			
			return $html;
		}
	}
}