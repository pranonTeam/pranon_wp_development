<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage pranon
 * @since pranon
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required ()) {
	return;
}
?>

<?php if ( have_comments() ) : ?>
<div class="comments">
	<h2 class="comments-title">
		<span><?php
	comments_number ( 'No Comment', '1 Comments', '% Comments' );
	?> </span>
	</h2>
	<div class="entriesContainer">
		<ul class="comments clearfix">
<?php
	wp_list_comments ( array (
			'style' => 'ul',
			'short_ping' => true,
			'avatar_size' => 70,
			'callback' => 'Comments::pranon_comments' 
	) );
	?>
</ul>
	</div>
	<div class="navigation-altra">
		<div class="next-posts">
			<?php previous_comments_link()?>
		</div>
		<div class="prev-posts">
			<?php next_comments_link()?>
		</div>
	</div>
</div>
<?php endif;  ?>

<?php

if (! comments_open () && get_comments_number () && post_type_supports ( get_post_type (), 'comments' )) :
	?>
<p class="no-comments"><?php _e( 'Comments are closed.', 'pranon' ); ?></p>
<?php endif; ?> 


<?php if ( comments_open() ) : ?>
<div class="send-post-comment comments-form respond margTop">
	<h2 class="block-title"><?php comment_form_title( 'Leave a comment', 'Submit Your Comment To %s' ); ?></h2>
	<div class="cancel-comment-reply reply">
		<?php cancel_comment_reply_link(); ?>
	    </div>
	<div class="fill-comment-form">

		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>
			<?php esc_html_e('You must be','pranon')?> <a
				href="<?php echo wp_login_url( get_permalink() ); ?>"><?php
		
		esc_html_e ( 'logged in', 'pranon' )?></a> <?php esc_html_e('to post a comment','pranon')?>.
		</p>
		<?php else : ?>
		<div class="replyForm">
			<form
				action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php"
				method="post" name="comments-form" id="comments-form"
				class="form contact-form">
				<div class="inputColumns clearfix">
			<?php if ( is_user_logged_in() ) : ?>

			<p class="comment-notes">
				<?php esc_html_e('Logged in as','pranon')?> <a
							href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo esc_html($user_identity); ?>
				</a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>"
							title="<?php esc_html_e('Log out from this account','pranon'); ?>"><?php esc_html_e('Logged in as','pranon')?> &raquo;</a>
					</p>
<br>
			<?php else : ?>

				<p class="comment-notes">
				<?php esc_html_e('Your email address will not be published. Required fields are marked','pranon')?>
				<span class="required">*</span>
					</p>
					<div class="column1">
						<div class="columnInner">
							<input class="comment-input form-control bottom-border" id="name"
								name="author" type="text" placeholder="NAME*" value="" size="30"
								aria-required="true" required="required" />
						</div>
					</div>
					<div class="column2">
						<div class="columnInner">
							<input class="comment-input form-control bottom-border"
								id="email" name="email" type="text" value=""
								placeholder="EMAIL*" size="30" aria-required="true"
								required="required" />
						</div>
					</div>
					<input class="comment-input form-control bottom-border"
						id="subject" name="subject" type="text" value=""
						placeholder="SUBJECT" size="30" />
			<?php endif; ?>
</div>
				<!--<p>You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->

				<textarea name="comment" rows="10" cols="45" id="comment"
					aria-required="true" class="form-control bottom-border"
					placeholder="<?php esc_html_e('TYPE YOUR MESSAGE HERE*','pranon');?>"></textarea>

				<div class="form-submit">
					<button type="submit" class="btn" id="submit">
						<i class="fa fa-comment"></i><?php esc_html_e('Post Comment','pranon')?></button>
				<?php comment_id_fields(); ?>
			</div>

			<?php do_action('comment_form', $post->ID); ?>
		</form>
		</div>
		<?php endif;  ?>
	</div>
</div>
<?php endif; ?>