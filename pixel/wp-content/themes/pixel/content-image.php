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
		$cat .= '<a href="'.get_category_link( $value->term_id  ).'">'.esc_html($value->name).'</a>';
	} else {
		$cat .= '<a href="'.get_category_link( $value->term_id  ).'">'.esc_html($value->name).'</a>, ';
	}
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrap'); ?>>
<?php if ( has_post_thumbnail() ) {?>
	<div class="post-media">
		<div class="post-img">
                           <?php echo get_the_post_thumbnail(get_the_ID(),'recent_blogs',false)?>
                            <a href="<?php echo get_the_permalink();?>" >
				<div class="link img-circle">
					<i class="fa fa-plus"></i>
				</div>
			</a>
		</div>
	</div>
	<?php }?>
	<div class="post-header">
		<h2 class="post-title">
			<a href="<?php echo get_the_permalink();?>"><?php echo get_the_title()?></a>
		</h2>
		<div class="post-meta">
			<ul>
				<li><i class="fa fa-user"></i> <a href="<?php  echo get_author_posts_url(get_the_author_meta( 'ID'));?>"><?php echo get_the_author_meta( 'user_nicename');?></a></li>
				<li><i class="fa fa-calendar"></i> <?php echo get_the_time(get_option( 'date_format' ));?></li>
				<li><i class="fa fa-folder-open"></i><?php echo $cat;?></li>
				<li><i class="fa fa-comments"></i><a href="<?php echo get_permalink()?>/#comments"><?php comments_number('0  Comment', '1  Comment', '%  Comments' );?></a></li>
			</ul>
		</div>
	</div>
	<div class="post-body">
		<div class="post-excerpt">
			<p>  <?php if (get_the_excerpt()!=''){ echo get_the_excerpt();} else the_content();?></p>
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
                        </div>
	</div>
	<div class="post-footer">
		<footer class="entry-footer"> <?php edit_post_link( __( 'Edit', 'gilas' ), '<span class="edit-link">', '</span>' ); ?>
</footer>
		<span class="post-read-more"><a href="<?php echo get_permalink()?>"
			class="btn btn btn-primary btn-icon-left"><?php esc_html_e('Read More ... ','gilas')?></a></span>
	</div>
</article>