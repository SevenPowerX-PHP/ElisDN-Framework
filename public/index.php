<?php
	/**
	 * Created by PhpStorm.
	 * User: splaa
	 * Date: 05.10.18
	 * Time: 14:00
	 */
	
	function getLang(array $get, array $cookie, array $session, array $server, $default){
		return
			!empty($get['lang']) ? $get['lang'] :
				(!empty($cookie['lang']) ? $cookie['lang']:
					(!empty($session['lang']) ? $session['lang'] :
						(!empty($server['HTTP_ACCEPT_LANGUAGE']) ?
							substr($server['HTTP_ACCEPT_LANGUAGE'], 0, 2) :
		$default)));
		
		
		
	}
	
	session_start();
	
	$name = !empty($_GET['name']) ?	$_GET['name'] : 'Guest';
	$lang = getLang($_GET, $_COOKIE, $_SESSION, $_SERVER,'en');
//	$lang = 'en';
	
	header('X-Developer: SevenPowerX 2018');
	echo 'Hello PHP I am ' . $name . PHP_EOL;
	echo 'Your lang: ' . $lang . PHP_EOL;