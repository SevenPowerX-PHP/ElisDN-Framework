<?php
	/**
	 * Created by PhpStorm.
	 * User: splaa
	 * Date: 08.10.18
	 * Time: 19:14
	 */
	
	namespace Framework\Http;
	
	
	
	class Response implements ResponseInterface, ResponseInterface
	{
		private $headers = [];
		private $body;
		private $statusCode;
		private $reasonPhrase = '';
		
		private static $phrases = [
			200 => 'Ok',
			301 => 'Moved Permanently',
			400 => 'Bad Request',
			403 => 'Forbidden',
			404 => 'Not Found',
			500 => 'Internal Server Error',
		];
		
		/**
		 * Response constructor.
		 * @param $body
		 * @param int $status
		 */
		public function __construct($body, $status = 200)
		{
			$this->body = $body;
			$this->statusCode = $status;
		}
		
		public function getBody()
		{
			return $this->body;
		}
		
		public function withBody($body): self
		{
			$new = clone $this;
			$new->body = $body;
			return $new;
		}
		
		public function getStatusCode():int
		{
			return $this->statusCode;
		}
		
		public function getReasonPhrase()
		{
			if(!$this->reasonPhrase && isset(self::$phrases[$this->statusCode])){
				$this->reasonPhrase = self::$phrases[$this->statusCode];
			}
			return $this->reasonPhrase;
		}
		
		public function withStatus($code, $reasonPhrase = ''):self
		{
			$new = clone $this;
			$new->statusCode = $code;
			$new->reasonPhrase = $reasonPhrase;
			return $new;
		}
		
		public function getHeaders():array
		{
			return $this->headers;
		}
		
		public function hasHeader($header):bool
		{
			return isset($this->headers[$header]);
		}
		
		public function getHeader($header)
		{
			if (!$this->getHeader($header)) {
				return null;
			}
			return $this->headers[$header];
		}
		
		public function withHeader($header, $value):self
		{
			$new = clone $this;
			if ($new->hasHeader($header)) {
				unset($new->headers[$header]);
			}
			$new->headers[$header] = $value;
			return $new;
		}
	}