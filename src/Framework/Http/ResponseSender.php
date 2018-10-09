<?php
	/**
	 * Created by PhpStorm.
	 * User: splaa
	 * Date: 09.10.18
	 * Time: 21:06
	 */
	
	namespace Framework\Http;
	
	
	use Psr\Http\Message\ResponseInterface;
	
	class ResponseSender
	{
		public function send(ResponseInterface $response): void
		{
			header(sprintf(
				'HTTP/%s %d %s',
				$response->getProtocolVersion(),
				$response->getStatusCode(),
				$response->getReasonPhrase()
			));
			foreach ($response->getHeader() as $name => $values) {
				foreach ($values as $value) {
					header(sprintf('%s: %s', $name, $value), false);
				}
			}
			echo $response->getBody()->getContents();
		}
	}