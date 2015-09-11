<?php
defined ( 'ABSPATH' ) or die ( "No script kiddies please!" );
?>
<footer id="footer" class="footer tCenter">
<?php
get_sidebar ( "footer" );
?>
<!--Footer bottom-->
	<div class="footerBottom ofsT-Small ofsB-Small tLeft">
		<!--Container-->
		<div class="container clearfix">

			<!--Footer bottom inner-->
			<div class="fbInner clearfix">

				<div class="eight columns ">

					<p>
						<?php echo  apply_filters('the_content', AfterSetupTheme::pranon_return_thme_option('copyright'))?>
					</p>

				</div>

				<div class="eight columns ">

					<?php
					
					$social_icons = AfterSetupTheme::pranon_return_thme_option ( 'social-icons' );
					$social_links = AfterSetupTheme::pranon_return_thme_option ( 'social-links' );
					$social_links = explode ( ',', $social_links );
					$social_html = '<ul class="socialsFooter ">';
					$grab = false;
					$count = 0;
					if (isset ( $social_icons )) {
						foreach ( $social_icons as $key => $icon ) {
							$link = isset($social_links [$count]) ? $social_links [$count] : '#';
							if ($icon != '') {
								$social_html .= '<li><a href="' . esc_url ( $link ) . '"><i class="icon ' . esc_attr ( $key ) . '"></i></a></li>';
								$grab = true;
							}
							$count ++;
						}
						
						if ($grab) {
							
							echo $social_html . "</ul>";
						}
					}
					?>
				</div>

			</div>
			<!--End footer bottom inner-->
		</div>
		<!--End container-->
	</div>
	<!--End footer bottom-->
</footer>
<!--End footer-->
</div>
<!--End wrapper-->

<?php

wp_footer ();

if (class_exists ( 'Woocommerce' )) {
	$js = '<script type="text/javascript">';
	$js .= "jQuery('.add_to_cart_button').click(function(){";
	
	$qty = WC ()->cart->get_cart_contents_count ();
	$qty = $qty + 1;
	$js .= "jQuery('#wc_cart').text(" . $qty . ")";
	$js .= '});</script>';
	
	echo $js;
}

$custom_css = AfterSetupTheme::pranon_return_thme_option ( 'opt-ace-editor-css' );
if($custom_css!=''){
	$css = ' <style type="text/css">
            '.$custom_css.'
       </style>';
}else{
	$css ='';
}
echo $css;
?>


</body>
</html>