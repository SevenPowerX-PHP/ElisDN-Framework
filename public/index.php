<?php
	/**
	 * Created by PhpStorm.
	 * User: splaa
	 * Date: 05.10.18
	 * Time: 14:00
	 */
	
	function getLang($default){
		return
			!empty($_GET['lang']) ? $_GET['lang'] :
				(!empty($_COOKIE['lang']) ? $_COOKIE['lang']:
					(!empty($_SESSION['lang']) ? $_SESSION['lang'] :
						(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?
							substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) :
		$default))));
		
		
		
	}
	$name = !empty($_GET['name']) ?	$_GET['name'] : 'Guest';
	$lang = getLang('en');
	
	header('X-Developer: SevenPowerX 2018');
	echo 'Hello PHP I am ' . $name . PHP_EOL;
	echo 'Your lang: ' . $lang . PHP_EOL;