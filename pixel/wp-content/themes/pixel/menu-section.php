<?php defined('ABSPATH') or die("No script kiddies please!");?>

<header id="header">
<?php if (!is_front_page()) { $menuClass ='fixed'; }else $menuClass = 'default';?>
	<!--Main header-->
	<div class="mainHeader <?php echo $menuClass;?> mobile">
		<!--Container-->
		<div class="container clearfix">
			<div class="three columns logoHolder">
				<!--Logo-->
				<div class="logo">
					<a href="index.html"><img src="images/logoD.png" alt="" /></a>
				</div>
				<!--End logo-->
			</div>
			<div class="thirteen columns tRight">

				<a href="#" class="mobileBtn"><i class="icon-menu"></i></a>
				<!--Navigation-->
				  <?php
						$fornt_page = 'scrollto';
						$object;
						if (is_front_page ()) {
							$object = new Pranon_Nav_Menu ( $fornt_page );
						} else {
							$object = new Pranon_Nav_Menu ( $fornt_page = '' );
						}
						$defaults = array (
								'theme_location' => 'single_page',
								'menu' => '',
								'container' => 'nav',
								'container_class' => 'mainNav',
								'container_id' => 'menu',
								'menu_class' => '',
								'menu_id' => '',
								'echo' => true,
								'fallback_cb' => 'wp_page_menu',
								'before' => '',
								'after' => '',
								'link_before' => '',
								'link_after' => '',
								'items_wrap' => '<ul id="%1$s" class="%2$s"  data-wow-offset="30">%3$s</ul>',
								'depth' => 0,
								'walker' => $object 
						);
						
						$defaults_multi = array (
								'theme_location' => 'multi_page',
								'menu' => '',
								'container' => 'nav',
								'container_class' => 'mainNav',
								'container_id' => 'menu',
								'menu_class' => '',
								'menu_id' => '',
								'echo' => true,
								'fallback_cb' => 'wp_page_menu',
								'before' => '',
								'after' => '',
								'link_before' => '',
								'link_after' => '',
								'items_wrap' => '<ul id="%1$s" class="%2$s"  data-wow-offset="30">%3$s</ul>',
								'depth' => 0,
								'walker' => new Pranon_Nav_Menu ( $fornt_page = 'alter' ) 
						);
						if (has_nav_menu ( 'single_page' )) {
							wp_nav_menu ( $defaults );
						} elseif (has_nav_menu ( 'multi_page' )) {
							wp_nav_menu ( $defaults_multi );
						}
						
						?> 
			</div>
			<!--End container-->
		</div>
		<!--End main header-->
	</div>

</header>
<!--End header-->