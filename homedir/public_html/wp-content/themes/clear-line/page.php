<?php
$options = & ClearLineOptions::getOptions();
function vtm_content()
{ ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post">
		<?php if (!is_home() && ! is_front_page()):?>
			<?php edit_post_link(__('Edit This'), '<div class="editpost smaller alignright">', '</div>'); ?> 
			<div class="clear"></div>
		<?php endif;?>
		<div class="storycontent">
			<?php the_content(__('(more...)')); ?>
		</div>
		<div class="postpages">
			<?php 
			if (function_exists('multipagebar'))
			{
				multipagebar();
			} else 
				wp_link_pages('pagelink=<span>%</span>'); ?>
		</div>

	</div>
	<?php endwhile; endif; ?>
	<?php comments_template();?>
<?php	
}
get_template_part( 'layouts/'. ClearLineOptions::getLayoutCSS() );
//var_dump(ClearLineOptions::getLayoutCSS());
//include (TEMPLATEPATH . '/layouts/'. ClearLineOptions::getLayoutCSS().'.php');