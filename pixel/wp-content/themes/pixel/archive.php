<?php
defined ( 'ABSPATH' ) or die ( "No script kiddies please!" );

get_header ();
?>

<section class="breadcrumbs">
	<div class="container">
		<div class="page-header">
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
					?>
			</h1>
		</div>
		<?php AfterSetupTheme::beautySpa_breadcrumb();?>
	</div>
</section>

<?php get_template_part ( 'menu-section' );?>
<section class="page-block">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-8 content" id="content">
		<?php
		
		if (have_posts ()) :
			
			while ( have_posts () ) :
				the_post ();
				
				get_template_part ( 'content', get_post_format () );
				
				
			endwhile
			;
			
			?>		 
		 <?php		

		// If no content, include the "No posts found" template.
		else :
			get_template_part ( 'content', 'none' );
		

		endif;
		?>
				<div class="pagination-wrapper">
					<?php Navigation::vossen_paging_nav ();?>
				</div>
			</div>
			<aside class="col-md-3 col-sm-4 sidebar" id="sidebar"><?php get_sidebar()?></aside>
		</div>
	</div>
</section>
<?php get_footer(); ?>