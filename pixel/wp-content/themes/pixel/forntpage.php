<?php
defined ( 'ABSPATH' ) or die ( "No script kiddies please!" );
/*
 * Template name: Frontpage Template
 */
get_header ();
get_template_part ( 'menu-section' );
?>
<section class="tCenter bgWhite">
		<?php
		
		if (have_posts ()) :
			
			while ( have_posts () ) :
				the_post ();
				
				get_template_part ( 'content', 'page' );
			endwhile
			;
		 else :
			get_template_part ( 'content', 'none' );
		

		endif;
		?>
</section>
<?php get_footer();?>