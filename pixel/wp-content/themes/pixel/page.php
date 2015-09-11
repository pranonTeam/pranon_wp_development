<?php
defined ( 'ABSPATH' ) or die ( "No script kiddies please!" );
get_header ();
get_template_part ( 'menu-section' );
$post_thumbnail_id = get_post_thumbnail_id ( get_the_ID () );
$src = wp_get_attachment_image_src ( $post_thumbnail_id, 'full' );

$content_bg = esc_url ( $src [0] ) != null ? esc_url ( $src [0] ) : get_template_directory_uri () . '/images/teaserImages/r1.jpg';
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
<?php if(class_exists('Woocommerce')){?>
<?php if(is_checkout() || is_account_page()){?>

<section class="shop tCenter bgWhite">

	<div class="checkout ">

		<div class="chkOutHolder clearfix tLeft ofsTop ofsBottom bgGrey">

			<div class="container clearfix">

				<div class="woocommerce clearfix">
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
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	} else {
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
<?php
	
}
	?>
<?php
} else {
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
<?php
}
get_footer ();
?>