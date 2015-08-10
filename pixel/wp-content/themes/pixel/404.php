<?php
defined ( 'ABSPATH' ) or die ( "No script kiddies please!" );

get_header ();
get_template_part ( 'menu-section' );
?>

<!--404 error section-->
		<section class="tCenter bgWhite err" >
			

						<!--Error  holder-->
						<div class="errHolder">
							
							<div class="errImg overlay"></div>
							
							<div class="errIntro">
								
								<h1><?php _e( '404 : Ooops', 'pranon' ); ?></h1>
								<p><?php _e( 'we can not find what you are looking for. Please check the URL to ensure that the path is correct or search again.', 'pranon' ); ?></p>
								 <?php get_search_form(); ?>
							</div>
						</div>
						
						<!--End error holder-->
					
	
		</section>
	<!--End 404 error section-->
<?php get_footer(); ?>