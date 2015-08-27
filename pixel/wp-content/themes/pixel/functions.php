<?php
defined ( 'ABSPATH' ) or die ( "No script kiddies please!" );

include_once 'includes/AfterSetupTheme.php';
include_once 'includes/IncludeCssJs.php';
include_once 'includes/Pranon_Nav_Menu.php';
include_once 'includes/Navigation.php';
include_once 'includes/CustomMetaBox.php';
include_once 'includes/CreateSidebar.php';
include_once 'includes/OverrideWidgets.php';
include_once 'includes/comments.php';
include_once 'includes/Visual_Composer.php';

/*********** ============ ShortCode ============== ************/
include_once 'includes/shortcodes/main_slide.php';
include_once 'includes/shortcodes/welcome_note.php';
include_once 'includes/shortcodes/what_we_do.php';
include_once 'includes/shortcodes/section_heading.php';
include_once 'includes/shortcodes/our_credentials.php';
include_once 'includes/shortcodes/recent_blog.php';
include_once 'includes/shortcodes/tweet_feed.php';
include_once 'includes/shortcodes/instagram_feed.php';
include_once 'includes/shortcodes/portfolio_filter.php';
include_once 'includes/shortcodes/get_in_touch.php';
include_once 'includes/shortcodes/pranon_team.php';
include_once 'includes/shortcodes/pranon_clients.php';
include_once 'includes/shortcodes/pixel_skill_experties.php';
include_once 'includes/shortcodes/testimonial.php';
include_once 'includes/shortcodes/about_us_intro.php';
include_once 'includes/shortcodes/pixel_fun_facts.php';
include_once 'includes/shortcodes/price_table.php';
include_once 'includes/shortcodes/get_social_with_us.php';
include_once 'includes/shortcodes/additional_services.php';
include_once 'includes/shortcodes/custom_page_header.php';
include_once 'includes/shortcodes/contact.php';
include_once 'includes/shortcodes/contact_info.php';

/*********** ============ END ShortCode ============== ************/
include_once 'includes/widgets/tweeter_widget.php';
//include_once 'twitter/index.php';
/*
include_once 'symple-shortcodes/symple-shortcodes.php';
include_once 'includes/sample-config.php';
include_once 'includes/VossenPlugins.php';
include_once 'includes/class-tgm-plugin-activation.php'; */

add_action ( 'after_setup_theme', 'AfterSetupTheme::pranon_add_theme_support');




















