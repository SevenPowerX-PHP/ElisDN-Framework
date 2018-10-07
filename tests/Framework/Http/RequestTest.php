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
		public function setUp():void
		{
			$_GET = [];
			$_POST = [];
		}
		public function testsEmpty(): void
		{
			$_GET = [];
			$_POST = [];
			
			$request = new Request();
			
			self::assertEquals([], $request->getQueryParams());
			self::assertNull($request->getParseBody());
		}
		
		public function testGetQueryParams(): void
		{
			$request_1 = new Request($data_1 = [
				'name' => 'John',
				'age' => 28,
			]);
			$request_2 = new Request($data_2 = [
				'name' => 'Bond',
				'age' => 42,
			]);
			
			self::assertEquals($data_1, $request_1->getQueryParams());
			self::assertNull($request_1->getParseBody());
			
			self::assertEquals($data_2, $request_2->getQueryParams());
			self::assertNull($request_2->getParseBody());
		}
		
		public function testGetParseBody():void
		{
			
			$request = new Request([],$data = ['title' => 'Title']);
			
			self::assertEquals([], $request->getQueryParams());
			self::assertEquals($data, $request->getParseBody());
		}
	}
