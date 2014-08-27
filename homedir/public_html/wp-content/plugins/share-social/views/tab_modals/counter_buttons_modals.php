<?php

	$social_channels = isset($view_data['settings']['counter_buttons']['social_channels']) ? $view_data['settings']['counter_buttons']['social_channels'] : array();

	$bar_layout_design = isset($view_data['settings']['counter_buttons']['buttons_layout_design']) ? $view_data['settings']['counter_buttons']['buttons_layout_design'] : array();

	$call_to_action = isset($view_data['settings']['counter_buttons']['call_to_action']) ? $view_data['settings']['counter_buttons']['call_to_action'] : array();

	$visibility_settings = isset($view_data['settings']['counter_buttons']['visibility_settings']) ? $view_data['settings']['counter_buttons']['visibility_settings'] : array();

	

	$channels = array(

					'Facebook'=>'Facebook',

					'Twitter'=>'Twitter',

					'Google'=>'Google',

					'Linkedin'=>'Linkedin',

					'Pinterest'=>'Pinterest',

					'Digg'=>'Digg',

					'Myspace'=>'Myspace',

					'Stumbleupon'=>'Stumbleupon',

					'Bebo'=>'Bebo',

					'Blogger'=>'Blogger',

					'Delicious'=>'Delicious',

					'Xing'=>'Xing',

					'Tumblr'=>'Tumblr',

					'Technorati'=>'Technorati',

					'Reddit'=>'Reddit',

					'Netlog'=>'Netlog',

					'Identi'=>'Identi',

					'Friendfeed'=>'Friendfeed',

					'Evernote'=>'Evernote',

					'Diigo'=>'Diigo',

					'VK'=>'VK',

					'Email'=>'Email',

				);

?>

<div id="counter_buttons_social_channels" class="modal widget-settings" tabindex="-1" role="dialog" aria-labelledby="registerShareLabel" aria-hidden="true">

	 <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
        
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        
            <h3><?php echo $social_channels['settings_category']; ?></h3>
        
          </div>
        
          <div class="modal-body">
        
                <div class="drag-links row">
        
                    <div class="col-md-5">
        
                        <h5>Active channels</h5>
        
                        <form class="form-horizontal" id="social-channels-counter_buttons" novalidate="novalidate" title="<?php echo $social_channels['settings_category']; ?>">
        
                            <ul id="socialsuse" class="connected list" style="margin:0;">
        
                                <?php 
        
                                $socials = explode(',', $social_channels['socials']); 
        
                                foreach($socials as $social){
        
                                    echo '<li class="'.$social.'"><div class="share-icns"></div><span>'.$social.'</span><input type="hidden" id="socials" name="options[socials][]" value="'.$social.'" /></li>';
        
                                    unset($channels["{$social}"]);
        
                                }
        
                                ?>
        
                            </ul>
        
                            <div class="form-group" id="socials_target-group" style="margin-top: 20px;">
        
                                <h5>Open channel sharing in</h5>
        
                                <select class="selectpicker form-control" name="options[socials_target]" id="socials_target" data-style="btn-default">
        
                                    <option value="window" <?php echo($social_channels['socials_target'] == 'window')? 'selected': ''; ?>>New window</option>
        
                                    <option value="tab" <?php echo($social_channels['socials_target'] == 'tab')? 'selected': ''; ?>>New tab</option>
        
                                </select>
        
                            </div>
        
                        </form>
        
                    </div>
        
                    <div class="col-md-2">
        
                        <div class="between-connected">Drag to activate <span class="appz-point-left"></span></div>
        
                    </div>
        
                    <div class="col-md-5">
        
                        <h5>Inactive channels</h5>
        
                        <ul class="connected list no2" style="margin:0;">
        
                           <?php 
        
                            foreach($channels as $channel){
        
                                echo '<li class="'.$channel.'"><div class="share-icns"></div><span>'.$channel.'</span><input type="hidden" id="socials" name="options[socials][]" value="'.$channel.'" /></li>';
        
                            }
        
                            ?>
        
                        </ul>
        
                    </div>
        
                </div>
        
                <div style="clear:both;"></div>
        
          </div>
        
          <div class="modal-footer">
        
            <button class="btn btn-icon btn-default circle_remove" data-dismiss="modal" aria-hidden="true"><i class="appz-close-3"></i> Close</button>
        
            <button type="submit" class="btn btn-icon btn-primary circle_ok save-widget-settings" settings="#social-channels-counter_buttons" layout="counter_buttons" data-loading-text="loading..."><i class="appz-checkmark-circle-2"></i> Save</button>
        
          </div>
      </div>
  </div>

</div><!--/Social Channels Settings-->



<div id="counter_buttons_buttons_layout_design" class="modal widget-settings" tabindex="-1" role="dialog" aria-labelledby="registerShareLabel" aria-hidden="true">

	 <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
        
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        
            <h3><?php echo $bar_layout_design['settings_category']; ?></h3>
        
          </div>
        
          <div class="modal-body">
        
            <form class="form-horizontal" id="bar-layout-counter_buttons" novalidate="novalidate" title="<?php echo $bar_layout_design['settings_category']; ?>">
        
            
        
                <div class="row">
        
                
        
                    <div class="col-md-6">        
                        
        
                        <div class="form-group" id="counter-group">
        
                            <h5>Show shared counter?</h5>
        
                            <select class="selectpicker form-control" name="options[counter]" id="toolstyle" data-style="btn-default">
        
                                <option value="no" <?php echo($bar_layout_design['counter'] == 'no')? 'selected': ''; ?>>No</option>
        
                                <option value="yes" <?php echo($bar_layout_design['counter'] == 'yes')? 'selected': ''; ?>>Yes</option>
        
                            </select>
        
                        </div>
                        
        
                        <div class="form-group" id="message-group">
        
                            <h5>Text in front of icons</h5>
        
                            <div class="input-group">
        
                                <span class="input-group-addon"><i class="appz-bubble"></i></span>
        
                                <input type="text" id="message" name="options[message]" value="<?php echo $bar_layout_design['message']; ?>" class="form-control"/>
        
                            </div>
        
                        </div>
        
                        <div class="form-group" id="message_pos-group">
        
                            <h5>Text position</h5>
        
                            <select class="selectpicker form-control" name="options[message_pos]" id="message_pos" data-style="btn-default">
        
                                <option value="cunjo_pos_left" <?php echo($call_to_action['message_pos'] == 'cunjo_pos_left')? 'selected': ''; ?>>Left</option>
        
                                <option value="cunjo_pos_right" <?php echo($call_to_action['message_pos'] == 'cunjo_pos_right')? 'selected': ''; ?>>Right</option>
        
                            </select>
        
                        </div>
                                
                    </div><!--/span6-->
        
                    
        
                    <div class="col-md-6">
        
                        <div class="form-group" id="textcolor-group">
        
                            <h5>Text color</h5>
        
                            <div class="input-group">
        
                                <input type="text" id="textcolor-counter_buttons" name="options[textcolor]" value="<?php echo $bar_layout_design['textcolor']; ?>" class="form-control"/>
        						<span class="input-group-btn">
                                    <button href="javascript:void(0)" class="btn undo-color" target="#textcolor-counter_buttons" original="<?php echo $bar_layout_design['textcolor']; ?>"><i class="appz-undo"></i> Undo</button>
        						</span>
                            </div>
        
                            <br/><br/>
        
                            <div class="palette" target="#textcolor-counter_buttons"></div>
        
                        </div>
        
                    </div><!--/span6-->
        
                    
        
                </div><!--/row-->
        
                
        
            </form>
        
          </div>
        
          <div class="modal-footer">
        
            <button class="btn btn-icon btn-default circle_remove" data-dismiss="modal" aria-hidden="true"><i class="appz-close-3"></i> Close</button>
        
            <button type="submit" class="btn btn-icon btn-primary circle_ok save-widget-settings" settings="#bar-layout-counter_buttons" layout="counter_buttons" data-loading-text="loading..."><i class="appz-checkmark-circle-2"></i> Save</button>
        
          </div>
      </div>
  </div>

</div><!--/Bar layout design Settings-->



<div id="counter_buttons_visibility_settings" class="modal widget-settings" tabindex="-1" role="dialog" aria-labelledby="registerShareLabel" aria-hidden="true">

	 <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
        
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        
            <h3><?php echo $visibility_settings['settings_category']; ?></h3>
        
          </div>
        
          <div class="modal-body">
        
            <form class="form-horizontal" id="visibility-settings-counter_buttons" novalidate="novalidate" title="Visibility settings">
        		<?php if( $view_data['site_list'] != NULL ): ?>
                <div class="row">
                	<div class="col-md-12">
                    	<div class="form-group span11" id="exclude_blogs-group">
                        
                        	<h5>WPMU - Hide widget on specific blogs</h5>
        
                            <select name="options[exclude_blogs][]" id="exclude_blogs" multiple ui_select style="width: 100%;" data-placeholder="Click to select blogs">
								<?php 
										  			
									  foreach ( $view_data['site_list'] as $bid ) {
										  
										    $current_blog_details = get_blog_details( array( 'blog_id' => $bid->blog_id ) );
			
											$option = '<option value="' . $bid->blog_id . '" '.((in_array($bid->blog_id, explode(',', $visibility_settings['exclude_blogs'])))? 'selected' : '').'>';
			
											$option .= $current_blog_details->blogname;
			
											$option .= '</option>';
			
											echo $option;
			
									  }

                                 ?>
        
                            </select>
                            
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
        
                    <div class="col-md-6">
        
                        <div class="form-group span11" id="placement-group">
        
                            <h5>Display share icons:</h5>
        
                            <select style="width: 100%;" id="placement" name="options[placement]" class="select-placement" layout="counter_buttons">
        
                                <option value="both" <?php echo($visibility_settings['placement'] == 'white')? 'selected': ''; ?>>Above & under content</option>
        
                                <option value="above" <?php echo($visibility_settings['placement'] == 'above')? 'selected': ''; ?>>Above content</option>
        
                                <option value="below" <?php echo($visibility_settings['placement'] == 'below')? 'selected': ''; ?>>Under content</option>
        
                            </select>
        
                        </div>
        
                        <div class="form-group span11" id="exclude_pages-group">
        
                            <h5>Hide widget on specific pages</h5>
        
                            <select name="options[exclude_pages][]" id="exclude_pages" multiple ui_select style="width: 100%;" <?php echo(($view_data['site_list'] != NULL)? 'disabled' : 'data-placeholder="Click to select pages"'); ?>>
								<?php 
        						  	  if($view_data['site_list'] == NULL) {
										  
										  $pages = get_pages(); 
				
										  foreach ( $pages as $page ) {
				
												$option = '<option value="' . $page->ID . '" '.((in_array($page->ID, explode(',', $visibility_settings['exclude_pages'])))? 'selected' : '').'>';
				
												$option .= $page->post_title;
				
												$option .= '</option>';
				
												echo $option;
				
										  }
									  }
									  else {
										 echo '<option selected="selected">Temporary disabled for WPMU</option>'; 
									  }

                                 ?>
        
                            </select>
        
                        </div>
                        
                        <div class="form-group span11" id="on_home-group">
        
                            <h5>Show widget on Home page</h5>
        
                            <div class="toggle-button" data-toggleButton-style-enabled="info">
        
                                <input data-toggle="value" target_id="on_home-counter_buttons" target_name="options[on_home]" type="checkbox" value="1" <?php echo($visibility_settings['on_home'] == 0)? '': 'checked="checked"'; ?>/> <br />
                                <small style="font-size: 10px;">will display on posts loop only if your theme is using the_content() instead of the_excerpt()</small>
        
                            </div>
        
                        </div>
        
                        <div class="form-group span11" id="on_posts-group">
        
                            <h5>Show widget on posts</h5>
        
                            <div class="toggle-button" data-toggleButton-style-enabled="info">
        
                                <input data-toggle="value" target_id="on_posts-counter_buttons" target_name="options[on_posts]" type="checkbox" value="1" <?php echo($visibility_settings['on_posts'] == 0)? '': 'checked="checked"'; ?>/>
        
                            </div>
        
                        </div>
        
                    </div><!--/span6-->
        
                    
        
                    <div class="col-md-6">
        
                        <div class="form-group span11" id="exclude_pages-group">
        
                            <h5>Hide widget on specific posts</h5>
        
                            <select name="options[exclude_posts][]" id="exclude_posts" multiple ui_select style="width: 100%;" <?php echo(($view_data['site_list'] != NULL)? 'disabled' : 'data-placeholder="Click to select posts"'); ?>>
        
                                <?php 
								
								if($view_data['site_list'] == NULL) {
        
                                  $posts = get_posts(); 
        
                                  foreach ( $posts as $post ) {
        
                                        $option = '<option value="' . $post->ID . '" '.((in_array($post->ID, explode(',', $visibility_settings['exclude_posts'])))? 'selected' : '').'>';
        
                                        $option .= $post->post_title;
        
                                        $option .= '</option>';
        
                                        echo $option;
        
                                  }
								}
								  else {
									 echo '<option selected="selected">Temporary disabled for WPMU</option>'; 
								  }
        
                                 ?>
        
                            </select>
        
                        </div>
        
                        <div class="form-group span11" id="on_pages-group">
        
                            <h5>Show widget on pages</h5>
        
                            <div class="toggle-button" data-toggleButton-style-enabled="info">
        
                                <input data-toggle="value" target_id="on_pages-counter_buttons" target_name="options[on_pages]" type="checkbox" value="1" <?php echo($visibility_settings['on_pages'] == 0)? '': 'checked="checked"'; ?>/>
        
                            </div>
        
                        </div>
        
                        <div class="form-group span11" id="on_custom-group">
        
                            <h5>Show widget on custom post types</h5>
        
                            <select name="options[on_custom][]" id="on_custom" multiple ui_select style="width: 100%;" <?php echo(($view_data['site_list'] != NULL)? 'disabled' : 'data-placeholder="Click to select post types"'); ?>>
        
                                <?php 
								
								if($view_data['site_list'] == NULL) {
        
                                    $args=array(
        
                                      'public' => true,
        
                                      '_builtin' => false
        
                                    );
        
                                  $post_types=get_post_types($args,'names');
        
                                  foreach ( $post_types as $post_type ) {
        
                                        $option = '<option value="' . $post_type . '" '.((in_array($post_type, explode(',', $visibility_settings['on_custom'])))? 'selected' : '').'>';
        
                                        $option .= $post_type;
        
                                        $option .= '</option>';
        
                                        echo $option;
        
                                  }
								}
								  else {
									 echo '<option selected="selected">Temporary disabled for WPMU</option>'; 
								  }
        
                                 ?>
        
                            </select>
        
                        </div>
        
                    </div><!--/span6-->
        
                    
        
                </div><!--/row-->
        
        
        
            </form>
        
          </div>
        
          <div class="modal-footer">
        
            <button class="btn btn-icon btn-default circle_remove" data-dismiss="modal" aria-hidden="true"><i class="appz-close-3"></i> Close</button>
        
            <button type="submit" class="btn btn-icon btn-primary circle_ok save-widget-settings" settings="#visibility-settings-counter_buttons" layout="counter_buttons" data-loading-text="loading..."><i class="appz-checkmark-circle-2"></i> Save</button>
        
          </div>
      </div>
  </div>

</div><!--/Visibility Settings-->



<!---Preview Widget--->

<div id="preview_counter_buttons" class="modal widget-preview-modal" tabindex="-1" role="dialog" wp_address="<?php echo get_site_url(); ?>/?cunjo=counter_buttons" aria-hidden="true">

	 <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
        
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        
            <h3>Preview</h3>
        
          </div>
        
          <div class="modal-body">
        
            Preview here
        
          </div>
        
          <div class="modal-footer">
        
            <button class="btn btn-icon btn-default circle_remove" data-dismiss="modal" aria-hidden="true"><i class="appz-close-3"></i> Close</button>
        
          </div>
      </div>
  </div>

</div><!--/Preview Widget-->

<?php //echo '<pre>'.print_r($view_data, true).'</pre>'; ?>