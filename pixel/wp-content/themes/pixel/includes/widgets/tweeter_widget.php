<?php
/**
 * Adds Foo_Widget widget.
 */
class Tweeter_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
				'tweeter_widget', // Base ID
				__( 'Pixel Tweet', 'pranon' ), // Name
				array( 'description' => __( 'Latest Tweet', 'pranon' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		if (wp_script_is ( 'tweet-theme', 'enqueued' )) {
				
			$tweet_array = array (
					'url' => get_template_directory_uri () . '/twitter/index.php',
					'number_tweet' => $instance['number_of_tweets'],
					'username'=>esc_html($instance['username'])
			);
			wp_localize_script ( 'script', 'tweet_obj', $tweet_array );
			wp_enqueue_script ( 'script' );
		}
		$html ='<p class="tweets"></p>';
		echo $html;
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'pranon' );
		$username = ! empty( $instance['username'] ) ? $instance['username'] : __( '@BenaissaGhrib', 'pranon' );
		$number_of_tweets = ! empty( $instance['number_of_tweets'] ) ? $instance['number_of_tweets'] : 5;
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e( 'Tweeter Username:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" type="text" value="<?php echo esc_attr( $username ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'number_of_tweets' ); ?>"><?php _e( 'Number of Tweete:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'number_of_tweets' ); ?>" name="<?php echo $this->get_field_name( 'number_of_tweets' ); ?>" type="text" value="<?php echo esc_attr( $number_of_tweets ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['username'] = ( ! empty( $new_instance['username'] ) ) ? strip_tags( $new_instance['username'] ) : '';
		$instance['number_of_tweets'] = ( ! empty( $new_instance['number_of_tweets'] ) ) ? strip_tags( $new_instance['number_of_tweets'] ) : '';

		return $instance;
	}

} // class Foo_Widget