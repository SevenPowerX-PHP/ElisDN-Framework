<?php
	/**
	 * Created by PhpStorm.
	 * User: splaa
	 * Date: 05.10.18
	 * Time: 14:00
	 */
	
	use Framework\Http\RequestFactory;
	use Framework\Http\Response;
	
	chdir(dirname(__DIR__));
	require_once "vendor/autoload.php";
	
	### Initialization
	
	$request = RequestFactory::fromGlobals();
	
	### Action
	
	$name = $request->getQueryParams()['name'] ?? 'Guest';
	
	/** @var Response $response */
	$response = (new Response('Hello,' . $name . '!'))
		->withHeader('X-Developer', 'SplX');
	
	###Sending
	
	//header('X-Developer: SevenPowerX 2018');
	//echo 'Hello PHP I am ' . $name . PHP_EOL;
	//$lang ='en';
	//echo 'Your lang: ' . $lang . PHP_EOL;

	header('HTTP/1.0' . $response->getStatusCode() . '' . $response->getReasonPhrase());
	foreach ($response->getHeaders() as $name => $value) {
		header($name . ':' . $value);
	}
	echo $response->getBody();