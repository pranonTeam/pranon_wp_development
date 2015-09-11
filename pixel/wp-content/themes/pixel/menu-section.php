<?php defined('ABSPATH') or die("No script kiddies please!");?>

<header id="header">
<?php if (!is_front_page() && !is_page_template( 'forntpage.php' )) { $menuClass ='fixed'; }else $menuClass = 'default';?>
	<!--Main header-->
	<div class="mainHeader <?php echo $menuClass;?> mobile">
		<!--Container-->
		<div class="container clearfix">
			<div class="three columns logoHolder">
				<!--Logo-->
				<div class="logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(AfterSetupTheme::pranon_return_thme_option('logo','url'));?>" alt="" /></a>
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
				<?php if (class_exists('Woocommerce')) {
				 global $woocommerce;
				 // get cart quantity
				$qty = $woocommerce->cart->get_cart_contents_count();

				// get cart total
				$total = $woocommerce->cart->get_cart_total();

				// get cart url
				$cart_url = $woocommerce->cart->get_cart_url();
			
			 ?>
			
			 <li class="cart" id="cart-icon" style="display:none;"><a href="<?php echo esc_url($cart_url)?>"><i class="icon-basket"></i><span class="count woocommerce"><?php echo esc_url($qty)?></span></a></li>
				<?php }?>
			</div>
			<!--End container-->
		</div>
		<!--End main header-->
	</div>

</header>
<!--End header-->