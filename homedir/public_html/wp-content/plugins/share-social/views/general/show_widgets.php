<div class="row cunjo-intro">
	<div class="col-md-1"></div>
    <div class="col-md-10 col-sm-12" style="margin: 40px auto;">
    	<div class="panel panel-primary">
        	<div class="panel-heading">
            	<div class="row">
                	<div class="col-md-6 col-xs-5">
                        <h3 class="panel-title"><a href="http://cunjo.com"><img src="<?php echo plugins_url( 'share-social/assets/images/cunjo-logo.png' ); ?>" style="height: 40px;margin-left: 5px;" /></a> <span class="label label-info">Widgets Library</span></h3>
                    </div>
                    <div class="col-md-6 col-xs-7 navigation-btns" style="text-align:right;padding-top: 4px;">
                        <div class="btn-group">
                        	<a href="<?php echo network_admin_url( 'admin.php?page=cunjo_plugin_config') ;?>" class="btn btn-default"><i class="appz-arrow-left"></i> Settings</a>
                            <a class="btn btn-default dropdown-toggle nav-drop" data-toggle="dropdown"><i class="appz-stack"></i></a>
                                <ul class="dropdown-menu pull-right" role="menu" style="text-align:left;width:100%;">
                                    <li><a href="<?php echo network_admin_url( 'admin.php?page=cunjo_parent') ;?>"><i class="appz-home"></i> Cunjo welcome</a></li>
                                    <li><a href="<?php echo network_admin_url( 'admin.php?page=cunjo_plugin_config') ;?>"><i class="appz-cog"></i> General settings</a></li>
                                    <li class="disabled"><a href="<?php echo admin_url( 'admin.php?page=cunjo_widget_library') ;?>"><i class="appz-lab"></i> Widgets library</a></li>
                                    <li><a href="<?php echo network_admin_url( 'admin.php?page=cunjo_social_analytics') ;?>"><i class="appz-stats"></i> Social analytics</a></li>
                                    <li class="divider"></li>
                                    <?php if(!isset($view_data['wp_options']['cunjoshare_checkU']) || $view_data['wp_options']['cunjoshare_checkU'] == 'Free'): ?>
                                    <li class="warning"><a href="http://share.cunjo.com/register/" target="_blank"><i class="appz-fire"></i> Go Premium!</a></li>
                                    <?php endif; ?>
                                    <li><a href="http://cunjo.com" target="_blank"><i class="appz-curiosity-logo"></i> Cunjo website</a></li>
                                </ul>
                            <a href="<?php echo network_admin_url( 'admin.php?page=cunjo_social_analytics') ;?>" class="btn btn-default">Analytics <i class="appz-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
            	<div class="row" style="margin-bottom: 20px; text-align:center;">
                	<ul class="nav nav-pills" id="cunjoWidgets">
                    	<li class="active"><a href="#bars">Bars</a></li>
                        <li><a href="#buttons">Buttons</a></li>
                        <li><a href="#modals">Modals</a></li>
                        <li><a href="#others">Others</a></li>
                    </ul>
                </div>
                <div class="row">
                <?php if(isset($view_data['layouts']) && !empty($view_data['layouts'])): ?>
                    <div class="tab-content">
                    	<div class="tab-pane active" id="bars">
                        	<div class="row">
                            	<?php 
										$pretty_colors = array('#f63a4b', '#9d63ca', '#52d4bc', '#308ece', '#d96690', '#d1a95e', '#814d30', '#34b09e', '#659739', '#2a0329', '#f2ec91', '#932724');
                                        shuffle($pretty_colors);
										$i = 0; foreach($view_data['layouts'] as $key => $widget):
                                            if($widget->category == 'Bars'):
                                    ?>
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                        <?php if(!empty($view_data['settings']) && array_key_exists($key, $view_data['settings'])): ?>
                                            <div class="panel panel-default">
                                                    <div class="thumbnail" style="background-color: <?php echo $pretty_colors[$i]; ?>">
                                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: auto;" src="<?php echo $widget->screenshot; ?>">
                                                    </div>
                                                <div class="panel-body">
                                                    <div class="cunjo_widget-description">
                                                        <h4><?php echo $widget->title; ?> <small class="muted">- v.<?php echo $widget->version; ?></small></h4>
                                                        <?php echo $widget->description; ?>
                                                    </div>
                                                </div>
                                                <span class="widget-status-label" layout="<?php echo $key; ?>">
                                                    <?php echo($view_data['settings'][$key]['visibility_settings']['is_active'] == 1)? '<span class="badge badge-success">&nbsp;</span> Active Widget' : '<span class="badge">&nbsp;</span> Installed Widget'; ?>
                                                </span>
                                                <div class="panel-footer" layout="<?php echo $key; ?>">
                                                	<div class="dropup" style="display:inline-block;">
                                                        <button class="btn btn-default widget-settings" id="<?php echo $key; ?>_list" data-toggle="dropdown" href="#" plus-toggle="tooltip" title="Widget Settings"><i class="appz-lab" style="color: #00BCEB;"></i></button>
                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="<?php echo $key; ?>_list">
                                                            <?php 
                                                                foreach($view_data['settings'][$key] as $skey => $settings): 
                                                            ?>
                                                                <li><a data-toggle="modal" href="#<?php echo $key.'_'.$skey; ?>"><?php echo $settings['settings_category']; ?></a></li>
                                                            <?php 
                                                                endforeach; 
                                                            ?>
                                                        </ul>
                                                        <button class="btn btn-default widget-preview" id="<?php echo $key; ?>_list" data-toggle="modal" href="#preview_<?php echo $key; ?>" plus-toggle="tooltip" title="Widget Preview"><i class="appz-eye"></i></button>
                                                    </div>
                                                    <?php echo($view_data['settings'][$key]['visibility_settings']['is_active'] == 1)? '<button class="btn btn-info btn-small deactivate-widget pull-right" layout="'.$key.'" data-loading-text="loading..." data-activate-text="Activate">Deactivate</button>' : '<button class="btn btn-primary btn-small activate-widget pull-right" layout="'.$key.'" data-loading-text="loading..." data-deactivate-text="Deactivate">Activate</button>'; ?>
                                                	<div style="clear:both"></div>
                                                    <div class="shortcode-holder">
                                                        <span>Shortcode:</span> <input type="text" value='[cunjo layout="<?php echo $key; ?>"]' readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="panel panel-default">
                                                    <div class="thumbnail" style="background-color: <?php echo $pretty_colors[$i]; ?>">
                                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: auto;" src="<?php echo $widget->screenshot; ?>">
                                                    </div>
                                                <div class="panel-body">
                                                    <div class="cunjo_widget-description">
                                                        <h4><?php echo $widget->title; ?> <?php echo($widget->price > 0)? '<span class="label label-warning" style="vertical-align: middle;">&#36;'.$widget->price.'</span>' : ''; ?> <small class="muted">- v.<?php echo $widget->version; ?></small></h4>
                                                        <?php echo $widget->description; ?>
                                                    </div>
                                                </div>
                                                <span class="widget-status-label">
                                                    <?php echo($widget->price == 0)? '<span class="badge badge-inverse">&nbsp;</span> Free Widget' : '<span class="badge badge-warning">&nbsp;</span> Premium Widget'; ?>
                                                </span>
                                                <div class="panel-footer" layout="<?php echo $key; ?>">
                                                	<div class="dropup" style="display:inline-block;">
                                                        <button class="btn btn-default widget-settings" id="<?php echo $key; ?>_list" href="javascript:void(0)" plus-toggle="tooltip" title="Install to view settings"><i class="appz-lock-2"></i></button>
                                                        <button class="btn btn-default widget-preview" id="<?php echo $key; ?>_list" href="javascript:void(0)" plus-toggle="tooltip" title="Install to preview"><i class="appz-lock-2"></i></button>
                                                    </div>
                                                    <?php echo($widget->price == 0)? '<a href="'.$widget->link.'" class="btn btn-default btn-small pull-right" layout="'.$key.'" target="_blank">Download</a>' : '<a href="'.$widget->link.'" class="btn btn-warning btn-small pull-right" layout="'.$key.'" target="_blank">Purchase</a>'; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        </div>
                            <?php
                                    endif;
                                $i++; endforeach;
                            ?>
                            </div>
                        </div><!--/Bars-tab-->
                        <div class="tab-pane" id="buttons">
                        	<div class="row">
                            	<?php 
										shuffle($pretty_colors);
                                        $i = 0; foreach($view_data['layouts'] as $key => $widget):
										if($widget->category == 'Buttons'):
								?>
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                        <?php if(!empty($view_data['settings']) && array_key_exists($key, $view_data['settings'])): ?>
                                            <div class="panel panel-default">
                                                    <div class="thumbnail" style="background-color: <?php echo $pretty_colors[$i]; ?>">
                                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: auto;" src="<?php echo $widget->screenshot; ?>">
                                                    </div>
                                                <div class="panel-body">
                                                    <div class="cunjo_widget-description">
                                                        <h4><?php echo $widget->title; ?> <small class="muted">- v.<?php echo $widget->version; ?></small></h4>
                                                        <?php echo $widget->description; ?>
                                                    </div>
                                                </div>
                                                <span class="widget-status-label" layout="<?php echo $key; ?>">
                                                    <?php echo($view_data['settings'][$key]['visibility_settings']['is_active'] == 1)? '<span class="badge badge-success">&nbsp;</span> Active Widget' : '<span class="badge">&nbsp;</span> Installed Widget'; ?>
                                                </span>
                                                <div class="panel-footer" layout="<?php echo $key; ?>">
                                                	<div class="dropup" style="display:inline-block;">
                                                        <button class="btn btn-default widget-settings" id="<?php echo $key; ?>_list" data-toggle="dropdown" href="#" plus-toggle="tooltip" title="Widget Settings"><i class="appz-lab" style="color: #00BCEB;"></i></button>
                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="<?php echo $key; ?>_list">
                                                            <?php 
                                                                foreach($view_data['settings'][$key] as $skey => $settings): 
                                                            ?>
                                                                <li><a data-toggle="modal" href="#<?php echo $key.'_'.$skey; ?>"><?php echo $settings['settings_category']; ?></a></li>
                                                            <?php 
                                                                endforeach; 
                                                            ?>
                                                        </ul>
                                                        <button class="btn btn-default widget-preview" id="<?php echo $key; ?>_list" data-toggle="modal" href="#preview_<?php echo $key; ?>" plus-toggle="tooltip" title="Widget Preview"><i class="appz-eye"></i></button>
                                                    </div>
                                                    <?php echo($view_data['settings'][$key]['visibility_settings']['is_active'] == 1)? '<button class="btn btn-info btn-small deactivate-widget pull-right" layout="'.$key.'" data-loading-text="loading..." data-activate-text="Activate">Deactivate</button>' : '<button class="btn btn-primary btn-small activate-widget pull-right" layout="'.$key.'" data-loading-text="loading..." data-deactivate-text="Deactivate">Activate</button>'; ?>
                                                    <div style="clear:both"></div>
                                                    <div class="shortcode-holder">
                                                        <span>Shortcode:</span> <input type="text" value='[cunjo layout="<?php echo $key; ?>"]' readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="panel panel-default">
                                                    <div class="thumbnail" style="background-color: <?php echo $pretty_colors[$i]; ?>">
                                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: auto;" src="<?php echo $widget->screenshot; ?>">
                                                    </div>
                                                <div class="panel-body">
                                                    <div class="cunjo_widget-description">
                                                        <h4><?php echo $widget->title; ?> <?php echo($widget->price > 0)? '<span class="label label-warning" style="vertical-align: middle;">&#36;'.$widget->price.'</span>' : ''; ?> <small class="muted">- v.<?php echo $widget->version; ?></small></h4>
                                                        <?php echo $widget->description; ?>
                                                    </div>
                                                </div>
                                                <span class="widget-status-label">
                                                    <?php echo($widget->price == 0)? '<span class="badge badge-inverse">&nbsp;</span> Free Widget' : '<span class="badge badge-warning">&nbsp;</span> Premium Widget'; ?>
                                                </span>
                                                <div class="panel-footer" layout="<?php echo $key; ?>">
                                                	<div class="dropup" style="display:inline-block;">
                                                        <button class="btn btn-default widget-settings" id="<?php echo $key; ?>_list" href="javascript:void(0)" plus-toggle="tooltip" title="Install to view settings"><i class="appz-lock-2"></i></button>
                                                        <button class="btn btn-default widget-preview" id="<?php echo $key; ?>_list" href="javascript:void(0)" plus-toggle="tooltip" title="Install to preview"><i class="appz-lock-2"></i></button>
                                                    </div>
                                                    <?php echo($widget->price == 0)? '<a href="'.$widget->link.'" class="btn btn-default btn-small pull-right" layout="'.$key.'" target="_blank">Download</a>' : '<a href="'.$widget->link.'" class="btn btn-warning btn-small pull-right" layout="'.$key.'" target="_blank">Purchase</a>'; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        </div>
                            <?php
                                    endif;
                                $i++; endforeach;
                            ?>
                            </div>
                        </div><!--/Buttons-tab-->
                        <div class="tab-pane" id="modals">
                        	<div class="row">
                            	<?php 
										shuffle($pretty_colors);
                                        $i = 0; foreach($view_data['layouts'] as $key => $widget):
										if($widget->category == 'Modals'):
								?>
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                        <?php if(!empty($view_data['settings']) && array_key_exists($key, $view_data['settings'])): ?>
                                            <div class="panel panel-default">
                                                    <div class="thumbnail" style="background-color: <?php echo $pretty_colors[$i]; ?>">
                                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: auto;" src="<?php echo $widget->screenshot; ?>">
                                                    </div>
                                                <div class="panel-body">
                                                    <div class="cunjo_widget-description">
                                                        <h4><?php echo $widget->title; ?> <small class="muted">- v.<?php echo $widget->version; ?></small></h4>
                                                        <?php echo $widget->description; ?>
                                                    </div>
                                                </div>
                                                <span class="widget-status-label" layout="<?php echo $key; ?>">
                                                    <?php echo($view_data['settings'][$key]['visibility_settings']['is_active'] == 1)? '<span class="badge badge-success">&nbsp;</span> Active Widget' : '<span class="badge">&nbsp;</span> Installed Widget'; ?>
                                                </span>
                                                <div class="panel-footer" layout="<?php echo $key; ?>">
                                                	<div class="dropup" style="display:inline-block;">
                                                        <button class="btn btn-default widget-settings" id="<?php echo $key; ?>_list" data-toggle="dropdown" href="#" plus-toggle="tooltip" title="Widget Settings"><i class="appz-lab" style="color: #00BCEB;"></i></button>
                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="<?php echo $key; ?>_list">
                                                            <?php 
                                                                foreach($view_data['settings'][$key] as $skey => $settings): 
                                                            ?>
                                                                <li><a data-toggle="modal" href="#<?php echo $key.'_'.$skey; ?>"><?php echo $settings['settings_category']; ?></a></li>
                                                            <?php 
                                                                endforeach; 
                                                            ?>
                                                        </ul>
                                                        <button class="btn btn-default widget-preview" id="<?php echo $key; ?>_list" data-toggle="modal" href="#preview_<?php echo $key; ?>" plus-toggle="tooltip" title="Widget Preview"><i class="appz-eye"></i></button>
                                                    </div>
                                                    <?php echo($view_data['settings'][$key]['visibility_settings']['is_active'] == 1)? '<button class="btn btn-info btn-small deactivate-widget pull-right" layout="'.$key.'" data-loading-text="loading..." data-activate-text="Activate">Deactivate</button>' : '<button class="btn btn-primary btn-small activate-widget pull-right" layout="'.$key.'" data-loading-text="loading..." data-deactivate-text="Deactivate">Activate</button>'; ?>
                                                	<div style="clear:both"></div>
                                                    <div class="shortcode-holder">
                                                        <span>Shortcode:</span> <input type="text" value='[cunjo layout="<?php echo $key; ?>"]' readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="panel panel-default">
                                                    <div class="thumbnail" style="background-color: <?php echo $pretty_colors[$i]; ?>">
                                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: auto;" src="<?php echo $widget->screenshot; ?>">
                                                    </div>
                                                <div class="panel-body">
                                                    <div class="cunjo_widget-description">
                                                        <h4><?php echo $widget->title; ?> <?php echo($widget->price > 0)? '<span class="label label-warning" style="vertical-align: middle;">&#36;'.$widget->price.'</span>' : ''; ?> <small class="muted">- v.<?php echo $widget->version; ?></small></h4>
                                                        <?php echo $widget->description; ?>
                                                    </div>
                                                </div>
                                                <span class="widget-status-label">
                                                    <?php echo($widget->price == 0)? '<span class="badge badge-inverse">&nbsp;</span> Free Widget' : '<span class="badge badge-warning">&nbsp;</span> Premium Widget'; ?>
                                                </span>
                                                <div class="panel-footer" layout="<?php echo $key; ?>">
                                                	<div class="dropup" style="display:inline-block;">
                                                        <button class="btn btn-default widget-settings" id="<?php echo $key; ?>_list" href="javascript:void(0)" plus-toggle="tooltip" title="Install to view settings"><i class="appz-lock-2"></i></button>
                                                        <button class="btn btn-default widget-preview" id="<?php echo $key; ?>_list" href="javascript:void(0)" plus-toggle="tooltip" title="Install to preview"><i class="appz-lock-2"></i></button>
                                                    </div>
                                                    <?php echo($widget->price == 0)? '<a href="'.$widget->link.'" class="btn btn-default btn-small pull-right" layout="'.$key.'" target="_blank">Download</a>' : '<a href="'.$widget->link.'" class="btn btn-warning btn-small pull-right" layout="'.$key.'" target="_blank">Purchase</a>'; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        </div>
                            <?php
                                    endif;
                                $i++; endforeach;
                            ?>
                            </div>
                        </div><!--/Modals-tab-->
                        <div class="tab-pane" id="others">
                        	<?php 
									shuffle($pretty_colors);
                                    $i = 0; foreach($view_data['layouts'] as $key => $widget):
									if($widget->category == 'Extras'):
							?>
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                        <?php if(!empty($view_data['settings']) && array_key_exists($key, $view_data['settings'])): ?>
                                            <div class="panel panel-default">
                                                    <div class="thumbnail" style="background-color: <?php echo $pretty_colors[$i]; ?>">
                                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: auto;" src="<?php echo $widget->screenshot; ?>">
                                                    </div>
                                                <div class="panel-body">
                                                    <div class="cunjo_widget-description">
                                                        <h4><?php echo $widget->title; ?> <small class="muted">- v.<?php echo $widget->version; ?></small></h4>
                                                        <?php echo $widget->description; ?>
                                                    </div>
                                                </div>
                                                <span class="widget-status-label" layout="<?php echo $key; ?>">
                                                    <?php echo($view_data['settings'][$key]['visibility_settings']['is_active'] == 1)? '<span class="badge badge-success">&nbsp;</span> Active Widget' : '<span class="badge">&nbsp;</span> Installed Widget'; ?>
                                                </span>
                                                <div class="panel-footer" layout="<?php echo $key; ?>">
                                                	<div class="dropup" style="display:inline-block;">
                                                        <button class="btn btn-default widget-settings" id="<?php echo $key; ?>_list" data-toggle="dropdown" href="#" plus-toggle="tooltip" title="Widget Settings"><i class="appz-lab" style="color: #00BCEB;"></i></button>
                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="<?php echo $key; ?>_list">
                                                            <?php 
                                                                foreach($view_data['settings'][$key] as $skey => $settings): 
                                                            ?>
                                                                <li><a data-toggle="modal" href="#<?php echo $key.'_'.$skey; ?>"><?php echo $settings['settings_category']; ?></a></li>
                                                            <?php 
                                                                endforeach; 
                                                            ?>
                                                        </ul>
                                                        <button class="btn btn-default widget-preview" id="<?php echo $key; ?>_list" data-toggle="modal" href="#preview_<?php echo $key; ?>" plus-toggle="tooltip" title="Widget Preview"><i class="appz-eye"></i></button>
                                                    </div>
                                                    <?php echo($view_data['settings'][$key]['visibility_settings']['is_active'] == 1)? '<button class="btn btn-info btn-small deactivate-widget pull-right" layout="'.$key.'" data-loading-text="loading..." data-activate-text="Activate">Deactivate</button>' : '<button class="btn btn-primary btn-small activate-widget pull-right" layout="'.$key.'" data-loading-text="loading..." data-deactivate-text="Deactivate">Activate</button>'; ?>
                                                	<div style="clear:both"></div>
                                                    <div class="shortcode-holder">
                                                        <span>Shortcode:</span> <input type="text" value='[cunjo layout="<?php echo $key; ?>"]' readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="panel panel-default">
                                                    <div class="thumbnail" style="background-color: <?php echo $pretty_colors[$i]; ?>">
                                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: auto;" src="<?php echo $widget->screenshot; ?>">
                                                    </div>
                                                <div class="panel-body">
                                                    <div class="cunjo_widget-description">
                                                        <h4><?php echo $widget->title; ?> <?php echo($widget->price > 0)? '<span class="label label-warning" style="vertical-align: middle;">&#36;'.$widget->price.'</span>' : ''; ?> <small class="muted">- v.<?php echo $widget->version; ?></small></h4>
                                                        <?php echo $widget->description; ?>
                                                    </div>
                                                </div>
                                                <span class="widget-status-label">
                                                    <?php echo($widget->price == 0)? '<span class="badge badge-inverse">&nbsp;</span> Free Widget' : '<span class="badge badge-warning">&nbsp;</span> Premium Widget'; ?>
                                                </span>
                                                <div class="panel-footer" layout="<?php echo $key; ?>">
                                                	<div class="dropup" style="display:inline-block;">
                                                        <button class="btn btn-default widget-settings" id="<?php echo $key; ?>_list" href="javascript:void(0)" plus-toggle="tooltip" title="Install to view settings"><i class="appz-lock-2"></i></button>
                                                        <button class="btn btn-default widget-preview" id="<?php echo $key; ?>_list" href="javascript:void(0)" plus-toggle="tooltip" title="Install to preview"><i class="appz-lock-2"></i></button>
                                                    </div>
                                                    <?php echo($widget->price == 0)? '<a href="'.$widget->link.'" class="btn btn-default btn-small pull-right" layout="'.$key.'" target="_blank">Download</a>' : '<a href="'.$widget->link.'" class="btn btn-warning btn-small pull-right" layout="'.$key.'" target="_blank">Purchase</a>'; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        </div>
                            <?php
                                    endif;
                                $i++; endforeach;
                            ?>
                        </div><!--/Others-tab-->
                    </div>
                    <?php else: ?>
                    	<div class="alert alert-danger"><i class="appz-curiosity-logo" style="font-size: 30px;vertical-align: middle"></i> Cunjo servers are experiencing some issues at the moment. Please give us a few minutes! Thank you.</div>
                    <? endif; ?>
                </div>
            </div><!--/panel-body-->
            <div class="panel-footer">
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
    <div class="col-md-1"></div>
</div>
<div style="text-align:center;"><a href="http://share.cunjo.com/platform/contribute/?donation" target="_blank">Like this plugin? Consider helping with a donation.</a></div>
<input type="hidden" id="cunjo_id" value="<?php echo(isset($view_data['wp_options']['cunjoshare_shareid']))? $view_data['wp_options']['cunjoshare_shareid'] : ''; ?>" />
<?php
	//echo "<pre>" . print_r($view_data, TRUE) . "</pre>";
    do_action('cunjo_widgets_settings', $view_data);
?>