<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_portfolio_filter extends WPBakeryShortCode {
		
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
					'post_type' => '',
					'posts_per_page' => '',
					'orderby' => '',
					'order' => '',
					'img_size' => '',
					'custom_taxonomy' => '' 
			), $atts ) );
			
			$numberOfPost = $posts_per_page != '' ? $posts_per_page : - 1;
			$taxonomy = esc_html ( $custom_taxonomy );
			
			$tax_args = array (
					'orderby' => 'name',
					'order' => 'ASC',
					'hide_empty' => true,
					'exclude' => array (),
					'exclude_tree' => array (),
					'include' => array (),
					'number' => '',
					'fields' => 'all',
					'slug' => '',
					'parent' => '',
					'hierarchical' => true,
					'child_of' => 0,
					'get' => '',
					'name__like' => '',
					'description__like' => '',
					'pad_counts' => false,
					'offset' => '',
					'search' => '',
					'cache_domain' => 'core' 
			);
			
			$terms = get_terms ( $taxonomy, $tax_args );
			
			$html = '<div class="filterNav ofsTSmall ofsBSmall">
							<div class="container clearfix">
							<ul id="category" class="filter">
					<li class="all current"><a href="#">' . esc_html__ ( 'All', 'pranon' ) . '</a></li>';
			foreach ( $terms as $list ) {
				$html .= '<li class="' . $list->slug . '"><a href="#">' . $list->name . '</a></li>';
			}
			$html .= '</ul></div></div>';
			
			if ($img_size == 'large') {
				$img_size = 'recent_slide_filter_work';
				$alter_class = 'itemAlt';
			} else {
				$img_size = 'filter_works_normal';
				$alter_class ='';
			}
			
			
			$args = array (
					'posts_per_page' => $numberOfPost,
					'offset' => 0,
					'category' => '',
					'category_name' => '',
					'orderby' => $orderby!='' ? $orderby : 'date',
					'order' => $order!='' ? $order : 'DESC',
					'include' => '',
					'exclude' => '',
					'meta_key' => '',
					'meta_value' => '',
					'post_type' => $post_type,
					'post_mime_type' => '',
					'post_parent' => '',
					'author' => '',
					'post_status' => 'publish',
					'suppress_filters' => true 
			);
			$posts_array = get_posts ( $args );
			$html .= '<div class=" works clearfix "> <ul class="portfolio clearfix tCenter">';
			foreach ( $posts_array as $key => $single_post ) {
				$getCat = wp_get_post_terms ( $single_post->ID, $taxonomy, array (
						"fields" => "all" 
				) );
				$formate = get_post_format ( $single_post->ID );
				;
				$cat = '';
				$cat_filter = '';
				$img_src = wp_get_attachment_image_src ( get_post_thumbnail_id ( $single_post->ID ), 'single_post' );
				foreach ( $getCat as $key => $value ) {
					$cat_filter .= esc_html ( $value->slug . ' ' );
					if ($key == (count ( $getCat ) - 1)) {
						$cat .= esc_html ( $value->name );
					} else {
						$cat .= esc_html ( $value->name ) . ', ';
					}
				}
				if ($formate == 'video') {
					$html .= '<li class="item '.$alter_class.' one-third column filter_img" data-id="id-' . ($key) . '" data-type="' . $cat_filter . '">
							<div class="itemDesc">
								<div class="itemDescInner">
								<h3>' . esc_html ( $single_post->post_title ) . '<span>' . $cat . '</span></h3>
								<div class=" itemBtn ">
								<a  href="' . htmlspecialchars ( get_post_meta ( $single_post->ID, 'pranon_video_url', true ) ) . '" class="popup-vimeo img"><i class="icon-resize-full"></i></a>
								<a href="' . get_the_permalink ( $single_post->ID ) . '" class="link"><i class="icon-link"></i></a>
								</div>
								</div>
							</div>
								 ' . get_the_post_thumbnail ( $single_post->ID, $img_size, false ) . '
						</li>';
				}else{
					$html .= '<li class="item '.$alter_class.' one-third column filter_img" data-id="id-' . ($key) . '" data-type="' . $cat_filter . '">
							<div class="itemDesc">
								<div class="itemDescInner">
								<h3>' . esc_html ( $single_post->post_title ) . '<span>' . $cat . '</span></h3>
								<div class=" itemBtn ">
								<a  href="' . esc_url ( $img_src [0] ) . '" class=" folio img"><i class="icon-resize-full"></i></a>
								<a href="' . get_the_permalink ( $single_post->ID ) . '" class="link"><i class="icon-link"></i></a>
								</div>
								</div>
							</div>
								 ' . get_the_post_thumbnail ( $single_post->ID, $img_size, false ) . '
						</li>';
				}
			}
			$html .= '</ul></div>';
			return $html;
		}
	}
}