<?php
	/**
	 * Created by PhpStorm.
	 * User: splaa
	 * Date: 05.10.18
	 * Time: 14:00
	 */
	
//	$name = $_GET['name'] ?? 'Guest';
	$name = !empty($_GET['name']) ?
		$_GET['name'] : 'Guest';
	
	header('X-Developer: SevenPowerX 2018');
	echo 'Hello PHP I am ' . $name . PHP_EOL;