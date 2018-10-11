<?php
	/**
	 * Created by PhpStorm.
	 * User: splaa
	 * Date: 05.10.18
	 * Time: 14:00
	 */
	
	use Zend\Diactoros\Response\HtmlResponse;
	use Zend\Diactoros\Response\SapiEmitter;
	use Zend\Diactoros\ServerRequestFactory;
	
	chdir(dirname(__DIR__));
	require_once "vendor/autoload.php";
	
	### Initialization
	
	$request = ServerRequestFactory::fromGlobals();
	
	### Action
	
	$name = $request->getQueryParams()['name'] ?? 'Guest';
	
	$response = (new HtmlResponse('Hello,' . $name . '!'))
		->withHeader('X-Developer', 'SplX');
	
	###Sending
	
	
	$emitter = new SapiEmitter();
	$emitter->emit($response);