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
		private $queryParams = [];
		private $parsedBody;
		
		public function withQueryParams(array $query)
		{
			$new = clone $this;
			$new->queryParams = $query;
			return $new;
		}
		
		public function withParsedBody($data)
		{
			$new = clone $this;
			$new->parsedBody = $data;
			return $new;
		}
		
//		/**
//		 * Request constructor.
//		 * @param array $queryParams
//		 * @param array|null $parsedBody
//		 */
		/*public function __construct(array $queryParams = [], array $parsedBody = null)
		{
			$this->queryParams = $queryParams;
			$this->parsedBody = $parsedBody;
		}
		*/
		public function getQueryParams(): array {
			return $this->queryParams;
		}
		
		public function getParseBody()
		{
			return $this->parsedBody;
		}
	}