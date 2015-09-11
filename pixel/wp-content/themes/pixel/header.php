<?php defined('ABSPATH') or die("No script kiddies please!");?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="description"
	content="<?php
	if (is_single ()) {
		single_post_title ( '', true );
	} else {
		bloginfo ( 'name' );
		echo " - ";
		bloginfo ( 'description' );
	}
	?>" />

<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon"
	href="<?php echo esc_url(AfterSetupTheme::pranon_return_thme_option('favicon','url'));?>" />
<!-- The favicon -->
<!--[if IE 7]>
<link rel="stylesheet" href="css/fontello-ie7.css"><![endif]-->
<!--[if lt IE 8]>
<style>
/* For IE < 8 (trigger hasLayout) */
.clearfix {
    zoom:1;
}
</style>
<![endif]-->
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

    <?php wp_head(); ?>
</head>
<body <?php body_class('appear-animate body-push'); ?> data-spy="scroll"
	data-target=".navbar-default" data-offset="150">
	<!-- Preloader -->
	<div id="loader">
		<!-- Preloader inner -->
		<div id="loaderInner">

			<!-- Loader bars -->
			<div class="loaderBars">
				<span class="bar1 bar"></span> <span class="bar2 bar"></span> <span
					class="bar3 bar"></span>
			</div>
			<!-- End loader bars -->
		</div>
		<!-- End preloader inner -->
	</div>
	<!-- End preloader -->

	<!--Wrapper-->
	<div id="wrapper">