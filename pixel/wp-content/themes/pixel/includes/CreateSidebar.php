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
	static function reg_footer_sidebar() {
		$args_sidebar = array (
				'name' => esc_html__ ( 'Pranon Footer Sidebar', 'pranon' ),
				'id' => 'blog-footer-sidebar-id',
				'description' => '',
				'class' => 'footer-widget-container',
				'before_widget' => ' <div class="col-md-3">
                    <div class="widget widget-about"><div id="%1$s">',
				'after_widget' => '</div></div></div>',
				'before_title' => ' <h4 class="widget-title">',
				'after_title' => '</h4>' 
		);
		
		register_sidebar ( $args_sidebar );
	}
}