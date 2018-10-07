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
			$this->queryParams = $query;
			return $this;
		}
		
		public function withParsedBody($data)
		{
			$this->parsedBody = $data;
			return $this;
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