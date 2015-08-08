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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<article class="post-wrap">
 <?php if ( has_post_thumbnail() ) {?>
		 <div class="post-media">
			<div class="post-img">
                           <?php echo get_the_post_thumbnail(get_the_ID(),'blog',false)?>
			</div>
		</div>
	<?php }?>
	<div class="post-body">
			<div class="post-excerpt">
				<?php  the_content();?>
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
		<footer class="entry-footer"> <?php edit_post_link( __( 'Edit', 'gilas' ), '<span class="edit-link">', '</span>' ); ?></footer>
			</div>
		</div>
								
	</article>
	<?php
				if (comments_open () || get_comments_number ()) :
					
					comments_template ();
			
			     endif;
				?>
</article>