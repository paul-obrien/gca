<div class="row cunjo-intro">
	<div class="col-lg-2 col-md-1"></div>
    <div class="col-lg-8 col-md-10 col-sm-12" style="margin: 40px auto;">
    	<div class="panel panel-primary">
        	<div class="panel-heading">
            	<div class="row">
                	<div class="col-md-8 col-xs-6">
                        <h3 class="panel-title">Welcome to <a href="http://cunjo.com"><img src="<?php echo plugins_url( 'share-social/assets/images/cunjo-logo.png' ); ?>" style="height: 40px;margin-left: 5px;" /></a></h3>
                    </div>
                    <div class="col-md-4 col-xs-6 navigation-btns" style="text-align:right;padding-top: 4px;">
                        <a href="<?php echo network_admin_url( 'admin.php?page=cunjo_plugin_config') ;?>" class="btn btn-default">Start <i class="appz-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <h3 class="heading">About Cunjo</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Current core version: <strong><?php echo get_site_option('cunjoshare_plugin_version') ?></strong></p> 
                            <p>Current db version: <strong><?php echo get_site_option('cunjoshare_db_version') ?></strong></p>
                            <p>Lead developers: <strong>Biro Florin, Josh Foote</strong></p>
                            <p>Cunjo service home: <strong><a href="http://cunjo.com" target="_blank">cunjo.com</a></strong></p>
                            <p>Bugs and Support: <strong><a href="http://hub.cunjo.com" target="_blank">hub.cunjo.com</a></strong></p>
                        </div>
                        <div class="col-md-6">
                            <p>Core plugin License: <strong><a href="http://www.gnu.org/licenses/gpl.html" target="_blank">GPLv2 or later</a></strong></p>
                            <p>Service developed and hosted by <strong><a href="http://cunjo.com" target="_blank">Cunjo</a></strong></p>
                            <p>Requests and Contributions: <strong>info@cunjo.com</strong></p>
                            <p>Support contact: <strong>support@cunjo.com</strong></p>
                            <p>Upgrade Announcements: <strong><a href="http://hub.cunjo.com/announcements.php" target="_blank">hub.cunjo.com/announcements</a></strong></p>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <h3>Core Credits &amp; Contributions</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Shiny2 Icons Design: <strong><a href="http://sawb.deviantart.com/art/Social-Icons-Pack-123247215" target="_blank">Social Icons Pack + (by sawb)</a></strong></p>
                            <p>Bald Icons Design: <strong><a href="http://oneandonedesigns.deviantart.com/" target="_blank">One & One Designs</a></strong></p>
                        </div>
                        <div class="col-md-6">
                            <p>Milky Icons Design: <strong><a href="http://harkable.com/blog/friday-freebie-social-media-icons-for-2013/" target="_blank">Harkable social media icons</a></strong></p>
                            <p>Round Icons Design: <strong><a href="http://veodesign.com" target="_blank">Somacro icons (by Veodesign)</a></strong></p>
                        </div>
                    </div>
                        
                        <?php
                        
                            do_action('cunjo_display_credits', $view_data);
                        
                        ?>
                
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-2"><h4>To do:</h4></div>
                    <div class="col-md-10" style="text-align:right">
                        <div class="btn-group">
                            <a href="<?php echo network_admin_url( 'admin.php?page=cunjo_plugin_config') ;?>" class="btn btn-primary btn-icon"><i class="appz-cog"></i> 1. Settings</a>
                            <a href="<?php echo network_admin_url( 'admin.php?page=cunjo_widget_library') ;?>" class="btn btn-primary btn-icon"><i class="appz-lab"></i> 2. Widgets</a>
                            <a href="<?php echo network_admin_url( 'admin.php?page=cunjo_social_analytics') ;?>" class="btn btn-primary btn-icon"><i class="appz-stats"></i> 3. Social Analytics</a>
                            <?php if(!isset($view_data['wp_options']['cunjoshare_checkU']) || $view_data['wp_options']['cunjoshare_checkU'] == 'Free'): ?>
                            <a href="http://share2.cunjo.com/register/" target="_blank" class="btn btn-warning btn-icon"><i class="appz-fire"></i> 4. Upgrade</a>
                            <?php endif; ?>
                            <a href="http://share.cunjo.com/platform/contributions/" class="btn btn-default btn-icon"><i class="appz-heart"></i> Contribute</a>
                            <a href="<?php echo network_admin_url( 'admin.php?page=cunjo_credits') ;?>" class="btn btn-default btn-icon"><i class="appz-info"></i> Credits</a>
                        </div>
                    </div>
                </div>
    		</div>
        </div>
    </div>
    <div class="col-lg-2 col-md-1"></div>
</div>
<div style="text-align:center;"><a href="http://share.cunjo.com/platform/contribute/?donation" target="_blank">Like this plugin? Consider helping with a donation.</a></div>
