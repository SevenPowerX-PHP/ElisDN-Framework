<?php
	/**
	 * Created by PhpStorm.
	 * User: splaa
	 * Date: 06.10.18
	 * Time: 14:50
	 */
	
	namespace Framework\Http;
	
	
	class Request
	{
		public function getQueryParams(): array {
			return $_GET;
		}
		
		public function getParseBody()
		{
			return $_POST ?: null;
		}
	}