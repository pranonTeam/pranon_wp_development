<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage gilas
 * @since gilas
 */
$getCat = get_the_category ( get_the_ID () );
$cat = '';
foreach ( $getCat as $key => $value ) {
	if ($key == (count ( $getCat ) - 1)) {
		$cat .= '<a href="' . get_category_link ( $value->term_id ) . '">' . esc_html ( $value->name ) . '</a>';
	} else {
		$cat .= '<a href="' . get_category_link ( $value->term_id ) . '">' . esc_html ( $value->name ) . '</a>, ';
	}
}

$img = '';
if (class_exists ( 'Dynamic_Featured_Image' )) {
	global $dynamic_featured_image;
	$featured_images = $dynamic_featured_image->get_all_featured_images ( $post->ID );
	$upload_dir = wp_upload_dir ();
	$img .= ' <div class="postMedia postSlider slider flexslider"> <ul class="slides">';
	foreach ( $featured_images as $key => $featured_image ) {
		$img_src = wp_get_attachment_metadata ( $featured_image ['attachment_id'] );
		$date = explode ( '/', $img_src ['file'] );
		if (count ( $date ) == 3) {
			$attachment_dir = $upload_dir ['baseurl'] . '/' . $date [0] . '/' . $date [1];
		} else {
			$attachment_dir = $upload_dir ['baseurl'];
		}
		
		if (isset ( $img_src ['sizes'] ['recent_blogs'] ['file'] )) {
			$img .= '<li>
				<img class="img-responsive" src="' . esc_url ( $attachment_dir . '/' . $img_src ['sizes'] ['recent_blogs'] ['file'] ) . '" alt="">
			</li>';
		} else {
			$img .= '<li>
				<img class="img-responsive" src="' . esc_url ( $attachment_dir . '/' . $img_src ['sizes'] ['recent_blogs'] ['file'] ) . '" alt="">
			</li>';
		}
	}
	$img .= '</ul></div>';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrap'); ?>>
	<!--Post large-->
	<div class="postLarge one-third column">

		<!--Post content-->
		<div class="postContent">

			<div class="postTitle">
				<h1>
					<a href="<?php echo get_the_permalink();?>"><?php echo get_the_title()?></a>
				</h1>

				<!--Post meta-->
				<div class="postMeta">
					<span class="metaCategory"><?php echo $cat;?></span> <span
						class="metaDate"><a href="#"> - <?php echo get_the_time(get_option( 'date_format' ));?> - </a></span>
					<span class="metaComments"><a
						href="<?php echo get_permalink()?>#comments"><?php comments_number('0  Comment', '1  Comment', '%  Comments' );?></a></span>
				</div>
				<!--End post meta-->

			</div>
<?php
if ($img != '') {
	echo $img;
}else {?>
	<!--Post image-->
			<div class="postMedia">
				 <?php echo get_the_post_thumbnail(get_the_ID(),'recent_blogs',false)?>
			</div>
			<!--End post image-->
<?php }?>
<div class="post-body">
				<div class="post-excerpt">
					<p>  <?php if (get_the_excerpt()!=''){ echo get_the_excerpt();} else the_content();?></p>
                        <?php
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
			<a class="btn border more" href="<?php echo get_permalink()?>"><?php esc_html_e('Read more ... ','gilas')?></a>
			<footer class="entry-footer"> <?php edit_post_link( __( 'Edit', 'gilas' ), '<span class="edit-link">', '</span>' ); ?>
</footer>
		</div>
		<!--End post content-->

	</div>
	<!--End post large-->
</article>