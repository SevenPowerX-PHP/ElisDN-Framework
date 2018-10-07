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
			
			
			
			/*
				Todo:splaandrey@gmail.com:: Создать конструктор для Request() класса
			
						$request = new Request($get, $post);
							$request_N = new Request(
							[
								'name' => 'John',
								'age' => 28,
							],[]);
			*/
			$request_1 = new Request();
			$request_2 = new Request();
			
			self::assertEquals($data, $request_1->getQueryParams());
			self::assertNull($request_1->getParseBody());
			
			self::assertEquals($data, $request_2->getQueryParams());
			self::assertNull($request_2->getParseBody());
		}
		
		public function testGetParseBody():void
		{
			
			$_POST = $data = ['title' => 'Title'];
			
			$request = new Request();
			
			self::assertEquals([], $request->getQueryParams());
			self::assertEquals($data, $request->getParseBody());
		}
	}
