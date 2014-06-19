<?php 
	require_once "../vendor/autoload.php";
	session_start();
	$userid = $_SESSION['id'];
	$username = $_SESSION['username'];
	$date = new DateTime();
	$userid = 5;
	$response;
	$timestamp = $userid.$date->getTimestamp();
	$msg    = "{\"method\":\"following\",\"user_id\":\"$userid\"}";
	$loop = React\EventLoop\Factory::create();
	$factory = new React\Stomp\Factory($loop);
	$client = $factory->createClient(array('localhost:61613' => '/', 'login' => '', 'passcode' => ''));
	$con = $client->connect();
	$con->then(function ($client) use ($loop) {
		global $msg;global $response;global $timestamp;
		$client->send('USER.INQUEUE', $msg,array("JMSCorrelationID"=>$timestamp)); 
		$client->subscribe('USER.OUTQUEUE', function ($frame) {
		global $loop;global $response;
		  $response=$frame->body;$loop->stop();
		}, array("selector"=>"JMSCorrelationID=$timestamp"));
		$loop->addPeriodicTimer(3, function () use ($client) {
		 global $loop; $loop->stop();//echo "<script type='text/javascript'>alert('please reload again');</script>";
		});
	    });

	$loop->run();
	$arr = json_decode($response, true);
	$followers=sizeof($arr["following"]);
?>

