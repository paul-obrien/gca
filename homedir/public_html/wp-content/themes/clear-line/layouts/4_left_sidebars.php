<?php get_header();?>
<?php
	$options = & ClearLineOptions::getOptions(); 
	$shortname = & ClearLineOptions::cfg('shortname');
?>
<div id="wrapper">
	<div id="content-wrapper">
		<div id="content" role="main">
			<?php vtm_content(); ?>
		</div>
	</div>
</div>

<div id="sidebar" class="sidebar">
	<div class="column"> 
		<div id="orange-sidebar" class="sidebar">
					<div class = "margines">

						<?php if ($options[$shortname . '_sharing_buttons_on_orange_sidebar_show'] == 'yes'):?>
							<div class="widget">
								<h5><?php _e('Share This',THEME_DOMAIN)?></h5>
								<div class="widget textwidget" style="padding:5px 0px 3px 0;">
									<?php echo_share_this('_sharing_buttons_on_orange_sidebar')?>
									<div class="clear"></div>
								</div>
							</div>
						<?php endif;?>

						<?php if (( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Orange Sidebar') ) 
										&& $options[$shortname . '_sidebars_show_demo_data'] == 'yes') : ?>
						<?php endif;?>
					</div>
		</div>

		<div id="cyan-sidebar" class="sidebar">
			<div class="sidebar-content">	
				<div class = "margines">
					<?php if ( (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Cyan Sidebar') )  
							&& $options[$shortname . '_sidebars_show_demo_data'] == 'yes') : ?>
							<?php the_widget('WP_Widget_Pages', array('count'=>0, 'hierarchical'=>1,'dropdown'=>0), 'before_title=<h5>&after_title=</h5>'); ?> 
							<?php the_widget('WP_Widget_Meta'); ?> 
					<?php endif;?>
				</div>
			</div>
		</div>

		<div id="green-sidebar" class="sidebar">
			<div class="sidebar-content">
				<div class = "margines">
					<?php if ( (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Green Sidebar') )  
							&& $options[$shortname . '_sidebars_show_demo_data'] == 'yes') : ?>
							<?php the_widget('WP_Widget_Categories', array('count'=>0, 'hierarchical'=>1,'dropdown'=>0), 'before_title=<h5>&after_title=</h5>'); ?>
							<?php the_widget('WP_Widget_Archives', array('count'=>0, 'hierarchical'=>1,'dropdown'=>0), ''); ?> 
					<?php endif;?>
				</div>
			</div>
		</div>

		<div id="red-sidebar" class="sidebar">
			<div class="sidebar-content">
				<div class = "margines">
					<?php if ( (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Red Sidebar') )   
							&& $options[$shortname . '_sidebars_show_demo_data'] == 'yes') : ?>
							<?php the_widget('WP_Widget_Recent_Posts', array('number'=>5), array ('before_title'=>'<h5>','after_title'=>'</h5>', 'widget_id'=>null)); ?> 
					<?php endif;?>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>

</div>

<div class="clear"></div>
<?php get_footer();