<?php 

	

	require_once "../vendor/autoload.php";
	session_start();
	$sessiontest = 	$_SESSION['id'];
	$session = 	$_SESSION['session_id'];
	echo "<script type='text/javascript'>alert('home');</script>";
	echo "<script type='text/javascript'>alert('user id:$sessiontest session id:$session');</script>";

	$date = new DateTime();
	$userid = $_SESSION['id'];
	//$username = "jejeje";
	$response;
	$timestamp = $userid.$date->getTimestamp();
	$msg    = "{\"method\":\"get_feeds\",\"user_id\":\"$userid\"}";
	$loop = React\EventLoop\Factory::create();
	$factory = new React\Stomp\Factory($loop);
	$client = $factory->createClient(array('localhost:61613' => '/', 'login' => '', 'passcode' => ''));
	$con = $client->connect();
	$con->then(function ($client) use ($loop) {
		global $msg;global $response;global $timestamp;
		$client->send('TWEET.INQUEUE', $msg,array("JMSCorrelationID"=>$timestamp)); 
		$client->subscribe('TWEET.OUTQUEUE', function ($frame) {
		global $loop;global $response;
		  $response=$frame->body;$loop->stop();
		}, array("selector"=>"JMSCorrelationID=$timestamp"));
		$loop->addPeriodicTimer(3, function () use ($client) {
		 global $loop; $loop->stop();//echo "<script type='text/javascript'>alert('please reload again');</script>";
		});
	    });

	$loop->run();
	
	
	/*
	$response = "{\"app\":\"tweet\",\"method\":\"followers\",\"status\":\"ok\",\"code\":\"200\",\"following\":[{\"username\":\"koko\",\"name\":\"jejeje\",\"avatar_url\":\"null\"},{\"username\":\"joe\",\"name\":\"jejeje\",\"avatar_url\":\"null\"}]}";
	$arr = json_decode($response, true);
	$followers=sizeof($arr["following"]);
	
	$response = "{\"app\":\"tweet\",\"method\":\"get_feeds\",\"status\":\"ok\",\"code\":\"200\",\"feeds\":[{\"id\":\"2\",\"tweet_text\":\"shit man\",\"created_at\":\"2014-05-19 15:29:46.173491\",\"creator\":{\"username\":\"koko\",\"name\":\"jejeje\",\"avatar_url\":\"null\"}}]}";
	
$response = "{\"app\":\"tweet\",\"method\":\"get_feeds\",\"status\":\"ok\",\"code\":\"200\",\"feeds\":[{\"id\":\"2\",\"tweet_text\":\"shit man\",\"created_at\":\"2014-05-19 15:29:46.173491\",\"creator\":{\"username\":\"koko\",\"name\":\"jejeje\",\"avatar_url\":\"null\"}},{\"id\":\"2\",\"tweet_text\":\"shit man\",\"created_at\":\"2014-05-19 15:29:46.173491\",\"creator\":{\"username\":\"soso\",\"name\":\"jejeje\",\"avatar_url\":\"null\"}}]}";	

*/

	$arr = json_decode($response, true);
?>
