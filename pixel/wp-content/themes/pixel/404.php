<?php
defined ( 'ABSPATH' ) or die ( "No script kiddies please!" );

get_header ();
?>

<section class="breadcrumbs">
	<div class="container">
		<div class="page-header">
			<h1><?php _e( '404 ERROR - NOT FOUND', 'bautySpa' ); ?></h1>
		</div>
		<?php AfterSetupTheme::beautySpa_breadcrumb();?>
	</div>
</section>

<?php get_template_part ( 'menu-section' );?>
<section class="page-block">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-8 content" id="content">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="blog-post">
						<h3 class="entry-title blog-post-title"><?php _e( 'Oops! That page can&rsquo;t be found.', '' ); ?></h3>
						<div class="entry-content">
<?php _e( 'It looks like nothing was found at this location. Maybe try a search?', '' ); ?>
</div>
						<footer class="entry-footer"><br> <?php get_search_form(); ?>
</footer>
					</div>
				</article>
			</div>
			<aside class="col-md-3 col-sm-4 sidebar" id="sidebar"><?php get_sidebar()?></aside>
		</div>
	</div>
</section>
<?php get_footer(); ?>