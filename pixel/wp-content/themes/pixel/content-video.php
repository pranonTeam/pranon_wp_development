<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage pranon
 * @since pranon
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
						class="metaDate"><a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))?>"> - <?php echo get_the_time(get_option( 'date_format' ));?> - </a></span>
					<span class="metaComments"><a
						href="<?php echo get_permalink()?>#comments"><?php comments_number('0 '.__('Comment','pranon').'', '1 '.__('Comment','pranon').'','% '.__('Comment','pranon').'' );?></a></span>
				</div>
				<!--End post meta-->

			</div>
			<?php if(get_post_meta(get_the_ID(),'pranon_video_url',true)!=null){?>
			<div class="postMedia audio">
				<iframe height="163"
					src="<?php echo htmlspecialchars(get_post_meta(get_the_ID(),'pranon_video_url',true));?>"></iframe>
			</div>
			<?php } else {?>
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
																										'before' => '<div class="page-links"><span class="page-links-title">' . __ ( 'Pages:', 'pranon' ) . '</span>',
																										'after' => '</div>',
																										'link_before' => '<span>',
																										'link_after' => '</span>',
																										'pagelink' => '<span class="screen-reader-text">' . __ ( 'Page', 'pranon' ) . ' </span>%',
																										'separator' => '<span class="screen-reader-text">, </span>' 
																								) );
																								?>			
                        </div>
			</div>
			<a class="btn border more" href="<?php echo get_permalink()?>"><?php esc_html_e('Read more ... ','pranon')?></a>
			<footer class="entry-footer"> <?php edit_post_link( __( 'Edit', 'pranon' ), '<span class="edit-link">', '</span>' ); ?>
</footer>
		</div>
		<!--End post content-->

	</div>
	<!--End post large-->
</article>