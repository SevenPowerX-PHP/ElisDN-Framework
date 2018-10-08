<?php
	/**
	 * Created by PhpStorm.
	 * User: splaa
	 * Date: 08.10.18
	 * Time: 21:20
	 */
	
	namespace Framework\Http;
	
	interface ServerRequestInterface
	{
		public function getQueryParams(): array;
		
		public function withQueryParams(array $query);
		
		public function getParseBody();
		
		public function withParsedBody($data);
	}