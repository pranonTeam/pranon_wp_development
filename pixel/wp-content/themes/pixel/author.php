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
				<?php wp_title(''); ?><span class="plus">+</span>
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
					<div class="about-author author-page">
						<h3><?php esc_html_e('About the Author','vossen')?></h3>
						<hr>
						<div class="author-avatar">
					<?php echo get_avatar( get_the_author_meta('email') , 90 ); ?>
				</div>
						<div class="author-info">
							<h3>
						<?php echo  esc_html(the_author_meta('nickname')); ?>
					</h3>
							<p>
						<?php  echo wp_kses_post(get_the_author_meta( 'description'));?>
						
					</p>

						</div>
					</div>
					<hr>
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