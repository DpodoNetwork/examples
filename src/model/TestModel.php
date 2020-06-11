<?php


class TestModel {

	public function test() {

		yield array('r' => 0, 'data' => 'yield test');
	}

	public function udpTest() {

		// send data to back server 
		$ip = '127.0.0.1';
		$port = '9905';
		$data = 'test';
		// second
		$timeout = 0.5;
		yield new Swoole\Client\UDP($ip, $port, $data, $timeout);
	}

	public function httpTest() {

		$url='http://www.dpodo.com';
		$httpRequest= new Swoole\Client\HTTP($url);
		$data='testdata';
		$header = array(
		'Content-Length' => 12345,
		);
		// yield $httpRequest->post($path, $data, $header);
		yield $httpRequest->get($url); 
	}

	public function muticallTest() {
		$ip = '127.0.0.1';
		$data = 'test';
		//second
		$timeout = 0.5;

		$calls=new Swoole\Client\Multi();

		$firstReq=new Swoole\Client\TCP($ip, '9905', $data, $timeout);
		$secondReq=new Swoole\Client\UDP($ip, '9904', $data, $timeout);

		// first request
		$calls ->request($firstReq,'first');
		// second request
		$calls ->request($secondReq,'second');

		yield $calls;
	}

	public function HttpmuticallTest() {

		$calls=new Swoole\Client\Multi();
		$test = new Swoole\Client\HTTP("http://www.dpodo.com/");
		$calls ->request($test,"dpodo network");

		yield $calls;
	}

	public function tcpTest() {
		$ip = '127.0.0.1';
		$port = '9905';
		$data = 'test';
		// second
		$timeout = 0.5;
		yield new Swoole\Client\TCP($ip, $port, $data, $timeout);
	}

	public function mysqlTest() {
		$sql = new Swoole\Client\MYSQL(array('host' => '127.0.0.1', 'port' => 3345, 'user' => 'root', 'password' => 'root', 'database' => 'test', 'charset' => 'utf-8',));
		$ret = (yield $sql ->query('show tables'));
		var_dump($ret);
		$ret = (yield $sql ->query('desc test'));
		var_dump($ret);
	}
}