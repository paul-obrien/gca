<?php
/************************************************************************
 * PHP Class SocialStats v1.0
 ************************************************************************
 * SocialStats is a PHP Class that lets to get various social stats 
 * data from various social networking sites for specified url.
 ************************************************************************
 * @package     class.socialstats.1.1
 * @link        http://websterfolks.com/forums/socialstats-php-class.148/
 * @updated     18/02/2013
 * @author      Mandeep Singh <hello@mesingh.com>
 * @copyright   Copyright (c) 2013 WebsterFolks, All rights reserved
 * @license     http://codecanyon.net/licenses
 ***********************************************************************/
class SocialStats
{

    /**
     * Object URL
     *
     * @access        public
     * @var           string
     */
    public $url;

    /**
     * Constructor
     *
     * Initialize the url provided by user.
     *
     * @access        public
     * @param         string        $url        String, containing the initialized
     *                                          object URL.
     */
    public function __construct($url)
    {
        $url = str_replace(' ', '+', $url);
		$this->url=rawurlencode($url);
		$this->timeout=10;
    }

    /**
     * Validates the initialized object URL syntax.
     *
     * @access        public
     * @param         string        $url        String, containing the initialized object URL.
     * @return        string                    Returns string, containing the validation result.
     */
    public function valid_url()
    {
    	if(!isset($this->url) || $this->url == '')
        {
            $e = 'Invalid Object > Requires an URL.';
        }
        else
        {
	        $pattern  = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
	        if(!preg_match($pattern, $this->url))
	        {
	            $e = 'Invalid URL > Invalid URL syntax.';
	        }
	        else
	        {
		        $allowed_schemes = array('http','https');
		        $host     = parse_url($this->url, PHP_URL_HOST);
		        $scheme = parse_url($this->url, PHP_URL_SCHEME);
	            if(!in_array(strtolower($scheme),$allowed_schemes))
	            {
	                $e = 'Invalid URL > SocialStats supports soley RFC compliant URL\'s with HTTP(/S) protocol.';
	            }
	            elseif(empty($host) || $host == '')
	            {
	                $e = 'Invalid URL > Hostname undefined (or invalid URL syntax).';
	            }
	            else
	            {
					$e = 'valid';
	            }
		    }
		}
        return $e;
    }


    /**
     * Get the data from social api`s using cURL
     *
     * @access        private
     * @param         string        $api_url        String, containing the api URL.
     * @return        string                        Returns string, containing the content fetched from api.
     */
    private function use_curl($api_url)
    {   
        $ch  = curl_init($api_url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,5);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($ch,CURLOPT_MAXREDIRS,2);
        if(strtolower(parse_url($api_url, PHP_URL_SCHEME)) == 'https')
        {
            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,1);
            curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,1);
        }
        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }


    /**
     * Get the data from social api`s.
     *
     * @access        private
     * @param         string        $api_url        String, containing the api URL.
     * @param         string        $type        	String, containing the name of social service.
     * @return        string                    	Returns string, containing the content fetched from api.
     */
    private function get_content($api_url, $type = false)
    {
        if(in_array('curl', get_loaded_extensions()))
        {
            $content = self::use_curl($api_url);
        }
        else
        {
            $content = file_get_contents($api_url);
        }
    	if ($type) 
        {
    		if ($type == 'pinterest') 
            {
    			$content = preg_replace('/^receiveCount\((.*)\)$/', "\\1", $content);
    		}
    		if ($type == 'facebook') 
            {
    			return simplexml_load_string($content);
    		}
    	}

    	return json_decode($content, true);
    }
	
	private function file_get_contents_curl($url){
		$ch=curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		curl_setopt($ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
		$cont = curl_exec($ch);
		if(curl_error($ch))
		{
		die(curl_error($ch));
		}
		return $cont;
	}


    /**
     * Get the pins count from Pinterest api.
     *
     * @access        public
     * @return        integer                    	Returns integer, total pins count.
     */
    public function get_pinterest()
    {
    	$return_data = $this->file_get_contents_curl('http://api.pinterest.com/v1/urls/count.json?url='.$this->url);
		$json_string = preg_replace('/^receiveCount\((.*)\)$/', "\\1", $return_data);
		$json = json_decode($json_string, true);
		return isset($json['count'])?intval($json['count']):0;
    }

 
    /**
     * Get the delicious posts count.
     *
     * @access        public
     * @return        integer                    	Returns integer, total posts count.
     */
    public function get_delicious()
    {
       $json_string = $this->file_get_contents_curl('http://feeds.delicious.com/v2/json/urlinfo/data?url='.$this->url);
		$json = json_decode($json_string, true);
		return isset($json[0]['total_posts'])?intval($json[0]['total_posts']):0;		
    }


    /**
     * Get the total views from StumbleUpon api
     *
     * @access        public
     * @return        integer                    	Returns integer, total views count.
     */
    public function get_stumbleupon()
    {
        $json_string = $this->file_get_contents_curl('http://www.stumbleupon.com/services/1.01/badge.getinfo?url='.$this->url);
		$json = json_decode($json_string, true);
		return isset($json['result']['views'])?intval($json['result']['views']):0;
    }


    /**
     * Get the linkedin shares.
     *
     * @access        public
     * @return        integer                    	Returns integer, total shares count.
     */
    public function get_linkedin()
    {
        $api_url = 'http://www.linkedin.com/countserv/count/share?url=' . $this->url . '&format=json';
		$content = self::get_content($api_url);
		 
		return intval($content['count']);
    }

	
	/**
     * Get the total tweeted links.
     *
     * @access        public
     * @return        integer                    	Returns integer, total links count.
     */
	public function get_twitter() {
	 
	    $json_string = $this->file_get_contents_curl('http://urls.api.twitter.com/1/urls/count.json?url=' . $this->url);
		$json = json_decode($json_string, true);
		return isset($json['count'])?intval($json['count']):0;
	}
	

	/**
     * Gets the data from facebook in xml format and converts it in an array.
     *
     * @access        public
     * @return        array                    	Returns array, all data from facebook.
     */
	public function get_facebook(){
	    $json_string = $this->file_get_contents_curl('http://api.facebook.com/restserver.php?method=links.getStats&format=json&urls='.$this->url);
		$json = json_decode($json_string, true);
		return isset($json[0]['total_count'])?intval($json[0]['total_count']):0;
	}
	
	
    /**
     * Get google plus counts 
     *
     * @access          public
     * @return          integer                     Returns integer, total g+ count.
     */
    public function get_google_plus(){
        $curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "https://clients6.google.com/rpc");
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"'.rawurldecode($this->url).'","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
		$curl_results = curl_exec ($curl);
		curl_close ($curl);
		$json = json_decode($curl_results, true);
		return isset($json[0]['result']['metadata']['globalCounts']['count'])?intval( $json[0]['result']['metadata']['globalCounts']['count'] ):0;
    }

	/**
     * Get the total views from Digg api
     *
     * @access        public
     * @return        integer                    	Returns integer, total views count.
     */
    public function get_digg()
    {
        $json = file_get_contents("http://api.sharedcount.com/?url=" . rawurlencode($this->url));
		$counts = json_decode($json, true);
		return intval($counts["Diggs"]);
		
    }
	
	/**
     * Get the total views from Myspace api
     *
     * @access        public
     * @return        integer                    	Returns integer, total views count.
     */
    public function get_myspace()
    {
        
		return intval(0);
		
    }
	public function get_blogger()
    {
        
		return intval(0);
		
    }
	public function get_bebo()
    {
        
		return intval(0);
		
    }
	public function get_xing()
    {
        
		return intval(0);
		
    }
	public function get_tumblr()
    {
        
		return intval(0);
		
    }
	public function get_technorati()
    {
		
		return intval(0);
		
    }
	public function get_reddit()
    {
        $json = file_get_contents("http://api.sharedcount.com/?url=" . rawurlencode($this->url));
		$counts = json_decode($json, true);
		return intval($counts["Reddit"]);
		
    }
	public function get_netlog()
    {
		return intval(0);
		
    }
	public function get_identi()
    {
		return intval(0);
		
    }
	public function get_friendfeed()
    {
		return intval(0);
		
    }
	public function get_evernote()
    {
		return intval(0);
		
    }
	public function get_diigo()
    {
		return intval(0);
		
    }
	public function get_vk()
    {
		return intval(0);
		
    }

}