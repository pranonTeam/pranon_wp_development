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
include_once 'includes/shortcodes/main_slide.php';
include_once 'includes/shortcodes/welcome_note.php';
include_once 'includes/shortcodes/what_we_do.php';
include_once 'includes/shortcodes/section_heading.php';
include_once 'includes/shortcodes/our_credentials.php';
include_once 'includes/shortcodes/recent_blog.php';
include_once 'includes/shortcodes/tweet_feed.php';
include_once 'includes/shortcodes/instagram_feed.php';

include_once 'includes/widgets/tweeter_widget.php';
//include_once 'twitter/index.php';
/*
include_once 'symple-shortcodes/symple-shortcodes.php';
include_once 'includes/sample-config.php';
include_once 'includes/VossenPlugins.php';
include_once 'includes/class-tgm-plugin-activation.php'; */

add_action ( 'after_setup_theme', 'AfterSetupTheme::pranon_add_theme_support');




















