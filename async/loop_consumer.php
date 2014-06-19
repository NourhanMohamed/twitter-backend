<?php
require_once "../vendor/autoload.php";
	$date = new DateTime();
	$userid = 3;
	$response;
	$timestamp = $userid.$date->getTimestamp();
	$msg    = "{\"method\":\"followers\",\"user_id\":\"$userid\"}";
	$loop = React\EventLoop\Factory::create();
	$factory = new React\Stomp\Factory($loop);
	$client = $factory->createClient(array('localhost:61613' => '/', 'login' => '', 'passcode' => ''));
	$con = $client->connect();
	$con->then(function ($client) use ($loop) {
		global $msg;global $response;global $timestamp;
		//$client->send('USER.INQUEUE', $msg,array("JMSCorrelationID"=>$timestamp));
		$client->subscribe('USER.OUTQUEUE', function ($frame) {
		global $loop;global $response;
		  $response=$frame->body;$loop->stop();
		}, array("selector"=>"JMSCorrelationID=$timestamp"));
		
		$loop->addPeriodicTimer(100, function () use ($client) {
		 global $loop; $loop->stop();
		});
	    });
	$loop->run();
	$arr = json_decode($response, true);
	$followers=sizeof($arr["followers"]);
	?>