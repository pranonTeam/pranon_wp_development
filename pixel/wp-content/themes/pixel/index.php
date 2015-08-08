<?php
defined ( 'ABSPATH' ) or die ( "No script kiddies please!" );

get_header ();
?>
<?php get_template_part ( 'menu-section' );?>
<!--Header single-->
<section class="headerSingle hSingleHeight overlay tCenter" style="background-image: url('<?php echo get_template_directory_uri()?>/images/teaserImages/r1.jpg');">

	<!--Hero-->
	<div class="hero">


		<!--Title-->
		<div class="title light ofsBottom ">
			<h1>
				Our blog<span class="plus">+</span>
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
<div style="display: none;">
		<?php
		if (is_search ()) {
		} else {
			comment_form ();
			the_tags ();
			wp_list_comments ();
			comments_template ();
			wp_link_pages ( array (
					'before' => '<div class="page-links"><span class="page-links-title">' . __ ( 'Pages:', 'bautySpa' ) . '</span>',
					'after' => '</div>',
					'link_before' => '<span>',
					'link_after' => '</span>' 
			) );
		}
		?>
	</div>
<?php get_footer(); ?>