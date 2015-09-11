<?php
class pranonWooCommerce {
	static function pranon_products_column_change(){
		return AfterSetupTheme::pranon_return_thme_option('number-of-product'); 
	}
	static function pranon_woocommerce_before_cart(){
		echo '<div class="cart "><div class="cartHolder clearfix tLeft ofsTop ofsBottom bgGrey">
								<div class="container clearfix">
								<div class="woocommerce clearfix">';
	}
	
	static function pranon_woocommerce_after_cart(){
		echo '</div></div></div></div>';
	}
	static function pranon_woocommerce_before_cart_table(){
		echo '<div class="sixteen columns">';
	}
	static function pranon_woocommerce_after_cart_table(){
		echo '</div>';
	}
	static function pranon_woocommerce_checkout_before_order_review(){
		echo '<div class="order sixteen columns">';
	}
	static function pranon_woocommerce_checkout_after_order_review(){
		echo '</div>';
	}
	
	
}