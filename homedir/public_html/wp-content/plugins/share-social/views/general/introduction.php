<div class="row cunjo-intro">
	<div class="col-lg-2 col-md-1"></div>
    <div class="col-lg-8 col-md-10 col-sm-12" style="margin: 40px auto;">
    	<?php echo $view_data['stream_message']; ?>
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
                    <div class="col-md-8" id="welcome-video">
                        <iframe id="ifrm" width="1280" height="750" src="http://www.youtube.com/embed/7AIhsULtKww?rel=0&amp;hd=1" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="col-md-4">
                    	<h4>Video Library</h4>
                        <div class="list-group cunjo-videos">
                          <a href="http://www.youtube.com/embed/7AIhsULtKww?rel=0&amp;hd=1" class="list-group-item active" onclick="jQuery('.cunjo-videos .list-group-item').removeClass('active'); jQuery(this).addClass('active'); return loadIframe('ifrm', this.href);">
                                <img src="http://img.youtube.com/vi/7AIhsULtKww/0.jpg" alt="Cunjo Overview" height="32">
                                <span style="margin-left:10px">
                                    1. Cunjo Overview
                                </span>
                          </a>
                          <a href="http://www.youtube.com/embed/A6dD1KfRT1M?rel=0&amp;hd=1" class="list-group-item" onclick="jQuery('.cunjo-videos .list-group-item').removeClass('active'); jQuery(this).addClass('active'); return loadIframe('ifrm', this.href);">
                          		<img src="http://img.youtube.com/vi/A6dD1KfRT1M/0.jpg" alt="General Settings" height="32">
                                <span style="margin-left:10px">
                                    2. General Settings
                                </span>
                          </a>
                          <a href="http://www.youtube.com/embed/x0nT0cRF2yU?rel=0&amp;hd=1" class="list-group-item" onclick="jQuery('.cunjo-videos .list-group-item').removeClass('active'); jQuery(this).addClass('active'); return loadIframe('ifrm', this.href);">
                                <img src="http://img.youtube.com/vi/x0nT0cRF2yU/0.jpg" alt="Widgets Customisation" height="32">
                                <span style="margin-left:10px">
                                    3. Widgets Customisation
                                </span>
                          </a>
                        </div>
                    </div>
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
                            <a href="http://share.cunjo.com/register/" target="_blank" class="btn btn-warning btn-icon"><i class="appz-fire"></i> 4. Upgrade</a>
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
