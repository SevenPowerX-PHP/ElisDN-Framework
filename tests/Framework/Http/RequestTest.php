<?php
	/**
	 * Created by PhpStorm.
	 * User: splaa
	 * Date: 07.10.18
	 * Time: 14:30
	 */
	
	namespace Tests\Framework\Http;
	
	
	use Framework\Http\Request;
	use PHPUnit\Framework\TestCase;
	
	class RequestTest extends TestCase
	{
		/*public function setUp():void
		{
			$_GET = [];
			$_POST = [];
		}*/
		public function testsEmpty(): void
		{
			$request = new Request();
			
			self::assertEquals([], $request->getQueryParams());
			self::assertNull($request->getParseBody());
		}
		
		public function testQueryParams(): void
		{
			$request = (new Request())
				->withQueryParams($data =[
				'name' => 'John',
				'age' => 28,
			]);
			
			self::assertEquals($data, $request->getQueryParams());
			self::assertNull($request->getParseBody());
			
		}
		
		public function testParseBody():void
		{
			
			$request = (new Request())
				->withParsedBody($data = ['title' => 'Title']);
			
			self::assertEquals([], $request->getQueryParams());
			self::assertEquals($data, $request->getParseBody());
		}
	}
