<?php
	/**
	 * Created by PhpStorm.
	 * User: splaa
	 * Date: 05.10.18
	 * Time: 14:00
	 */
	
	use Zend\Diactoros\Response\HtmlResponse;
	use Zend\HttpHandlerRunner\Emitter\SapiEmitter;
	use Zend\Diactoros\ServerRequestFactory;
	
	chdir(dirname(__DIR__));
	require_once "vendor/autoload.php";
	
	### Initialization
	
	$request = ServerRequestFactory::fromGlobals();
	
	### Action
	
	$name = $request->getQueryParams()['name'] ?? 'Guest';
	
	$path = $request->getUri()->getPath();
	
	
	/*if ($path === '/') {
		$name = $request->getQueryParams()['name'] ?? 'Test';
		$response = (new HtmlResponse('Hello,' . $name . '!'));
	} elseif ($path === '/about') {
		$response = new HtmlResponse('I am a simple site');
	} else {
		$response = new \Zend\Diactoros\Response\JsonResponse(['error' => 'Undefined page'], 404);
	}*/
	
	$name = $request->getQueryParams()['name'] ?? 'Test';
	$response = (new HtmlResponse('Hello,' . $name . '!'));
	
	### Preprocessing
	
//	$response = $request->withHeader('X-Developer', 'SplX');

//	$response = $request->withHeader('X-Developer1', 'SplX=1');
//	$response = $request->withoutHeader('X-Developer');
	
	/*	if(preg_match('#json#i', $request->getHeader('Content-Type')))
		{
			$request = $request->withParsedBody(json_decode($request->getBody()->getContents()));
		}*/
	
	###Sending
	
	
	$emitter = new SapiEmitter();
	
	$emitter->emit($response);