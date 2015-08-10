<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Vossen
 * @since Vossen
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrap'); ?>>
	<!--Post content-->
	<div class="postContent">
<?php if ( has_post_thumbnail() ) {?>
			<!--Post image-->
		<div class="postMedia">
				 <?php echo get_the_post_thumbnail(get_the_ID(),'recent_blog',false)?>
			</div>
		<!--End post image-->
<?php }?>
<div class="post-body">
			<div class="post-excerpt">
					<?php
					
					the_content ();
					
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
		<footer class="entry-footer"> <?php edit_post_link( __( 'Edit', 'gilas' ), '<span class="edit-link">', '</span>' ); ?>
</footer>
	</div>
	<!--End post content-->

</article>