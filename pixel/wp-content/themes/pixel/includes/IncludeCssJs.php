<?php
class IncludeCssJs {
	public static function pranon_add_css_js() {
		$src_css = get_template_directory_uri () . "/css/";
		$src = get_template_directory_uri () . "/js/";
		
		$js = array (
				'jquery-migrate' => 'jquery-migrate-1.2.1.js',
				'flexslider' => 'jquery.flexslider-min.js',
				'easing' => 'jquery.easing.1.3.js',
				'smooth' => 'jquery.smooth-scroll.js',
				'quicksand' => 'jquery.quicksand.js',
				'modernizr' => 'modernizr.custom.js',
				'magnific-popup' => 'jquery.magnific-popup.js',
				'tweet' => 'jquery.tweet.js',
				'spectragram' => 'spectragram.min.js',
				'parallax' => 'jquery.parallax-1.1.3.js',
				'timer' => 'jquery.timer.js',
				'appear' => 'jquery.appear.min.js',
				'Placeholders' => 'Placeholders.min.js',
				'countdown' => 'jquery.countdown.min.js',
				'jquery-ui-1.8.23.custom.min.js' => 'jquery-ui-1.8.23.custom.min.js',
				'simple-text-rotator' => 'jquery.simple-text-rotator.js',
				'script' => 'script.js',
				'gmaps' => 'gmaps.js' 
		);
		
		// ////////////==============JS ENQUEue =========///
		
		wp_enqueue_script ( 'jquery' );
		wp_enqueue_script ( 'gmapapi', 'http://maps.google.com/maps/api/js?sensor=false&amp;language=en', '', '', true );
		foreach ( $js as $key => $value ) {
			wp_enqueue_script ( $key, $src . $value, '', '', true );
		}
		
		// ///=================CSS ENQUEue===========///
		$css_file = ''; // AfterSetupTheme:: pranon_return_thme_option ( 'style_switcher' );
		if ($css_file == null) {
			$css_file = 'style1';
		}
		$css = array (
				'font.css' => 'font.css',
				'fontello.css' => 'fontello.css',
				'jquery-ui-1.8.23.custom.css' => 'jquery-ui-1.8.23.custom.css',
				'base' => 'base.css',
				'skeleton.css' => 'skeleton.css',
				'main.css' => 'main.css',
				'magnific-popup.css' => 'magnific-popup.css',
				'flexslider.css' => 'flexslider.css',
				$css_file => $css_file . '.css' 
		);
		foreach ( $css as $key => $value ) {
			wp_register_style ( $key, $src_css . $value );
			wp_enqueue_style ( $key );
		}
	}
	static function pranon_add_admin_css_js() {
		$src_css = get_template_directory_uri () . "/css/";
		$css = array (
				'admin' => 'admin.css' 
		);
		foreach ( $css as $key => $value ) {
			
			wp_register_style ( $key, $src_css . $value );
			wp_enqueue_style ( $key );
		}
		wp_enqueue_style ( 'thickbox' );
		$src = get_template_directory_uri () . "/js/";
		
		/*
		 * $js = array (
		 * 'admin_vossen' => 'admin_vossen.js'
		 * );
		 */
		wp_enqueue_script ( 'jquery' );
		wp_enqueue_script ( 'media-upload' );
		wp_enqueue_script ( 'thickbox' );
		/*
		 * foreach ( $js as $key => $value ) {
		 *
		 * wp_enqueue_script ( $key, $src . $value, '', '', true );
		 * }
		 *
		 * wp_localize_script ( 'admin_vossen', 'vossenAjax', array (
		 * 'ajaxurl' => admin_url ( 'admin-ajax.php' )
		 * ) );
		 */
	}
	static function pranon_get_custom_post_type() {
		$push_array = "";
		echo ($push_array);
		die ();
	}
	static function pranon_must_login() {
		echo "You must log in to vote";
		die ();
	}
}