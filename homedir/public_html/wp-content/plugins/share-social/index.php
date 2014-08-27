<?PHP
/* 
Plugin Name: Cunjo
Plugin URI: http://cunjo.com
Description: Cunjo's Social Plugin is a free, pretty, flexible and mobile ready Social Share Plugin. Way Better than most famous similar providers.
Version: 2.2.3
Author: Biro Florin, Josh Foote
Author URI: http://cunjo.com/
License: GPLv2 or later

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; 

License URI: http://www.gnu.org/licenses/gpl.html
*/

ini_set('memory_limit', '-1');
include_once(WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . "share-social" . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "inline_bar.php");
include_once(WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . "share-social" . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "settings.php");
include_once(WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . "share-social" . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "template.php");
include_once(WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . "share-social" . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "widgets.php");

if(class_exists('CunjoShare_Plugin') == false){
    class CunjoShare_Plugin
    {
        protected $_plugin_slug = 'cunjoshare';
        private $tab_control;
        // installation related
        protected $db;
        protected $_table;
        // --
        private $view_data;
        private $setting_manager;
        private $layouts = array("bottom_tab", "left_tab", "right_tab", "bottom_elegant_tab", "top_tab", "bottom_simple_tab", "top_simple_tab");
        private $inline_layouts = array("inline_buttons", "left_elegant_tab", "tiny_buttons", "counter_buttons");
    
        public function __construct()
        {
            global $wpdb;
            register_activation_hook( __FILE__, array($this, 'activate'));
            register_deactivation_hook( __FILE__, array($this, 'deactivate'));
            
            // instantiate database
            $this->db = $wpdb;
            $this->_table = $wpdb->base_prefix . "cunjoshare";
            
            // load setting and tab manager
            $this->setting_manager = new setting_manger();
            $this->tab_control = new inline_bar_outputter();
             
            // acp and display tweak hooks
            add_action("wp_head", array($this, 'set_bar_loaded_sessions'), 10);
			if ( is_multisite()){
				add_action("network_admin_menu", array($this, 'handle_menu_creation'));
			}
			else {
				add_action("admin_menu", array($this, 'handle_menu_creation'));
			}
            add_action("wp_enqueue_scripts", array($this, 'load_front_assets'));
            
            // ajax hooks
            add_action("wp_ajax_SaveWidgetSettings", array($this, 'handle_ajax_request'));
            add_action("wp_ajax_SaveWidgetSetting", array($this, 'handle_ajax_request'));
            add_action("wp_ajax_SaveGeneralSetting", array($this, 'handle_ajax_request'));
			add_action("wp_ajax_share_email", array($this, 'handle_ajax_send_email'));
			add_action("wp_ajax_nopriv_share_email", array($this, 'handle_ajax_send_email'));
            
            $all_layouts = array_merge($this->layouts, $this->inline_layouts);
            foreach($all_layouts as $layout){
                add_action("wp_ajax_{$layout}_activate", array($this, 'handle_ajax_request'));
                add_action("wp_ajax_{$layout}_deactivate", array($this, 'handle_ajax_request'));
            }
            
            // tab display hooks
            add_action("cunjo_widgets_settings", array($this, "display_setting_modals"));
            //add_action("cunjo_display_credits", array($this, "display_credits")); // will cause an infinite loop
            add_action("wp_footer", array($this, 'display_bar'));
			foreach($this->inline_layouts as $inline_widget){
				add_filter("the_content", array($this, 'display_'.$inline_widget));
			}
			
			// wp widgets
			add_action( 'widgets_init', array($this, 'cunjo_wp_widgets') );
			
			// widgets display shortcode
			add_shortcode( 'cunjo', array( $this, 'cunjo_shortcode' ) );
        }
        
        /**
         * CunjoShare_Plugin::activate()
         * Called on plugin activation, installs tables and tabs
         * 
         * @return void
         */
        public function activate()
        {
             $sql = "CREATE TABLE IF NOT EXISTS $this->_table (
                      id INT NOT NULL AUTO_INCREMENT ,
                      layout VARCHAR(255) NULL ,
                      category VARCHAR(45) NULL ,
                      option_name VARCHAR(45) NULL ,
                      option_value TEXT NULL ,
                      date_added DATE NULL ,
                      PRIMARY KEY  (id) ,
                      UNIQUE KEY fk_option (option_name ASC, layout ASC) )
                    ENGINE = InnoDB";

            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta($sql);
            
            add_site_option("cunjoshare_plugin_version", "2.2.3");
            add_site_option("cunjoshare_db_version", "1.1");
			add_site_option("cunjo_plugin_url", plugins_url('/share-social/'));
			add_site_option("cunjo_plugin_path", plugin_dir_path( __FILE__ ));
            
            $this->activate_default_tabs();
        }

        /**
         * CunjoShare_Plugin::deactivate()
         * Called on plugin deactivation, removes all default tab settings
         * 
         * @return void
         */
        public function deactivate()
        {
            $this->deactivate_default_tabs();
            //$this->db->query("DROP TABLE $this->_table");
            delete_site_option("cunjoshare_db_version");
            delete_site_option("cunjoshare_plugin_version");
        }
        
        /**
         * CunjoShare_Plugin::handle_menu_creation()
         * 
         * @return
         */
        public function handle_menu_creation()
        {
			if ( is_multisite()){
				$role = 'manage_network';
			}
			else {
				$role = 'administrator';
			}
            
            $page_hook_suffixs[] = add_menu_page("Cunjo", "Cunjo", $role, "cunjo_parent", array($this, 'display_introduction'), plugins_url('share-social/assets/images/cunjo_logo-16.png')); 
            $page_hook_suffixs[] = add_submenu_page("cunjo_parent", 'Settings', 'Settings', $role, "cunjo_plugin_config", array($this, 'display_plugin_configuration'));        
            $page_hook_suffixs[] = add_submenu_page("cunjo_parent", 'Widgets library', 'Widgets library', $role, "cunjo_widget_library", array($this, 'display_widget_configurations'));
            $page_hook_suffixs[] = add_submenu_page("cunjo_parent", 'Social Analytics', 'Social Analytics', $role, "cunjo_social_analytics", array($this, 'display_social_analytics'));
            
            // parent slug is intentionally NULL as we don't want this item visible in our menu, but it must be loadable using the given slug
            $page_hook_suffixs[] = add_submenu_page(NULL, 'Credits', 'Credits', $role, "cunjo_credits", array($this, 'display_credits'));
            
            foreach($page_hook_suffixs as $page_hook_suffix)
                add_action('admin_print_styles-' . $page_hook_suffix, array($this, 'load_admin_assets'));
        }
		
		/**
         * CunjoShare_Plugin::cunjo_wp_widgets()
         * Creates WP widgets
         * 
         * @return void
         */
        public function cunjo_wp_widgets()
        {
			$share_id = get_site_option('cunjoshare_shareid');
			$twitter_user = get_site_option('cunjoshare_twitter');
			$dribbble_user = get_site_option('cunjoshare_dribbble');
			$pinterest_user = get_site_option('cunjoshare_pinterest');
			
             if($share_id AND strlen($share_id) > 0){
				 register_widget( 'Cunjo_Profiles_Widget' );
				 if($twitter_user AND strlen($twitter_user) > 0){
					 register_widget( 'Cunjo_Tweets' );
				 }
				 if($dribbble_user AND strlen($dribbble_user) > 0){
					 register_widget( 'Cunjo_Shots' );
				 }
				 if($pinterest_user AND strlen($pinterest_user) > 0){
					 register_widget( 'Cunjo_Pins' );
				 }
			 }
        }

         /**
         * CunjoShare_Plugin::handle_setting_modals()
         * Retrives setting modals for each tab
         * 
         * @param mixed $data
         * @return
         */
        public function display_setting_modals($data = array())
        {    
            // load static view data
            //$this->view_data['wp_options'] = $this->setting_manager->get_wp_options();
            $this->view_data['settings'] = $this->setting_manager->get_internal_options();
			//set if multisite
			if( is_multisite() ) {
				$this->view_data['site_list'] = $this->db->get_results( 'SELECT * FROM wp_blogs ORDER BY blog_id' );
			}
			else {
				$this->view_data['site_list'] = NULL;
			}
            
            // load layout settings
            $all_layouts = array_merge($this->layouts, $this->inline_layouts);  
            foreach($all_layouts as $layout){
                $this->view_data['layout'] = $layout;
                $modal = new Template("tab_modals" . DIRECTORY_SEPARATOR . $layout . "_modals");
                $modal->set('view_data', $this->view_data);
                $modal_data .= $modal->fetch();
            }
            
            echo $modal_data;
            return;
        }
        
        /**
         * CunjoShare_Plugin::display_widget_configurations()
         * 
         * @return
         */
        public function display_widget_configurations()
        {
            // load static view data
            $this->view_data['wp_options'] = $this->setting_manager->get_wp_options();
            $this->view_data['settings'] = $this->setting_manager->get_internal_options();
           
            // make a CURL request to widget array
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://cunjo.com/!Share_test/layouts/list_layouts.php");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            $output = curl_exec($ch);
            curl_close($ch);
            
            $this->view_data['layouts'] = json_decode($output);
            $content = new Template("general" . DIRECTORY_SEPARATOR . "show_widgets");
            $content->set('view_data', $this->view_data);
            echo $content->fetch();
            return;
        }
        
        /**
         * CunjoShare_Plugin::display_plugin_configuration()
         * 
         * @return void
         */
        public function display_plugin_configuration()
        {
            // load static view data
            $this->view_data['wp_options'] = $this->setting_manager->get_wp_options();
            $this->view_data['settings'] = $this->setting_manager->get_internal_options();

            $content = new Template("general" . DIRECTORY_SEPARATOR . "set_settings");
            $content->set('view_data', $this->view_data);
            echo $content->fetch();
        }
        
        /**
         * CunjoShare_Plugin::display_plugin_configuration()
         * 
         * @return void
         */
        public function display_social_analytics()
        {
            // load static view data
            $content = new Template("social_analytics");
            $content->set('view_data', $this->view_data);
            echo $content->fetch();
        }
        
        /**
         * CunjoShare_Plugin::handle_credits()
         * Retrieves credits for each tab
         * 
         * @return void
         */
        public function display_credits()
        {
            $this->view_data['wp_options'] = $this->setting_manager->get_wp_options();
            $this->view_data['settings'] = $this->setting_manager->get_internal_options();
            
            $content = new Template("show_credits");
            $content->set('view_data', $this->view_data);
            echo $content->fetch();
        }
        
        /**
         * CunjoShare_Plugin::display_introduction()
         * 
         * @return void
         */
        public function display_introduction()
        {
            $this->view_data['wp_options'] = $this->setting_manager->get_wp_options();
            $this->view_data['settings'] = $this->setting_manager->get_internal_options();
						
            $content = new Template("general" . DIRECTORY_SEPARATOR . "introduction");
			$content->set('view_data', $this->view_data);
            echo $content->fetch();
        }
        
        /**
         * CunjoShare_Plugin::display_bar()
         * Displays page related tabs
         * 
         * @param mixed $data
         * @return
         */
        public function display_bar($data = array())
        {    
            foreach($this->layouts as $layout)
                echo $this->tab_control->set_display_layout($layout)->display_bar();
            
            return;
        }
        
        /**
         * CunjoShare_Plugin::display_{$layout}()
         * Displays inline post related tabs
         * 
         * @param mixed $data
         * @return void
         */
        public function display_inline_buttons($data = array())
        {
            
			$anchor_data = $this->tab_control->set_display_layout('inline_buttons')->display_bar($data);
			$data = "";
                        
            return $anchor_data;
        }
		public function display_tiny_buttons($data = array())
        {
            
			$anchor_data = $this->tab_control->set_display_layout('tiny_buttons')->display_bar($data);
			$data = "";
                        
            return $anchor_data;
        }
		public function display_counter_buttons($data = array())
        {
            
			$anchor_data = $this->tab_control->set_display_layout('counter_buttons')->display_bar($data);
			$data = "";
                        
            return $anchor_data;
        }
		public function display_left_elegant_tab($data = array())
        {
            
			$anchor_data = $this->tab_control->set_display_layout('left_elegant_tab')->display_bar($data);
			$data = "";
                        
            return $anchor_data;
        }
		
		/**
         * CunjoShare_Plugin::cunjo_shortcode()
         * Displays widgets in a shortcode
         * 
         * @param mixed $data
         * @return void
         */
		public function cunjo_shortcode( $atts ) {
			
			 extract( shortcode_atts( array(
				  'layout' => 'bottom_tab',
			 ), $atts ) );
			 
			 return $this->tab_control->set_display_layout($layout)->display_bar('cunjo_shortcode');
		}
        
        /**
         * CunjoShare_Plugin::default_tabs_assets()
         * Installs all default tab assets
         * 
         * @return void
         */
        protected function default_tabs_assets()
        {
            // load tab assets
            $all_layouts = array_merge($this->layouts, $this->inline_layouts);
            foreach($all_layouts as $layout)
                wp_enqueue_script("cunjo-{$layout}-admin", plugins_url("/assets/js/tabs/{$layout}.actions.admin.js", __FILE__ ), true, '2.0.0');   
        }
        
        /**
         * CunjoShare_Plugin::save_settings()
         * 
         * @param mixed $settings
         * @return void
         */
        private function save_settings($layout, $settings, $type = 'update')
        {
            foreach($settings as $setting_name => $setting_value){
                if($setting_name == "settings_category")
                    continue;
    
                $success = $this->setting_manager->save_widget_setting(array(
                        'layout'            => $layout,
                        'category'          => $settings['settings_category'],
                        'option_name'       => $setting_name,
                        'option_value'      => (is_array($setting_value) ? json_encode($setting_value) : $setting_value),
                        'date_added'        => date("Y-m-d"),
						'type'				=> $type,
                ));
    
                unset($settings["$setting_name"]);
            }
        }
        
        /**
         * CunjoShare_Plugin::activate_default_tabs()
         * Installs DB settings for each tab
         * 
         * @return void
         */
        protected function activate_default_tabs()
        {
            // -------------------------Bottom tab settings------------------------------------
            
            //***Social channels settings category
            $settings['settings_category'] = 'Social channels';
            $settings['socials'] = 'Facebook,Twitter,Google,Linkedin,Email';
    		$settings['socials_target'] = 'window';
            $this->save_settings("bottom_tab", $settings, 'upgrade');
            $settings = array();
    
            //***Bar layout design settings category
            $settings['settings_category'] = 'Bar layout design';
            $settings['socials_pos'] = 'cunjo_pos_left';
            $settings['width'] = '100';
            $settings['position'] = 'center';
            $settings['icons'] = 'white';
            $settings['textcolor'] = '#fff';
            $settings['toolstyle'] = 'darkminimal';
            $settings['bgcolor'] = '#444';
            $this->save_settings("bottom_tab", $settings, 'upgrade');
            $settings = array();
            
            //***Call to action settings category    
            $settings['settings_category'] = 'Call to action';
            $settings['message'] = 'Type your message to the world here..';
            $settings['message_pos'] = 'cunjo_pos_left';
            $settings['messageicon'] = 'Sharetalk';
            $settings['messagelink'] = '';
            $settings['messagebtn'] = 'Click here';
            $settings['messagebtncolor'] = '#13d48e';
            $settings['messagebtntext'] = '#fff';
            $this->save_settings("bottom_tab", $settings, 'upgrade');
            $settings = array();
                
            //***Visibility settings category
            $settings['settings_category'] = 'Visibility settings';
    		$settings['display_icons'] = "1";
    		$settings['display_message'] = "0";
            $settings['on_home'] = "1";
            $settings['on_pages'] = "1";
            $settings['on_posts'] = "1";
            $settings['on_custom'] = "";
            $settings['exclude_pages'] = ""; 
			$settings['exclude_blogs'] = "";
            $settings['exclude_posts'] = "";
            $settings['is_active'] = "0";
            $this->save_settings("bottom_tab", $settings, 'upgrade');
            $settings = array();
            
            
            // -------------------------Left tab settings------------------------------------
            $settings['settings_category'] = 'Social channels';
            $settings['socials'] = 'Facebook,Twitter,Google,Linkedin,Email';
            $settings['socials_target'] = 'window';
            $this->save_settings("left_tab", $settings, 'upgrade');
            $settings = array();

            $settings['settings_category'] = 'Bar layout design';
            $settings['position'] = 'center';
            $settings['icons'] = 'white';
            $settings['textcolor'] = '#fff';
            $settings['toolstyle'] = 'darkminimal';
            $settings['bgcolor'] = '#444';
            $this->save_settings("left_tab", $settings, 'upgrade');
            $settings = array();
            
            $settings['settings_category'] = 'Visibility settings';
            $settings['display_icons'] = "1";
            $settings['on_home'] = "1";
            $settings['on_pages'] = "1";
            $settings['on_posts'] = "1";
            $settings['on_custom'] = "";
            $settings['exclude_pages'] = ""; 
			$settings['exclude_blogs'] = "";
            $settings['exclude_posts'] = "";
            $settings['is_active'] = "0";
            $this->save_settings("left_tab", $settings, 'upgrade');
            $settings = array();
            
             // -------------------------Left elegant tab settings------------------------------------  
            $settings['settings_category'] = 'Social channels';
            $settings['socials'] = 'Facebook,Twitter,Google,Linkedin,Email';        
        	$settings['socials_target'] = 'window';
            $this->save_settings("left_elegant_tab", $settings, 'upgrade');
            $settings = array();
            
            $settings['settings_category'] = 'Bar layout design';
            $settings['position'] = 'center';
            $settings['textcolor'] = '#fff';
            $settings['toolstyle'] = 'darkminimal';
            $settings['bgcolor'] = '#444';
            $settings['counter'] = 'no';
            $settings['offleft'] = '50';
			$settings['icons'] = 'elegant';
            $this->save_settings("left_elegant_tab", $settings, 'upgrade');
            $settings = array();
            
            $settings['settings_category'] = 'Visibility settings';
            $settings['display_icons'] = "1";
            $settings['on_home'] = "1";
            $settings['on_pages'] = "1";
            $settings['on_posts'] = "1";
            $settings['on_custom'] = "";
            $settings['exclude_pages'] = ""; 
			$settings['exclude_blogs'] = "";
            $settings['exclude_posts'] = "";
            //$settings['placement'] = "both"; // whether we should show the bar on both the header and footer of posts
            $settings['is_active'] = "0";
            $this->save_settings("left_elegant_tab", $settings, 'upgrade');
            $settings = array();
            
            // -------------------------Right tab settings------------------------------------  
            
            //***Social channels settings category
            $settings['settings_category'] = 'Social channels';
            $settings['socials'] = 'Facebook,Twitter,Google,Linkedin,Email';
            $settings['socials_target'] = 'window';
            $this->save_settings("right_tab", $settings, 'upgrade');
            $settings = array();
            
            //***Bar layout design settings category
            $settings['settings_category'] = 'Bar layout design';
            $settings['position'] = 'center';
            $settings['icons'] = 'white';
            $settings['textcolor'] = '#fff';
            $settings['toolstyle'] = 'darkminimal';
            $settings['bgcolor'] = '#444';     
            $this->save_settings("right_tab", $settings, 'upgrade');
            $settings = array();
        
            //***Visibility settings category
            $settings['settings_category'] = 'Visibility settings';
            $settings['display_icons'] = "1";
            $settings['on_home'] = "1";
            $settings['on_pages'] = "1";
            $settings['on_posts'] = "1";
            $settings['on_custom'] = "";
            $settings['exclude_pages'] = ""; 
			$settings['exclude_blogs'] = "";
            $settings['exclude_posts'] = "";
            $settings['is_active'] = "0";
            $this->save_settings("right_tab", $settings, 'upgrade');
            $settings = array();
            
            // -------------------------Top tab settings------------------------------------  
            
            //***Social channels settings category
            $settings['settings_category'] = 'Social channels';
            $settings['socials'] = 'Facebook,Twitter,Google,Linkedin,Email';
            $settings['socials_target'] = 'window';
            $this->save_settings("top_tab", $settings, 'upgrade');
            $settings = array();
        
            //***Bar layout design settings category
            $settings['settings_category'] = 'Bar layout design';
            $settings['socials_pos'] = 'cunjo_pos_left';
            $settings['width'] = '100';
            $settings['position'] = 'center';
            $settings['icons'] = 'white';
            $settings['textcolor'] = '#fff';
            $settings['toolstyle'] = 'darkminimal';
            $settings['bgcolor'] = '#444';
            $settings['showat'] = '50';
            $this->save_settings("top_tab", $settings, 'upgrade');
            $settings = array();
            
            //***Call to action settings category
            $settings['settings_category'] = 'Call to action';
            $settings['message'] = 'Type your message to the world here..';
            $settings['message_pos'] = 'cunjo_pos_left';
            $settings['messageicon'] = 'Sharetalk';
            $settings['messagelink'] = '';
            $settings['messagebtn'] = 'Click here';
            $settings['messagebtncolor'] = '#13d48e';
            $settings['messagebtntext'] = '#fff';
            $this->save_settings("top_tab", $settings, 'upgrade');
            $settings = array();
            
            //***Visibility settings category
            $settings['settings_category'] = 'Visibility settings';
            $settings['display_icons'] = 1;
            $settings['display_message'] = "0";
            $settings['on_home'] = "1";
            $settings['on_pages'] = "1";
            $settings['on_posts'] = "1";
            $settings['on_custom'] = "";
            $settings['exclude_pages'] = ""; 
			$settings['exclude_blogs'] = "";
            $settings['exclude_posts'] = "";
            $settings['is_active'] = "0";
            $this->save_settings("top_tab", $settings, 'upgrade');
            $settings = array();
            
            // -------------------------Inline buttons tab settings------------------------------------  
            //***Social channels settings category
            $settings['settings_category'] = 'Social channels';
            $settings['socials'] = 'Facebook,Twitter,Google,Linkedin,Pinterest';
    		$settings['socials_target'] = 'window';
            $this->save_settings("inline_buttons", $settings, 'upgrade');
            $settings = array();
            
            //***Bar layout design settings category
            $settings['settings_category'] = 'Buttons layout design';
    		$settings['icons'] = 'icons';
    		$settings['message'] = '!Share now: ';
    		$settings['message_pos'] = 'cunjo_pos_left';
            $settings['textcolor'] = '#000';
            $settings['toolstyle'] = 'darkminimal';
    		$settings['counter'] = 'no';
    		$settings['offleft'] = '50';
            $this->save_settings("inline_buttons", $settings, 'upgrade');
            $settings = array();
            
            //***Visibility settings category
            $settings['settings_category'] = 'Visibility settings';
    		$settings['display_icons'] = 1;
            $settings['on_home'] = 1;
            $settings['on_pages'] = 1;
            $settings['on_posts'] = 1;
            $settings['on_custom'] = "";
            $settings['exclude_pages'] = ""; 
			$settings['exclude_blogs'] = "";
            $settings['exclude_posts'] = "";
            $settings['placement'] = "both"; // whether we should show the bar on both the header and footer of posts
            $settings['is_active'] = 0;
            $this->save_settings("inline_buttons", $settings, 'upgrade');
            $settings = array();
            
            
            // -------------------------bottom elegant tab settings------------------------------------  
            //***Social channels settings category
            $settings['settings_category'] = 'Social channels';
            $settings['socials'] = 'Facebook,Twitter,Google,Linkedin,Email';
    		$settings['socials_target'] = 'window';
            $this->save_settings("bottom_elegant_tab", $settings, 'upgrade');
            $settings = array();
        
             //***Bar layout design settings category
            $settings['settings_category'] = 'Bar layout design';
            $settings['position'] = 'center';
            $settings['textcolor'] = '#fff';
            $settings['toolstyle'] = 'darkminimal';
            $settings['bgcolor'] = '#444';
    		$settings['counter'] = 'no';
			$settings['icons'] = 'elegant';
            $this->save_settings("bottom_elegant_tab", $settings, 'upgrade');
            $settings = array();
            
            //***Visibility settings category
            $settings['settings_category'] = 'Visibility settings';
    		$settings['display_icons'] = 1;
            $settings['on_home'] = 1;
            $settings['on_pages'] = 1;
            $settings['on_posts'] = 1;
            $settings['on_custom'] = "";
            $settings['exclude_pages'] = ""; 
			$settings['exclude_blogs'] = "";
            $settings['exclude_posts'] = "";
            //$settings['placement'] = "both"; // whether we should show the bar on both the header and footer of posts
            $settings['is_active'] = 0;
            $this->save_settings("bottom_elegant_tab", $settings, 'upgrade');
            $settings = array();

            // -------------------------Bottom simple tab settings------------------------------------
            
            //***Social channels settings category
            $settings['settings_category'] = 'Social channels';
            $settings['socials'] = 'Facebook,Twitter,Google,Linkedin,Email';
    		$settings['socials_target'] = 'window';
            $this->save_settings("bottom_simple_tab", $settings, 'upgrade');
            $settings = array();
    
            //***Bar layout design settings category
            $settings['settings_category'] = 'Bar layout design';
            $settings['socials_pos'] = 'cunjo_pos_left';
            $settings['icons'] = 'milky';
            $settings['textcolor'] = '#000';
            $settings['toolstyle'] = 'darkminimal';
            $settings['bgcolor'] = '#fff';
			$settings['shadow'] = 'outside';
            $this->save_settings("bottom_simple_tab", $settings, 'upgrade');
            $settings = array();
            
            //***Call to action settings category    
            $settings['settings_category'] = 'Call to action';
            $settings['message'] = 'Type your message to the world here..';
            $settings['message_pos'] = 'cunjo_pos_left';
            $settings['messageicon'] = 'Sharetalk';
            $settings['messagelink'] = '';
            $settings['messagebtn'] = 'Click here';
            $settings['messagebtncolor'] = '#13d48e';
            $settings['messagebtntext'] = '#fff';
            $this->save_settings("bottom_simple_tab", $settings, 'upgrade');
            $settings = array();
                
            //***Visibility settings category
            $settings['settings_category'] = 'Visibility settings';
    		$settings['display_icons'] = "1";
    		$settings['display_message'] = "0";
            $settings['on_home'] = "1";
            $settings['on_pages'] = "1";
            $settings['on_posts'] = "1";
            $settings['on_custom'] = "";
            $settings['exclude_pages'] = ""; 
			$settings['exclude_blogs'] = "";
            $settings['exclude_posts'] = "";
            $settings['is_active'] = "0";
            $this->save_settings("bottom_simple_tab", $settings, 'upgrade');
            $settings = array();
			
            // -------------------------Top simple tab settings------------------------------------  
            
            //***Social channels settings category
            $settings['settings_category'] = 'Social channels';
            $settings['socials'] = 'Facebook,Twitter,Google,Linkedin,Email';
            $settings['socials_target'] = 'window';
            $this->save_settings("top_simple_tab", $settings, 'upgrade');
            $settings = array();
        
            //***Bar layout design settings category
            $settings['settings_category'] = 'Bar layout design';
            $settings['socials_pos'] = 'cunjo_pos_left';
            $settings['icons'] = 'milky';
            $settings['textcolor'] = '#000';
            $settings['toolstyle'] = 'darkminimal';
            $settings['bgcolor'] = '#fff';
			$settings['shadow'] = 'outside';
            $settings['showat'] = '50';
            $this->save_settings("top_simple_tab", $settings, 'upgrade');
            $settings = array();
            
            //***Call to action settings category
            $settings['settings_category'] = 'Call to action';
            $settings['message'] = 'Type your message to the world here..';
            $settings['message_pos'] = 'cunjo_pos_left';
            $settings['messageicon'] = 'Sharetalk';
            $settings['messagelink'] = '';
            $settings['messagebtn'] = 'Click here';
            $settings['messagebtncolor'] = '#13d48e';
            $settings['messagebtntext'] = '#fff';
            $this->save_settings("top_simple_tab", $settings, 'upgrade');
            $settings = array();
            
            //***Visibility settings category
            $settings['settings_category'] = 'Visibility settings';
            $settings['display_icons'] = 1;
            $settings['display_message'] = "0";
            $settings['on_home'] = "1";
            $settings['on_pages'] = "1";
            $settings['on_posts'] = "1";
            $settings['on_custom'] = "";
            $settings['exclude_pages'] = ""; 
			$settings['exclude_blogs'] = "";
            $settings['exclude_posts'] = "";
            $settings['is_active'] = "0";
            $this->save_settings("top_simple_tab", $settings, 'upgrade');
            $settings = array();
			
            // -------------------------Tiny buttons settings------------------------------------  
            //***Social channels settings category
            $settings['settings_category'] = 'Social channels';
            $settings['socials'] = 'Facebook,Twitter,Google,Linkedin,Pinterest,Delicious,Stumbleupon';
    		$settings['socials_target'] = 'window';
            $this->save_settings("tiny_buttons", $settings, 'upgrade');
            $settings = array();
            
            //***Bar layout design settings category
            $settings['settings_category'] = 'Buttons layout design';
    		$settings['icons'] = 'metro';
    		$settings['message'] = 'Share now:';
    		$settings['message_pos'] = 'cunjo_pos_left';
            $settings['textcolor'] = '#000';
    		$settings['counter'] = 'no';
    		$settings['offleft'] = '50';
            $this->save_settings("tiny_buttons", $settings, 'upgrade');
            $settings = array();
            
            //***Visibility settings category
            $settings['settings_category'] = 'Visibility settings';
    		$settings['display_icons'] = 1;
            $settings['on_home'] = 1;
            $settings['on_pages'] = 1;
            $settings['on_posts'] = 1;
            $settings['on_custom'] = "";
            $settings['exclude_pages'] = ""; 
			$settings['exclude_blogs'] = "";
            $settings['exclude_posts'] = "";
            $settings['placement'] = "above"; // whether we should show the bar on both the header and footer of posts
            $settings['is_active'] = 0;
            $this->save_settings("tiny_buttons", $settings, 'upgrade');
            $settings = array();
			
			// -------------------------Counter buttons settings------------------------------------  
            //***Social channels settings category
            $settings['settings_category'] = 'Social channels';
            $settings['socials'] = 'Facebook,Twitter,Google,Linkedin,Pinterest,Stumbleupon';
    		$settings['socials_target'] = 'window';
            $this->save_settings("counter_buttons", $settings, 'upgrade');
            $settings = array();
            
            //***Bar layout design settings category
            $settings['settings_category'] = 'Buttons layout design';
    		$settings['message'] = 'Share now: ';
    		$settings['message_pos'] = 'cunjo_pos_left';
            $settings['textcolor'] = '#000';
    		$settings['counter'] = 'yes';
    		$settings['offleft'] = '50';
            $this->save_settings("counter_buttons", $settings, 'upgrade');
            $settings = array();
            
            //***Visibility settings category
            $settings['settings_category'] = 'Visibility settings';
    		$settings['display_icons'] = 1;
            $settings['on_home'] = 1;
            $settings['on_pages'] = 1;
            $settings['on_posts'] = 1;
            $settings['on_custom'] = "";
            $settings['exclude_pages'] = ""; 
			$settings['exclude_blogs'] = "";
            $settings['exclude_posts'] = "";
            $settings['placement'] = "above"; // whether we should show the bar on both the header and footer of posts
            $settings['is_active'] = 0;
            $this->save_settings("counter_buttons", $settings, 'upgrade');
            $settings = array();									
			
        }
        
        
        /**
         * CunjoShare_Plugin::deactivate_default_tabs()
         * 
         * @return void
         */
        protected function deactivate_default_tabs()
        {
           
        }
        
        /**
         * CunjoShare_Plugin::handle_ajax_request()
         * Handles activate, deactiave and other AJAX calls
         * 
         * @return
         */
        public function handle_ajax_request()
        {
            $response = "No POST data";
            
            // make sure we have POST data and a layout unless saving general settings
            if(isset($_POST['action']) && (isset($_POST['layout']) OR $_POST['action'] == 'SaveGeneralSetting'))
            {
                $data = $_POST;
                
                // if we're trying to activate/deactivate a widget, make sure we have a share ID
                if(strstr($data['action'], "activate") OR strstr($data['action'], "deactivate"))
                {
                    $share_id = get_site_option('cunjoshare_shareid');
                    if(!$share_id OR strlen($share_id) <= 0){
                        echo json_encode(array("status" => "error", 'message' => "You must have a Cunjo ID in order to activate widgets!"));
                        exit;
                    }
                    
                    $success = $this->setting_manager->save_widget_setting(array(
                        'layout'            => $data['layout'],
                        'category'          => "Visibility settings",
                        'option_name'       => "is_active",
                        'option_value'      => (strstr($data['action'], "deactivate") == TRUE) ? '0' : '1', // we use deactivate because strstr() will return true for both activate and deActivate
                        'date_added'        => date("Y-m-d"),
                    ));
                    
                    echo json_encode(array("status" => "success", 'message' => "Widget " . ((strstr($data['action'], "deactivate") == TRUE) ? "de" : "") . "activated!")); // action is either 'activate' or 'deactivate'
                    exit;
                }
                
                else if(!strcmp($data['action'], 'SaveWidgetSettings') OR !strcmp($data['action'], 'SaveWidgetSetting')) 
                {
                      
                    if(!isset($_POST['data'])){    
                        $status = array("status" => "error", "message" => "Missing options!");
                        echo json_encode($status);
                        return;
                    }
                        
                    $_POST['data'] = str_replace("&amp;", "&", urldecode($_POST['data']));
                    $data = $_POST;
                    
                    if(!isset($data['layout']) OR !isset($data['category'])){
                        $status = array("status" => "error", "message" => "Missing category or layout options!");
                        $this->setResponse(json_encode($status));
                        return;
                    }
                    
                    if($data['category'] == "Visibility settings"){
                        $this->setting_manager->delete_setting($data['layout'], $data['category'], "exclude_posts");
                        $this->setting_manager->delete_setting($data['layout'], $data['category'], "exclude_pages");
						$this->setting_manager->delete_setting($data['layout'], $data['category'], "exclude_blogs");
                        $this->setting_manager->delete_setting($data['layout'], $data['category'], "on_custom");  
                    }
                    
                    parse_str($_POST['data'], $options);
                    if(is_array($options['options']) && !empty($options['options'])){
                        $options = $options['options'];
                        foreach($options as $option_name => $option_value){
                            if(is_array($option_value)){
                                $value = implode(",", $option_value);
                            }
                            else{
                                $value = $option_value;
                            }
                        
                            $success = $this->setting_manager->save_widget_setting(array(
                                'layout'            => $data['layout'],
                                'category'          => $data['category'],
                                'option_name'       => $option_name,
                                'option_value'      => $value,
                                'date_added'        => date("Y-m-d"),
                            ));
                        }
                    }
                    
                    if($success)
                        $status = array("status" => "success", "message" => "Settings saved successfully");
                    else
                        $status = array("status" => "error", "message" => "Unable to save the given setting!");
                                        
                    echo json_encode($status);
                    exit;
                }
                
                else if(!strcmp($data['action'], 'SaveGeneralSetting')){
                    if(isset($_POST['_cunjo_analyticsregister-email']) && isset($_POST['_cunjo_analyticsregister-password'])){
                        unset($_POST['_cunjo_analyticsregister-email']);
                        unset($_POST['_cunjo_analyticsregister-password']);
                    }
                    
                    foreach($data as $key => $value)
                        update_site_option("cunjoshare_" . $key, $value);
                    
                   $status = array("status" => "success", "message" => "Settings saved successfully");
                   echo json_encode($status);
                   exit;
                }
                
                else if(FALSE)
                {
                    // handle other actions here
                }
                
            }else echo $response;
            exit;
        }
		
		/**
         * CunjoShare_Plugin::handle_ajax_send_email()
         * Handles share by email AJAX calls
         * 
         * @return
         */
		public function handle_ajax_send_email() {
			
			$receiver = $_POST['cunjo_receiver'];
			$sender = $_POST['cunjo_sender'];
			
			//publisher's own action before email is sent
			do_action('cunjo_pre_email', $sender, $receiver);
			
			$salt = 'mistercoconut2020';
			//check captcha
			$user_ans = $_POST['cunjo_validate']; // .. or whatever!
			$user_ans = strtolower(trim($user_ans));
			$user_ans = md5(md5($user_ans).$salt);
			if (in_array($user_ans,$_POST['extraz_tb'])) {
								
				$crt = $_POST['crt'];
				if($crt){
					$credits = get_option( 'blogname' );
				}
				else {
					$credits = 'Cunjo.com';
				}
					$subject = $_POST['cunjo_subject'];
					$message = $_POST['cunjo_message'];
					$url = $_POST['host_url'];
					$message_patch = $message."\r\n\r\n ";
					$message_patch .= "Link Shared with you: ".$subject." - ".$url."\r\n\r\n ";
					$message_patch .= "This email was sent to you by ".$sender." via ".$credits."\r\n";
					
					$headers = 'From: '.get_option( 'blogname' ).' <'.get_option( 'admin_email' ).'>' . "\r\n";
					
					wp_mail($receiver, $subject, $message_patch, $headers);
					
					//publisher's own action when email is sent
					do_action('cunjo_post_email', $sender, $receiver);
					
					echo 'success';
			}
			else {
				echo 'error_spam';
			}
			
			die();
		}
 
        /**
         * CunjoShare_Plugin::set_bar_loaded_sessions()
         * Ensures certain bars dont display their anchors more than once
         * 
         * @param mixed $data
         * @return
         */
        public function set_bar_loaded_sessions($data = array())
        {    
			global $post;
            if(isset($_SESSION['left_elegant_bar']))
                unset($_SESSION['left_elegant_bar']);
                
            //$post_thumbnail_id = get_post_thumbnail_id();
			
            $headfixes = '<meta property="og:image" content="'.wp_get_attachment_thumb_url( get_post_thumbnail_id(), 'thumbnail' ).'"/>';
			
			echo $headfixes;
            return;
        }
        
        /**
         * CunjoShare_Plugin::front_assets()
         * 
         * @return void
         */
        public function load_front_assets()
        {
            //wp_enqueue_script('cunjo_share', 'http://cunjo.com/!Share_test/js/!Share.js');
			wp_enqueue_style( 'cunjo-front-css', plugins_url('/assets/css/front.css', __FILE__), false, '1.0.0','all');
			wp_enqueue_style( 'cunjo-front-modal_core', plugins_url('/assets/css/modal_core.css', __FILE__), false, '1.0.0','all');
			wp_enqueue_script('jquery');
			wp_enqueue_script('cunjo-tweetable', plugins_url( '/assets/js/tweetable.jquery.min.js', __FILE__), array( 'jquery' ), '2.0.0');
			wp_enqueue_script('cunjo-poshytip', plugins_url( '/assets/js/jquery.poshytip.min.js', __FILE__), array( 'jquery' ), '2.0.0');
			wp_enqueue_script('cunjo-modal_core', plugins_url( '/assets/js/modal_core.min.js', __FILE__), array( 'jquery' ), '2.0.0');
			wp_enqueue_script('cunjo-cookie', plugins_url( '/assets/js/jquery.cookie.js', __FILE__), array( 'jquery' ), '2.0.0');
        }

        /**
         * CunjoShare_Plugin::admin_assets()
         * 
         * @return
         */
        public function load_admin_assets()
        {
			//CSS Libraries
			wp_enqueue_style('bootstrap', plugins_url('/assets/css/bootstrap.min.css', __FILE__), false, '1.0.0','all');
			wp_enqueue_style('cunjo-scripts-select2', plugins_url('/assets/js/select2/select2.min.css', __FILE__), false, '1.0.0','all');
			wp_enqueue_style('bootstrap-toggle-buttons-css',  plugins_url('/assets/js/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.min.css', __FILE__), false, '1.0.0','all');
			wp_enqueue_style('farbtastic', plugins_url('/assets/js/farbtastic/farbtastic.min.css', __FILE__), false, '1.2.0','all');

			//CSS Admin
            wp_enqueue_style('plugin-css-admin', plugins_url('/assets/css/admin.min.css', __FILE__), false, '2.0.0','all');

			//JS Libraries
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'jquery-ui-core' );
			wp_enqueue_script( 'jquery-ui-widget' );
			wp_enqueue_script( 'jquery-ui-position' );
			wp_enqueue_script( 'jquery-ui-autocomplete' );
			wp_enqueue_script('jquery-effects-core');
			wp_enqueue_script('jquery-effects-slide');
			wp_enqueue_script('jquery-ui-sortable');
			wp_enqueue_script('jquery-ui-slider');
			wp_enqueue_script( 'jquery-ui-menu' );
			
			wp_enqueue_script('bootstrap', plugins_url( '/assets/js/bootstrap.min.js', __FILE__), array( 'jquery', 'jquery-ui-core' ), '1.1.1');
			wp_enqueue_script('sortable', plugins_url( '/assets/js/jquery.sortable.min.js', __FILE__), array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable'), '1.1.1');
			wp_enqueue_script( 'select2', plugins_url( '/assets/js/select2/select2.min.js', __FILE__), array( 'jquery' ), '1.1.1' );
			wp_enqueue_script( 'cunjo-bootstrap-bootbox', plugins_url( '/assets/js/bootbox.min.js', __FILE__ ), array( 'bootstrap' ), '2.5.0' );
			wp_enqueue_script( 'bootstrap-toggle-buttons', plugins_url( '/assets/js/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.min.js', __FILE__), array( 'bootstrap' ), '1.1.1');
			wp_enqueue_script( 'farbtastic', plugins_url( '/assets/js/farbtastic/farbtastic.min.js', __FILE__ ), array( 'jquery' ), '1.2.0' );

			//JS Admin
			wp_enqueue_script( 'cunjo-load-admin', plugins_url( '/assets/js/load.admin.js', __FILE__ ), array( 'jquery', 'jquery-ui-core', 'bootstrap' ), '2.0.0' );
			wp_enqueue_script( 'cunjo-actions-admin', plugins_url( '/assets/js/actions.admin.js', __FILE__ ), array( 'jquery', 'jquery-ui-core', 'bootstrap' ), '2.0.0' );
        
            $this->default_tabs_assets();
        }

    }
}

new CunjoShare_Plugin(__FILE__);
?>