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
/*include_once 'includes/shortcode_generator.php';
include_once 'symple-shortcodes/symple-shortcodes.php';
include_once 'includes/sample-config.php';
include_once 'includes/VossenPlugins.php';
include_once 'includes/class-tgm-plugin-activation.php'; */

add_action ( 'after_setup_theme', 'AfterSetupTheme::pranon_add_theme_support');




















