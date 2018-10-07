<?php
	/**
	 * Created by PhpStorm.
	 * User: splaa
	 * Date: 05.10.18
	 * Time: 14:00
	 */
	
	use Framework\Http\RequestFactory;
	
	chdir(dirname(__DIR__));
	require_once "vendor/autoload.php";
	
	### Initialization
	
	$request = RequestFactory::fromGlobals();
	
	### Action
	
	$name = $request->getQueryParams()['name'] ?? 'Guest';
	
	header('X-Developer: SevenPowerX 2018');
	echo 'Hello PHP I am ' . $name . PHP_EOL;
	$lang ='en';
	echo 'Your lang: ' . $lang . PHP_EOL;