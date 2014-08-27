<div class="row cunjo-intro">
	<div class="col-lg-2 col-md-1"></div>
    <div class="col-lg-8 col-md-10 col-sm-12" style="margin: 40px auto;">
    	<div class="panel panel-primary">
        	<div class="panel-heading">
            	<div class="row">
                	<div class="col-md-6 col-xs-5">
                        <h3 class="panel-title"><a href="http://cunjo.com"><img src="<?php echo plugins_url( 'share-social/assets/images/cunjo-logo.png' ); ?>" style="height: 40px;margin-left: 5px;" /></a> <span class="label label-info">Settings</span></h3>
                    </div>
                    <div class="col-md-6 col-xs-7 navigation-btns" style="text-align:right;padding-top: 4px;">
                        <div class="btn-group">
                        	<a href="<?php echo network_admin_url( 'admin.php?page=cunjo_parent') ;?>" class="btn btn-default"><i class="appz-arrow-left"></i> Welcome</a>
                            <a class="btn btn-default dropdown-toggle nav-drop" data-toggle="dropdown"><i class="appz-stack"></i></a>
                                <ul class="dropdown-menu pull-right" role="menu" style="text-align:left;width:100%;">
                                    <li><a href="<?php echo network_admin_url( 'admin.php?page=cunjo_parent') ;?>"><i class="appz-home"></i> Cunjo welcome</a></li>
                                    <li class="disabled"><a href="<?php echo network_admin_url( 'admin.php?page=cunjo_plugin_config') ;?>"><i class="appz-cog"></i> General settings</a></li>
                                    <li><a href="<?php echo network_admin_url( 'admin.php?page=cunjo_widget_library') ;?>"><i class="appz-lab"></i> Widgets library</a></li>
                                    <li><a href="<?php echo network_admin_url( 'admin.php?page=cunjo_social_analytics') ;?>"><i class="appz-stats"></i> Social analytics</a></li>
                                    <li class="divider"></li>
                                    <?php if(!isset($view_data['wp_options']['cunjoshare_checkU']) || $view_data['wp_options']['cunjoshare_checkU'] == 'Free'): ?>
                                    <li class="warning"><a href="http://share.cunjo.com/register/" target="_blank"><i class="appz-fire"></i> Go Premium!</a></li>
                                    <?php endif; ?>
                                    <li><a href="http://cunjo.com" target="_blank"><i class="appz-curiosity-logo"></i> Cunjo website</a></li>
                                </ul>
                            <a href="<?php echo network_admin_url( 'admin.php?page=cunjo_widget_library') ;?>" class="btn btn-default">Widgets <i class="appz-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <ul class="nav nav-tabs" id="cunjoSettings">
                    	<li class="active"><a href="#general">General settings</a></li>
                        <li><a href="#profiles">Social profiles</a></li>
                    </ul>
                    <div class="msg-container"></div>
                    <form class="form-horizontal" id="general_settings-form">
                    <div class="tab-content">
                    	<div class="tab-pane active" id="general">
                        	<?php if(!isset($view_data['wp_options']['cunjoshare_shareid']) || empty($view_data['wp_options']['cunjoshare_shareid']) || $view_data['wp_options']['cunjoshare_shareid'] == ''): ?>
                            <div class="alert alert-warning" style="margin-bottom: 0;margin-top: 20px;">
                                <strong>Warning!</strong> You wil not be able to use any of the features if you do not have a Cunjo ID. <a id="cunjo_registerShare" data-toggle="modal" data-target="#registerShare" class="btn btn-inverse">CLICK HERE</a> to register one!
                            </div>
                            <?php endif; ?>
                            <div class="row">
                            	<div class="col-md-6">
                                	<div class="form-group" id="shareid-group">
                                        <label class="control-label" for="cunjo_shareid">Cunjo ID</label>
                                        <div class="input-group">
                                            <input type="text" name="shareid" id="cunjo_shareid" class="form-control" value="<?php echo(isset($view_data['wp_options']['cunjoshare_shareid']))? $view_data['wp_options']['cunjoshare_shareid'] : ''; ?>">
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="Your registered !Share ID"><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/shareid-group-->
                                    <div class="form-group" id="has_analytics-group">
                                        <label class="control-label" for="cunjo_shareid">Enable Social Analytics</label>
                                        <div class="input-group">
											<select class="form-control" name="has_analytics" id="cunjo_lang">
                                            	<option value="yes" <?php echo(isset($view_data['wp_options']['cunjoshare_has_analytics']) && $view_data['wp_options']['cunjoshare_has_analytics'] == 'yes')? 'selected' : ''; ?>>Yes</option>
                                                <option value="no" <?php echo(isset($view_data['wp_options']['cunjoshare_has_analytics']) && $view_data['wp_options']['cunjoshare_has_analytics'] == 'no')? 'selected' : ''; ?>>No</option>
                                            </select>
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="Enable/Disable Social Analytics tracking features"><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/has_analytics-group-->
                                    <div class="form-group" id="email-group">
                                    	<label class="control-label" for="cunjo_byemail">Share by email delivery</label>
                                        <div class="input-group">
											<select class="form-control" name="byemail" id="cunjo_byemail">
                                            	<option value="cunjo" <?php echo(isset($view_data['wp_options']['cunjoshare_byemail']) && $view_data['wp_options']['cunjoshare_byemail'] == 'cunjo')? 'selected' : ''; ?>>Cunjo servers</option>
                                                <option value="own" <?php echo(isset($view_data['wp_options']['cunjoshare_byemail']) && $view_data['wp_options']['cunjoshare_byemail'] == 'own')? 'selected' : ''; ?>>My website</option>
                                            </select>
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="Select if emails with shared content should be sent from your website or Cunjo Servers"><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/email-group-->
                                </div>
                                <div class="col-md-6">
                                	<div class="form-group" id="lang-group">
                                        <label class="control-label" for="cunjo_lang">Widget's Language</label>
                                        <div class="input-group">
                                            <select class="form-control" name="lang" id="cunjo_lang">
                                                <option value="EN" <?php echo(isset($view_data['wp_options']['cunjoshare_lang']) && $view_data['wp_options']['cunjoshare_lang'] == 'EN')? 'selected' : ''; ?>>English</option>
                                                <option value="FR" <?php echo(isset($view_data['wp_options']['cunjoshare_lang']) && $view_data['wp_options']['cunjoshare_lang'] == 'FR')? 'selected' : ''; ?>>French</option>
                                                <option value="IT" <?php echo(isset($view_data['wp_options']['cunjoshare_lang']) && $view_data['wp_options']['cunjoshare_lang'] == 'IT')? 'selected' : ''; ?>>Italian</option>
                                                <option value="ES" <?php echo(isset($view_data['wp_options']['cunjoshare_lang']) && $view_data['wp_options']['cunjoshare_lang'] == 'ES')? 'selected' : ''; ?>>Spanish</option>
                                                <option value="DE" <?php echo(isset($view_data['wp_options']['cunjoshare_lang']) && $view_data['wp_options']['cunjoshare_lang'] == 'DE')? 'selected' : ''; ?>>German</option>
                                                <option value="NL" <?php echo(isset($view_data['wp_options']['cunjoshare_lang']) && $view_data['wp_options']['cunjoshare_lang'] == 'NL')? 'selected' : ''; ?>>Dutch</option>
                                                <option value="RU" <?php echo(isset($view_data['wp_options']['cunjoshare_lang']) && $view_data['wp_options']['cunjoshare_lang'] == 'RU')? 'selected' : ''; ?>>Russian</option>
                                                <option value="CH" <?php echo(isset($view_data['wp_options']['cunjoshare_lang']) && $view_data['wp_options']['cunjoshare_lang'] == 'CH')? 'selected' : ''; ?>>Chinese</option>
                                                <option value="AR" <?php echo(isset($view_data['wp_options']['cunjoshare_lang']) && $view_data['wp_options']['cunjoshare_lang'] == 'AR')? 'selected' : ''; ?>>Arabic</option>
                                                <option value="EL" <?php echo(isset($view_data['wp_options']['cunjoshare_lang']) && $view_data['wp_options']['cunjoshare_lang'] == 'EL')? 'selected' : ''; ?>>Greek</option>
                                                <option value="TR" <?php echo(isset($view_data['wp_options']['cunjoshare_lang']) && $view_data['wp_options']['cunjoshare_lang'] == 'TR')? 'selected' : ''; ?>>Turkish</option>
                                                <option value="RO" <?php echo(isset($view_data['wp_options']['cunjoshare_lang']) && $view_data['wp_options']['cunjoshare_lang'] == 'RO')? 'selected' : ''; ?>>Romanian</option>
                                                <option value="BG" <?php echo(isset($view_data['wp_options']['cunjoshare_lang']) && $view_data['wp_options']['cunjoshare_lang'] == 'BG')? 'selected' : ''; ?>>Bulgarian</option>
                                            </select>
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="Select the Language of your weidgets. If you find the phrases poorly translated and wnat to help out, please contact us."><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/lang-group-->
                                    <div class="form-group" id="category-group">
                                        <label class="control-label" for="category">General Category</label>
                                        <div class="input-group">
                                            <select class="form-control" name="category" id="cunjo_category">
                                                <option value="0">Select..</option>
                                                <option value="Arts & Entertainment" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Arts & Entertainment')? 'selected' : ''; ?>>Arts & Entertainment</option>
                                                <option value="Automotive" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Automotive')? 'selected' : ''; ?>>Automotive</option>
                                                <option value="Beauty" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Beauty')? 'selected' : ''; ?>>Beauty</option>
                                                <option value="Business" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Business')? 'selected' : ''; ?>>Business</option>
                                                <option value="Clothing" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Clothing')? 'selected' : ''; ?>>Clothing</option>
                                                <option value="Consumer Electronics" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Consumer Electronics')? 'selected' : ''; ?>>Consumer Electronics</option>
                                                <option value="Education" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Education')? 'selected' : ''; ?>>Education</option>
                                                <option value="Family & Parenting" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Family & Parenting')? 'selected' : ''; ?>>Family & Parenting</option>
                                                <option value="Finance" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Finance')? 'selected' : ''; ?>>Finance</option>
                                                <option value="Fitness" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Fitness')? 'selected' : ''; ?>>Fitness</option>
                                                <option value="Food & Drinks" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Food & Drinks')? 'selected' : ''; ?>>Food & Drinks</option>
                                                <option value="Games" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Games')? 'selected' : ''; ?>>Games</option>
                                                <option value="Government" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Government')? 'selected' : ''; ?>>Government</option>
                                                <option value="Health" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Health')? 'selected' : ''; ?>>Health</option>
                                                <option value="Home Gardening" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Home Gardening')? 'selected' : ''; ?>>Home Gardening</option>
                                                <option value="Investments" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Investments')? 'selected' : ''; ?>>Investments</option>
                                                <option value="Jewelry" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Jewelry')? 'selected' : ''; ?>>Jewelry</option>
                                                <option value="Jobs" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Jobs')? 'selected' : ''; ?>>Jobs</option>
                                                <option value="Legal" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Legal')? 'selected' : ''; ?>>Legal</option>
                                                <option value="Music" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Music')? 'selected' : ''; ?>>Music</option>
                                                <option value="Pets" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Pets')? 'selected' : ''; ?>>Pets</option>
                                                <option value="Real Estate" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Real Estate')? 'selected' : ''; ?>>Real Estate</option>
                                                <option value="Religion" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Religion')? 'selected' : ''; ?>>Religion</option>
                                                <option value="Science" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Science')? 'selected' : ''; ?>>Science</option>
                                                <option value="Sports" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Sports')? 'selected' : ''; ?>>Sports</option>
                                                <option value="Technology" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Technology')? 'selected' : ''; ?>>Technology</option>
                                                <option value="Travel" <?php echo(isset($view_data['wp_options']['cunjoshare_category']) && $view_data['wp_options']['cunjoshare_category'] == 'Travel')? 'selected' : ''; ?>>Travel</option>
                                            </select>
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="The category choosen here will be used to record shared category on homepage and posts/pages that do not have a !Share Category assigned."><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/category-group-->
                                    <div class="form-group" id="email-group">
                                    	<label class="control-label" for="cunjo_cache">Cache widgets</label>
                                        <div class="input-group">
											<select class="form-control" name="cache" id="cunjo_cache">
                                            	<option value="no" <?php echo(isset($view_data['wp_options']['cunjoshare_cache']) && $view_data['wp_options']['cunjoshare_cache'] == 'no')? 'selected' : ''; ?>>No</option>
                                                <option value="yes" <?php echo(isset($view_data['wp_options']['cunjoshare_cache']) && $view_data['wp_options']['cunjoshare_cache'] == 'yes')? 'selected' : ''; ?>>Yes</option>
                                            </select>
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="Select if widgets should be cached. Requires file write permission."><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/email-group-->
                                </div>
                                <div class="form-group" id="category-group">
                                    <div class="alert alert-info" style="margin-bottom: 0;margin-top: 10px;">Account type: <b class="acc-type"><?php echo(isset($view_data['wp_options']['cunjoshare_checkU']))? $view_data['wp_options']['cunjoshare_checkU'] : 'N/A'; ?></b></div>
                                </div>
                            </div>
                        </div><!--/general-tab-->
                        <div class="tab-pane" id="profiles">
                        	<div class="row">
                            	<div class="col-md-6">
                                	<div class="form-group" id="facebook-group">
                                        <label class="control-label" for="cunjo_facebook">FaceBook URL</label>
                                        <div class="input-group">
                                            <input type="text" name="facebook" id="cunjo_facebook" class="form-control" value="<?php echo(isset($view_data['wp_options']['cunjoshare_facebook']))? $view_data['wp_options']['cunjoshare_facebook'] : ''; ?>">
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="URL to your Facbook profile"><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/facebook-group-->
                                    <div class="form-group" id="google-group">
                                        <label class="control-label" for="cunjoshare_google">Google Plus URL</label>
                                        <div class="input-group">
                                            <input type="text" name="google" id="cunjoshare_google" class="form-control" value="<?php echo(isset($view_data['wp_options']['cunjoshare_google']))? $view_data['wp_options']['cunjoshare_google'] : ''; ?>">
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="URL to your Google+ profile"><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/google-group-->
                                    <div class="form-group" id="youtube-group">
                                        <label class="control-label" for="cunjoshare_youtube">YouTube URL</label>
                                        <div class="input-group">
                                            <input type="text" name="youtube" id="cunjoshare_youtube" class="form-control" value="<?php echo(isset($view_data['wp_options']['cunjoshare_youtube']))? $view_data['wp_options']['cunjoshare_youtube'] : ''; ?>">
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="URL to your Youtube channel"><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/youtube-group-->
                                    <div class="form-group" id="pinterest-group">
                                        <label class="control-label" for="cunjoshare_pinterest">Pinterest Username</label>
                                        <div class="input-group">
                                            <input type="text" name="pinterest" id="cunjoshare_pinterest" class="form-control" value="<?php echo(isset($view_data['wp_options']['cunjoshare_pinterest']))? $view_data['wp_options']['cunjoshare_pinterest'] : ''; ?>">
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="Your Pinterest Username"><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/pinterest-group-->
                                    <div class="form-group" id="flickr-group">
                                        <label class="control-label" for="cunjoshare_flickr">Flickr URL</label>
                                        <div class="input-group">
                                            <input type="text" name="flickr" id="cunjoshare_flickr" class="form-control" value="<?php echo(isset($view_data['wp_options']['cunjoshare_flickr']))? $view_data['wp_options']['cunjoshare_flickr'] : ''; ?>">
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="URL to Flickr"><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/flickr-group-->
                                    <div class="form-group" id="dribbble-group">
                                        <label class="control-label" for="cunjoshare_dribbble">Dribbble Username</label>
                                        <div class="input-group">
                                            <input type="text" name="dribbble" id="cunjoshare_dribbble" class="form-control" value="<?php echo(isset($view_data['wp_options']['cunjoshare_dribbble']))? $view_data['wp_options']['cunjoshare_dribbble'] : ''; ?>">
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="Your Dribbble username"><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/dribbble-group-->
                                    <div class="form-group" id="stumbleupon-group">
                                        <label class="control-label" for="cunjoshare_stumbleupon">Stumbleupon profile URL</label>
                                        <div class="input-group">
                                            <input type="text" name="stumbleupon" id="cunjoshare_stumbleupon" class="form-control" value="<?php echo(isset($view_data['wp_options']['cunjoshare_stumbleupon']))? $view_data['wp_options']['cunjoshare_stumbleupon'] : ''; ?>">
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="Your Stumbleupon profile URL"><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/stumbleupon-group-->
                                    <div class="form-group" id="rss-group">
                                        <label class="control-label" for="cunjoshare_rss">RSS Subscribe URL</label>
                                        <div class="input-group">
                                            <input type="text" name="rss" id="cunjoshare_rss" class="form-control" value="<?php echo(isset($view_data['wp_options']['cunjoshare_rss']))? $view_data['wp_options']['cunjoshare_rss'] : ''; ?>">
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="URL to your RSS Feed"><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/rss-group-->
                                </div>
                                
                                <div class="col-md-6">
                                	<div class="form-group" id="twitter-group">
                                        <label class="control-label" for="cunjoshare_twitter">Twitter username</label>
                                        <div class="input-group">
                                            <input type="text" name="twitter" id="cunjoshare_twitter" class="form-control" value="<?php echo(isset($view_data['wp_options']['cunjoshare_twitter']))? $view_data['wp_options']['cunjoshare_twitter'] : ''; ?>">
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="Your Twitter username"><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/twitter-group-->
                                    <div class="form-group" id="linkedin-group">
                                        <label class="control-label" for="cunjoshare_linkedin">LinkedIn URL</label>
                                        <div class="input-group">
                                            <input type="text" name="linkedin" id="cunjoshare_linkedin" class="form-control" value="<?php echo(isset($view_data['wp_options']['cunjoshare_linkedin']))? $view_data['wp_options']['cunjoshare_linkedin'] : ''; ?>">
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="URL to your LinkedIn profile"><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/linkedin-group-->
                                    <div class="form-group" id="vimeo-group">
                                        <label class="control-label" for="cunjoshare_vimeo">Vimeo URL</label>
                                        <div class="input-group">
                                            <input type="text" name="vimeo" id="cunjoshare_vimeo" class="form-control" value="<?php echo(isset($view_data['wp_options']['cunjoshare_vimeo']))? $view_data['wp_options']['cunjoshare_vimeo'] : ''; ?>">
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="URL to your Vimeo channel"><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/vimeo-group-->
                                    <div class="form-group" id="instagram-group">
                                        <label class="control-label" for="cunjoshare_instagram">Instagram Username</label>
                                        <div class="input-group">
                                            <input type="text" name="instagram" id="cunjoshare_instagram" class="form-control" value="<?php echo(isset($view_data['wp_options']['cunjoshare_instagram']))? $view_data['wp_options']['cunjoshare_instagram'] : ''; ?>">
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="Your Instagram profile"><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/instagram-group-->
                                    <div class="form-group" id="behance-group">
                                        <label class="control-label" for="cunjoshare_behance">Behance Profile URL</label>
                                        <div class="input-group">
                                            <input type="text" name="behance" id="cunjoshare_behance" class="form-control" value="<?php echo(isset($view_data['wp_options']['cunjoshare_behance']))? $view_data['wp_options']['cunjoshare_behance'] : ''; ?>">
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="URL to your Behance profile"><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/behance-group-->
                                    <div class="form-group" id="digg-group">
                                        <label class="control-label" for="cunjoshare_digg">Digg profile URL</label>
                                        <div class="input-group">
                                            <input type="text" name="digg" id="cunjoshare_digg" class="form-control" value="<?php echo(isset($view_data['wp_options']['cunjoshare_digg']))? $view_data['wp_options']['cunjoshare_digg'] : ''; ?>">
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="Your Digg URL"><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/digg-group-->
                                    <div class="form-group" id="delicious-group">
                                        <label class="control-label" for="cunjoshare_delicious">Delicious profile URL</label>
                                        <div class="input-group">
                                            <input type="text" name="delicious" id="cunjoshare_delicious" class="form-control" value="<?php echo(isset($view_data['wp_options']['cunjoshare_delicious']))? $view_data['wp_options']['cunjoshare_delicious'] : ''; ?>">
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="Your Delicious profile URL"><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/delicious-group-->
                                    <div class="form-group" id="email-group">
                                        <label class="control-label" for="cunjoshare_email">Email Address</label>
                                        <div class="input-group">
                                            <input type="text" name="email" id="cunjoshare_email" class="form-control" value="<?php echo(isset($view_data['wp_options']['cunjoshare_email']))? $view_data['wp_options']['cunjoshare_email'] : ''; ?>">
                                            <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="Your Contact email address"><span class="appz-question-2" style="display:inline-block"></span></span>
                                        </div>
                                    </div><!--/email-group-->
                                </div>
                            </div>
                            <div class="alert alert-info"><i class="appz-curiosity-logo" style="font-size: 60px;vertical-align: middle;float: left;margin: -10px 20px 0px 0;"></i> The social profiles are used for Cunjo's wordpress widgets like "Follow us" widget. Note some widgets might not be visible in "Available widgets" container until you sa ve specific profiles (ie. if you don't save a Twitter usename the Twitter feed widget will not be available.)<br /><br /><a style="float:right;" class="btn btn-default" href="<?php echo admin_url( 'widgets.php') ;?>"><div id="icon-themes" class="icon32" style="margin:0;vertical-align: middle;display: inline-block;float: none;"></div> View WP widgets</a><div style="clear:both"></div></div>
                        </div><!--/profiles-tab-->
                    </div>
                    </form>
                </div>
            </div><!--/panel-body-->
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12" style="text-align:center">
                        <div class="btn-group">
                            <a href="javascript:void(0)" class="btn btn-lg btn-primary" id="general_settings-submit" data-loading-text="loading...">Save settings</a>
                        </div>
                    </div>
                </div>
    		</div>
        </div>
    </div>
    <div class="col-lg-2 col-md-1"></div>
</div>
<div style="text-align:center;"><a href="http://share.cunjo.com/platform/contribute/?donation" target="_blank">Like this plugin? Consider helping with a donation.</a></div>

<!-- Register Cunjo ID -->
  <div class="modal" id="registerShare" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Register Cunjo ID</h4>
        </div>
        <div class="modal-body">
            <div class="alert alert-info">
                <i class="appz-info-2"></i> <span>You can use your Cunjo ID for as many websites as you like.</span>
            </div>
            <form class="form-horizontal" id="redisterid-form" novalidate="novalidate">
                <div class="form-group" id="email_register-group">
                    <label class="form-label" for="cunjo_email">Email Address*</label>
                    <div class="input-group">
                        <input class="form-control" type="text" name="cunjo_email" id="cunjo_email" type="email">
                        <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="Your email address so we can send you securely your !Share ID"><span class="appz-question-2" style="display:inline-block"></span></span>
                    </div>
                </div><!--/email_register-group-->
                <div class="form-group" id="password_register-group">
                    <label class="form-label" for="cunjo_password">Password*</label>
                    <div class="input-group">
                        <input class="form-control" type="password" name="cunjo_password" id="cunjo_password" >
                        <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="Please type desired password for Social Analytics"><span class="appz-question-2" style="display:inline-block"></span></span>
                    </div>
                </div><!--/password_register-group-->
                <div class="form-group" id="passwordrepeat_register-group">
                    <label class="form-label" for="cunjo_passwordrepeat">Verify password*</label>
                    <div class="input-group">
                        <input class="form-control" type="password" name="cunjo_passwordrepeat" id="cunjo_passwordrepeat" >
                        <span style="margin: 0;" class="input-group-addon" data-toggle="tooltip" data-placement="top" data-original-title="Please verify your password"><span class="appz-question-2" style="display:inline-block"></span></span>
                    </div>
                </div><!--/passwordrepeat_register-group-->
                <div class="form-group">
                    <div class="controls">
                        <small>Fields marked with * are mandatory</small>
                    </div>
                </div>
            </form>

        </div>
        <div class="modal-footer">
            <label class="pull-left" style="display:inline-block;">
              <input type="checkbox" id="registerid-terms" style="margin: 2px 0 0;"> I agree with <a href="http://share.cunjo.com/cunjo-share-terms-conditions/" target="_blank">Terms & Conditions</a>
            </label>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="appz-close"></i> Close</button>
          <button type="button" class="btn btn-primary" id="submit-registerid" data-loading-text="loading..."><i class="appz-checkmark-2"></i> Register</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
