<?php
function sw_content_filter ($content) {
  $facebook = get_option('sw_facebook');
  $twitter = get_option('sw_twitter');
  $google = get_option('sw_google');
  $cssstyleall = get_option('sw_cssstyleall');
  $cssstylewidget = get_option('sw_cssstylewidget');
    if ($facebook == '') {
      $facebook = 1;
      $twitter = 2;
      $google = 3;
    }

  if ($facebook != 0) {
    $widgets[$facebook] =
      sprintf (
        '<div style="display:inline;' . $cssstylewidget . '"><iframe src="http://www.facebook.com/plugins/like.php?href=%s&amp;send=false&amp;layout=button_count&amp;width=120&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:120px; height:21px;" allowTransparency="true"></iframe></div>',
        rawurlencode(get_permalink())
      );
  }

  if ($twitter != 0) {
    $widgets[$twitter] =
      sprintf (
        '<div style="display:inline;' . $cssstylewidget . '"><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal">%s</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>',
        __("Tweet", SW_DEF_STRING)
      );
  }

  if ($google != 0)
    $widgets[$google] = '<div style="display:inline;' . $cssstylewidget . '"><g:plusone size="medium"></g:plusone><script type="text/javascript">(function() { var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true; po.src = \'https://apis.google.com/js/plusone.js\'; var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s); })();</script></div>';

  ksort($widgets);

  $content .= '<div style="' . $cssstyleall . '">';
  foreach ($widgets as $widget) {
    $content .= $widget;
  }
  $content .= '</div>';
  
	return $content;
}
add_filter('the_content', 'sw_content_filter');


/**
 * Get the output for using the social widgets in your code at an additional position.
 * 
 * @return string
 */
function get_the_sw () {
	return sw_content_filter('');
}
?>
