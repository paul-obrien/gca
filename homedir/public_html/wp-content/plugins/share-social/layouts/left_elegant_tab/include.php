<?php
$salt = 'mistercoconut2020';
	// load captcha using web service
	$url = 'http://api.textcaptcha.com/9fr875befcow0ccsg0k0s0wso635xsim';
	try {
	  $xml = @new SimpleXMLElement($url,null,true);
	} catch (Exception $e) {
	  // if there is a problem, use static fallback..
	  $fallback = '<captcha>'.
		  '<question>Is ice hot or cold?</question>'.
		  '<answer>'.md5('cold').'</answer></captcha>';
	  $xml = new SimpleXMLElement($fallback);
	}
	// display question as part of form
	$question = (string) $xml->question;
	  // ... [snip] ...
	// store answers in session
	$ans = array();
	foreach ($xml->answer as $hash)
	  $ans[] = (string) $hash;
	$_SESSION['captcha'] = $ans;
	
	$this->smarty->assign('secure_question', $question);
	
	//answers
	$answerz = '';
	foreach ($xml->answer as $hash) {
	  $ans = md5($hash.$salt);
	  $answerz .= '<input type="hidden" name="extraz_tb[]" value="'.$ans.'" />';
	}
	$this->smarty->assign('extraz_left_ele_tb', $answerz);

?>