<?php
defined ( 'ABSPATH' ) or die ( "No script kiddies please!" );

get_header ();

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
	$img .= ' <div class="postMedia postSlider slider flexslider single"> <ul class="slides">';
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
<?php get_template_part ( 'menu-section' );?>
<section class="blogSingle bgGrey ofsTop  tCenter">

	<!--Container-->
	<div class="container clearfix">

		<!--Blog single intro inner-->
		<div class="pSingleIntroInner singleOffset ofsBottom">

			<!--Title-->
			<div class="title">
				<h1>
					<?php echo get_the_title()?><span class="plus">+</span>
				</h1>
			</div>
			<!--End title-->


			<!--Post meta-->
			<div class="postMeta ofsTSmall ofsBSmall">
				<span class="metaCategory"><a href="#"><?php echo $cat;?> </a></span>
				<span class="metaDate"><a href="#"> - <?php echo get_the_time(get_option( 'date_format' ));?> - </a></span>
				<span class="metaComments"><a href="#comments"><?php comments_number('0  Comment', '1  Comment', '%  Comments' );?></a></span>
			</div>
			<!--End post meta-->
<?php if (get_the_excerpt()!='') {?>
			<!--Project intro-->
			<div class="pSingleIntro  ">
				<p><?php echo get_the_excerpt();?></p>
			</div>
			<!--End project intro-->
<?php }?>



			<!--Projects share-->
			<ul class="pSingleSocials margTMedium">
				work on dynamic
				<li><a href="#"><i class="icon-facebook"></i></a></li>
				<li><a href="#"><i class="icon-linkedin"></i></a></li>
				<li><a href="#"><i class="icon-twitter"></i></a></li>
				<li><a href="#"><i class="icon-instagram"></i></a></li>

			</ul>
			<!--End project share-->


		</div>
		<!--End blog single intro inner-->


	</div>
	<!--End container-->






	<!--Blog single details-->
	<div class="pSingleDetails  bgLight">

		<?php
		
		if (have_posts ()) :
			
			while ( have_posts () ) :
				the_post ();
				?>
				
				<!--Post navigation-->
		<div class="postNav ofsTop ofsBottom  bgGreyDark">
			<?php echo (AfterSetupTheme::get_next_post_link(get_the_ID()));?>
		</div>
		<!--End post navigation-->


		<!--Container-->
		<div class="container clearfix">

			<div class="eleven columns">
				<!--Blog single details inner-->
				<div class="pSingleDetailsInner tLeft columns margMTop">


					<!--Post author-->
					<div class="pAuthor tCenter margBottom">

						<!--Author image-->
						<div class="authorImg ">
						<?php echo get_avatar( get_the_author_meta( 'email'), '120' ); ?> 
					</div>
						<!--End author image-->


						<!--Author name-->
						<div class="authorName ofsTSmall">
							<h3>
								<span><?php echo esc_html__('posted by ','pranon')?></span> <?php echo get_the_author_meta( 'user_nicename');?>
						</h3>
						</div>
						<!--End author name-->

					</div>
					<!--End post author-->


					<!--Post Single-->
					<div class="postSingle">

						<!--Post content-->
						<div class="postContent">
						
						<?php if(get_post_format()=='gallery'){ echo $img;?>
						<?php }elseif(get_post_format()=='video'){?>
						<div class="postMedia single">

								<iframe height="514"
									src="<?php echo htmlspecialchars(get_post_meta(get_the_ID(),'pranon_video_url',true));?>"></iframe>

							</div>
						<?php }elseif(get_post_format()=='audio'){?>
						<div class="postMedia single">

								<iframe height="170"
									src="<?php echo htmlspecialchars(get_post_meta(get_the_ID(),'pranon_video_url',true));?>"></iframe>

							</div>
						<?php } else {?>
						<div class="postMedia single">
							<?php echo get_the_post_thumbnail(get_the_ID(),'single_post',false);?>
						</div>
						<?php }?>
						<?php echo get_the_content();?>

						<div class="tagsSingle clearfix">
								<h4>
									<i class="icon-tag-1"></i><?php echo esc_html__('Tags','pranon');?> :
							</h4>
							<?php echo AfterSetupTheme::get_terms(get_the_ID()); ?>
						</div>



						</div>
						<!--End post content-->

					</div>
					<!--End post single-->


				</div>
				<!--End blog single details inner-->
			</div>

		
		<?php
			endwhile
			;
		 else :
			get_template_part ( 'content', 'none' );
		

		endif;
		?>

<div class="five columns sidebar tLeft margMTop"><?php get_sidebar()?></div>
		</div>
		<!--End container-->
	</div>
	<!--End blog single details-->



	<!--Comments holder-->
	<div class="commentsHolder middle bgGrey ofsTop ofsBottom">


		<!--Container-->
		<div class="container clearfix">

			<!--Comments holder inner-->
			<div class="commentsHolderInner middle thirteen tLeft columns ">

<?php
if (comments_open () || get_comments_number ()) :
	comments_template ();

	
endif;
?>

			</div>
			<!--End comments holder inner-->

		</div>
		<!--End container-->


	</div>
	<!--End comments holder-->



</section>
<!--End project single-->
<?php get_footer();?>