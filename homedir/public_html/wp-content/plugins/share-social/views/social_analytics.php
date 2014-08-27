<div class="row cunjo-analytics">
	<div class="col-lg-1 col-md-1"></div>
    <div class="col-lg-10 col-md-10 col-sm-12" style="margin: 40px auto;">
    	<div class="panel panel-primary">
        	<div class="panel-heading">
            	<div class="row">
                	<div class="col-md-6 col-xs-5">
                        <h3 class="panel-title"><a href="http://cunjo.com"><img src="<?php echo plugins_url( 'share-social/assets/images/cunjo-logo.png' ); ?>" style="height: 40px;margin-left: 5px;" /></a> <span class="label label-info">Social analytics</span></h3>
                    </div>
                    <div class="col-md-6 col-xs-7 navigation-btns" style="text-align:right;padding-top: 4px;">
                        <div class="btn-group">
                        	<a href="<?php echo network_admin_url( 'admin.php?page=cunjo_widget_library') ;?>" class="btn btn-default"><i class="appz-arrow-left"></i> Widgets</a>
                            <a class="btn btn-default dropdown-toggle nav-drop" data-toggle="dropdown"><i class="appz-stack"></i></a>
                                <ul class="dropdown-menu pull-right" role="menu" style="text-align:left;width:100%;">
                                    <li><a href="<?php echo network_admin_url( 'admin.php?page=cunjo_parent') ;?>"><i class="appz-home"></i> Cunjo welcome</a></li>
                                    <li><a href="<?php echo network_admin_url( 'admin.php?page=cunjo_plugin_config') ;?>"><i class="appz-cog"></i> General settings</a></li>
                                    <li><a href="<?php echo network_admin_url( 'admin.php?page=cunjo_widget_library') ;?>"><i class="appz-lab"></i> Widgets library</a></li>
                                    <li class="disabled"><a href="<?php echo network_admin_url( 'admin.php?page=cunjo_social_analytics') ;?>"><i class="appz-stats"></i> Social analytics</a></li>
                                    <li class="divider"></li>
                                    <?php if(!isset($view_data['wp_options']['cunjoshare_checkU']) || $view_data['wp_options']['cunjoshare_checkU'] == 'Free'): ?>
                                    <li class="warning"><a href="http://share.cunjo.com/register/" target="_blank"><i class="appz-fire"></i> Go Premium!</a></li>
                                    <?php endif; ?>
                                    <li><a href="http://cunjo.com" target="_blank"><i class="appz-curiosity-logo"></i> Cunjo website</a></li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body" style="padding: 0; margin: 0;position:relative;">
            	<div class="navbar navbar-inverse" role="navigation">
                	<ul class="nav navbar-nav">
                        <li>
                            <a href="http://cunjo.com/socialanalytics/user/?on=platform" onclick="return loadIframe('ifrm', this.href);"><i class="appz-home"></i> Dashboard</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="appz-tree"></i> Share Stats&nbsp;<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                              <li><a href="http://cunjo.com/socialanalytics/user/shares_overview/?on=platform" onclick="return loadIframe('ifrm', this.href);">Overview</a></li>
                              <li><a href="http://cunjo.com/socialanalytics/user/shares_demographics/?on=platform" onclick="return loadIframe('ifrm', this.href);">Geographic</a></li>          
                              <li><a href="http://cunjo.com/socialanalytics/user/shares_pages/?on=platform" onclick="return loadIframe('ifrm', this.href);">Websites &#38; Pages</a></li>
                              <li><a href="http://cunjo.com/socialanalytics/user/shares_networks/?on=platform" onclick="return loadIframe('ifrm', this.href);">Social Channels</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                        	<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="appz-stats"></i> Click Stats&nbsp;<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                              <li><a href="http://cunjo.com/socialanalytics/user/clicks_overview/?on=platform" onclick="return loadIframe('ifrm', this.href);">Overview</a></li>
                              <li><a href="http://cunjo.com/socialanalytics/user/clicks_overview/?on=platform" onclick="return loadIframe('ifrm', this.href);">Geographic</a></li>
                              <li><a href="http://cunjo.com/socialanalytics/user/clicks_overview/?on=platform" onclick="return loadIframe('ifrm', this.href);">Websites &#38; Pages</a></li>          
                              <li><a href="http://cunjo.com/socialanalytics/user/clicks_overview/?on=platform" onclick="return loadIframe('ifrm', this.href);">Social Channels</a></li>                  
                            </ul>
                        </li>
                        <li class="dropdown">
                        	<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="appz-search"></i> Compare&nbsp;<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                              <li><a href="http://cunjo.com/socialanalytics/user/compare_pages/?on=platform" onclick="return loadIframe('ifrm', this.href);">Your pages</a></li>
                              <li><a href="http://cunjo.com/socialanalytics/user/compare_websites/?on=platform" onclick="return loadIframe('ifrm', this.href);">Your websites</a></li>
                              <li><a href="http://cunjo.com/socialanalytics/user/compare_competitors/?on=platform" onclick="return loadIframe('ifrm', this.href);">Competitors</a></li>                
                            </ul>
                        </li>
                        <li>
                        	<a href="http://cunjo.com/socialanalytics/user/settings/?on=platform" onclick="return loadIframe('ifrm', this.href);"><i class="appz-equalizer"></i> Account settings</a>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="appz-cog"></i> API &#38; Tools&nbsp;<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                              <li><a href="http://cunjo.com/socialanalytics/user/url_shortener/?on=platform" onclick="return loadIframe('ifrm', this.href);">URL Shortener</a></li>
                              <li><a href="http://cunjo.com/socialanalytics/user/api/?on=platform" onclick="return loadIframe('ifrm', this.href);">API</a></li>
                            </ul>
                          </li>
                        <li>
                        	<a href="http://cunjo.com/socialanalytics/user/logout/?on=platform" onclick="return loadIframe('ifrm', this.href);"><i class="appz-lock"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="alert alert-warning loading-frame" style="text-align:center;"><i class="appz-busy"></i> Loading... Issues here? <a href="http://cunjo.com/social-analytics/platform/" target="_blank">View Analytics on our website</a></div>
				<iframe name="ifrm" id="ifrm" src="http://cunjo.com/socialanalytics/user/?on=platform" frameborder="0" scrolling="no" style="width: 100%;" onload="resizeCrossDomainIframe('ifrm', 'http://cunjo.com');"></iframe>
            </div><!--/panel-body-->
            <div class="panel-footer">
                <div class="row">
                    <div class="row">
                    <div class="col-md-12">
                    	<div class="row usefull-links">
                    		<span style="font-size:16px;">Usefull</span>
                        	<a id="leave-feedback" href="javascript:void(0);" data-toggle="tooltip" title="Feedback & ideeas" target="_blank"><i class="appz-lamp"></i></a>
                            <a href="http://hub.cunjo.com/submitticket.php" data-toggle="tooltip" title="Bug reports & support" target="_blank"><i class="appz-bug"></i></a>
                            <a href="http://hub.cunjo.com/knowledgebase.php" data-toggle="tooltip" title="Knowledgebase" target="_blank"><i class="appz-info"></i></a>
                            <a href="http://hub.cunjo.com/announcements.php" data-toggle="tooltip" title="Announcements" target="_blank"><i class="appz-star"></i></a>
                            <a href="http://share.cunjo.com/platform/contributions/" data-toggle="tooltip" title="Contributions" target="_blank"><i class="appz-heart"></i></a>
                        </div>
                    </div>
                </div>
                </div>
    		</div>
        </div>
    </div>
    <div class="col-lg-1 col-md-1"></div>
</div>
<div style="text-align:center;"><a href="http://share.cunjo.com/platform/contribute/?donation" target="_blank">Like this plugin? Consider helping with a donation.</a></div>
<script type="text/javascript">
	function resizeCrossDomainIframe(id, other_domain) {
		var iframe = document.getElementById(id);
		window.addEventListener('message', function(event) {
		  if (event.origin !== other_domain) return; // only accept messages from the specified domain
		  if (isNaN(event.data)) return; // only accept something which can be parsed as a number
		  var height = parseInt(event.data) + 32; // add some extra height to avoid scrollbar
		  iframe.height = height + "px";
		  jQuery('.loading-frame').slideUp(200);
		}, false);
   }
</script>