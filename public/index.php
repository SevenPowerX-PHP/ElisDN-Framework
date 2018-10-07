<?php
	/**
	 * Created by PhpStorm.
	 * User: splaa
	 * Date: 05.10.18
	 * Time: 14:00
	 */
	
	use Framework\Http\Request;
	
	chdir(dirname(__DIR__));
	require_once "vendor/autoload.php";
	
	### Initialization
	
//	$request = new Request($_GET, $_POST);
/*	$request = new Request();
	$request->withQueryParams($_GET);
	$request->withParsedBody($_POST);*/
	
// Чтобы воспользоватся цепочкой нужно в сетерах вернуть сам обьект
//  return this;
$request = (new Request())
	->withQueryParams($_GET)
	->withParsedBody($_POST);
	
//	$request->setParserBody(json_decode($request->getBody()));
	
	### Action
	
	$name = !empty($request->getQueryParams()['name']) ? $request->getQueryParams()['name'] : 'Guest';
	$lang = 'en';
	//	$lang = !empty($request->getParseBody()) ? $request->getParseBody() : 'en';
	
	header('X-Developer: SevenPowerX 2018');
	echo 'Hello PHP I am ' . $name . PHP_EOL;
	echo 'Your lang: ' . $lang . PHP_EOL;