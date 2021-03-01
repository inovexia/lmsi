<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function _AT_TEXT ($code='', $type='', $lang='en') {
	
	$data = array ();
	
	$data['en'] = array ('msg'=>array(
			'INVALID_CAPTCHA'=>'Incorrect captcha',
			'INVALID_CREDENTIALS'=>'The login or password provided is incorrect',
			'INVALID_USERNAME'=>'We don\'t recongnise you. Please check your username',
			'INVALID_PASSWORD'=>'You have entered a wrong password',
			'MAX_ATTEMPTS_REACHED'=>'Too many retry attempts. Try again after '.(LOCK_TIME/60).' minutes',
			'LOGIN_ERROR'=>'There was some error. Please retry again',
			'ACCOUNT_DISABLED'=>'Your account is disabled or pending for admin approval. Try again later',
			'LOGIN_SUCCESSFUL'=>'Login successful. Loading your dashboard...',
			'VALIDATION_ERROR'=>validation_errors (),
			),
		);
		
	return $data[$lang][$type][$code];
}

function print_pre($object){
	$object = print_r($object, true);
	print_r("<pre style=\"white-space: pre-wrap;\">$object</pre>");
}
function excerpt($text, $limit) {
	if (str_word_count($text, 0) > $limit) {
		$words = str_word_count($text, 2);
		$pos = array_keys($words);
		$text = substr($text, 0, $pos[$limit]) . '&hellip;';
	}
	return $text;
}

function getYoutubeEmbedUrl($url) {

	// Here is a sample of the URLs this regex matches: (there can be more content after the given URL that will be ignored)

	// http://youtu.be/dQw4w9WgXcQ
	// http://www.youtube.com/embed/dQw4w9WgXcQ
	// http://www.youtube.com/watch?v=dQw4w9WgXcQ
	// http://www.youtube.com/?v=dQw4w9WgXcQ
	// http://www.youtube.com/v/dQw4w9WgXcQ
	// http://www.youtube.com/e/dQw4w9WgXcQ
	// http://www.youtube.com/user/username#p/u/11/dQw4w9WgXcQ
	// http://www.youtube.com/sandalsResorts#p/c/54B8C800269D7C1B/0/dQw4w9WgXcQ
	// http://www.youtube.com/watch?feature=player_embedded&v=dQw4w9WgXcQ
	// http://www.youtube.com/?feature=player_embedded&v=dQw4w9WgXcQ

	// It also works on the youtube-nocookie.com URL with the same above options.
	// It will also pull the ID from the URL in an embed code (both iframe and object tags)
	
	// https://gist.github.com/ghalusa/6c7f3a00fd2383e5ef33

	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
	$youtube_id = $match[1];
    if (isset($youtube_id)) {
    	return 'https://www.youtube.com/embed/' . $youtube_id ;
    } else {
    	return null;
    }
}