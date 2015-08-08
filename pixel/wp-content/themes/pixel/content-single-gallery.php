<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage forty_eight
 * @since forty_eight
 */
$getCat = get_the_category ( get_the_ID () );
$cat = '';
foreach ( $getCat as $key => $value ) {
	if ($key == (count ( $getCat ) - 1)) {
		$cat .= '<a href="'.get_category_link( $value->term_id  ).'">'.esc_html($value->name).'</a>';
	} else {
		$cat .= '<a href="'.get_category_link( $value->term_id  ).'">'.esc_html($value->name).'</a>, ';
	}
}

$img = '';
if (class_exists ( 'Dynamic_Featured_Image' )) {
	global $dynamic_featured_image;
	$featured_images = $dynamic_featured_image->get_all_featured_images ( $post->ID );
	
	$upload_dir = wp_upload_dir ();
	$img .= ' <div class="owl-carousel img-carousel">';
	foreach ( $featured_images as $key => $featured_image ) {
		$img_src = wp_get_attachment_metadata ( $featured_image ['attachment_id'] );
		$date = explode('/',$img_src['file']);
		if(count($date)==3){
			$attachment_dir = $upload_dir ['baseurl'].'/'.$date[0].'/'.$date[1];
		}else{
			$attachment_dir = $upload_dir ['baseurl'];
		}

		if(isset($img_src ['sizes'] ['blog']['file'])){
		$img .= '<div>
				<img class="img-responsive" src="' . esc_url($attachment_dir . '/' . $img_src ['sizes'] ['blog'] ['file']). '" alt="">
			</div>';
		}else{
			$img .= '<div>
				<img class="img-responsive" src="' . esc_url($attachment_dir . '/' . $img_src ['sizes'] ['large'] ['file']). '" alt="">
			</div>';
		}
	}
	$img .= '</div>';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<article class="post-wrap">
  <?php if ( $img!='') {?>
	<div class="post-media">
		<?php echo $img;?>
	</div>
	<?php }?>
            <div class="post-header">
			<h2 class="post-title">
				<a href="<?php echo get_the_permalink();?>"><?php echo get_the_title()?></a>
			</h2>
			<div class="post-meta">
				<ul>
					<li><i class="fa fa-user"></i> <a
						href="<?php  echo get_author_posts_url(get_the_author_meta( 'ID'));?>"><?php echo get_the_author_meta( 'user_nicename');?></a></li>
					<li><i class="fa fa-calendar"></i> <?php echo get_the_time(get_option( 'date_format' ));?></li>
					<li><i class="fa fa-folder-open"></i><?php echo $cat;?></li>
					<li><i class="fa fa-comments"></i><a
						href="<?php echo get_permalink()?>/#comments"><?php comments_number('0  Comment', '1  Comment', '%  Comments' );?></a></li>
				</ul>
			</div>
		</div>
		<div class="post-body">
			<div class="post-excerpt">
				 <?php the_content();?>
				                     <?php
																									wp_link_pages( array (
																											'before' => '<div class="page-links"><span class="page-links-title">' . __ ( 'Pages:', 'gilas' ) . '</span>',
																											'after' => '</div>',
																											'link_before' => '<span>',
																											'link_after' => '</span>',
																											'pagelink' => '<span class="screen-reader-text">' . __ ( 'Page', 'gilas' ) . ' </span>%',
																											'separator' => '<span class="screen-reader-text">, </span>' 
																									) );
									?>
				<footer class="entry-footer"> <?php edit_post_link( __( 'Edit', 'forty_eight' ), '<span class="edit-link">', '</span>' ); ?>
</footer>
			</div>
		</div>
	</article>

	<div class="about-the-author clearfix">
		<div class="media">
			<?php echo get_avatar( get_the_author_meta( 'email'), '120' ); ?> 
			<div class="media-body">
				<p class="media-category"><?php esc_html_e('Author','beautySpa')?></p>
				<h4 class="media-heading">
					<a
						href="<?php  echo get_author_posts_url(get_the_author_meta( 'ID'));?>"><?php echo get_the_author_meta( 'user_nicename');?></a>
				</h4>
				<p><?php  echo wp_kses_post(get_the_author_meta( 'description'));?></p>
			</div>
		</div>
	</div>

	<?php
	if (comments_open () || get_comments_number ()) :
		comments_template ();
	
			endif;
	?>
</article>