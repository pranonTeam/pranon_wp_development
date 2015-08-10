<?php
defined ( 'ABSPATH' ) or die ( "No script kiddies please!" );

get_header ();
?>
<?php get_template_part ( 'menu-section' );?>
<section class="headerSingle hSingleHeight overlay tCenter" style="background-image: url('<?php echo get_template_directory_uri()?>/images/teaserImages/r1.jpg');">
	<!--Hero-->
	<div class="hero">
		<!--Title-->
		<div class="title light ofsBottom ">
			<h1>
				<?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'forty_eight' ), get_the_date() );

						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'forty_eight' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'forty_eight' ) ) );

						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'forty_eight' ), get_the_date( _x( 'Y', 'yearly archives date format', 'forty_eight' ) ) );

						else :
							_e( 'Archives', 'forty_eight' );

						endif;
					?><span class="plus">+</span>
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