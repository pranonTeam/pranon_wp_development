<?php
defined ( 'ABSPATH' ) or die ( "No script kiddies please!" );

get_header ();

$img = '';
if (class_exists ( 'Dynamic_Featured_Image' )) {
	global $dynamic_featured_image;
	$featured_images = $dynamic_featured_image->get_all_featured_images ( get_the_ID () );
	$upload_dir = wp_upload_dir ();
	$img .= ' <div class="halfSlider slider flexslider"> <ul class="slides">';
	foreach ( $featured_images as $key => $featured_image ) {
		$img_src = wp_get_attachment_metadata ( $featured_image ['attachment_id'] );
		$date = explode ( '/', $img_src ['file'] );
		if (count ( $date ) == 3) {
			$attachment_dir = $upload_dir ['baseurl'] . '/' . $date [0] . '/' . $date [1];
		} else {
			$attachment_dir = $upload_dir ['baseurl'];
		}
		
		if (isset ( $img_src ['sizes'] ['single_post'] ['file'] )) {
			$img .= '<li>
				<img class="img-responsive" src="' . esc_url ( $attachment_dir . '/' . $img_src ['sizes'] ['single_post'] ['file'] ) . '" alt="">
			</li>';
		} else {
			$img .= '<li>
				<img class="img-responsive" src="' . esc_url ( $attachment_dir . '/' . $img_src ['sizes'] ['large'] ['file'] ) . '" alt="">
			</li>';
		}
	}
	$img .= '</ul></div>';
}

?>
<?php get_template_part ( 'menu-section' );?>

<section class="projSingle ofsTop singleOffset tCenter bgGrey">

	<!--Container-->
	<div class="container clearfix ">


		<!--Title-->
		<div class="title ">
			<h1>
					<?php echo get_the_title()?><span class="plus">+</span>
			</h1>
		</div>
		<!--End title-->


<?php if (get_the_excerpt()!='') {?>
			<!--Project intro-->
		<div class="pSingleIntro  ofsTSmall">
			<p><?php echo get_the_excerpt();?></p>
		</div>
		<!--End project intro-->
<?php }?>

		<!--Projects share-->
		<ul class="projSocials margTMedium ">

			<li><a href="#"><i class="icon-facebook"></i></a></li>
			<li><a href="#"><i class="icon-linkedin"></i></a></li>
			<li><a href="#"><i class="icon-twitter"></i></a></li>
			<li><a href="#"><i class="icon-instagram"></i></a></li>

		</ul>
		<!--End project share-->


	</div>
	<!--End container-->



<?php

if (have_posts ()) :
	
	while ( have_posts () ) :
		the_post ();
		?>
	<div class="projShowcase margTop">
		<div class="projectHolder clearfix bgWhite">

			<?php if(get_post_format()=='gallery'){ echo $img;?>
			<?php }elseif(get_post_format()=='video'){?>
						<div class="projVideo">

				<iframe height="514"
					src="<?php echo htmlspecialchars(get_post_meta(get_the_ID(),'pranon_video_url',true));?>"></iframe>

			</div>
						<?php }elseif(get_post_format()=='audio'){?>
						<div class="projVideo">

				<iframe height="170"
					src="<?php echo htmlspecialchars(get_post_meta(get_the_ID(),'pranon_video_url',true));?>"></iframe>

			</div>
						<?php } else {?>
						<div class="halfSlider">
							<?php echo get_the_post_thumbnail(get_the_ID(),'single_post',false);?>
						</div>
						<?php }?>


			<!--Project case study-->
			<div class="halfDesc tLeft  ">

				<div class="halfInner">
					<?php
		echo get_the_content ();
		wp_link_pages ( array (
				'before' => '<div class="page-links"><span class="page-links-title">' . __ ( 'Pages:', 'gilas' ) . '</span>',
				'after' => '</div>',
				'link_before' => '<span>',
				'link_after' => '</span>',
				'pagelink' => '<span class="screen-reader-text">' . __ ( 'Page', 'gilas' ) . ' </span>%',
				'separator' => '<span class="screen-reader-text">, </span>' 
		) );
		?>
				</div>

			</div>


		</div>

	</div>
</section>

<section id="related" class="tCenter bgGrey">


	<!--Portfolio holder -->
	<div class="relatedHolder ofsTop ofsBottom">

		<!--Title-->
		<div class="title dark ">
			<h1>
				<?php echo esc_html__('Related Works','pranon')?><span class="plus">+</span>
			</h1>
		</div>
		<?php
		$taxonomy = get_the_taxonomies ( get_the_ID () );
		if (isset ( $taxonomy )) {
			foreach ( $taxonomy as $key => $name ) {
				$taxonomy_name = $key;
			}
			$get_terms = get_the_terms ( get_the_ID (), $taxonomy_name );
			$term = array ();
			$display_term = '';
			foreach ( $get_terms as $key => $get_term ) {
				array_push ( $term, $get_term->slug );
				if ($key == (count ( $get_terms ) - 1)) {
					$display_term .= esc_html ( $get_term->name );
				} else {
					$display_term .= esc_html ( $get_term->name ) . ', ';
				}
			}
			
			$get_post = get_post ( get_the_ID () );
			
			$post_type = $get_post->post_type;
			
			$args = array (
					'posts_per_page' => '4',
					'offset' => 0,
					'category' => '',
					'category_name' => '',
					'orderby' => 'date',
					'order' => 'DESC',
					'include' => '',
					'exclude' => get_the_ID (),
					'meta_key' => '',
					'meta_value' => '',
					'post_type' => $post_type,
					'post_mime_type' => '',
					'post_parent' => '',
					'author' => '',
					'post_status' => 'publish',
					'tax_query' => array (
							array (
									'taxonomy' => $taxonomy_name,
									'field' => 'slug',
									'terms' => $term 
							) 
					),
					'suppress_filters' => true 
			);
			
			$posts_array = get_posts ( $args );
			
			if (isset ( $posts_array )) {
				?>
				
						<div class=" works clearfix ofsInTop">
			<!--Portfolio-->
			<ul class="portfolio clearfix tCenter">

<?php
				
				foreach ( $posts_array as $key => $single_post ) {
					$img_src = wp_get_attachment_image_src ( get_post_thumbnail_id ( $single_post->ID ), 'single_post' );
					?>
				<li class="item one-third column ">
					<div class="itemDesc">
						<div class="itemDescInner">
							<h3>
								<?php echo esc_html ( $single_post->post_title );?><span><?php echo esc_html($display_term)?></span>
							</h3>
							<div class=" itemBtn ">
								<a href="<?php echo esc_url($img_src[0])?>" class=" folio img"><i
									class="icon-resize-full"></i></a> <a
									href="<?php echo get_the_permalink ( $single_post->ID );?>"
									class="link"><i class="icon-link"></i></a>
							</div>
						</div>
					</div> <?php echo get_the_post_thumbnail ( $single_post->ID, 'filter_works_normal', false )?>
				</li>

<?php }?>
			</ul>
			<!--End portfolio-->
		</div>
		<!-- End works list -->
				
			<?php
			}
		}
		
		?>

	</div>
</section>
<?php
	endwhile
	;
 else :
	get_template_part ( 'content', 'none' );


endif;
?>
<?php get_footer();?>