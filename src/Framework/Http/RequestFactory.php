<?php
	/**
	 * Created by PhpStorm.
	 * User: splaa
	 * Date: 07.10.18
	 * Time: 19:02
	 */
	
	namespace Framework\Http;
	
	
	class RequestFactory
	{
		public static function fromGlobals(array $query = null,array $body = null): Request
		{
			return (new Request())
				->withQueryParams($query ?: $_GET)
				->withParsedBody($body ?: $_POST);
		}
	}