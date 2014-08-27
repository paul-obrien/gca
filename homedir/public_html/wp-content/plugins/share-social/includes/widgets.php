<?php
/**
 * Adds Cunjo_Profiles widget.
 */
class Cunjo_Profiles_Widget extends WP_Widget {

	protected $view_data;
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'cunjo_profiles', // Base ID
			__('Social profiles (Cunjo plugin)', 'cunjo'), // Name
			array( 'description' => __( 'Display Icons links to your social profiles', 'cunjo' ), ) // Args
		);
		$this->setting_manager = new setting_manger();
		$this->view_data['wp_options'] = $this->setting_manager->get_wp_options();
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
		$title = apply_filters( 'widget_title', $instance['title'] );
		$icons = $instance['icons'];

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		?>
        <div class="cunjo-social-profiles cunjo-<?php echo $icons; ?> clearfix">                        
	                   	
            <ul>
                <?php if($this->view_data['wp_options']['cunjoshare_twitter'] != '') : ?>
                    <li class="twitter">
                        <a href="https://twitter.com/<?php echo $this->view_data['wp_options']['cunjoshare_twitter']; ?>" title="Twitter" target="_blank"></a>
                    </li>
                <?php endif; ?>
                
                <?php if($this->view_data['wp_options']['cunjoshare_facebook'] != '') : ?>
                    <li class="facebook">
                        <a href="<?php echo $this->view_data['wp_options']['cunjoshare_facebook']; ?>" title="Facebook"></a>
                    </li>
                <?php endif; ?>
                
                <?php if($this->view_data['wp_options']['cunjoshare_google'] != '') : ?>
                    <li class="googleplus">
                        <a href="<?php echo $this->view_data['wp_options']['cunjoshare_google']; ?>" title="Google Plus"></a>
                    </li>
                <?php endif; ?>
                
                <?php if($this->view_data['wp_options']['cunjoshare_linkedin'] != '') : ?>
                    <li class="linkedin">
                        <a href="<?php echo $this->view_data['wp_options']['cunjoshare_linkedin']; ?>" title="LinkedIn"></a>
                    </li>
                <?php endif; ?>
                                
                <?php if($this->view_data['wp_options']['cunjoshare_rss'] != '') : ?>
                    <li class="rss">
                        <a href="<?php echo $this->view_data['wp_options']['cunjoshare_rss']; ?>" title="RSS Feed"></a>
                    </li>
                <?php endif; ?>
                
                <?php if($this->view_data['wp_options']['cunjoshare_dribbble'] != '') : ?>
                    <li class="dribbble">
                        <a href="http://dribbble.com/<?php echo $this->view_data['wp_options']['cunjoshare_dribbble']; ?>" title="Dribbble"></a>
                    </li>
                <?php endif; ?>
                
                <?php if($this->view_data['wp_options']['cunjoshare_vimeo'] != '') : ?>
                    <li class="vimeo">
                        <a href="<?php echo $this->view_data['wp_options']['cunjoshare_vimeo']; ?>" title="Vimeo"></a>
                    </li>
                <?php endif; ?>
                
                <?php if($this->view_data['wp_options']['cunjoshare_youtube'] != '') : ?>
                    <li class="youtube">
                        <a href="<?php echo $this->view_data['wp_options']['cunjoshare_youtube']; ?>" title="YouTube"></a>
                    </li>
                <?php endif; ?>
                                
                <?php if($this->view_data['wp_options']['cunjoshare_flickr'] != '') : ?>
                    <li class="flickr">
                        <a href="<?php echo $this->view_data['wp_options']['cunjoshare_flickr']; ?>" title="Flickr"></a>
                    </li>
                <?php endif; ?>
                
                <?php if($this->view_data['wp_options']['cunjoshare_digg'] != '') : ?>
                    <li class="digg">
                        <a href="<?php echo $this->view_data['wp_options']['cunjoshare_digg']; ?>" title="Digg"></a>
                    </li>
                <?php endif; ?>
                                
                <?php if($this->view_data['wp_options']['cunjoshare_pinterest'] != '') : ?>
                    <li class="pinterest">
                        <a href="http://www.pinterest.com/<?php echo $this->view_data['wp_options']['cunjoshare_pinterest']; ?>" title="Pinterest"></a>
                    </li>
                <?php endif; ?>
                
                <?php if($this->view_data['wp_options']['cunjoshare_stumbleupon'] != '') : ?>
                    <li class="stumbleupon">
                        <a href="<?php echo $this->view_data['wp_options']['cunjoshare_stumbleupon']; ?>" title="Stumble Upon"></a>
                    </li>
                <?php endif; ?>
                
                <?php if($this->view_data['wp_options']['cunjoshare_delicious'] != '') : ?>
                    <li class="delicious">
                        <a href="<?php echo $this->view_data['wp_options']['cunjoshare_delicious']; ?>" title="Delicious"></a>
                    </li>
                <?php endif; ?>
                
                <?php if($this->view_data['wp_options']['cunjoshare_instagram'] != '') : ?>
                    <li class="instagram">
                        <a href="<?php echo $this->view_data['wp_options']['cunjoshare_instagram']; ?>" title="Instagram"></a>
                    </li>
                <?php endif; ?>
                                
                <?php if($this->view_data['wp_options']['cunjoshare_behance'] != '') : ?>
                    <li class="behance">
                        <a href="<?php echo $this->view_data['wp_options']['cunjoshare_behance']; ?>" title="Behance"></a>
                    </li>
                <?php endif; ?>
                
                <?php if($this->view_data['wp_options']['cunjoshare_email'] != '') : ?>
                    <li class="email">
                        <a href="mailto:<?php echo $this->view_data['wp_options']['cunjoshare_email']; ?>" title="Email"></a>
                    </li>
                <?php endif; ?>
                
            </ul>		
        	<div style="clear:both"></div>
        </div>	<!-- END .bean-social-profiles clearfix -->
        <?php
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
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'cunjo' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <p>
		<label for="<?php echo $this->get_field_id( 'icons' ); ?>"><?php _e( 'Icons:' ); ?></label> 
		<select id="<?php echo $this->get_field_id( 'icons' ); ?>" name="<?php echo $this->get_field_name( 'icons' ); ?>">
        
        	<option value="metro" <?php echo($instance['icons'] == 'metro')? 'selected': ''; ?>>Metro</option>
            
            <option value="round" <?php echo($instance['icons'] == 'round')? 'selected': ''; ?>>Round</option>
        
            <option value="icons" <?php echo($instance[ 'icons' ] == 'icons')? 'selected': ''; ?>>Shiny</option>

            <option value="satin" <?php echo($instance['icons'] == 'satin')? 'selected': ''; ?>>Satin</option>

            <option value="elegant" <?php echo($instance['icons'] == 'elegant')? 'selected': ''; ?>>Elegant</option>
            
            <option value="milky" <?php echo($instance['icons'] == 'milky')? 'selected': ''; ?>>Milky</option>
            
            <option value="bald" <?php echo($instance['icons'] == 'bald')? 'selected': ''; ?>>Bald</option>
            
        </select>
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
		$instance['icons'] = ( ! empty( $new_instance['icons'] ) ) ? strip_tags( $new_instance['icons'] ) : '';

		return $instance;
	}

} // class Cunjo_Profiles_Widget

/**
 * Adds Cunjo_Tweets widget.
 */
class Cunjo_Tweets extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'cunjo_tweets', // Base ID
			__('Twitter Feed (Cunjo plugin)', 'cunjo'), // Name
			array( 'description' => __( 'Display latest tweets', 'cunjo' ), ) // Args
		);
		$this->setting_manager = new setting_manger();
		$this->view_data['wp_options'] = $this->setting_manager->get_wp_options();
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
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		?>
        	<div id="cunjo-tweets"></div>
            <script type="text/javascript">
			jQuery(function(){
				jQuery('#cunjo-tweets').tweetable({
					username: '<?php echo $this->view_data['wp_options']['cunjoshare_twitter']; ?>', 
					time: <?php echo $instance['time']; ?>,
					rotate: <?php echo $instance['rotate']; ?>,
					speed: 4000, 
					limit: <?php echo $instance['limit']; ?>,
					replies: false,
					position: 'append',
					failed: "Sorry, twitter is currently unavailable for this user.",
					loading: "Loading tweets...",
					html5: true,
					onComplete:function($ul){
						jQuery('time').timeago();
					}
				});
			});
			</script>
        <?
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
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Latest tweets', 'cunjo' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <p>
		<label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e( 'Limit:' ); ?></label> 
		<input id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="text" value="<?php echo $instance[ 'limit' ]; ?>" /><br />
        <span><small>No. of tweets to be displayed</small></span>
		</p>
        <p>
		<label for="<?php echo $this->get_field_id( 'rotate' ); ?>"><?php _e( 'Display:' ); ?></label> 
		<select class="widefat" id="<?php echo $this->get_field_id( 'rotate' ); ?>" name="<?php echo $this->get_field_name( 'rotate' ); ?>">
        
        	<option value="false" <?php echo($instance['rotate'] == 'false')? 'selected': ''; ?>>Show all</option>
            
            <option value="true" <?php echo($instance['rotate'] == 'true')? 'selected': ''; ?>>One by one (rotate)</option>
            
        </select>
		</p>
        <p>
		<label for="<?php echo $this->get_field_id( 'time' ); ?>"><?php _e( 'Display date:' ); ?></label> 
		<select id="<?php echo $this->get_field_id( 'time' ); ?>" name="<?php echo $this->get_field_name( 'time' ); ?>">
        
        	<option value="true" <?php echo($instance['time'] == 'true')? 'selected': ''; ?>>Yes</option>
            
            <option value="false" <?php echo($instance['time'] == 'false')? 'selected': ''; ?>>No</option>
            
        </select>
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
		$instance['limit'] = ( ! empty( $new_instance['limit'] ) ) ? strip_tags( $new_instance['limit'] ) : '5';
		$instance['rotate'] = ( ! empty( $new_instance['rotate'] ) ) ? strip_tags( $new_instance['rotate'] ) : 'false';
		$instance['time'] = ( ! empty( $new_instance['time'] ) ) ? strip_tags( $new_instance['time'] ) : 'true';

		return $instance;
	}

} // class Cunjo_Tweets

/**
 * Adds Cunjo_Shots widget.
 */
class Cunjo_Shots extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'cunjo_shots', // Base ID
			__('Dribbble Shots (Cunjo plugin)', 'cunjo'), // Name
			array( 'description' => __( 'Display Dribbble images with links', 'cunjo' ), ) // Args
		);
		$this->setting_manager = new setting_manger();
		$this->view_data['wp_options'] = $this->setting_manager->get_wp_options();
	}
	
	public function do_cunjo_dribbbler( $shots ) {

		// CHECK FOR CACHED VERSION
		$key = 'cunjo_widget_dribbbler_' . $account;
		$shots_cache = get_transient($key);
	
		if( $shots_cache === false ) {
		
			$url 		= 'http://api.dribbble.com/players/'. $this->view_data['wp_options']['cunjoshare_dribbble'] .'/shots/?per_page=12';
			$response 	= wp_remote_get( $url );
	
			if( is_wp_error( $response ) ) 
				return;
	
			$xml = wp_remote_retrieve_body( $response );
	
			if( is_wp_error( $xml ) )
				return;
	
			if( $response['headers']['status'] == 200 ) {
	
				$json = json_decode( $xml );
				$dribbble_shots = $json->shots;
	
				set_transient($key, $dribbble_shots, 60*5);
			}
			
		} else {
			
			$dribbble_shots = $shots_cache;
		
		}
	
		if( $dribbble_shots ) {
			
			$i = 0;
			
			$wp_media_size = get_intermediate_image_sizes();
			
			$output = '<div class="cunjo-dribbble-shots">';
	
			foreach( $dribbble_shots as $dribbble_shot ) {
			
				if( $i == $shots )
					break;
				
				$output .= '<div class="cunjo-shot">';
	
				$output .= '<a href="' . $dribbble_shot->url . '" target="blank">';
				$output .= '<img width="' . get_site_option( 'thumbnail_size_w' ) . '" src="' . $dribbble_shot->image_url . '" alt="" />';
				$output .= '</a>';
				$output .= '</div>';
				
				
				$i++;
			}
	
			$output .= '<div style="clear: both;"></div>';
			$output .= '</div>';
			
		} else { $output = '' . __('Sorry. Could not connect to Dribbble.', 'cunjo') . '</div>'; }
	
		return $output;
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
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		echo $this->do_cunjo_dribbbler($instance['shots']);
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
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <p>
		<label for="<?php echo $this->get_field_id( 'shots' ); ?>"><?php _e( 'Number of shots:' ); ?></label> 
		<input id="<?php echo $this->get_field_id( 'shots' ); ?>" name="<?php echo $this->get_field_name( 'shots' ); ?>" type="text" value="<?php echo $instance[ 'shots' ]; ?>" />
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
		$instance['shots'] = ( ! empty( $new_instance['shots'] ) ) ? strip_tags( $new_instance['shots'] ) : '';

		return $instance;
	}

} // class Cunjo_Shots

/**
 * Adds Cunjo_Pins widget.
 */
class Cunjo_Pins extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'cunjo_pins', // Base ID
			__('Pinterest pins (Cunjo plugin)', 'cunjo'), // Name
			array( 'description' => __( 'Display Pinterest pin images with links', 'cunjo' ), ) // Args
		);
		$this->setting_manager = new setting_manger();
		$this->view_data['wp_options'] = $this->setting_manager->get_wp_options();
	}
	
	public function do_cunjo_pins( $limit, $boardname ) {
		
		include_once(ABSPATH . WPINC . '/feed.php');
		
		if( $boardname == '' ){
			$pinsfeed = 'http://pinterest.com/'.  $this->view_data['wp_options']['cunjoshare_pinterest'] .'/feed.rss';
		}
		else $pinsfeed = 'http://pinterest.com/'.  $this->view_data['wp_options']['cunjoshare_pinterest'] .'/'.$boardname.'/rss';
		
		// Get a SimplePie feed object from the Pinterest feed source
		$rss = fetch_feed($pinsfeed);
		$rss->set_timeout(60);
		
		// Figure out how many total items there are.               
		$maxitems = $rss->get_item_quantity((int)$limit);

		// Build an array of all the items, starting with element 0 (first element).
		$rss_items = $rss->get_items(0,$limit);
		
		if( $rss_items ) {
			
			$i = 0;
			
			$wp_media_size = get_intermediate_image_sizes();
			
			$output = '<div class="cunjo-pinterest-pins">';
	
			foreach( $rss_items as $item ) {
			
				if( $i == $rss_items )
					break;
				
				$output .= '<div class="cunjo-pin">';
	
				$output .= '<a href="' . $item->get_permalink() . '" target="blank">';
				if ($thumb = $item->get_item_tags(SIMPLEPIE_NAMESPACE_MEDIARSS, 'thumbnail') ) {
					$thumb = $thumb[0]['attribs']['']['url'];											
					$output .= '<img src="'.$thumb.'"'; 
					$output .= ' alt="'.$item->get_title().'"/>';
				}  else {
					preg_match('/src="([^"]*)"/', $item->get_content(), $matches);
					$src = $matches[1];
					
					if ($matches) {
					  $output .= '<img src="'.$src.'"'; 
					$output .= ' alt="'.$item->get_title().'"/>';
					} else {
					  $output .= "thumbnail not available";
					}
				} 
				$output .= '</a>';
				$output .= "<span class='imgtitle'><small>".$item->get_title()."</small></span>";
				$output .= '</div>';
				
				
				$i++;
			}
	
			$output .= '<div style="clear: both;"></div>';
			$output .= '</div>';
			
		} else { $output = '' . __('Sorry. Could not connect to Pinterest.', 'cunjo') . '</div>'; }
	
		return $output;
			
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
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		echo $this->do_cunjo_pins($instance['limit'], $instance['boardname']);
		if($instance['follow'] == 'yes') {
			echo '<div class="cunjo-pin-follow"><a href="http://pinterest.com/'. $this->view_data['wp_options']['cunjoshare_pinterest'] .'" target="_blank"><img src="http://passets-cdn.pinterest.com/images/follow-on-pinterest-button.png" /></a></div>';
		}
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
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <p>
		<label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e( 'Number of pins:' ); ?></label> 
		<input id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="text" value="<?php echo $instance[ 'limit' ]; ?>" />
		</p>
        <p>
		<label for="<?php echo $this->get_field_id( 'boardname' ); ?>"><?php _e( 'Boardname:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'boardname' ); ?>" name="<?php echo $this->get_field_name( 'boardname' ); ?>" type="text" value="<?php echo $instance[ 'boardname' ]; ?>" />
        <span><small>leave empty if all</small></span>
		</p>
        <p>
		<label for="<?php echo $this->get_field_id( 'follow' ); ?>"><?php _e( 'Display follow me button:' ); ?></label> 
		<select id="<?php echo $this->get_field_id( 'follow' ); ?>" name="<?php echo $this->get_field_name( 'follow' ); ?>">
        
        	<option value="yes" <?php echo($instance['follow'] == 'yes')? 'selected': ''; ?>>Yes</option>
            
            <option value="no" <?php echo($instance['follow'] == 'no')? 'selected': ''; ?>>No</option>
            
        </select>
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
		$instance['limit'] = ( ! empty( $new_instance['limit'] ) ) ? strip_tags( $new_instance['limit'] ) : '10';
		$instance['boardname'] = ( ! empty( $new_instance['boardname'] ) ) ? strip_tags( $new_instance['boardname'] ) : '';
		$instance['follow'] = ( ! empty( $new_instance['follow'] ) ) ? strip_tags( $new_instance['follow'] ) : '';

		return $instance;
	}

} // class Cunjo_Pins
?>