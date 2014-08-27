<?php
define('SECONDS_TO_CACHE', 2419200);

$ts = gmdate("D, d M Y H:i:s", time() + SECONDS_TO_CACHE) . " GMT";
header("Access-Control-Allow-Origin: *");
header("Expires: $ts");
header("Pragma: cache");
header("Cache-Control: max-age=" . SECONDS_TO_CACHE);
header('Content-Type: text/html; charset=UTF-8');

	require_once ('class.socialstats.php');
	
    function format_num($num, $precision = 0)
    {
        if ($num >= 1000 && $num < 1000000)
        {
            $n_format = number_format($num / 1000, $precision) . 'K';
        }
        else
            if ($num >= 1000000 && $num < 1000000000)
            {
                $n_format = number_format($num / 1000000, $precision) . 'M';
            }
            else
                if ($num >= 1000000000)
                {
                    $n_format = number_format($num / 1000000000, $precision) . 'B';
                }
                else
                {
                    $n_format = $num;
                }
                return $n_format;
    }

	$SocialStats = new SocialStats($_POST['url']);
	if(isset($_POST['short_url'])) {
		$SocialStats2 = new SocialStats($_POST['short_url']);
		
		$counters['facebook'] = format_num($SocialStats->get_facebook()) ;

		$counters['twitter'] = format_num($SocialStats->get_twitter() + $SocialStats2->get_twitter());
	
		$counters['linkedin'] = format_num($SocialStats->get_linkedin() + $SocialStats2->get_linkedin());
	
		$counters['pinterest'] = format_num($SocialStats->get_pinterest() + $SocialStats2->get_pinterest());
	
		$counters['google'] = format_num($SocialStats->get_google_plus() + $SocialStats2->get_google_plus());
	
		$counters['digg'] = format_num($SocialStats->get_digg() + $SocialStats2->get_digg());
	
		$counters['myspace'] = format_num($SocialStats->get_myspace() + $SocialStats2->get_myspace());
	
		$counters['stumbleupon'] = format_num($SocialStats->get_stumbleupon() + $SocialStats2->get_stumbleupon());
	
		$counters['bebo'] = format_num($SocialStats->get_bebo() + $SocialStats2->get_bebo());
	
		$counters['blogger'] = format_num($SocialStats->get_blogger() + $SocialStats2->get_blogger());
	
		$counters['delicious'] = format_num($SocialStats->get_delicious() + $SocialStats2->get_delicious());
	
		$counters['xing'] = format_num($SocialStats->get_xing() + $SocialStats2->get_xing());
	
		$counters['tumblr'] = format_num($SocialStats->get_tumblr() + $SocialStats2->get_tumblr());
	
		$counters['technorati'] = format_num($SocialStats->get_technorati() + $SocialStats2->get_technorati());
	
		$counters['reddit'] = format_num($SocialStats->get_reddit() + $SocialStats2->get_reddit());
	
		$counters['netlog'] = format_num($SocialStats->get_netlog() + $SocialStats2->get_netlog());
	
		$counters['identi'] = format_num($SocialStats->get_identi() + $SocialStats2->get_identi());
	
		$counters['friendfeed'] = format_num($SocialStats->get_friendfeed() + $SocialStats2->get_friendfeed());
	
		$counters['evernote'] = format_num($SocialStats->get_evernote() + $SocialStats2->get_evernote());
	
		$counters['diigo'] = format_num($SocialStats->get_diigo() + $SocialStats2->get_diigo());
			
		$counters['vk'] = format_num($SocialStats-> get_vk() + $SocialStats2->get_vk());
	}
	else {
		$counters['facebook'] = format_num($SocialStats->get_facebook());
	
		$counters['twitter'] = format_num($SocialStats->get_twitter());
	
		$counters['linkedin'] = format_num($SocialStats->get_linkedin());
	
		$counters['pinterest'] = format_num($SocialStats->get_pinterest());
	
		$counters['google'] = format_num($SocialStats->get_google_plus());
	
		$counters['digg'] = format_num($SocialStats->get_digg());
	
		$counters['myspace'] = format_num($SocialStats->get_myspace());
	
		$counters['stumbleupon'] = format_num($SocialStats->get_stumbleupon());
	
		$counters['bebo'] = format_num($SocialStats->get_bebo());
	
		$counters['blogger'] = format_num($SocialStats->get_blogger());
	
		$counters['delicious'] = format_num($SocialStats->get_delicious());
	
		$counters['xing'] = format_num($SocialStats->get_xing());
	
		$counters['tumblr'] = format_num($SocialStats->get_tumblr());
	
		$counters['technorati'] = format_num($SocialStats->get_technorati());
	
		$counters['reddit'] = format_num($SocialStats->get_reddit());
	
		$counters['netlog'] = format_num($SocialStats->get_netlog());
	
		$counters['identi'] = format_num($SocialStats->get_identi());
	
		$counters['friendfeed'] = format_num($SocialStats->get_friendfeed());
	
		$counters['evernote'] = format_num($SocialStats->get_evernote());
	
		$counters['diigo'] = format_num($SocialStats->get_diigo());
			
		$counters['vk'] = format_num($SocialStats-> get_vk());
	
	}
	
	echo json_encode($counters);
?>