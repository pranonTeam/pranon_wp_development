<?php
defined ( 'ABSPATH' ) or die ( "No script kiddies please!" );
/**
 * Template Name: Beauty Spa Default Page
 */
get_header ();
$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'large' );

$content_bg = esc_url ($thumbnail_src[0]) != null ? 'style="background: url(' . esc_url ( $thumbnail_src[0] ) . ') no-repeat center center; background-size:cover;"':null;
?>

<section class="breadcrumbs" <?php echo $content_bg;?>>
	<div class="container">
		<div class="page-header">
			<h1><?php wp_title('')?></h1>
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
		$paged = get_query_var ( 'paged' ) ? intval ( get_query_var ( 'paged' ) ) : 1;
				$args = array (
						'posts_per_page' => get_option ( 'posts_per_page' ),
						'paged' => $paged 
				);
				
				query_posts ( $args );
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
			
				<div class="pagination-wrapper">
					<?php Navigation::vossen_paging_nav(); wp_reset_query();?>
					
				</div>
			</div>
			<aside class="col-md-3 col-sm-4 sidebar" id="sidebar"><?php get_sidebar()?></aside>
		</div>
	</div>
</section>
<?php get_footer(); ?>