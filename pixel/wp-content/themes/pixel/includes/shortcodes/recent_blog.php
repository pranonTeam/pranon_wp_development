<?php
if (class_exists ( 'WPBakeryShortCode' )) {
	class WPBakeryShortCode_recent_blog_post extends WPBakeryShortCode {
		
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
					'column' =>''
			), $atts ) );
			
			$numberOfPost = $posts_per_page != '' ? $posts_per_page : 3;
			
			if ($column==1) {
				$column_class = 'twelve';
			}else{
				$column_class = 'one-third';
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
			$html ='<div class="container clearfix"><div class="latestHolder ofsBottom clearfix tLeft blog_mar_top">';
			
			foreach ( $posts_array as $single_post ) {
				$getCat = get_the_category ( $single_post->ID );
				$cat = '';
				
				foreach ( $getCat as $key => $value ) {
					if ($key == (count ( $getCat ) - 1)) {
						$cat .= '<a href="' . get_category_link ( $value->term_id ) . '">' . esc_html ( $value->name ) . '</a>';
					} else {
						$cat .= '<a href="' . get_category_link ( $value->term_id ) . '">' . esc_html ( $value->name ) . '</a>, ';
					}
				}
				$num_comments = get_comments_number ( $single_post->ID );
				
				if (comments_open ( $single_post->ID )) {
					if ($num_comments == 0) {
						$comments = __ ( 'No Comments' );
					} elseif ($num_comments > 1) {
						$comments = $num_comments . __ ( ' Comments' );
					} else {
						$comments = __ ( '1 Comment' );
					}
					$write_comments = '<span class="metaComments"><a href="' . get_comments_link ($single_post->ID) . '">' . $comments . '</a></span>';
				} else {
					$write_comments = __ ( 'Comments are off for this post.' );
				}
				
				if ($single_post->post_excerpt != null) {
					$content = apply_filters ( 'the_content', $single_post->post_excerpt );
					$content .= '<div class=" more">
									<a class="btn border more" href="' . get_the_permalink ( $single_post->ID ) . '">' . esc_html__ ( 'Read More...', 'pranon' ) . '</a>
									</div>';
				} else {
					$content = apply_filters ( 'the_content', $single_post->post_content );
				}
				
				if (get_post_format ( $single_post->ID ) == 'gallery') {
					$formate = self::get_gallery ( $single_post->ID );
				} elseif (get_post_format ( $single_post->ID ) == 'video' || get_post_format ( $single_post->ID ) == 'audio') {
					$formate = self::get_audio_video_formate ( $single_post->ID );
				} else {
					$formate = self::get_else_formate ( $single_post->ID, $column );
				}
				$html .= '<div class="postLarge last '.$column_class.' column">
						<div class="postContent">
									<div class="postTitle">
									<h1><a href="' . get_the_permalink ( $single_post->ID ) . '">'.esc_html($single_post->post_title).'</a></h1>
									<div class="postMeta">
										<span class="metaCategory">' . $cat . '</span>
										<span class="metaDate"><a href="' . get_day_link ( get_the_time ( 'Y', $single_post->ID ), get_the_time ( 'm', $single_post->ID ), get_the_time ( 'd', $single_post->ID ) ) . '">- ' . get_the_time ( get_option ( 'date_format', $single_post->ID ) ) . ' - </a></span>
										' . $write_comments . '
								   </div>
									</div>
										' . $formate . '
									' . $content . '
									
								</div></div>';
			}
			
			return $html .'</div></div>';
		}
		static function get_audio_video_formate($post_id) {
			if (get_post_meta ( $post_id, 'pranon_video_url', true ) != null) {
				$html = '<div class="postMedia audio">
				<iframe height="163"
					src="' . htmlspecialchars ( get_post_meta ( $post_id, 'pranon_video_url', true ) ) . '"></iframe>
			</div>';
			} else {
				$html = '';
			}
			return $html;
		}
		static function get_gallery($post_id) {
			$img = '';
			if (class_exists ( 'Dynamic_Featured_Image' )) {
				global $dynamic_featured_image;
				$featured_images = $dynamic_featured_image->get_all_featured_images ( $post_id );
				$upload_dir = wp_upload_dir ();
				$img .= ' <div class="postMedia postSlider slider flexslider"> <ul class="slides">';
				foreach ( $featured_images as $key => $featured_image ) {
					$img_src = wp_get_attachment_metadata ( $featured_image ['attachment_id'] );
					$date = explode ( '/', $img_src ['file'] );
					if (count ( $date ) == 3) {
						$attachment_dir = $upload_dir ['baseurl'] . '/' . $date [0] . '/' . $date [1];
					} else {
						$attachment_dir = $upload_dir ['baseurl'];
					}
					
					if (isset ( $img_src ['sizes'] ['recent_blogs'] ['file'] )) {
						$img .= '<li>
				<img class="img-responsive" src="' . esc_url ( $attachment_dir . '/' . $img_src ['sizes'] ['recent_blogs'] ['file'] ) . '" alt="">
			</li>';
					} else {
						$img .= '<li>
				<img class="img-responsive" src="' . esc_url ( $attachment_dir . '/' . $img_src ['sizes'] ['large'] ['file'] ) . '" alt="">
			</li>';
					}
				}
				$img .= '</ul></div>';
			}
			return $img;
		}
		static function get_else_formate($post_id, $column) {
			if ($column==3) {
				$size='recent_blogs';
			}else {
				$size ='single_post';
			}
			if (has_post_thumbnail ( $post_id )) {
				$img = '<div class="postMedia">
							 ' . get_the_post_thumbnail ( $post_id, $size, false ) . '
						</div>';
			} else {
				$img = '';
			}
			return $img;
		}
	}
}