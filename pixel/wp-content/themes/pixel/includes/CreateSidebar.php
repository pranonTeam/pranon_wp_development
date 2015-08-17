<?php
class CreateSidebar {
	static function pranon_custom_sidebar() {
		$args_sidebar = array (
				'name' => esc_html__ ( 'Pranon Sidebar', 'pranon' ),
				'id' => 'blog-sidebar-id',
				'description' => '',
				'class' => 'blog-widget-container',
				'before_widget' => '<div class="widget">
                    <div id="%1$s">',
				'after_widget' => '</div></div>',
				'before_title' => ' <h2 class="widget-title">',
				'after_title' => '</h2>' 
		);
		
		register_sidebar ( $args_sidebar );
	}
	static function pranon_footer_sidebar() {
		$args_sidebar = array (
				'name' => esc_html__ ( 'Pranon Footer Sidebar', 'pranon' ),
				'id' => 'footer-sidebar-id',
				'description' => '',
				'class' => 'one-third column ftWidget',
				'before_widget' => '<div class="one-third column ftWidget" id="%1$s">',
				'after_widget' => '</div>',
				'before_title' => ' <h2 class="widget-title">',
				'after_title' => '</h2>' 
		);
		
		register_sidebar ( $args_sidebar );
	}
	
	static function pranon_tweet_widget(){
		register_widget( 'Tweeter_Widget' );
	}
}