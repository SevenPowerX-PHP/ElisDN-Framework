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
			$_GET = $data = [
				'name' => 'John',
				'age' => 28,
			];
			
			
			$request = new Request();
			
			self::assertEquals($data, $request->getQueryParams());
			self::assertNull($request->getParseBody());
		}
		
		public function testGetParseBody():void
		{
			
			$_POST = $data = ['title' => 'Title'];
			
			$request = new Request();
			
			self::assertEquals([], $request->getQueryParams());
			self::assertEquals($data, $request->getParseBody());
		}
	}
