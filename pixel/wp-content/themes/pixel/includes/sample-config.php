<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if (! class_exists ( 'Redux' )) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = "pranon_demo";

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters ( 'redux_demo/opt_name', $opt_name );

/*
 *
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 *
 */

$sampleHTML = '';
if (file_exists ( dirname ( __FILE__ ) . '/info-html.html' )) {
	Redux_Functions::initWpFilesystem ();
	
	global $wp_filesystem;
	
	$sampleHTML = $wp_filesystem->get_contents ( dirname ( __FILE__ ) . '/info-html.html' );
}

// Background Patterns Reader
$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
$sample_patterns_url = ReduxFramework::$_url . '../sample/patterns/';
$sample_patterns = array ();

if (is_dir ( $sample_patterns_path )) {
	
	if ($sample_patterns_dir = opendir ( $sample_patterns_path )) {
		$sample_patterns = array ();
		
		while ( ($sample_patterns_file = readdir ( $sample_patterns_dir )) !== false ) {
			
			if (stristr ( $sample_patterns_file, '.png' ) !== false || stristr ( $sample_patterns_file, '.jpg' ) !== false) {
				$name = explode ( '.', $sample_patterns_file );
				$name = str_replace ( '.' . end ( $name ), '', $sample_patterns_file );
				$sample_patterns [] = array (
						'alt' => $name,
						'img' => $sample_patterns_url . $sample_patterns_file 
				);
			}
		}
	}
}

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 */

$theme = wp_get_theme (); // For use with some settings. Not necessary.

$args = array (
		// TYPICAL -> Change these values as you need/desire
		'opt_name' => $opt_name,
		// This is where your data is stored in the database and also becomes your global variable name.
		'display_name' => $theme->get ( 'Name' ),
		// Name that appears at the top of your panel
		'display_version' => $theme->get ( 'Version' ),
		// Version that appears at the top of your panel
		'menu_type' => 'menu',
		// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
		'allow_sub_menu' => true,
		// Show the sections below the admin menu item or not
		'menu_title' => __ ( 'Pranon Theme Options', 'redux-framework-demo' ),
		'page_title' => __ ( 'Pranon Theme Options', 'redux-framework-demo' ),
		// You will need to generate a Google API key to use this feature.
		// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
		'google_api_key' => '',
		// Set it you want google fonts to update weekly. A google_api_key value is required.
		'google_update_weekly' => false,
		// Must be defined to add google fonts to the typography module
		'async_typography' => true,
		// Use a asynchronous font on the front end or font string
		// 'disable_google_fonts_link' => true, // Disable this in case you want to create your own google fonts loader
		'admin_bar' => true,
		// Show the panel pages on the admin bar
		'admin_bar_icon' => 'dashicons-portfolio',
		// Choose an icon for the admin bar menu
		'admin_bar_priority' => 50,
		// Choose an priority for the admin bar menu
		'global_variable' => '',
		// Set a different name for your global variable other than the opt_name
		'dev_mode' => false,
		// Show the time the page took to load, etc
		'update_notice' => false,
		// If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
		'customizer' => true,
		// Enable basic customizer support
		// 'open_expanded' => true, // Allow you to start the panel in an expanded way initially.
		// 'disable_save_warn' => true, // Disable the save warning when a user changes a field
		
		// OPTIONAL -> Give you extra features
		'page_priority' => null,
		// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
		'page_parent' => 'themes.php',
		// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
		'page_permissions' => 'manage_options',
		// Permissions needed to access the options panel.
		'menu_icon' => '',
		// Specify a custom URL to an icon
		'last_tab' => '',
		// Force your panel to always open to a specific tab (by id)
		'page_icon' => 'icon-themes',
		// Icon displayed in the admin panel next to your menu_title
		'page_slug' => '',
		// Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
		'save_defaults' => true,
		// On load save the defaults to DB before user clicks save or not
		'default_show' => false,
		// If true, shows the default value next to each field that is not the default value.
		'default_mark' => '',
		// What to print by the field's title if the value shown is default. Suggested: *
		'show_import_export' => true,
		// Shows the Import/Export panel when not used as a field.
		
		// CAREFUL -> These options are for advanced use only
		'transient_time' => 60 * MINUTE_IN_SECONDS,
		'output' => true,
		// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
		'output_tag' => true,
		// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
		// 'footer_credit' => '', // Disable the footer credit of Redux. Please leave if you can help it.
		
		// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
		'database' => '',
		// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
		'use_cdn' => true,
		// If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
		
		// HINTS
		'hints' => array (
				'icon' => 'el el-question-sign',
				'icon_position' => 'right',
				'icon_color' => 'lightgray',
				'icon_size' => 'normal',
				'tip_style' => array (
						'color' => 'red',
						'shadow' => true,
						'rounded' => false,
						'style' => '' 
				),
				'tip_position' => array (
						'my' => 'top left',
						'at' => 'bottom right' 
				),
				'tip_effect' => array (
						'show' => array (
								'effect' => 'slide',
								'duration' => '500',
								'event' => 'mouseover' 
						),
						'hide' => array (
								'effect' => 'slide',
								'duration' => '500',
								'event' => 'click mouseleave' 
						) 
				) 
		) 
);

// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
$args ['admin_bar_links'] [] = array (
		'id' => 'redux-docs',
		'href' => 'http://docs.reduxframework.com/',
		'title' => __ ( 'Documentation', 'redux-framework-demo' ) 
);

$args ['admin_bar_links'] [] = array (
		// 'id' => 'redux-support',
		'href' => 'https://github.com/ReduxFramework/redux-framework/issues',
		'title' => __ ( 'Support', 'redux-framework-demo' ) 
);

$args ['admin_bar_links'] [] = array (
		'id' => 'redux-extensions',
		'href' => 'reduxframework.com/extensions',
		'title' => __ ( 'Extensions', 'redux-framework-demo' ) 
);

// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
$args ['share_icons'] [] = array (
		'url' => 'https://github.com/ReduxFramework/ReduxFramework',
		'title' => 'Visit us on GitHub',
		'icon' => 'el el-github' 
);
// 'img' => '', // You can use icon OR img. IMG needs to be a full URL.

$args ['share_icons'] [] = array (
		'url' => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
		'title' => 'Like us on Facebook',
		'icon' => 'el el-facebook' 
);
$args ['share_icons'] [] = array (
		'url' => 'http://twitter.com/reduxframework',
		'title' => 'Follow us on Twitter',
		'icon' => 'el el-twitter' 
);
$args ['share_icons'] [] = array (
		'url' => 'http://www.linkedin.com/company/redux-framework',
		'title' => 'Find us on LinkedIn',
		'icon' => 'el el-linkedin' 
);

// Panel Intro text -> before the form
if (! isset ( $args ['global_variable'] ) || $args ['global_variable'] !== false) {
	if (! empty ( $args ['global_variable'] )) {
		$v = $args ['global_variable'];
	} else {
		$v = str_replace ( '-', '_', $args ['opt_name'] );
	}
	$args ['intro_text'] = sprintf ( __ ( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
} else {
	$args ['intro_text'] = __ ( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
}

// Add content after the form.
$args ['footer_text'] = __ ( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );

Redux::setArgs ( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */

$tabs = array (
		array (
				'id' => 'redux-help-tab-1',
				'title' => __ ( 'Theme Information 1', 'redux-framework-demo' ),
				'content' => __ ( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' ) 
		),
		array (
				'id' => 'redux-help-tab-2',
				'title' => __ ( 'Theme Information 2', 'redux-framework-demo' ),
				'content' => __ ( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' ) 
		) 
);
Redux::setHelpTab ( $opt_name, $tabs );

// Set the help sidebar
$content = __ ( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
Redux::setHelpSidebar ( $opt_name, $content );

/*
 * <--- END HELP TABS
 */

/*
 *
 * ---> START SECTIONS
 *
 */

/*
 *
 * As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
 *
 *
 */

// -> START Basic Fields
Redux::setSection ( $opt_name, array (
		'title' => __ ( 'Basic Fields', 'redux-framework-demo' ),
		'id' => 'basic',
		'desc' => __ ( 'These are really basic fields!', 'redux-framework-demo' ),
		'customizer_width' => '400px',
		'icon' => 'el el-home' 
) );

Redux::setSection ( $opt_name, array (
		'title' => __ ( 'Logo and Images', 'redux-framework-demo' ),
		'id' => 'logo-images',
		'subsection' => true,
		'customizer_width' => '450px',
		'fields' => array (
				array (
						'id' => 'logo',
						'type' => 'media',
						'title' => __ ( 'Upload Image For Logo', 'redux-framework-demo' ),
						'full_width' => true,
						'mode' => false,
						// Can be set to false to allow any media type, or can also be set to any mime type.
						'desc' => __ ( 'Basic media uploader with disabled URL input field.', 'redux-framework-demo' ),
						'subtitle' => __ ( 'Upload any media using the WordPress native uploader', 'redux-framework-demo' ) 
				),
				array (
						'id' => 'favicon',
						'type' => 'media',
						'title' => __ ( 'Upload Image For Favicon', 'redux-framework-demo' ),
						'full_width' => true,
						'mode' => false,
						// Can be set to false to allow any media type, or can also be set to any mime type.
						'desc' => __ ( 'Basic media uploader with disabled URL input field.', 'redux-framework-demo' ),
						'subtitle' => __ ( 'Upload any media using the WordPress native uploader', 'redux-framework-demo' ) 
				) 
		) 
) );
Redux::setSection ( $opt_name, array (
		'title' => __ ( 'Share Option', 'redux-framework-demo' ),
		'id' => 'share-options',
		'subsection' => true,
		'customizer_width' => '450px',
		'fields' => array (
				array (
						'id' => 'opt-required-nested',
						'type' => 'switch',
						'title' => 'Share option On/Off',
						'subtitle' => 'Click <code>On</code> to see another set of options appear.',
						'default' => false 
				),
				
				array (
						'id' => 'social-share',
						'type' => 'sortable',
						'mode' => 'checkbox', // checkbox or text
						'title' => __ ( 'Multi Social Share Options', 'redux-framework-demo' ),
						'subtitle' => __ ( 'Select Social Share that shows on Blog Single Page', 'redux-framework-demo' ),
						'desc' => __ ( 'Select Social Share that shows on Blog Single and portfolio single Page', 'redux-framework-demo' ),
						// Must provide key => value pairs for multi checkbox options
						'options' => array (
								'icon-twitter' => 'Twitter',
								'icon-facebook' => 'Facebook',
								'icon-gplus' => 'G+',
								'icon-linkedin' => 'LinkedIn' 
						),
						'required' => array (
								'opt-required-nested',
								'=',
								true 
						) 
				) 
		) 
) );
Redux::setSection ( $opt_name, array (
		'title' => __ ( 'Product Page', 'redux-framework-demo' ),
		'id' => 'product-option',
		'subsection' => true,
		'customizer_width' => '450px',
		'fields' => array (
				array(
						'id'       => 'number-of-product',
						'type'     => 'text',
						'title'    => __( 'How many Product shows on shop page', 'redux-framework-demo' ),
						'subtitle' => __( 'This must be numeric.', 'redux-framework-demo' ),
						'desc'     => __( 'How many Product shows on shop page', 'redux-framework-demo' ),
						'validate' => 'numeric',
						'default'  => '4',
				)
		)
) );
Redux::setSection ( $opt_name, array (
		'title' => __ ( 'Footer and Social', 'redux-framework-demo' ),
		'id' => 'footer',
		'subsection' => true,
		'customizer_width' => '450px',
		'fields' => array (
				array (
						'id' => 'copyright',
						'type' => 'editor',
						'title' => __ ( 'Footer Copyright Note', 'redux-framework-demo' ),
						'subtitle' => __ ( 'Use any of the features of WordPress editor inside your panel!', 'redux-framework-demo' ),
						'default' => 'Powered by Webpentagon.',
						'args' => array (
								'wpautop' => false,
								'media_buttons' => false,
								'textarea_rows' => 5,
								// 'tabindex' => 1,
								// 'editor_css' => '',
								'teeny' => false,
								// 'tinymce' => array(),
								'quicktags' => false 
						) 
				),
				array (
						'id' => 'social-icons',
						'type' => 'sortable',
						'mode' => 'checkbox', // checkbox or text
						'title' => __ ( 'Multi Social Options', 'redux-framework-demo' ),
						'subtitle' => __ ( 'Select Social Networks that show on Footer ', 'redux-framework-demo' ),
						'desc' => __ ( 'Select Social Networks that show on Footer', 'redux-framework-demo' ),
						// Must provide key => value pairs for multi checkbox options
						'options' => array (
								'icon-twitter' => 'Twitter',
								'icon-facebook' => 'Facebook',
								'icon-gplus' => 'G+',
								'icon-instagram' => 'Instagram',
								'icon-pinterest' => 'Pinterest',
								'icon-skype' => 'Skype',
								'icon-linkedin' => 'LinkedIn',
								'icon-dropbox' => 'Dropbox',
								'icon-vimeo' => 'Vimeo',
								'icon-dribbble' => 'Dribble',
								'icon-tumblr' => 'Tumblr',
								'icon-whatsapp' => 'Watsapp',
								'icon-yahoo' => 'Yahoo',
								'icon-digg' => 'Digg' 
						) 
				),
				array (
						'id' => 'social-links',
						'type' => 'textarea',
						'title' => __ ( 'Social Links', 'redux-framework-demo' ),
						'subtitle' => __ ( 'Sequentialy added selected social links', 'redux-framework-demo' ),
						'desc' => __ ( 'Sequentialy added selected social links, Seperated links with ","', 'redux-framework-demo' ),
						'default' => '#tw, #fb, #g, #ins, #pin, #sky, #link, #drop, #vimeo' 
				),
				
				array (
						'id' => 'tweet-consumer-key',
						'type' => 'text',
						'title' => __ ( 'Consumer Key', 'redux-framework-demo' ),
						'subtitle' => __ ( 'Specify Consumer Key <a href="https://dev.twitter.com/apps">dev.twitter.com/apps.</a>.', 'redux-framework-demo' ),
						'default' => 'SFZ1wIxcjPlOOOB8qhbwFG2SW' 
				),
				array (
						'id' => 'tweet-consumer-secret',
						'type' => 'text',
						'title' => __ ( 'Consumer Kye secret', 'redux-framework-demo' ),
						'subtitle' => __ ( 'Specify Consumer Kye secret <a href="https://dev.twitter.com/apps">dev.twitter.com/apps.</a>.', 'redux-framework-demo' ),
						'default' => 'ktEvETDXmL7ptAAFsvsf6WIG2lSrgQX6XWAqsCwRcbNrLo3DKt' 
				),
				array (
						'id' => 'tweet-access-token',
						'type' => 'text',
						'title' => __ ( 'Access Token', 'redux-framework-demo' ),
						'subtitle' => __ ( 'Specify Access Token <a href="https://dev.twitter.com/apps">dev.twitter.com/apps.</a>.', 'redux-framework-demo' ),
						'default' => '2432163216-hWb30FjLsns7A6R0v7EtgJQQuCdhJ2I6ndbknTH' 
				),
				array (
						'id' => 'tweet-access-secret',
						'type' => 'text',
						'title' => __ ( 'Access Token Secret', 'redux-framework-demo' ),
						'subtitle' => __ ( 'Specify Access Token Secret <a href="https://dev.twitter.com/apps">dev.twitter.com/apps.</a>.', 'redux-framework-demo' ),
						'default' => '1GJxq12RjiaQcDOedWPj62mDvWpOL4YajQZQI5bNPJ7JZ' 
				) 
		) 
) );

Redux::setSection ( $opt_name, array (
		'title' => __ ( 'Single Page', 'redux-framework-demo' ),
		'id' => 'single-page',
		'subsection' => true,
		'customizer_width' => '450px',
		'fields' => array (
				array (
						'id' => 'notfound-single-parallax',
						'type' => 'media',
						'title' => __ ( 'Upload Image For 404', 'redux-framework-demo' ),
						'full_width' => true,
						'mode' => false,
						// Can be set to false to allow any media type, or can also be set to any mime type.
						'desc' => __ ( '404 page, change parallax image', 'redux-framework-demo' ),
						'subtitle' => __ ( 'Upload any media using the WordPress native uploader', 'redux-framework-demo' ) 
				),
				array (
						'id' => 'opt-divide',
						'type' => 'divide' 
				),
				array (
						'id' => 'shop-single-parallax',
						'type' => 'media',
						'title' => __ ( 'Upload Image For Shop Page', 'redux-framework-demo' ),
						'full_width' => true,
						'mode' => false,
						// Can be set to false to allow any media type, or can also be set to any mime type.
						'desc' => __ ( 'Product or Shop page, change parallax image', 'redux-framework-demo' ),
						'subtitle' => __ ( 'Upload any media using the WordPress native uploader', 'redux-framework-demo' ) 
				),
				array (
						'id' => 'opt-divide',
						'type' => 'divide' 
				),
				array (
						'id' => 'archive-single-parallax',
						'type' => 'media',
						'title' => __ ( 'Upload Image For Archive Page', 'redux-framework-demo' ),
						'full_width' => true,
						'mode' => false,
						// Can be set to false to allow any media type, or can also be set to any mime type.
						'desc' => __ ( 'Archive page, change parallax image', 'redux-framework-demo' ),
						'subtitle' => __ ( 'Upload any media using the WordPress native uploader', 'redux-framework-demo' ) 
				),
				array (
						'id' => 'opt-divide',
						'type' => 'divide' 
				),
				array (
						'id' => 'tag-single-parallax',
						'type' => 'media',
						'title' => __ ( 'Upload Image For Tag Page', 'redux-framework-demo' ),
						'full_width' => true,
						'mode' => false,
						// Can be set to false to allow any media type, or can also be set to any mime type.
						'desc' => __ ( 'Tag page, change parallax image', 'redux-framework-demo' ),
						'subtitle' => __ ( 'Upload any media using the WordPress native uploader', 'redux-framework-demo' ) 
				),
				array (
						'id' => 'opt-divide',
						'type' => 'divide' 
				),
				array (
						'id' => 'category-single-parallax',
						'type' => 'media',
						'title' => __ ( 'Upload Image For Category Page', 'redux-framework-demo' ),
						'full_width' => true,
						'mode' => false,
						// Can be set to false to allow any media type, or can also be set to any mime type.
						'desc' => __ ( 'Category page, change parallax image', 'redux-framework-demo' ),
						'subtitle' => __ ( 'Upload any media using the WordPress native uploader', 'redux-framework-demo' ) 
				) ,
				array (
						'id' => 'sidebar',
						'type' => 'switch',
						'title' => 'Show Or Hide Sidebar',
						'subtitle' => 'Show or hide sidebar in blog details page. On means show sidebar.',
						'default' => true
				),
		) 
) );

Redux::setSection ( $opt_name, array (
		'title' => __ ( 'Custom CSS', 'redux-framework-demo' ),
		'id' => 'custom-css',
		'subsection' => true,
		'customizer_width' => '450px',
		'fields' => array (
				array (
						'id' => 'opt-ace-editor-css',
						'type' => 'ace_editor',
						'title' => __ ( 'CSS Code', 'redux-framework-demo' ),
						'subtitle' => __ ( 'Paste your CSS code here.', 'redux-framework-demo' ),
						'mode' => 'css',
						'theme' => 'monokai',
						'desc' => 'Possible modes can be found at <a href="' . 'http://' . 'ace.c9.io" target="_blank">' . 'http://' . 'ace.c9.io/</a>.',
						'default' => "#id11{\n   margin: 0 auto;\n}" 
				) 
		) 
) );

// -> START Presentation Fields
Redux::setSection ( $opt_name, array (
		'title' => __ ( 'Presentation Fields', 'redux-framework-demo' ),
		'id' => 'presentation',
		'desc' => __ ( '', 'redux-framework-demo' ),
		'icon' => 'el el-screen' 
) );

Redux::setSection ( $opt_name, array (
		'title' => __ ( 'Divide', 'redux-framework-demo' ),
		'id' => 'presentation-divide',
		'desc' => __ ( 'The spacer to the section menu as seen to the left (after this section block) is the divide "section". Also the divider below is the divide "field".', 'redux-framework-demo' ) . '<br />' . __ ( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/divide/" target="_blank">docs.reduxframework.com/core/fields/divide/</a>',
		'subsection' => true,
		'fields' => array (
				array (
						'id' => 'opt-divide',
						'type' => 'divide' 
				) 
		) 
) );

Redux::setSection ( $opt_name, array (
		'title' => __ ( 'Info', 'redux-framework-demo' ),
		'id' => 'presentation-info',
		'desc' => __ ( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/info/" target="_blank">docs.reduxframework.com/core/fields/info/</a>',
		'subsection' => true,
		'fields' => array (
				array (
						'id' => 'opt-info-field',
						'type' => 'info',
						'desc' => __ ( 'This is the info field, if you want to break sections up.', 'redux-framework-demo' ) 
				),
				array (
						'id' => 'opt-notice-info1',
						'type' => 'info',
						'style' => 'info',
						'title' => __ ( 'This is a title.', 'redux-framework-demo' ),
						'desc' => __ ( 'This is an info field with the <strong>info</strong> style applied. By default the <strong>normal</strong> style is applied.', 'redux-framework-demo' ) 
				),
				array (
						'id' => 'opt-info-warning',
						'type' => 'info',
						'style' => 'warning',
						'title' => __ ( 'This is a title.', 'redux-framework-demo' ),
						'desc' => __ ( 'This is an info field with the <strong>warning</strong> style applied.', 'redux-framework-demo' ) 
				),
				array (
						'id' => 'opt-info-success',
						'type' => 'info',
						'style' => 'success',
						'icon' => 'el el-info-circle',
						'title' => __ ( 'This is a title.', 'redux-framework-demo' ),
						'desc' => __ ( 'This is an info field with the <strong>success</strong> style applied and an icon.', 'redux-framework-demo' ) 
				),
				array (
						'id' => 'opt-info-critical',
						'type' => 'info',
						'style' => 'critical',
						'icon' => 'el el-info-circle',
						'title' => __ ( 'This is a title.', 'redux-framework-demo' ),
						'desc' => __ ( 'This is an info field with the <strong>critical</strong> style applied and an icon.', 'redux-framework-demo' ) 
				),
				array (
						'id' => 'opt-info-custom',
						'type' => 'info',
						'style' => 'custom',
						'color' => 'purple',
						'icon' => 'el el-info-circle',
						'title' => __ ( 'This is a title.', 'redux-framework-demo' ),
						'desc' => __ ( 'This is an info field with the <strong>custom</strong> style applied, color arg passed, and an icon.', 'redux-framework-demo' ) 
				),
				array (
						'id' => 'opt-info-normal',
						'type' => 'info',
						'notice' => false,
						'title' => __ ( 'This is a title.', 'redux-framework-demo' ),
						'desc' => __ ( 'This is an info non-notice field with the <strong>normal</strong> style applied.', 'redux-framework-demo' ) 
				),
				array (
						'id' => 'opt-notice-info',
						'type' => 'info',
						'notice' => false,
						'style' => 'info',
						'title' => __ ( 'This is a title.', 'redux-framework-demo' ),
						'desc' => __ ( 'This is an info non-notice field with the <strong>info</strong> style applied.', 'redux-framework-demo' ) 
				),
				array (
						'id' => 'opt-notice-warning',
						'type' => 'info',
						'notice' => false,
						'style' => 'warning',
						'icon' => 'el el-info-circle',
						'title' => __ ( 'This is a title.', 'redux-framework-demo' ),
						'desc' => __ ( 'This is an info non-notice field with the <strong>warning</strong> style applied and an icon.', 'redux-framework-demo' ) 
				),
				array (
						'id' => 'opt-notice-success',
						'type' => 'info',
						'notice' => false,
						'style' => 'success',
						'icon' => 'el el-info-circle',
						'title' => __ ( 'This is a title.', 'redux-framework-demo' ),
						'desc' => __ ( 'This is an info non-notice field with the <strong>success</strong> style applied and an icon.', 'redux-framework-demo' ) 
				),
				array (
						'id' => 'opt-notice-critical',
						'type' => 'info',
						'notice' => false,
						'style' => 'critical',
						'icon' => 'el el-info-circle',
						'title' => __ ( 'This is a title.', 'redux-framework-demo' ),
						'desc' => __ ( 'This is an non-notice field with the <strong>critical</strong> style applied and an icon.', 'redux-framework-demo' ) 
				) 
		) 
) );

Redux::setSection ( $opt_name, array (
		'title' => __ ( 'Section', 'redux-framework-demo' ),
		'id' => 'presentation-section',
		'desc' => __ ( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/section/" target="_blank">docs.reduxframework.com/core/fields/section/</a>',
		'subsection' => true,
		'fields' => array (
				array (
						'id' => 'section-start',
						'type' => 'section',
						'title' => __ ( 'Section Example', 'redux-framework-demo' ),
						'subtitle' => __ ( 'With the "section" field you can create indented option sections.', 'redux-framework-demo' ),
						'indent' => true 
				), // Indent all options below until the next 'section' option is set.
				array (
						'id' => 'section-test',
						'type' => 'text',
						'title' => __ ( 'Field Title', 'redux-framework-demo' ),
						'subtitle' => __ ( 'Field Subtitle', 'redux-framework-demo' ) 
				),
				array (
						'id' => 'section-test-media',
						'type' => 'media',
						'title' => __ ( 'Field Title', 'redux-framework-demo' ),
						'subtitle' => __ ( 'Field Subtitle', 'redux-framework-demo' ) 
				),
				array (
						'id' => 'section-end',
						'type' => 'section',
						'indent' => false 
				), // Indent all options below until the next 'section' option is set.
				array (
						'id' => 'section-info',
						'type' => 'info',
						'desc' => __ ( 'And now you can add more fields below and outside of the indent.', 'redux-framework-demo' ) 
				) 
		) 
) );
Redux::setSection ( $opt_name, array (
		'id' => 'presentation-divide-sample',
		'type' => 'divide' 
) );

if (file_exists ( dirname ( __FILE__ ) . '/../README.md' )) {
	$section = array (
			'icon' => 'el el-list-alt',
			'title' => __ ( 'Documentation', 'redux-framework-demo' ),
			'fields' => array (
					array (
							'id' => '17',
							'type' => 'raw',
							'markdown' => true,
							'content_path' => dirname ( __FILE__ ) . '/../README.md' 
					) 
			) 
	); // FULL PATH, not relative please
	   // 'content' => 'Raw content here',
	
	Redux::setSection ( $opt_name, $section );
}
/*
 * <--- END SECTIONS
 */

/*
 *
 * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
 *
 */

/*
 *
 * --> Action hook examples
 *
 */

// If Redux is running as a plugin, this will remove the demo notice and links
// add_action( 'redux/loaded', 'remove_demo' );

// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
// add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

// Change the arguments after they've been declared, but before the panel is created
// add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

// Change the default value of a field after it's been set, but before it's been useds
// add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

// Dynamically add a section. Can be also used to modify sections/fields
// add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

/**
 * This is a test function that will let you see when the compiler hook occurs.
 * It only runs if a field set with compiler=>true is changed.
 */
if (! function_exists ( 'compiler_action' )) {
	function compiler_action($options, $css, $changed_values) {
		echo '<h1>The compiler hook has run!</h1>';
		echo "<pre>";
		print_r ( $changed_values ); // Values that have changed since the last save
		echo "</pre>";
		// print_r($options); //Option values
		// print_r($css); // Compiler selector CSS values compiler => array( CSS SELECTORS )
	}
}

/**
 * Custom function for the callback validation referenced above
 */
if (! function_exists ( 'redux_validate_callback_function' )) {
	function redux_validate_callback_function($field, $value, $existing_value) {
		$error = false;
		$warning = false;
		
		// do your validation
		if ($value == 1) {
			$error = true;
			$value = $existing_value;
		} elseif ($value == 2) {
			$warning = true;
			$value = $existing_value;
		}
		
		$return ['value'] = $value;
		
		if ($error == true) {
			$return ['error'] = $field;
			$field ['msg'] = 'your custom error message';
		}
		
		if ($warning == true) {
			$return ['warning'] = $field;
			$field ['msg'] = 'your custom warning message';
		}
		
		return $return;
	}
}

/**
 * Custom function for the callback referenced above
 */
if (! function_exists ( 'redux_my_custom_field' )) {
	function redux_my_custom_field($field, $value) {
		print_r ( $field );
		echo '<br/>';
		print_r ( $value );
	}
}

/**
 * Custom function for filtering the sections array.
 * Good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
 * so you must use get_template_directory_uri() if you want to use any of the built in icons
 */
if (! function_exists ( 'dynamic_section' )) {
	function dynamic_section($sections) {
		// $sections = array();
		$sections [] = array (
				'title' => __ ( 'Section via hook', 'redux-framework-demo' ),
				'desc' => __ ( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
				'icon' => 'el el-paper-clip',
				// Leave this as a blank section, no options just some intro text set above.
				'fields' => array () 
		);
		
		return $sections;
	}
}

/**
 * Filter hook for filtering the args.
 * Good for child themes to override or add to the args array. Can also be used in other functions.
 */
if (! function_exists ( 'change_arguments' )) {
	function change_arguments($args) {
		// $args['dev_mode'] = true;
		return $args;
	}
}

/**
 * Filter hook for filtering the default value of any given field.
 * Very useful in development mode.
 */
if (! function_exists ( 'change_defaults' )) {
	function change_defaults($defaults) {
		$defaults ['str_replace'] = 'Testing filter hook!';
		
		return $defaults;
	}
}

/**
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 */
if (! function_exists ( 'remove_demo' )) {
	function remove_demo() {
		// Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
		if (class_exists ( 'ReduxFrameworkPlugin' )) {
			remove_filter ( 'plugin_row_meta', array (
					ReduxFrameworkPlugin::instance (),
					'plugin_metalinks' 
			), null, 2 );
			
			// Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
			remove_action ( 'admin_notices', array (
					ReduxFrameworkPlugin::instance (),
					'admin_notices' 
			) );
		}
	}
}

