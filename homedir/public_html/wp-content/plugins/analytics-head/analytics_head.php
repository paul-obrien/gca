<?php

/*
 Plugin Name: Analytics Head
  Plugin URI: http://wordpress.ujagody.pl/plugins/google-analytics/
 Description: This plugin adds tracking code for <strong>Google Analytics</strong> to your WordPress site. Unlike other plugins, code is added to the &lt;head&gt; section, so you can authorize your site in <strong>Google Webmaster Tools</strong>.
      Author: Lukasz Nowicki
     Version: 0.5.4
     License: GPLv2
*/

   class AnalyticsHead
   {
      // Basic informations
      protected   $PluginName='Analytics Head';
      protected   $PluginCode='ln-plugin-analytics-head';
      protected   $PluginVersion='0.5.4';
      protected   $PluginURL='http://wordpress.ujagody.pl/plugins/google-analytics/';
      protected   $PluginFile='analytics_head.php';
      private     $OptionsName='wordpress_lnpo_ah';
      private     $Defaults=Array('GoogleID'=>'','HideForAdmins'=>true);
      private     $Options=Array();
      private     $DirectCall='';
      private     $PluginUndercode='';
      private     $Footer='';
      private     $TD='';

      public function __construct()
      {
         // Prepare die string for direct calls
         $this->DirectCall='<h1>'.$this->PluginName.'</h1><h2>'.$this->PluginVersion.'</h2><p>Hello, there!</p><p>Please, do not call me directly, because there is nothing I can do here.</p><p>I\'m just a plugin, so you should call me within <a href="http://wordpress.org/">Wordpress</a> installation.</p><p>Learn more about <a href="'.$this->PluginURL.'">'.$this->PluginName.' plugin</a>.</p>';

         // Die if plugin is called directly
         if (!function_exists('add_action'))
            die($this->DirectCall);

         // Prepare Plugin Underscore code-name
         $this->PluginUndercode=str_replace('-','_',$this->PluginCode);
         $this->TD=$this->PluginCode;

         // Load language domain
         if(!load_plugin_textdomain($this->TD,'/wp-content/languages/'))
            load_plugin_textdomain($this->TD,'/wp-content/plugins/'.dirname(plugin_basename(__FILE__)));

         // Footer information
         $this->Footer=__('This plugin is distributed under the terms of GPLv2. For more information see',$this->TD).': <a href="'.$this->PluginURL.'">'.$this->PluginName.'</a>';

         // Register hooks for plugin services
         register_activation_hook(__FILE__,Array($this,'plugin_activate'));
         register_deactivation_hook(__FILE__,Array($this,'plugin_deactivate'));

         // Add "settings" link to the plugin in the plugin list
         add_filter('plugin_action_links',Array($this,'action_links'),10,2);

         // Load options into $Options variable
         $this->serve_variables();

         // Throw warning if user didn't provided Google ID
         if (((!isset($_POST['gah_submit']))&&($this->Options['GoogleID']==''))||((isset($_POST['gah_submit']))&&($_POST['google_id']=='')))
            add_action('admin_notices',Array($this,'warning'));

         // Adding admin menu
         add_action('admin_menu',Array($this,'menu'));

         // Add analytics code if it is possible and needed You should do it after functions will be loaded.
         add_action('after_setup_theme',array($this,'check_add_code'));
      }

      public function setup()
      {
      }

      public function add_code()
      {
         echo "<!-- ".__('Added by Analytics Head plugin',$this->TD).': '.$this->PluginURL." -->
<script type=\"text/javascript\">
   var _gaq = _gaq || [];
   _gaq.push(['_setAccount', '".$this->Options['GoogleID']."']);
   _gaq.push(['_trackPageview']);
   (function(){
      var ga=document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src=('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s=document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
   })();
</script>
";
      }

      public function check_add_code()
      {
         $id=preg_match('([U][A][-][0-9]{1,16}[-][0-9]{1,4})',$this->Options['GoogleID'],$result);
         if ($id>0) $id=$result[0]; else $id='';
         $a=$this->Options['HideForAdmins'];
         if ($id!='')
            if ((!is_admin())&&(($a==false)||(($a==true)&&(!current_user_can('manage_options')))))
               add_action('wp_head',Array($this,'add_code'));
      }

      public function options()
      {
         // Check if user is saving options
         $this->submit_check();
         // Show options page
         $this->options_body();
      }

      public function menu()
      {
         add_options_page(
            __('Analytics Head plugin options',$this->TD),
            $this->PluginName,
            'manage_options',
            $this->PluginCode,
            Array($this,'options')
         );
      }

      public function warning()
      {
         echo '<div id="plugin-warning" class="updated fade"><p>'.__('Plugin is almost ready for operation. You need to enter in the  tracking code ID:',$this->TD).' <a href="options-general.php?page='.$this->PluginCode.'">'.$this->PluginName.'</a></p></div>';
      }

      public function plugin_activate()
      {
         // Delete old version's options, maybe it extists somewhere
         // It is extremely impossible but oh well.
         // 0.4.1
         delete_option('wordpress_ln_p_ah');
         // 0.3
         delete_option('wordpress_ln_p_ah_ga_id');
         delete_option('wordpress_ln_p_ah_add_for_admins');
         // 0.2 and 0.1
         delete_option('wordpress_ln_gah_ad');
         delete_option('wordpress_ln_gah_id');
      }

      public function plugin_deactivate()
      {
         // Do nothing now. Do not delete old settings because user
         // may want to turn on the plugin again.
      }

      public function action_links($links,$file)
      {
         if ($file==plugin_basename(dirname(__FILE__).'/'.$this->PluginFile))
            $links[]='<a href="options-general.php?page='.$this->PluginCode.'">'.__('Settings').'</a>';
         return $links;
      }

      private function serve_variables()
      {
         // Get options from database
         $this->Options=@unserialize(get_option($this->OptionsName));
         if (!is_array($this->Options))
            $this->Options=Array();
         // Make sure all options are set and provide default
         // values if needed
         $this->Options=array_merge($this->Defaults,$this->Options);
         update_option($this->OptionsName,serialize($this->Options));
         // Now we've got fresh options in wp database
         // and in $Options variable.
      }

      private function submit_check()
      {
         if (isset($_POST['gah_submit']))
         {
            // Check if user is logged admin
            if (function_exists('current_user_can')&&!current_user_can('manage_options'))
               die(__('Cheatin’ uh?'));
            // Pre-check Google ID
            $id=preg_match('([U][A][-][0-9]{1,16}[-][0-9]{1,4})',$_POST['google_id'],$result);
            if ($id>0) $id=$result[0]; else $id='';
            // Pre-check Hide For Admin option
            if (isset($_POST['hide_for_admin'])&&($_POST['hide_for_admin']=='on')) $adm=true; else $adm=false;
            $this->Options['GoogleID']=$id;
            $this->Options['HideForAdmins']=$adm;
            // Update newly provided options
            update_option($this->OptionsName,serialize($this->Options));
            echo '<div id="message" class="updated fade"><p><strong>'.__('Options saved.').'</strong></p></div>';
         }
      }

      private function options_body()
      {
         global $title;
         // Is Hide For Admins option checked?
         if ($this->Options['HideForAdmins']) $chk=' checked="checked"'; else $chk='';
         // Show options panel
         echo '  <div class="wrap">
   <div id="icon-options-general" class="icon32"><br /></div>
  <h2>'.$title.'</h2>
  <p>'.__('This plugin has only two settings. Google Analytics code and the option of hiding the code for users logged on with administrator privileges. This will not count your visit that does not distort the results in the service.',$this->TD).'</p>
  <form name="formlnp" method="post">
   <input type="hidden" name="gah_submit" value="submit">
   <table class="form-table">
    <tr valign="top">
     <th scope="row">'.__('Google Analytics ID',$this->TD).'</th>
     <td>
      <fieldset>
       <legend class="screen-reader-text"><span>'.__('Google Analytics ID',$this->TD).'</span></legend>
       <label for="google_id"><input name="google_id" type="text" id="google_id" value="'.$this->Options['GoogleID'].'" class="regular-text" /> '.__('Using format UA-XXXXXXXX-Y',$this->TD).'</label>
      </fieldset>
     </td>
    </tr>
    <tr valign="top">
     <th scope="row">'.__('Hide for administrators',$this->TD).'</th>
     <td>
      <fieldset>
       <legend class="screen-reader-text"><span>'.__('Hide for administrators',$this->TD).'</span></legend>
       <label for="hide_for_admin"><input name="hide_for_admin" type="checkbox" id="hide_for_admin"'.$chk.' /> '.__('Select this option to not add the tracking code for logged in users with administrator privileges.',$this->TD).'</label>
      </fieldset>
     </td>
    </tr>
   </table>
   <p class="submit"><input type="submit" name="gah_submit" id="submit" class="button-primary" value="'.__('Save Changes').'" /></p>
  </form>
  <p>'.__('',$this->TD).'</p>
  <p>'.$this->Footer.'</p>
 </div>';
      }
   }

   // Run plugin
   $AH=new AnalyticsHead();
   // End of file, thank you for watching ;)
   // Lukasz Nowicki jagoo@post.pl