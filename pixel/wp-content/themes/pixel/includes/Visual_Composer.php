<?php
class Visual_Composer {
	static function pranon_param_settings_field($settings, $value) {
		// return '<div class="pranon_custom_taxonomy_block">' . '<input name="' . esc_attr ( $settings ['custom_taxonomy'] ) . '" class="wpb_vc_param_value wpb-textinput ' . esc_attr ( $settings ['custom_taxonomy'] ) . ' ' . esc_attr ( $settings ['pranon_custom_taxonomy'] ) . '_field" type="text" value="' . esc_attr ( $value ) . '" />' . '</div>'; // This is html markup that will be outputted in content elements edit form
		$html = '<div class="pranon_custom_taxonomy_block">
				<select name="custom_taxonomy" class="wpb_vc_param_value wpb-textinput ' . esc_attr ( $settings ['custom_taxonomy'] ) . ' ' . esc_attr ( $settings ['pranon_custom_taxonomy'] ) . '_field" >';
		$get_taxonomies = get_taxonomies ();
		var_dump ( $settings );
		foreach ( $get_taxonomies as $taxonomy ) {
			if ($value == $taxonomy) {
				$html .= '<option value="' . $taxonomy . '" selected>' . $taxonomy . '</option>';
			} else
				$html .= '<option value="' . $taxonomy . '">' . $taxonomy . '</option>';
		}
		$html .= '</select>
				</div>';
		return $html;
	}
	static function add_shortcode_to_VC() {
		
		vc_add_param("vc_row", array(
				"type" => "dropdown",
				"group" => "Pixel Additions",
				"class" => "",
				"heading" => "Type",
				"param_name" => "type",
				"value" => array(
						"In Container" => "in_container",
						"No Container" => "no_container"
				)
		));
		
		// main slide
		vc_map ( array (
				"name" => __ ( "Pixel Slide", "pranon" ),
				"base" => "slide_wrapper",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js' 
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css' 
				),
				"params" => array (
						array (
								"type" => "textarea_html",
								"holder" => "div",
								"class" => "",
								"heading" => __ ( "Text", "pranon" ),
								"param_name" => "content",
								"description" => __ ( "Text shows above slider", "pranon" ) 
						),
						array (
								"type" => "attach_images",
								"class" => "",
								"heading" => __ ( "Images", "pranon" ),
								"param_name" => "slide_images",
								"value" => __ ( "", "pranon" ),
								"description" => __ ( "Images for slide", "pranon" ) 
						),
						array (
								"type" => "dropdown",
								"class" => "",
								"heading" => __ ( "Social Link", "pranon" ),
								"param_name" => "social_link",
								"value" => array (
										'',
										'yes',
										'no' 
								),
								"description" => __ ( "Social Link shows or not", "pranon" ) 
						),
						array (
								"type" => "exploded_textarea",
								"holder" => "h3",
								"class" => "",
								"heading" => __ ( "Social Icon Classes", "pranon" ),
								"param_name" => "social_icons",
								"value" => __ ( "icon-facebook, icon-linkedin, icon-twitter, icon-instagram", "pranon" ),
								"description" => __ ( "Social Icon Classes multiple seperated by 'new line'.", "pranon" ),
								'dependency' => array (
										'element' => 'social_link',
										'value' => 'yes' 
								) 
						),
						array (
								"type" => "exploded_textarea",
								"holder" => "h3",
								"class" => "",
								"heading" => __ ( "Social Links", "pranon" ),
								"param_name" => "social_links",
								"value" => __ ( "#facebook, #linkedin, #twitter, #instagram", "pranon" ),
								"description" => __ ( "Social links multiple seperated by 'new line'.", "pranon" ),
								'dependency' => array (
										'element' => 'social_link',
										'value' => 'yes' 
								) 
						) 
				) 
		) );
		
		/* =========== welcome note ============= */
		vc_map ( array (
				"name" => __ ( "Pixel Welcome Note", "pranon" ),
				"base" => "welcome_note",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js' 
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css' 
				),
				"params" => array (
						array (
								"type" => "textfield",
								"holder" => "h1",
								"class" => "",
								"heading" => __ ( "Heading", "pranon" ),
								"param_name" => "welcome_heading",
								"description" => __ ( "Enter Heading Text", "pranon" ) 
						),
						array (
								"type" => "textarea_html",
								"holder" => "div",
								"class" => "aboutIntroContent",
								"heading" => __ ( "Welcome Content", "pranon" ),
								"param_name" => "content",
								"description" => __ ( "Content shows as welcome note, follow documentation", "pranon" ) 
						) 
				) 
		) );
		
		/* =========== section_heading ============= */
		vc_map ( array (
				"name" => __ ( "Pixel Section heading", "pranon" ),
				"base" => "section_heading",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js' 
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css' 
				),
				"params" => array (
						array (
								"type" => "textfield",
								"holder" => "h1",
								"class" => "",
								"heading" => __ ( "Section Heading", "pranon" ),
								"param_name" => "what_we_do_heading",
								"description" => __ ( "Enter Section Heading Text", "pranon" ) 
						),
						array (
								"type" => "textarea_html",
								"holder" => "div",
								"class" => "aboutIntroContent",
								"heading" => __ ( "Section Short Description", "pranon" ),
								"param_name" => "content",
								"description" => __ ( "Section heading has Short Description, follow documentation", "pranon" ) 
						) 
				) 
		) );
		
		/* =========== what we do child ============= */
		vc_map ( array (
				"name" => __ ( "Pixel What we do column", "pranon" ),
				"base" => "what_we_do",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js' 
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css' 
				),
				"params" => array (
						array (
								"type" => "textfield",
								"holder" => "h1",
								"class" => "",
								"heading" => __ ( "Column Heading", "pranon" ),
								"param_name" => "what_we_do_column_heading",
								"description" => __ ( "Enter Heading Text for column", "pranon" ) 
						),
						array (
								"type" => "textfield",
								"holder" => "",
								"class" => "",
								"heading" => __ ( "Column Icon Class", "pranon" ),
								"param_name" => "icon_class",
								"description" => __ ( "Icon Class e.g 'icon-feather'", "pranon" ) 
						),
						array (
								"type" => "textfield",
								"holder" => "",
								"class" => "",
								"heading" => __ ( "Url", "pranon" ),
								"param_name" => "read_more_url",
								"description" => __ ( "Read More Button Url", "pranon" ) 
						),
						array (
								"type" => "textfield",
								"holder" => "",
								"class" => "",
								"heading" => __ ( "Read More Text", "pranon" ),
								"param_name" => "read_more_text",
								"description" => __ ( "Read More Button Text", "pranon" ) 
						),
						array (
								"type" => "textarea_html",
								"holder" => "div",
								"class" => "aboutIntroContent",
								"heading" => __ ( "Column Content", "pranon" ),
								"param_name" => "content",
								"description" => __ ( "Content shows as column excerpt, follow documentation", "pranon" ) 
						),
						array (
								"type" => "dropdown",
								"class" => "",
								"heading" => __ ( "Choose Theme", "pranon" ),
								"param_name" => "theme",
								"value" => array (
										'',
										'theme1',
										'theme2',
										'theme3' 
								),
								"description" => __ ( "Choose theme to change look in frontend", "pranon" ) 
						) 
				) 
		) );
		
		/* ============= our credentials ========== */
		vc_map ( array (
				"name" => __ ( "Pixel Credentials", "pranon" ),
				"base" => "our_credentials",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js' 
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css' 
				),
				"params" => array (
						array (
								"type" => "textfield",
								"holder" => "h1",
								"class" => "",
								"heading" => __ ( "Column Heading", "pranon" ),
								"param_name" => "credentials_heading",
								"description" => __ ( "Enter Heading Text for column", "pranon" ) 
						),
						array (
								"type" => "textfield",
								"holder" => "",
								"class" => "",
								"heading" => __ ( "Url", "pranon" ),
								"param_name" => "credentials_url",
								"description" => __ ( "Link Url", "pranon" ) 
						),
						array (
								"type" => "textfield",
								"holder" => "",
								"class" => "",
								"heading" => __ ( "Credentials Button Text", "pranon" ),
								"param_name" => "credentials_text",
								"description" => __ ( "Button Text", "pranon" ) 
						),
						array (
								"type" => "attach_image",
								"holder" => "",
								"class" => "",
								"heading" => __ ( "Credentials Background Image", "pranon" ),
								"param_name" => "credentials_bg",
								"description" => __ ( "Credentials Background Image", "pranon" ) 
						),
						array (
								"type" => "dropdown",
								"class" => "",
								"heading" => __ ( "Choose Theme", "pranon" ),
								"param_name" => "theme",
								"value" => array (
										'',
										'theme1',
										'theme2' 
								),
								"description" => __ ( "Choose theme to change look in frontend", "pranon" ) 
						) 
				) 
		) );
		
		/* ============= RECENT BLOG POSTS ========== */
		vc_map ( array (
				"name" => __ ( "Pixel Recent Blog Post", "pranon" ),
				"base" => "recent_blog_post",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js' 
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css' 
				),
				"params" => array (
						array (
								"type" => "posttypes",
								"holder" => "h1",
								"class" => "",
								"heading" => __ ( "Select Post Type", "pranon" ),
								"param_name" => "post_type",
								"description" => __ ( "Select a Post Type", "pranon" ) 
						),
						array (
								"type" => "dropdown",
								"class" => "",
								"heading" => __ ( "Orderby", "pranon" ),
								"param_name" => "orderby",
								"value" => array (
										'',
										'ID',
										'author',
										'title',
										'date',
										'modified',
										'rand' 
								),
								"description" => __ ( "Oderby arragement see <a href='https://codex.wordpress.org/Template_Tags/get_posts'>codex</a> for details", "pranon" ) 
						),
						array (
								"type" => "dropdown",
								"class" => "",
								"heading" => __ ( "Select Order", "pranon" ),
								"param_name" => "order",
								"value" => array (
										'',
										'ASC',
										'DESC' 
								),
								"description" => __ ( "Ascending or decending Order ", "pranon" ) 
						),
						array (
								"type" => "dropdown",
								"class" => "",
								"heading" => __ ( "Select Column", "pranon" ),
								"param_name" => "column",
								"value" => array (
										'',
										'1',
										'3' 
								),
								"description" => __ ( "Select Column Number to Show Blog Posts", "pranon" ) 
						),
						array (
								"type" => "textfield",
								"class" => "",
								"heading" => __ ( "Number Of posts", "pranon" ),
								"param_name" => "posts_per_page",
								"description" => __ ( "Number of posts should be shown in this section, numeric value", "pranon" ) 
						) 
				) 
		) );
		/**
		 * ************* ================ TWEETER SECTION ================== ***************
		 */
		vc_map ( array (
				"name" => __ ( "Pixel Tweet Feed", "pranon" ),
				"base" => "tweet_feed",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js' 
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css' 
				),
				"params" => array (
						array (
								"type" => "textfield",
								"class" => "",
								"heading" => __ ( "User Name", "pranon" ),
								"param_name" => "tweet_username",
								"description" => __ ( "User name of Tweeter account", "pranon" ) 
						),
						array (
								"type" => "textarea_html",
								"class" => "",
								"heading" => __ ( "Heading", "pranon" ),
								"param_name" => "content",
								"description" => __ ( "Heading Of This Section. Wrape it into 'h3' tag", "pranon" ) 
						) 
				) 
		) );
		/**
		 * ************* ================ INSTAGRAM SECTION ================== ***************
		 */
		/* vc_map ( array (
				"name" => __ ( "Pixel Instagram", "pranon" ),
				"base" => "instagram_feed",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js' 
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css' 
				),
				"params" => array (
						array (
								"type" => "textfield",
								"class" => "",
								"heading" => __ ( "Instagram Access Token", "pranon" ),
								"param_name" => "access_token",
								"description" => __ ( "Instagram Access Token", "pranon" ) 
						),
						array (
								"type" => "textfield",
								"class" => "",
								"heading" => __ ( "Instagram Client ID", "pranon" ),
								"param_name" => "client_id",
								"description" => __ ( "Enter Instagram Client ID", "pranon" ) 
						),
						array (
								"type" => "textarea_html",
								"class" => "",
								"heading" => __ ( "Heading", "pranon" ),
								"param_name" => "content",
								"description" => __ ( "Heading Of This Section. Wrap it into 'h3' tag", "pranon" ) 
						) 
				) 
		) ); */
		
		/**
		 * ********* =======Portfolio FILTER========== ******************
		 */
		
		vc_map ( array (
				"name" => __ ( "Pixel Portfolio Filter", "pranon" ),
				"base" => "portfolio_filter",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js' 
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css' 
				),
				"params" => array (
						array (
								"type" => "posttypes",
								"class" => "",
								"heading" => __ ( "Select Post Type of Portfolio", "pranon" ),
								"param_name" => "post_type",
								"description" => __ ( "Select Post Type of Portfolio", "pranon" ) 
						),
						array (
								"type" => "dropdown",
								"class" => "",
								"heading" => __ ( "Orderby", "pranon" ),
								"param_name" => "orderby",
								"value" => array (
										'',
										'ID',
										'author',
										'title',
										'date',
										'modified',
										'rand' 
								),
								"description" => __ ( "Oderby arragement see <a href='https://codex.wordpress.org/Template_Tags/get_posts'>codex</a> for details", "pranon" ) 
						),
						array (
								"type" => "dropdown",
								"class" => "",
								"heading" => __ ( "Select Order", "pranon" ),
								"param_name" => "order",
								"value" => array (
										'',
										'ASC',
										'DESC' 
								),
								"description" => __ ( "Ascending or decending Order ", "pranon" ) 
						),
						array (
								"type" => "pranon_custom_taxonomy",
								"class" => "",
								"heading" => __ ( "Select Custom Taxonomy", "pranon" ),
								"param_name" => "custom_taxonomy",
								"description" => __ ( "Select Custom Taxonomy", "pranon" ) 
						),
						array (
								"type" => "textfield",
								"class" => "",
								"heading" => __ ( "Number Of posts", "pranon" ),
								"param_name" => "posts_per_page",
								"description" => __ ( "Number of posts should be shown in this section, numeric value", "pranon" ) 
						),
						array (
								"type" => "dropdown",
								"class" => "",
								"heading" => __ ( "Select Image Size", "pranon" ),
								"param_name" => "img_size",
								"value" => array (
										'',
										'default',
										'large' 
								),
								"description" => __ ( "Select Portfolio Feature's Image Size ", "pranon" ) 
						) 
				) 
		) );
		
		/* =========== GET IN TOUCH ============= */
		vc_map ( array (
				"name" => __ ( "Pixel get in touch section", "pranon" ),
				"base" => "get_in_touch",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js' 
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css' 
				),
				"params" => array (
						array (
								"type" => "textfield",
								"holder" => "h1",
								"class" => "",
								"heading" => __ ( "Heading", "pranon" ),
								"param_name" => "heading",
								"description" => __ ( "Enter Suitable Heading Text", "pranon" ) 
						),
						array (
								"type" => "textfield",
								"holder" => "h1",
								"class" => "",
								"heading" => __ ( "Button Text", "pranon" ),
								"param_name" => "button_text",
								"description" => __ ( "Enter Suitable Button Text", "pranon" ) 
						),
						array (
								"type" => "textfield",
								"holder" => "h1",
								"class" => "",
								"heading" => __ ( "Button Url", "pranon" ),
								"param_name" => "button_url",
								"description" => __ ( "Enter Suitable URl for button click destination", "pranon" ) 
						),
						array (
								"type" => "dropdown",
								"class" => "",
								"heading" => __ ( "Select Theme", "pranon" ),
								"param_name" => "theme_g",
								"value" => array (
										'',
										'theme1',
										'theme2',
										'theme3',
										'theme4' 
								),
								"description" => __ ( "Select Theme for this section ", "pranon" ) 
						),
						array (
								"type" => "attach_image",
								"holder" => "img",
								"class" => "",
								"heading" => __ ( "Section Background Image", "pranon" ),
								"param_name" => "bg_img",
								"description" => __ ( "Section Background Image", "pranon" ),
								'dependency' => array (
										'element' => 'theme_g',
										'value' => 'theme3' 
								) 
						) 
				) 
		) );
		/**
		 * ******** ===================== TEAM ===================== *************
		 */
		vc_map ( array (
				"name" => __ ( "Pixel Team", "pranon" ),
				"base" => "pranon_team",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js' 
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css' 
				),
				"params" => array (
						array (
								"type" => "textfield",
								"holder" => "div",
								"class" => "",
								"heading" => __ ( "Team Member Name", "pranon" ),
								"param_name" => "name",
								"description" => __ ( "Name of Team Member", "pranon" )
						),
						array (
								"type" => "textfield",
								"holder" => "div",
								"class" => "",
								"heading" => __ ( "Designation of Team Member", "pranon" ),
								"param_name" => "designation",
								"description" => __ ( "Designation of Team Member,", "pranon" )
						),
						array (
								"type" => "textarea_html",
								"holder" => "div",
								"class" => "",
								"heading" => __ ( "About Team Member", "pranon" ),
								"param_name" => "content",
								"description" => __ ( "About Team Member, a short description", "pranon" ) 
						),
						array (
								"type" => "attach_image",
								"class" => "",
								"heading" => __ ( "Team Image", "pranon" ),
								"param_name" => "team_img",
								"value" => __ ( "", "pranon" ),
								"description" => __ ( "Images for Team Member", "pranon" ) 
						),
						array (
								"type" => "dropdown",
								"class" => "",
								"heading" => __ ( "Team Theme", "pranon" ),
								"param_name" => "theme_team",
								"value" => array (
										'',
										'theme1',
										'theme2' 
								),
								"description" => __ ( "Team Theme Choose", "pranon" ) 
						),
						array (
								"type" => "dropdown",
								"class" => "",
								"heading" => __ ( "Social Link", "pranon" ),
								"param_name" => "social_link",
								"value" => array (
										'',
										'yes',
										'no' 
								),
								"description" => __ ( "Social Link shows or not", "pranon" ) 
						),
						array (
								"type" => "exploded_textarea",
								"holder" => "h3",
								"class" => "",
								"heading" => __ ( "Social Icon Classes", "pranon" ),
								"param_name" => "social_icons",
								"description" => __ ( "Social Icon Classes multiple seperated by 'new line'.", "pranon" ),
								'dependency' => array (
										'element' => 'social_link',
										'value' => 'yes' 
								) 
						),
						array (
								"type" => "exploded_textarea",
								"holder" => "h3",
								"class" => "",
								"heading" => __ ( "Social Links", "pranon" ),
								"param_name" => "social_links",
								"description" => __ ( "Social links multiple seperated by 'new line'.", "pranon" ),
								'dependency' => array (
										'element' => 'social_link',
										'value' => 'yes' 
								) 
						) 
				) 
		) );
		/**
		 * ******** ===================== CLIENTS ===================== *************
		 */
		vc_map ( array (
				"name" => __ ( "Pixel Clients", "pranon" ),
				"base" => "pranon_clients",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js' 
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css' 
				),
				"params" => array (
						array (
								"type" => "textarea_html",
								"holder" => "div",
								"class" => "",
								"heading" => __ ( "Heading", "pranon" ),
								"param_name" => "content",
								"description" => __ ( "About Team Member, a short description", "pranon" ) 
						),
						array (
								"type" => "attach_images",
								"class" => "",
								"holder" => "img",
								"heading" => __ ( "Client Images", "pranon" ),
								"param_name" => "clients_img",
								"description" => __ ( "Images for Clients, set client link in 'CAPTION'", "pranon" ) 
						),
						array (
								"type" => "exploded_textarea",
								"holder" => "h3",
								"class" => "",
								"heading" => __ ( "Clients Links", "pranon" ),
								"param_name" => "clients_links",
								"description" => __ ( "Client links for multiple clients and seperated by 'new line'. Links should be sequential as client images", "pranon" ) 
						),
						array (
								"type" => "dropdown",
								"class" => "",
								"heading" => __ ( "Client Theme", "pranon" ),
								"param_name" => "theme_client",
								"value" => array (
										'',
										'theme1',
										'theme2' 
								),
								"description" => __ ( "Client Theme", "pranon" ) 
						) 
				) 
		) );
		/**
		 * ******** ===================== EXPERTIES ===================== *************
		 */
		vc_map ( array (
				"name" => __ ( "Pixel Experties", "pranon" ),
				"base" => "pixel_skill_exprties",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js' 
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css' 
				),
				"params" => array (
						array (
								"type" => "textarea_html",
								"holder" => "div",
								"class" => "",
								"heading" => __ ( "About Experties", "pranon" ),
								"param_name" => "content",
								"description" => __ ( "About Expert, a short description", "pranon" ) 
						),
						array (
								"type" => "textfield",
								"holder" => "h3",
								"class" => "",
								"heading" => __ ( "Icon Class", "pranon" ),
								"param_name" => "icon_class",
								"description" => __ ( "Experties's Icon Class from <a href='http://fontello.com/'>fonttello</a>", "pranon" ) 
						),
						array (
								"type" => "textfield",
								"class" => "",
								"heading" => __ ( "Expert Heading", "pranon" ),
								"param_name" => "skill_heading",
								"description" => __ ( "Experties's Name or Heading", "pranon" ) 
						) 
				) 
		) );
		
		/* ============= TESTIMONIALS ========== */
		vc_map ( array (
				"name" => __ ( "Pixel Testimonials", "pranon" ),
				"base" => "testimonial",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js'
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css'
				),
				"params" => array (
						array (
								"type" => "posttypes",
								"holder" => "h1",
								"class" => "",
								"heading" => __ ( "Select Post Type", "pranon" ),
								"param_name" => "post_type",
								"description" => __ ( "Select a Post Type", "pranon" )
						),
						array (
								"type" => "dropdown",
								"class" => "",
								"heading" => __ ( "Orderby", "pranon" ),
								"param_name" => "orderby",
								"value" => array (
										'',
										'ID',
										'author',
										'title',
										'date',
										'modified',
										'rand'
								),
								"description" => __ ( "Oderby arragement see <a href='https://codex.wordpress.org/Template_Tags/get_posts'>codex</a> for details", "pranon" )
						),
						array (
								"type" => "dropdown",
								"class" => "",
								"heading" => __ ( "Select Order", "pranon" ),
								"param_name" => "order",
								"value" => array (
										'',
										'ASC',
										'DESC'
								),
								"description" => __ ( "Ascending or decending Order ", "pranon" )
						),
						array (
								"type" => "textfield",
								"class" => "",
								"heading" => __ ( "Number Of posts", "pranon" ),
								"param_name" => "posts_per_page",
								"description" => __ ( "Number of posts should be shown in this section, numeric value", "pranon" )
						)
				)
		) );
		
		// ********* ====== ABOUT US INTRO ===================***************//
		vc_map ( array (
				"name" => __ ( "Pixel About Us Intro", "pranon" ),
				"base" => "about_us_intro",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js'
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css'
				),
				"params" => array (
						array (
								"type" => "textfield",
								"holder" => "div",
								"class" => "",
								"heading" => __ ( "Heading", "pranon" ),
								"param_name" => "intro_heading",
								"description" => __ ( "Heading of introduction", "pranon" )
						),
						array (
								"type" => "textarea_html",
								"holder" => "div",
								"class" => "",
								"heading" => __ ( "Introduction", "pranon" ),
								"param_name" => "content",
								"description" => __ ( "Introduction About Us", "pranon" )
						),
						array (
								"type" => "attach_images",
								"class" => "",
								"heading" => __ ( "Images", "pranon" ),
								"param_name" => "intro_img",
								"value" => __ ( "", "pranon" ),
								"description" => __ ( "Images for slide", "pranon" )
						)
				)
		) );
		
		/**
		 * ******** ===================== FUN FACTS ===================== *************
		 */
		vc_map ( array (
				"name" => __ ( "Pixel Fun Facts", "pranon" ),
				"base" => "pixel_fun_facts",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js'
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css'
				),
				"params" => array (
						array (
								"type" => "textfield",
								"holder" => "h3",
								"class" => "",
								"heading" => __ ( "Fact Heading", "pranon" ),
								"param_name" => "fun_heading",
								"description" => __ ( "Heading About fact or fun", "pranon" )
						),
						array (
								"type" => "textfield",
								"holder" => "i",
								"class" => "",
								"heading" => __ ( "Icon Class", "pranon" ),
								"param_name" => "fun_icon_class",
								"description" => __ ( "Fun or fact's Icon Class from <a href='http://fontello.com/'>fonttello</a>", "pranon" )
						),
						array (
								"type" => "textfield",
								"class" => "",
								"heading" => __ ( "Number", "pranon" ),
								"param_name" => "fun_count",
								"description" => __ ( "Number of fun or fact happened, number should be NUMERIC", "pranon" )
						)
				)
		) );
		/**
		 * ******** ===================== FUN FACTS ===================== *************
		 */
		vc_map ( array (
				"name" => __ ( "Pixel Price Table", "pranon" ),
				"base" => "price_table",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js'
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css'
				),
				"params" => array (
						array (
								"type" => "textfield",
								"holder" => "h3",
								"class" => "",
								"heading" => __ ( "Validity", "pranon" ),
								"param_name" => "price_validity",
								"description" => __ ( "Validity e.g per month, year, day etc.", "pranon" )
						),
						array (
								"type" => "textfield",
								"holder" => "i",
								"class" => "",
								"heading" => __ ( "Amount", "pranon" ),
								"param_name" => "price_amount",
								"description" => __ ( "Amount, should be numeric", "pranon" )
						),
						array (
								"type" => "textfield",
								"class" => "",
								"heading" => __ ( "Currency", "pranon" ),
								"param_name" => "price_currency",
								"description" => __ ( "Currency Symbol e.g $.", "pranon" )
						),
						array (
								"type" => "textfield",
								"class" => "",
								"heading" => __ ( "Sign Up Url", "pranon" ),
								"param_name" => "sign_up_button_url",
								"description" => __ ( "Give the sign up url to get access", "pranon" )
						),
						array (
								"type" => "textfield",
								"class" => "",
								"heading" => __ ( "Sign Up Text", "pranon" ),
								"param_name" => "sign_up_button_text",
								"description" => __ ( "Give the sign up text", "pranon" )
						),
						array (
								"type" => "textfield",
								"class" => "",
								"heading" => __ ( "Plan Name", "pranon" ),
								"param_name" => "plane_name",
								"description" => __ ( "Name of the plan e.g. Premium, Standard, Basic etc.", "pranon" )
						),
						array (
								"type" => "exploded_textarea",
								"holder" => "h3",
								"class" => "",
								"heading" => __ ( "Offered Options", "pranon" ),
								"param_name" => "options",
								"description" => __ ( "Offered Options, Multiple options seperated by new line", "pranon" )
						),
						array (
								"type" => "dropdown",
								"class" => "",
								"heading" => __ ( "This plan highilited?", "pranon" ),
								"param_name" => "highlight",
								"value" => array (
										'',
										'yes',
										'no'
								),
								"description" => __ ( "This plan highilited or not", "pranon" )
						),
						array (
								"type" => "dropdown",
								"class" => "",
								"heading" => __ ( "Price Table Theme", "pranon" ),
								"param_name" => "plan_theme",
								"value" => array (
										'',
										'theme1',
										'theme2'
								),
								"description" => __ ( "Choose Price Table Theme", "pranon" )
						)
				)
		) );
		/**
		 * ******** ===================== GET SOCIAL WITH US ===================== *************
		 */
		vc_map ( array (
				"name" => __ ( "Pixel Social Link Section", "pranon" ),
				"base" => "get_social_with_us",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js'
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css'
				),
				"params" => array (
						array (
								"type" => "textfield",
								"holder" => "h3",
								"class" => "",
								"heading" => __ ( "Heading", "pranon" ),
								"param_name" => "social_heading",
								"description" => __ ( "Heading of this section", "pranon" )
						),
						array (
								"type" => "exploded_textarea",
								"holder" => "h3",
								"class" => "",
								"heading" => __ ( "Social Icon Classes", "pranon" ),
								"param_name" => "social_icon_class",
								"description" => __ ( "Icon Class from <a href='http://fontello.com/'>fonttello</a>, Multiple options seperated by new line", "pranon" )
						),
						array (
								"type" => "exploded_textarea",
								"holder" => "h3",
								"class" => "",
								"heading" => __ ( "Social Links", "pranon" ),
								"param_name" => "social_links",
								"description" => __ ( "Social Links, should be same number as icon classes, Multiple options seperated by new line", "pranon" )
						)
				)
		) );
		/**
		 * ******** ===================== ADDITIONAL SERVICES ===================== *************
		 */
		vc_map ( array (
				"name" => __ ( "Pixel Additional Services", "pranon" ),
				"base" => "additional_services",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js'
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css'
				),
				"params" => array (
						array (
								"type" => "textfield",
								"holder" => "h3",
								"class" => "",
								"heading" => __ ( "Heading", "pranon" ),
								"param_name" => "service_heading",
								"description" => __ ( "Heading of particular service", "pranon" )
						),
						array (
								"type" => "textarea_html",
								"holder" => "div",
								"class" => "",
								"heading" => __ ( "Content", "pranon" ),
								"param_name" => "content",
								"description" => __ ( "Content bellow the heading", "pranon" )
						),
						array (
								"type" => "textfield",
								"holder" => "i",
								"class" => "",
								"heading" => __ ( "Icon Classe", "pranon" ),
								"param_name" => "icon_class",
								"description" => __ ( "Icon Class from <a href='http://fontello.com/'>fonttello</a>", "pranon" )
						),
						array (
								"type" => "dropdown",
								"class" => "",
								"heading" => __ ( "Choose Theme", "pranon" ),
								"param_name" => "theme_service",
								"value" => array (
										'',
										'theme1',
										'theme2'
								),
								"description" => __ ( "Choose a theme", "pranon" )
						),
						array (
								"type" => "textfield",
								"holder" => "h3",
								"class" => "",
								"heading" => __ ( "Button Url", "pranon" ),
								"param_name" => "button_url",
								"description" => __ ( "Browse button url.", "pranon" ),
								'dependency' => array (
										'element' => 'theme_service',
										'value' => 'theme1'
								)
						),
						array (
								"type" => "textfield",
								"holder" => "h3",
								"class" => "",
								"heading" => __ ( "Button Text", "pranon" ),
								"param_name" => "button_text",
								"description" => __ ( "Browse button text.", "pranon" ),
								'dependency' => array (
										'element' => 'theme_service',
										'value' => 'theme1'
								)
						)
						
				)
		) );
		/**
		 * ******** ===================== ADDITIONAL SERVICES ===================== *************
		 */
		vc_map ( array (
				"name" => __ ( "Pixel Custom Page Heading", "pranon" ),
				"base" => "custom_page_header",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js'
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css'
				),
				"params" => array (
						array (
								"type" => "textfield",
								"holder" => "h3",
								"class" => "",
								"heading" => __ ( "Heading", "pranon" ),
								"param_name" => "page_heading",
								"description" => __ ( "Heading of particular Page", "pranon" )
						),
						array (
								"type" => "textarea_html",
								"holder" => "div",
								"class" => "",
								"heading" => __ ( "Content", "pranon" ),
								"param_name" => "content",
								"description" => __ ( "Content shows bellow the heading", "pranon" )
						),
						array (
								"type" => "attach_image",
								"class" => "",
								"heading" => __ ( "Image", "pranon" ),
								"param_name" => "page_img",
								"value" => __ ( "", "pranon" ),
								"description" => __ ( "Images Like Logo, should no large", "pranon" ) 
						)
				)
		) );
		
		/* =================== CONTACT ===================== */
		
		vc_map ( array (
				"name" => __ ( "Pixel Contact Section", "pranon" ),
				"base" => "contact",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js'
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css'
				),
				"params" => array (
						array (
								"type" => "textfield",
								"class" => "h3",
								"heading" => __ ( "Form Icon Class", "pranon" ),
								"param_name" => "contact_icon_class",
								"description" => __ ( "Icon Class from <a href='http://fontello.com/'>fonttello</a>", "pranon" )
						),
						array (
								"type" => "textfield",
								"class" => "h3",
								"heading" => __ ( "Form Heading", "pranon" ),
								"param_name" => "form_heading",
								"description" => __ ( "At top of the form, Heading", "pranon" )
						),
						array (
								"type" => "textfield",
								"class" => "p",
								"heading" => __ ( "Form Short Description", "pranon" ),
								"param_name" => "form_para",
								"description" => __ ( "Form Short Description", "pranon" )
						),
						array (
								"type" => "textarea_html",
								"class" => "",
								"heading" => __ ( "Contact form 7 Shortcode", "pranon" ),
								"param_name" => "content",
								"description" => __ ( "Contact form 7 Shortcode", "pranon" )
						)
				)
		) );
		
		/* =================== CONTACT INFO ===================== */
		
		vc_map ( array (
				"name" => __ ( "Pixel Contact Info Section", "pranon" ),
				"base" => "contact_info",
				"class" => "",
				"category" => __ ( "Pixel", "pranon" ),
				'admin_enqueue_js' => array (
						get_template_directory_uri () . '/vc_extend/bartag.js'
				),
				'admin_enqueue_css' => array (
						get_template_directory_uri () . '/vc_extend/bartag.css'
				),
				"params" => array (
						array (
								"type" => "textfield",
								"class" => "h3",
								"heading" => __ ( "Icon Class", "pranon" ),
								"param_name" => "contact_icon_class",
								"description" => __ ( "Icon Class from <a href='http://fontello.com/'>fonttello</a>", "pranon" )
						),
						array (
								"type" => "textfield",
								"class" => "h3",
								"heading" => __ ( "Contact Info", "pranon" ),
								"param_name" => "contact_info",
								"description" => __ ( "Contact Info, such like phone number", "pranon" )
						),
						array (
								"type" => "textfield",
								"class" => "a",
								"heading" => __ ( "Contact Url", "pranon" ),
								"param_name" => "contact_url",
								"description" => __ ( "Contact info's URL, like website need a url. If url not needed then left it blank", "pranon" )
						)
				)
		) );
	}
}