<?php
defined ( 'ABSPATH' ) or die ( "No script kiddies please!" );

get_header ();
get_template_part ( 'menu-section' );

$content_bg = esc_url (AfterSetupTheme::pranon_return_thme_option('tag-single-parallax','url') ) != null ? esc_url (AfterSetupTheme::pranon_return_thme_option('tag-single-parallax','url') ) : get_template_directory_uri().'/images/teaserImages/r1.jpg';
?>
<section class="headerSingle hSingleHeight overlay tCenter" style="background-image: url('<?php echo esc_url($content_bg)?>');">
	<div class="hero">
		<!--Title-->
		<div class="title light ofsBottom ">
			<h1>
				<?php printf( __( 'Tag Archives: %s', 'forty_eight' ), single_cat_title( '', false ) ); ?><span class="plus">+</span>
			</h1>
		</div>
		<!--End title-->
	</div>
	<!--End hero-->
</section>

<section class="blogLarge tCenter bgWhite">
	<div class="blogPosts ">
		<!--Post navigation-->
		<div class="postNav ofsTop ofsBottom  bgGreyDark">
<?php Navigation::pranon_paging_nav(); ?>
		</div>
		<!--End post navigation-->

		<div class="postsHolder clearfix tLeft margTop ofsInBottom">
			<div class="container clearfix">
				<div class="eleven columns noMRight">
		<?php
		
		if (have_posts ()) :
			
			while ( have_posts () ) :
				the_post ();
				
				get_template_part ( 'content', get_post_format () );
			endwhile
			;
		 else :
			get_template_part ( 'content', 'none' );
		

		endif;
		?>
				</div>
				<div class="five columns sidebar"><?php get_sidebar()?></div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>