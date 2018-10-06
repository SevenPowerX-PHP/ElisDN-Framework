<?php
	/**
	 * Created by PhpStorm.
	 * User: splaa
	 * Date: 05.10.18
	 * Time: 14:00
	 */
	
	/*function getLang(array $get, array $cookie, array $session, array $server, $default){
		return
			!empty($get['lang']) ? $get['lang'] :
				(!empty($cookie['lang']) ? $cookie['lang']:
					(!empty($session['lang']) ? $session['lang'] :
						(!empty($server['HTTP_ACCEPT_LANGUAGE']) ?
							substr($server['HTTP_ACCEPT_LANGUAGE'], 0, 2) :
		$default)));
		
		
		
	}
	
	session_start();*/
	
	use Framework\Http\Request;
	
	chdir(dirname(__DIR__));
//	require 'src/Framework/Http/Request.php';
	require_once "vendor/autoload.php";
	$request = new Request();
	
	$name = !empty($request->getQueryParams()['name']) ? $request->getQueryParams()['name'] : 'Guest';
	/*
		$name = !empty($_GET['name']) ?	$_GET['name'] : 'Guest';
		$lang = getLang($_GET, $_COOKIE, $_SESSION, $_SERVER,'en');
	*/
		$lang = 'en';
	
	header('X-Developer: SevenPowerX 2018');
	echo 'Hello PHP I am ' . $name . PHP_EOL;
	echo 'Your lang: ' . $lang . PHP_EOL;