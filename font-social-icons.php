<?php
/*
Plugin Name: Font Social Icons
Plugin URI: http://tor.raswill.se/
Description: Based on Nathan Rices Simple Social Icons. Uses foundation social font instead if sprites.
Author: Tor Raswill
Author URI: http://tor.raswill.se/

Version: 1.1.0

License: GNU General Public License v2.0 (or later)
License URI: http://www.opensource.org/licenses/gpl-license.php

Zurb Foundation font licensed under the MIT License
*/

class Font_Social_Icons_Widget extends WP_Widget {

	/**
	 * Default widget values.
	 *
	 * @var array
	 */
	protected $defaults;

	/**
	 * Default widget values.
	 *
	 * @var array
	 */
	protected $sizes;

	/**
	 * Default widget values.
	 *
	 * @var array
	 */
	protected $profiles;

	/**
	 * Constructor method.
	 *
	 * Set some global values and create widget.
	 */
	function __construct() {

		/**
		 * Default widget option values.
		 */
		$this->defaults = array(
			'title'					 => '',
			'new_window'		 => 0,
			'color_scheme'	 => 'colorful',
			'line_height'		 => 'oneandahalflh',
			'size'					 => 'tworem',
			'padding'				 => 'square',
			'alignment'			 => 'alignleft',
			'rss'					 	 => '',
			'twitter'				 => '',
      'facebook'			 => '',
			'linkedin'			 => '',
			'gplus'					 => '',
			'pinterest'			 => '',
			'youtube'				 => '',
			'vimeo'					 => '',
			'tumblr'				 => '',
			'github'				 => '',
			'path'					 => '',
			'dribbble'			 => '',
			'stumbleupon'		 => '',
			'behance'				 => '',
			'reddit'				 => '',
			'flickr'				 => '',
			'slideshare'		 => '',
			'picasa'				 => '',
			'skype'					 => '',
			'steam'					 => '',
			'instagram'			 => '',
			'foursquare'		 => '',
			'delicious'			 => '',
			'digg'					 => '',
			'wordpress'			 => '',
		);

		/**
		 * Social profile choices.
		 */
		$this->profiles = array(
			'rss' => array(
				'label'	  => __( 'RSS URI', 'fsiw' ),
				'pattern' => '<li><a title="RSS" class="foundicon-rss" href="%s" %s></a></li>'
			),
			'twitter' => array(
				'label'	  => __( 'Twitter URI', 'fsiw' ),
				'pattern' => '<li><a title="Twitter" class="foundicon-twitter" href="%s" %s></a></li>'
			),
			'facebook' => array(
				'label'	  => __( 'Facebook URI', 'fsiw' ),
				'pattern' => '<li><a title="Facebook" class="foundicon-facebook" href="%s" %s></a></li>'
			),
			'linkedin' => array(
				'label'	  => __( 'Linkedin URI', 'fsiw' ),
				'pattern' => '<li><a title="LinkedIn" class="foundicon-linkedin" href="%s" %s></a></li>'
			),
			'gplus' => array(
				'label'	  => __( 'Google+ URI', 'fsiw' ),
				'pattern' => '<li><a title="Google+" class="foundicon-google-plus" href="%s" %s></a></li>'
			),
			'pinterest' => array(
				'label'	  => __( 'Pinterest URI', 'fsiw' ),
				'pattern' => '<li><a title="Pinterest" class="foundicon-pinterest" href="%s" %s></a></li>'
			),
			'youtube' => array(
				'label'	  => __( 'Youtube URI', 'fsiw' ),
				'pattern' => '<li><a title="Youtube" class="foundicon-youtube" href="%s" %s></a></li>'
			),
			'vimeo' => array(
				'label'	  => __( 'Vimeo URI', 'fsiw' ),
				'pattern' => '<li><a title="Vimeo" class="foundicon-vimeo" href="%s" %s></a></li>'
			),
			'tumblr' => array(
				'label'	  => __( 'Tumblr URI', 'fsiw' ),
				'pattern' => '<li><a title="Tumblr" class="foundicon-tumblr" href="%s" %s></a></li>'
			),
			'github' => array(
				'label'   => __( 'GitHub URI', 'fsiw' ),
				'pattern' => '<li><a title="Github" class="foundicon-github" href="%s" %s></a></li>'
			),
			'path' => array(
				'label'   => __( 'Path URI', 'fsiw' ),
				'pattern' => '<li><a title="Path" class="foundicon-path" href="%s" %s></a></li>'
			),
			'dribbble' => array(
				'label'   => __( 'Dribbble URI', 'fsiw' ),
				'pattern' => '<li><a title="Dribble" class="foundicon-dribbble" href="%s" %s></a></li>'
			),
			'stumbleupon' => array(
				'label'   => __( 'StumbleUpon URI', 'fsiw' ),
				'pattern' => '<li><a title="StumbleUpon" class="foundicon-stumble-upon" href="%s" %s></a></li>'
			),
			'behance' => array(
				'label'   => __( 'Behance URI', 'fsiw' ),
				'pattern' => '<li><a title="Behance" class="foundicon-behance" href="%s" %s></a></li>'
			),
			'reddit' => array(
				'label'   => __( 'Reddit URI', 'fsiw' ),
				'pattern' => '<li><a title="Reddit" class="foundicon-reddit" href="%s" %s></a></li>'
			),
			'flickr' => array(
				'label'   => __( 'Flickr URI', 'fsiw' ),
				'pattern' => '<li><a title="Flickr" class="foundicon-flickr" href="%s" %s></a></li>'
			),
			'slideshare' => array(
				'label'   => __( 'Slideshare URI', 'fsiw' ),
				'pattern' => '<li><a title="Slideshare" class="foundicon-slideshare" href="%s" %s></a></li>'
			),
			'picasa' => array(
				'label'   => __( 'Picasa URI', 'fsiw' ),
				'pattern' => '<li><a title="Picasa" class="foundicon-picassa" href="%s" %s></a></li>'
			),
			'skype' => array(
				'label'   => __( 'Skype URI', 'fsiw' ),
				'pattern' => '<li><a title="Skype" class="foundicon-skype" href="%s" %s></a></li>'
			),
			'steam' => array(
				'label'   => __( 'Steam URI', 'fsiw' ),
				'pattern' => '<li><a title="Steam" class="foundicon-steam" href="%s" %s></a></li>'
			),
			'instagram' => array(
				'label'   => __( 'Instagram URI', 'fsiw' ),
				'pattern' => '<li><a title="Instgram" class="foundicon-instagram" href="%s" %s></a></li>'
			),
			'foursquare' => array(
				'label'   => __( 'Foursquare URI', 'fsiw' ),
				'pattern' => '<li><a title="Foursquare" class="foundicon-foursquare" href="%s" %s></a></li>'
			),
			'delicious' => array(
				'label'   => __( 'Delicious URI', 'fsiw' ),
				'pattern' => '<li><a title="Delicious" class="foundicon-delicious" href="%s" %s></a></li>'
			),
			'digg' => array(
				'label'   => __( 'Digg URI', 'fsiw' ),
				'pattern' => '<li><a title="Digg" class="foundicon-digg" href="%s" %s></a></li>'
			),
			'wordpress' => array(
				'label'   => __( 'Wordpress URI', 'fsiw' ),
				'pattern' => '<li><a title="Wordpress" class="foundicon-wordpress" href="%s" %s></a></li>'
			),
		);

		$widget_ops = array(
			'classname'	  => 'font-social-icons',
			'description' => __( 'Displays select social icons.', 'fsiw' ),
		);

		$control_ops = array(
			'id_base' => 'font-social-icons',
			#'width'   => 505,
			#'height'  => 350,
		);

		$this->WP_Widget( 'font-social-icons', __( 'Font Social Icons', 'fsiw' ), $widget_ops, $control_ops );

		/** Check if the widget is active (placed) */
		if( is_active_widget( '', '', 'font-social-icons' ) ) {
			/** if it is active, output the CSS */
			//wp_register_style( 'fsiw-css', plugins_url('fsiw.css', __FILE__), array(), '1.3', 'all' );
			wp_register_style( 'fsiw-css', plugins_url('fsiw.min.css', __FILE__), array(), '1.3', 'all' );
      wp_enqueue_style( 'fsiw-css' );

      /** If the browser is IE7 add the IE7 specific stylesheet */
			$browser = $_SERVER['HTTP_USER_AGENT'];
			if (preg_match("/MSIE 7.0/i", $browser)) {
	    	wp_register_style( 'fsiw-css-ie7', plugins_url('fsiw_ie7.css', __FILE__), array(), '1.3', 'all' );
	      wp_enqueue_style( 'fsiw-css-ie7' );
			}

		}

	}

	/**
	 * Widget Form.
	 *
	 * Outputs the widget form that allows users to control the output of the widget.
	 *
	 */
	function form( $instance ) {

		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" /></p>

		<p><label><input id="<?php echo $this->get_field_id( 'new_window' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'new_window' ); ?>" value="1" <?php checked( 1, $instance['new_window'] ); ?>/> <?php esc_html_e( 'Open links in new window?', 'fsiw' ); ?></label></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'color_scheme' ); ?>"><?php _e( 'Color scheme', 'fsiw' ); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'color_scheme' ); ?>" name="<?php echo $this->get_field_name( 'color_scheme' ); ?>">
				<option value="colorful" <?php selected( 'colorful', $instance['color_scheme'] ) ?>><?php _e( 'Colorful', 'fsiw' ); ?></option>
				<option value="grayscale" <?php selected( 'grayscale', $instance['color_scheme'] ) ?>><?php _e( 'Grayscale', 'fsiw' ); ?></option>
				<option value="graytocolor" <?php selected( 'graytocolor', $instance['color_scheme'] ) ?>><?php _e( 'Gray-to-Color', 'fsiw' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'line_height' ); ?>"><?php _e( 'Line height', 'fsiw' ); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'line_height' ); ?>" name="<?php echo $this->get_field_name( 'line_height' ); ?>">
				<option value="onelh" <?php selected( 'onelh', $instance['line_height'] ) ?>><?php _e( '1', 'fsiw' ); ?></option>
				<option value="oneandahalflh" <?php selected( 'oneandahalflh', $instance['line_height'] ) ?>><?php _e( '1.5', 'fsiw' ); ?></option>
				<option value="twolh" <?php selected( 'twolh', $instance['line_height'] ) ?>><?php _e( '2', 'fsiw' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'size' ); ?>"><?php _e( 'Font Size', 'ssiw' ); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'size' ); ?>" name="<?php echo $this->get_field_name( 'size' ); ?>">
				<option value="onerem" <?php selected( 'onerem', $instance['size'] ) ?>><?php _e( '1 rem/10px', 'fsiw' ); ?></option>
				<option value="oneandhalfrem" <?php selected( 'oneandhalfrem', $instance['size'] ) ?>><?php _e( '1.5rem/15px', 'fsiw' ); ?></option>
				<option value="tworem" <?php selected( 'tworem', $instance['size'] ) ?>><?php _e( '2rem/20px', 'fsiw' ); ?></option>
				<option value="threerem" <?php selected( 'threerem', $instance['size'] ) ?>><?php _e( '3rem/30px', 'fsiw' ); ?></option>
				<option value="fourrem" <?php selected( 'fourrem', $instance['size'] ) ?>><?php _e( '4rem/40px', 'fsiw' ); ?></option>
				<option value="fiverem" <?php selected( 'fiverem', $instance['size'] ) ?>><?php _e( '5rem/50px', 'fsiw' ); ?></option>
				?>
			</select>
		</p>


		<p>
			<label for="<?php echo $this->get_field_id( 'padding' ); ?>"><?php _e( 'Padding', 'ssiw' ); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'padding' ); ?>" name="<?php echo $this->get_field_name( 'padding' ); ?>">
				<option value="pnone" <?php selected( 'pnone', $instance['padding'] ) ?>><?php _e( 'None', 'fsiw' ); ?></option>
				<option value="square" <?php selected( 'square', $instance['padding'] ) ?>><?php _e( 'Square', 'fsiw' ); ?></option>
				<option value="ponerem" <?php selected( 'ponerem', $instance['padding'] ) ?>><?php _e( '1 rem/10px', 'fsiw' ); ?></option>
				<option value="poneandhalfrem" <?php selected( 'poneandhalfrem', $instance['padding'] ) ?>><?php _e( '1.5rem/15px', 'fsiw' ); ?></option>
				<option value="ptworem" <?php selected( 'ptworem', $instance['padding'] ) ?>><?php _e( '2rem/20px', 'fsiw' ); ?></option>
				<option value="pthreerem" <?php selected( 'pthreerem', $instance['padding'] ) ?>><?php _e( '3rem/30px', 'fsiw' ); ?></option>
				<option value="pfourrem" <?php selected( 'pfourrem', $instance['padding'] ) ?>><?php _e( '4rem/40px', 'fsiw' ); ?></option>
				<option value="pfiverem" <?php selected( 'pfiverem', $instance['padding'] ) ?>><?php _e( '5rem/50px', 'fsiw' ); ?></option>
				?>
			</select>
		</p>


		<p>
			<label for="<?php echo $this->get_field_id( 'alignment' ); ?>"><?php _e( 'Alignment', 'fsiw' ); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'alignment' ); ?>" name="<?php echo $this->get_field_name( 'alignment' ); ?>">
				<option value="alignleft" <?php selected( 'alignright', $instance['alignment'] ) ?>><?php _e( 'Align Left', 'fsiw' ); ?></option>
				<option value="alignright" <?php selected( 'alignright', $instance['alignment'] ) ?>><?php _e( 'Align Right', 'fsiw' ); ?></option>
			</select>
		</p>

		<hr style="background: #ccc; border: 0; height: 1px; margin: 20px 0;" />

		<?php
		foreach ( (array) $this->profiles as $profile => $data ) {

			printf( '<p><label for="%s">%s:</label>', esc_attr( $this->get_field_id( $profile ) ), esc_attr( $data['label'] ) );
			printf( '<input type="text" id="%s" class="widefat" name="%s" value="%s" /></p>', esc_attr( $this->get_field_id( $profile ) ), esc_attr( $this->get_field_name( $profile ) ), esc_url( $instance[$profile] ) );

		}

	}

	/**
	 * Form validation and sanitization.
	 *
	 * Runs when you save the widget form. Allows you to validate or sanitize widget options before they are saved.
	 *
	 */
	function update( $newinstance, $oldinstance ) {

		foreach ( $newinstance as $key => $value ) {

			/** Sanitize Profile URIs */
			/*elseif ( array_key_exists( $key, (array) $this->profiles ) ) {*/
      if ( array_key_exists( $key, (array) $this->profiles ) ) {
				$newinstance[$key] = esc_url( $newinstance[$key] );
			}

		}

		return $newinstance;

	}

  
	/**
	 * Widget Output.
	 *
	 * Outputs the actual widget on the front-end based on the widget options the user selected.
	 *
	 */
	function widget( $args, $instance ) {

		extract( $args );

		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		echo $before_widget;

			if ( ! empty( $instance['title'] ) )
				echo $before_title . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $after_title;

			$output = '';

			$new_window = $instance['new_window'] ? 'target="_blank"' : '';

			foreach ( (array) $this->profiles as $profile => $data ) {
				if ( ! empty( $instance[$profile] ) )
					$output .= sprintf( $data['pattern'], esc_url( $instance[$profile] ), $new_window );
			}

			if ( $output )
				printf( '<ul class="%s %s %s %s %s">%s</ul>', $instance['color_scheme'], $instance['line_height'], $instance['alignment'], $instance['size'], $instance['padding'], $output );

		echo $after_widget;

	}

}

add_action( 'widgets_init', 'fsiw_load_widget' );
/**
 * Widget Registration.
 *
 * Register Simple Social Icons widget.
 *
 */
function fsiw_load_widget() {

	register_widget( 'Font_Social_Icons_Widget' );

}