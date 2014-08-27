<?php

define('_DEBUG_BAR', FALSE);

class inline_bar_outputter
{
    protected $view_data;
    private $setting_manager;
    private $layout;

    public function __construct()
    {
        return $this;
    }
    
    public function set_display_layout($layout)
    {
        $this->layout = $layout;
        $this->setting_manager = new setting_manger();
        $this->view_data['layout']  = $this->layout;
        $this->view_data['settings'] = $this->setting_manager->get_internal_options($this->layout);
        $this->view_data['wp_options'] = $this->setting_manager->get_wp_options();
        return $this;
    }
    
    public function display_bar($post_content = "")
    {
        // this session variable is set in the plugin core 
        // to make sure the bar is only displayed once per page.
        // only left_elegant_bar loads with post content of "" as bottom bar (loaded before this bar) takes care of displaying it
        
        // if left layout and we haven't loaded yet, set a session so we don't load again
        if(!isset($_SESSION['left_elegant_bar']) && $this->layout == "left_elegant_tab"){
            $_SESSION['left_elegant_bar'] = 1;
        }else if($this->layout == "left_elegant_tab"){
            return $post_content;
        }
        
        if(_DEBUG_BAR){
            error_reporting(E_ALL);
            echo "DEBUG MODE!<br />";
            echo "We have the following settings available to us:<br />";
            echo "<pre>" . print_r($this->view_data['settings'], TRUE) . "</pre><br /><br />";
            echo "<pre>" . print_r($this->view_data['wp_options'], TRUE) . "</pre>";
        }

        if(!isset($this->view_data['settings']["$this->layout"]) OR empty($this->view_data['settings']["$this->layout"]))
            return;

        $settings = $this->view_data['settings']["$this->layout"];

        // if bar is active
        if($settings['visibility_settings']['is_active'] == TRUE OR (isset($_GET['cunjo']) && $_GET['cunjo'] == $this->layout) OR $post_content == 'cunjo_shortcode')
        {
            if(_DEBUG_BAR){
                echo "$this->layout active!";
           }
		   
		   if(is_multisite() && (isset($settings['visibility_settings']['exclude_blogs']) && strlen($settings['visibility_settings']['exclude_blogs']) > 0)){

				foreach(explode(",", $settings['visibility_settings']['exclude_blogs']) as $excluded_blog){
					
					if(get_current_blog_id() == $excluded_blog){
						// don't display the bar on this page
						if(_DEBUG_BAR){
							echo "This blog is excluded!<br />";
						}

						return $post_content;
					}
				}

				// page is not excluded
				return $this->output_bar($post_content);
            }

           else if(is_home() OR is_front_page()){
                // do we want to show this widget on the home page
                if($settings['visibility_settings']['on_home'] == TRUE OR $post_content == 'cunjo_shortcode'){
                    // is this the homepage
                   return $this->output_bar($post_content);
                }else{
                   if(_DEBUG_BAR){
                        echo "Home page is excluded!<br />";
                   }
                   
                   return $post_content;
                }
            }
            
            else if(is_category() OR is_archive() OR is_tax()){
                return $this->output_bar($post_content);
            }
            
            else if(is_page()){
                // do we want to show the bar on pages?
                if($settings['visibility_settings']['on_pages'] == TRUE OR $post_content == 'cunjo_shortcode'){
                    // is this page excluded, if not, display the bar!
                    if(isset($settings['visibility_settings']['exclude_pages']) && strlen($settings['visibility_settings']['exclude_pages']) > 0){
                        foreach(explode(",", $settings['visibility_settings']['exclude_pages']) as $excluded_page){
                            if(is_page($excluded_page) AND $post_content != 'cunjo_shortcode'){
                                // don't display the bar on this page
                                if(_DEBUG_BAR){
                                    echo "This page is excluded!<br />";
                                }

                                return $post_content;
                            }
                        }
                    }

                    // page is not excluded
                    return $this->output_bar($post_content);
                }else{
                    // FIX FOR BUG THAT HIDES POST CONTENT WHEN EXCLUDED ON PAGES
                    return $post_content;
                }
            }

            // is this a post
            else if(is_single()){
                // do we want to show the bar on posts?
                if($settings['visibility_settings']['on_posts'] == TRUE OR $post_content == 'cunjo_shortcode'){
                    // is this post excluded, if not, display the bar!
                    if(isset($settings['visibility_settings']['exclude_posts']) && strlen($settings['visibility_settings']['exclude_posts']) > 0){
                        foreach(explode(",", $settings['visibility_settings']['exclude_posts']) as $excluded_post){
                            if(is_single($excluded_post) AND $post_content != 'cunjo_shortcode'){
                                /*
                                // this post is excluded, but this is a custom post type that takes precedence over exclusion
                                if(isset( $settings['visibility_settings']['on_custom'])){
                                    foreach(explode(",", $settings['visibility_settings']['on_custom']) as $custom_post_type){
                                        if(get_post_type() == $custom_post_type){
                                            if(_DEBUG_BAR){
                                                echo "This post has custom post type allowance but is hidden due to exclude_posts!<br />";
                                            }
                                            
                                            break 2; // exit exlcusion loop and display bar
                                        }
                                    }
                                }
                                */

                                // don't display the bar on this page
                                if(_DEBUG_BAR){
                                    echo "This post is excluded!<br />";
                                }

                                return $post_content;
                            }
                        }
                    }
                    

                    // page is not excluded
                    return $this->output_bar($post_content);

                }else{
                    // FIX FOR BUG THAT HIDES POST CONTENT WHEN EXCLUDED ON POSTS
                    return $post_content;
                }
            }else{
                if(_DEBUG_BAR){
                    echo "Unknown post/page type!<br />";
                }

                // is this a custom post type?
                if(isset( $settings['visibility_settings']['on_custom']) OR $post_content == 'cunjo_shortcode'){
                    foreach(explode(",", $settings['visibility_settings']['on_custom']) as $custom_post_type){
                        if(get_post_type() == $custom_post_type OR $post_content == 'cunjo_shortcode'){
                             return $this->output_bar($post_content);
                        }
                    }
                }
                
                return $post_content;
            }
        }else{
            // this bar is not active, so just output the post
            return $post_content;
        }

        return;
    }

    function cunjito_image() {
        $files = get_children('post_parent='.get_the_ID().'&post_type=attachment&post_mime_type=image&order=desc');
        if($files){
            $keys = array_reverse(array_keys($files));
            //$j = 0;
            $num = $keys[0];
            //$image          = wp_get_attachment_image($num, 'large', true);
            //$imagepieces    = explode('"', $image);
            ///$imagepath      = $imagepieces[1];
            $main           = wp_get_attachment_url($num);
            
            //$template         = get_template_directory();
            //$the_title        = get_the_title();
            return $main;
        }
    }
        

    private function output_bar($post_content = "")
    {
        global $post;   
        $anchor = "";
        
        $share_id = get_site_option('cunjoshare_shareid');
        if(!$share_id OR strlen($share_id) <= 0){
            if(_DEBUG_BAR){
                echo "No share ID detected!<br />";
            }
        
            return $post_content;
        }
        
        if(_DEBUG_BAR){
            echo "Outputting $this->layout bar:<br />";
        }

        // loop through availabe bar settings, exclude visability settings and create an anchor for them
        $widget_settings = $this->view_data['settings']["$this->layout"];
        if(empty($widget_settings))
            return;
        
        if((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
			$oneimage = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'thumbnail');
			$oneimage = $oneimage[0];
			
            $pinimage = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
			$pinimage = $pinimage[0];
			
		}
        else {
            $oneimage = $this->cunjito_image();
			$pinimage = $this->cunjito_image();
		}
		
		if(strpos($oneimage, '?') !== false) {
			$oneimage = explode('?', $oneimage);
			$oneimage = $oneimage[0];
		}
		if(strpos($pinimage, '?') !== false) {
			$pinimage = explode('?', $pinimage);
			$pinimage = $pinimage[0];
		}

        //$anchor  = '<!-- ' . $this->layout . ' anchor -->';
        if(isset($widget_settings['visibility_settings']['placement']))
            $anchor = '<div style="display: inline-block;">';
        
        $anchor .= '<script id="compass_cunjo_widget_'.$this->layout.'" compass="cunjo_widget_'.$this->layout.'" website="'. plugins_url('/share-social/') .'" src="'. plugins_url( '/share-social/assets/js/') .'cunjo.load.js?oneimage='. urlencode($oneimage) . '&pinimage='. urlencode($pinimage) . '&post_url=' . urlencode(get_permalink()) . '&title='. urlencode(wp_strip_all_tags(get_the_title(), true)) .'&id=cunjo_widget_'.$this->layout.'&checkU='. get_site_option( 'cunjoshare_checkU', 'Free' ) .'&cache='. get_site_option( 'cunjoshare_cache', 'no' ) .'&layout='. urlencode($this->layout);

        if(isset($widget_settings['visibility_settings']['display_icons']) && $widget_settings['visibility_settings']['display_icons'] == 0)
            unset($widget_settings['social_channels']['socials']);

        if(isset($widget_settings['visibility_settings']['display_message']) &&  $widget_settings['visibility_settings']['display_message'] == 0)
            unset($widget_settings['call_to_action']['message']);

		if(empty($widget_settings['call_to_action']['messagelink']) || $widget_settings['call_to_action']['messagelink'] == '')
            unset($widget_settings['call_to_action']['messagelink']);

        //echo "CURRENT WIDGET SETTINGS: " . "<pre> " . print_r($widget_settings, TRUE) . "</pre>";        

        foreach($widget_settings as $widget_category => $widget_category_settings){
            // we dont display any visibility related settings in our anchor
            if($widget_category == "visibility_settings"){   
                continue;
            }

            foreach($widget_category_settings as $setting_name => $setting_value){
                $anchor .= '&' . $setting_name . '=' . urlencode($setting_value) . '';              
            }
        }

        if($this->view_data['wp_options']['cunjoshare_has_analytics'] == "yes")
             $anchor .= '&has_analytics=yes';
        else
            $anchor .= '&has_analytics=no';

        $anchor .= '&category=' . urlencode($this->view_data['wp_options']['cunjoshare_category']);

		// add lang to anchor
		 $anchor .= '&lang=' . urlencode($this->view_data['wp_options']['cunjoshare_lang']) . '&tooltip=yes';

        // add share id
        $anchor .= '&shareid=' . urlencode($this->view_data['wp_options']['cunjoshare_shareid']);
        $anchor .= '" async><a title="Cunjo" href="http://cunjo.com" style="font-size: 0px; text-decoration: none;">Cunjo ID: '.$this->view_data['wp_options']['cunjoshare_shareid'].'</a></script>';
        
        if(isset($widget_settings['visibility_settings']['placement']))
            $anchor .= "</div>";
        
		$uid = uniqid();
		
		if($post_content == 'cunjo_shortcode')
			$post_content = str_replace(array('id="compass_cunjo_widget_'.$this->layout.'"', 'compass="cunjo_widget_'.$this->layout.'"'), array('id="compass_cunjo_widget_'.$this->layout.'_1_' . $uid . '"', 'compass="cunjo_widget_'.$this->layout.'_1_' . $uid . '"'), $anchor) . "<div style='clear:both'></div>";
        
		else if(isset($widget_settings['visibility_settings']['placement']) && $widget_settings['visibility_settings']['placement'] == 'above')
            $post_content = str_replace(array('id="compass_cunjo_widget_'.$this->layout.'"', 'compass="cunjo_widget_'.$this->layout.'"'), array('id="compass_cunjo_widget_'.$this->layout.'_1_' . $uid . '"', 'compass="cunjo_widget_'.$this->layout.'_1_' . $uid . '"'), $anchor) . "<div style='clear:both'></div><br />" . $post_content;
       
	    else if(isset($widget_settings['visibility_settings']['placement']) && $widget_settings['visibility_settings']['placement'] == 'below')
            $post_content = $post_content . "<br />" . str_replace(array('id="compass_cunjo_widget_'.$this->layout.'"', 'compass="cunjo_widget_'.$this->layout.'"'), array('id="compass_cunjo_widget_'.$this->layout.'_1_' . $uid . '"', 'compass="cunjo_widget_'.$this->layout.'_1_' . $uid . '"'), $anchor);
        
		else if(isset($widget_settings['visibility_settings']['placement']) && $widget_settings['visibility_settings']['placement'] == 'both')
            $post_content = str_replace(array('id="compass_cunjo_widget_'.$this->layout.'"', 'compass="cunjo_widget_'.$this->layout.'"'), array('id="compass_cunjo_widget_'.$this->layout.'_1_' . $uid . '"', 'compass="cunjo_widget_'.$this->layout.'_1_' . $uid . '"'), $anchor) . "<br />" . $post_content . str_replace(array('id="compass_cunjo_widget_'.$this->layout.'"', 'compass="cunjo_widget_'.$this->layout.'"'), array('id="compass_cunjo_widget_'.$this->layout.'_2_' . $uid . '"', 'compass="cunjo_widget_'.$this->layout.'_2_' . $uid . '"'), $anchor);
		
		 // fallback for left elegant bar
		else $post_content = $anchor . $post_content;
		
		//check if own email ajax in use
		if(isset($this->view_data['wp_options']['cunjoshare_byemail']) && $this->view_data['wp_options']['cunjoshare_byemail'] == 'own') {
			$email_js = '<script type="text/javascript">
							jQuery(document.body).on("click", "#cunjo_widget_'. $this->layout .'_modal_email .cunjo-email-btn", function(event){
								event.preventDefault();
								event.stopImmediatePropagation();
								jQuery(".email-sending").fadeIn(200);
								jQuery.ajax({
								  type: "POST",
								  url: "'. admin_url( 'admin-ajax.php' ) .'",
								  crossDomain: true,
								  data: "action=share_email&"+ jQuery("#cunjo_widget_'. $this->layout .'_modal_email #cunjo_share_email").serialize()
								}).done(function( response ) {
									jQuery(".email-sending").hide();
									if(response == "success") {
										jQuery(".email-sent").fadeIn(200);
									}
									else {
										jQuery(".email-notsent").fadeIn(200);
									}
								});
								
							});
						</script>';
			$post_content = $post_content . $email_js;
		}
		
		return $post_content;
    }
}

?>