<?php
	/**
	 * Created by PhpStorm.
	 * User: splaa
	 * Date: 05.10.18
	 * Time: 14:00
	 */
	
	use Aura\Router\RouterContainer;
	use Psr\Http\Message\ServerRequestInterface;
	use Zend\Diactoros\Response\HtmlResponse;
	use Zend\Diactoros\Response\JsonResponse;
	use Zend\Diactoros\Response\SapiEmitter;
	use Zend\Diactoros\ServerRequestFactory;
	
	chdir(dirname(__DIR__));
	require 'vendor/autoload.php';
### Initialization
	
	$routerContainer = new RouterContainer();
	$map = $routerContainer->getMap();
	
	$request = ServerRequestFactory::fromGlobals();
	$request = $request->withAttribute('lang', 'en');
### Action
	$path = $request->getUri()->getPath();
	if ($path === '/') {
		$lang = $request->withAttribute('lang');
		$action = function (ServerRequestInterface $request) {
			
			$name = $request->getQueryParams()['name'] ?? 'Guest';
			$htmlResponse = new HtmlResponse('Hello, ' . $lang . $name . '!</br>');
//			$htmlResponse .= new HtmlResponse('Ваш язык:, ' . $lang . '<br>');
			return $htmlResponse;
		};
		
		
	} elseif ($path === '/about') {
		$action =function(){return new HtmlResponse('<h1>I am a simple site</h1>');};
	} elseif ($path === '/blog') {
		$action = function (){return new JsonResponse([
			['id' => 2, 'title' => 'The Second Post'],
			['id' => 1, 'title' => 'The First Post'],
		]);};
	} elseif (preg_match('#^/blog/(?P<id>\d+)$#i', $path, $matches)) {
//		$id = $matches['id'];
		
		
		$action = function (ServerRequestInterface $request) {
			{
				$id = $request->getAttribute('id');
				if ($id > 2) {
					return new JsonResponse(['error' => 'Undefined page'], 404);
				}
				return new JsonResponse(['id' => $id, 'title' => 'Post #' . $id]);
			}
		};
	}
	
	if($action) {
		$response = $action($request);
	}else {
		$response = new HtmlResponse('Undefined page', 404);
	}
### Postprocessing
	$response = $response->withHeader('X-Developer', 'ElisDN');
### Sending
	$emitter = new SapiEmitter();
	$emitter->emit($response);