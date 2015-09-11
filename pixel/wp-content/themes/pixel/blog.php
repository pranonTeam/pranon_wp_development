<?php
defined ( 'ABSPATH' ) or die ( "No script kiddies please!" );
/**
 * Template Name: Pixel Blog Page
 */
get_header ();
get_template_part ( 'menu-section' );
$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
$src = wp_get_attachment_image_src ( $post_thumbnail_id, 'full' );

$content_bg = esc_url ($src[0] ) != null ? esc_url($src[0]) : get_template_directory_uri().'/images/teaserImages/r1.jpg';
?>
<!--Header single-->
<section class="headerSingle hSingleHeight overlay tCenter" style="background-image: url('<?php echo esc_url($content_bg);?>');">

	<!--Hero-->
	<div class="hero">


		<!--Title-->
		<div class="title light ofsBottom ">
			<h1>
				<?php echo wp_title('')?><span class="plus">+</span>
			</h1>
		</div>
		<!--End title-->
	</div>
	<!--End hero-->


</section>
<!--End header single-->
<section class="blogLarge tCenter bgWhite">
	<div class="blogPosts ">
		<!--Post navigation-->
		<div class="postNav ofsTop ofsBottom  bgGreyDark">
<?php 	$paged = get_query_var ( 'paged' ) ? intval ( get_query_var ( 'paged' ) ) : 1;
		$args = array (
				'posts_per_page' => get_option ( 'posts_per_page' ),
				'paged' => $paged
		);
		
		query_posts ( $args );
		
		Navigation::pranon_paging_nav(); ?>
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
		wp_reset_query();
		?>
				</div>
				<div class="five columns sidebar"><?php get_sidebar()?></div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>