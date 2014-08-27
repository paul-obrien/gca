<?
ini_set('default_charset', 'utf-8');
// debugging
error_reporting(E_ALL);

include_once("layouts/whitelist.php");
DEFINE('ENV', '!Share_test');
define('SECONDS_TO_CACHE', 2419200);

$ts = gmdate("D, d M Y H:i:s", time() + SECONDS_TO_CACHE) . " GMT";
header("Access-Control-Allow-Origin: *");
header("Expires: $ts");
header("Pragma: cache");
header("Cache-Control: max-age=2419200,must-revalidate");
header('Content-Type: text/html; charset=UTF-8');

require_once ('Smarty-3.1.13/libs/Smarty.class.php');

class sharebar
{
    private $smarty;
    private $user;
    private $stats;
    private $url_handler;
    private $base_url;

    protected $title;
    protected $description;
    protected $post_vars;
    protected $api_key;

    public function __construct()
    {
        $this->post_vars = $_REQUEST;
        if(!$this->post_vars) {
            throw new Exception("No data");
        }
		if(isset($this->post_vars['post_url']) && $this->post_vars['layout'] == 'inline_buttons'){ 
            $this->post_vars['url'] = $this->post_vars['post_url'];
        }
		if(isset($this->post_vars['post_url']) && $this->post_vars['layout'] == 'tiny_buttons'){ 
            $this->post_vars['url'] = $this->post_vars['post_url'];
        }
		if(isset($this->post_vars['post_url']) && $this->post_vars['layout'] == 'counter_buttons'){ 
            $this->post_vars['url'] = $this->post_vars['post_url'];
        }
        // assign base URL to any template that we may load
        $protocol = "http";
        $this->smarty = new Smarty;
        $this->api_key = $this->post_vars['shareid'];
        $this->base_url = $protocol . "://" . $_SERVER['HTTP_HOST'];
		$this->original_url = $this->post_vars['url'];
                
        // INSTANTIATE SMARTY!
        $this->smarty->debugging = FALSE;
		if(isset($this->post_vars['cache']) && $this->post_vars['cache'] == 'yes') {
			$this->smarty->caching = TRUE;
			$this->smarty->force_compile = TRUE;
		}
		else {
			$this->smarty->caching = FALSE;
			$this->smarty->force_compile = FALSE;
		}
        $this->smarty->cache_lifetime = 120;
		$this->smarty->compile_check = TRUE;
        $this->smarty->setConfigDir('Smarty-3.1.13/demo/configs/');
    }


    public function get_layout($layout, $data)
    {
        global $whitelist;
        
        if(!in_array($layout, $whitelist))
            return FALSE;
        
		$filename = 'layouts/' . $this->post_vars["layout"] . '/include.php';
		if (file_exists($filename)){
			include($filename);
		}

        if(isset($this->post_vars['has_analytics']) && $this->post_vars['has_analytics'] == 'no') {
            $data['nocredits'] = TRUE;
		}
        else if(!isset($this->post_vars['has_analytics'])) {
            $data['nocredits'] = TRUE;
		}
        else {
			$live = $this->post_vars["checkU"];
			if($live == 'Free')
				$data['nocredits'] = TRUE;
			elseif($live == 'Premium')
				$data['nocredits'] = FALSE;
			else
				$data['nocredits'] = TRUE;
		}

        $this->smarty->assign($this->post_vars);
        $this->smarty->assign($data);
        $this->smarty->assign('folder', ENV);
        $this->smarty->assign('protocol', parse_url($this->post_vars['url'], PHP_URL_SCHEME) . "://");
		$this->smarty->assign('host_url', $this->post_vars['url']);
		$this->smarty->assign('website', $this->post_vars['website']);
		$this->smarty->assign('original_url', $this->original_url);
		$this->smarty->assign('title', $this->title);
		$this->smarty->assign('description', $this->description);
		$this->smarty->assign('is_short', false);
        $html = $this->smarty->fetch('layouts/' . $layout . '/html.tpl');

        return $html; // we normally fetch but for debugging console we display instead! NB: we now fetch       
    }


    public function get_social_channels($social_channels_list)
    {
        if(empty($social_channels_list))
            return array();
        
        $this->smarty->configLoad('locale.conf', 
        $sections = $this->post_vars["lang"]);
		
        if(isset($this->post_vars['tooltip']) && $this->post_vars['tooltip'] == 'yes')
			$tooltip_class = 'cunjo_tooltip';
		else
			$tooltip_class = '';
			
		if(isset($this->post_vars['counter']) && $this->post_vars['counter'] == 'yes')
			$counter_class = 'cunjo_counter';
		else
			$counter_class = '';
			
		//strip html from vars
		$this->title = preg_replace("/&#?[a-z0-9]{2,8};/i","",strip_tags($this->title));
		$this->description = preg_replace("/&#?[a-z0-9]{2,8};/i","",strip_tags($this->description));
        
        foreach (explode(",", $social_channels_list) as $social) {
            switch ($social) {
                case "Facebook":
					$social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_facebook') . '"><a social-channel="' . $social . '" href="http://www.facebook.com/sharer.php?u=' .urlencode($this->post_vars['url']) . '&t=cunjoTitle" target="_blank" class="sprite ' . strtolower($social) . '">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';
					//$social_channels[] = '<li class="cunjo_socials '.$tooltip_class.'" title="' . $this->smarty->getConfigVariable('share_on_facebook') . '"><a social-channel="' . $social . '" href="http://www.facebook.com/sharer.php?s=100&amp;p[caption]=' . urlencode($this->original_url) . '&amp;p[url]=' .urlencode($this->post_vars['url']) . '&amp;p[title]=cunjoTitle&amp;p[images][0]=' . urlencode(isset($this->post_vars['oneimage']) ? $this->post_vars['oneimage'] : "") . '&amp;p[summary]=' .urlencode($this->description) . '" target="_blank" class="sprite ' . strtolower($social) . '">' . ((isset($counters['facebook'])) ? $counters['facebook'] : "") . '</a></li>';
					break;


                case "Twitter":
                    $social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_twitter') . '"><a social-channel="' . $social . '" href="http://twitter.com/home?status=' .urlencode("cunjoTitle - " . $this->post_vars['url']) .'" target="_blank" class="sprite ' . strtolower($social) . '">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';
                    break;

                case "Linkedin":
                    $social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_linkedin') . '"><a social-channel="' . $social . '" href="http://www.linkedin.com/shareArticle?mini=true&ro=false&url=' .urlencode($this->post_vars['url']) . "&title=cunjoTitle&summary=" . $this->description . '" target="_blank" class="sprite ' .strtolower($social) . '">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';
                    break;

                case "Pinterest":
                    $social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_pinterest') . '"><a social-channel="' . $social . '" href="http://pinterest.com/pin/create/button/?url=' .urlencode($this->post_vars['url']) . '&media=' . urlencode(isset($this->post_vars['pinimage']) ? $this->post_vars['pinimage'] : $this->post_vars['oneimage']) . '&description=' .urlencode($this->description) . '" target="_blank" class="sprite ' . strtolower($social) .'">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';
                    break;


                case "Google":
                    $social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_google') . '"><a social-channel="' . $social . '" href="https://plus.google.com/share?url=' .urlencode($this->post_vars['url']) . '" target="_blank" class="sprite ' .strtolower($social) . '">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';
                    break;

                case "Digg":
                    $social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_digg') . '"><a social-channel="' . $social . '" href="http://digg.com/submit?phase=2&partner=[partner]&url=' .urlencode($this->post_vars['url']) . '&title=cunjoTitle" target="_blank" class="sprite ' . strtolower($social) . '">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';
                    break;


                case "Myspace":
                    $social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_myspace') . '"><a social-channel="' . $social . '" href="http://www.myspace.com/Modules/PostTo/Pages/?c=%20&u=' .urlencode($this->post_vars['url']) . '&t=cunjoTitle" target="_blank" class="sprite ' . strtolower($social) . '">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';
                    break;


                case "Stumbleupon":
                    $social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_stumbleupon') . '"><a social-channel="' . $social . '" href="http://www.stumbleupon.com/submit?url=' .urlencode($this->post_vars['url']) . '&title=cunjoTitle" target="_blank" class="sprite ' . strtolower($social) . '">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';
                    break;


                case "Bebo":
                    $social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_bebo') . '"><a social-channel="' . $social . '"  href="http://bebo.com/c/share?Url=' . urlencode($this->post_vars['url']) . '&Title=cunjoTitle" target="_blank" class="sprite ' . strtolower($social) . '">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';
                    break;


                case "Blogger":
                    $social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_blogger') . '"><a social-channel="' . $social . '"  href="http://www.blogger.com/blog_this.pyra?t=&u=' .urlencode($this->post_vars['url']) . '" target="_blank" class="sprite ' .strtolower($social) . '">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';
                    break;


                case "Delicious":
                    $social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_delicious') . '"><a social-channel="' . $social . '"  href="http://del.icio.us/post?v=4&partner=[partner]&noui&url=' .urlencode($this->post_vars['url']) . '&title=cunjoTitle" target="_blank" class="sprite ' . strtolower($social) . '">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';
					break;


                case "Xing":
                    $social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_xing') . '"><a social-channel="' . $social . '"  href="https://www.xing.com/social_plugins/share?url=' .urlencode($this->post_vars['url']) . "&wtmc=cunjoTitle;&sc_p=xing-share" . '" target="_blank" class="sprite ' . strtolower($social) .'">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';
					break;

                case "Tumblr":
                      $social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_tumblr') . '"><a social-channel="' . $social . '"  href="http://www.tumblr.com/share?v=3&u=' .urlencode($this->post_vars['url']) . '&t=cunjoTitle" target="_blank" class="sprite ' . strtolower($social) . '">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';
                      break;

                case "Technorati":
                     $social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_technorati') . '"><a social-channel="' . $social . '"  href="http://technorati.com/faves?add=' .urlencode($this->post_vars['url']) . '&t=cunjoTitle" target="_blank" class="sprite ' . strtolower($social) . '">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';                  
                    break;

                case "Reddit":
                    $social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_reddit') . '"><a social-channel="' . $social . '"  href="http://reddit.com/submit?url=' .urlencode($this->post_vars['url']) . '&title=cunjoTitle" target="_blank" class="sprite ' . strtolower($social) . '">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';         
                    break;

                case "Netlog":
                     $social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_netlog') . '"><a social-channel="' . $social . '"  href=" http://www.netlog.com/go/manage/blog/view=add&origin=external&title=cunjoTitle&message=[message]&tags=' . urlencode($this->description) . '&referer=' .  urlencode($this->post_vars['url']).'" target="_blank" class="sprite ' . strtolower($social) . '">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';         
                    break;

                case "Identi":
                     $social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_identi') . '"><a social-channel="' . $social . '"  href="http://identi.ca/index.php? action=newnotice&status_textarea=' .urlencode($this->post_vars['url']) . ' - cunjoTitle" target="_blank" class="sprite ' . strtolower($social) . '">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';             
                    break;

                case "Friendfeed":
                     $social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_friendfeed') . '"><a social-channel="' . $social . '"  href="http://www.friendfeed.com/share?url=' .urlencode($this->post_vars['url']) . '&title=cunjoTitle" target="_blank" class="sprite ' . strtolower($social) . '">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';         
                    break;
                    
                case "Evernote":
                     $social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_evernote') . '"><a social-channel="' . $social . '"  href="http://www.evernote.com/clip.action?url=' .urlencode($this->post_vars['url']) . '&title=cunjoTitle" target="_blank" class="sprite ' . strtolower($social) . '">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';         
                    break;
                    
                case "Diigo":
                    $social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_diigo') . '"><a social-channel="' . $social . '"  href="http://www.diigo.com/post?url=' .urlencode($this->post_vars['url']) . '&title=cunjoTitle" target="_blank" class="sprite ' . strtolower($social) . '">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';         
                    break;
					
				case "VK":
                    $social_channels[] = '<li class="cunjo_socials '.$tooltip_class.' ' . $counter_class . ' li-' . strtolower($social) . '" title="' . $this->smarty->getConfigVariable('share_on_vk') . '"><a social-channel="' . $social . '"  href="http://vkontakte.ru/share.php?url=' .urlencode($this->post_vars['url']) . '&title=cunjoTitle&description=' .urlencode($this->description) . '" target="_blank" class="sprite ' . strtolower($social) . '">' . ((isset($this->post_vars['counter']) && $this->post_vars['counter'] == "yes") ? '<span class="sh-counter"><span class="iconz-busy"></span></span>' : '') . '</a></li>';         
                    break;
				
				case "Email":
                    $social_channels[] = '<li class="cunjo_socials" title="' . $this->smarty->getConfigVariable('share_on_email') . '"><a social-channel="' . $social . '"  rel="leanModal" href="javascript:void(0)" class="email cunjo_email"><span class="iconz-envelop"></span></a></li>';         
                    break;

                default:
                    break;

            }

        }


        return $social_channels;
    }
	
	
    public function generate_bar()
    {
        $data['social_channels'] = array();
        
           
        if(isset($this->post_vars['socials']) && !empty($this->post_vars['socials']))
            $data['social_channels'] = $this->get_social_channels($this->post_vars['socials']);
        echo $this->get_layout($this->post_vars['layout'], $data);
    }
    
}


$sharebar = new sharebar();
echo $sharebar->generate_bar();
