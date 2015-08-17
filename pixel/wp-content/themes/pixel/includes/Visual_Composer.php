<?php
class Visual_Composer {
	static function add_shortcode_to_VC() {
		
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
		/*************** ================ TWEETER SECTION ================== ****************/
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
		/*************** ================ INSTAGRAM SECTION ================== ****************/
		vc_map ( array (
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
		) );
	}
}