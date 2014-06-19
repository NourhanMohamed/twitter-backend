<?php
require_once "../vendor/autoload.php";
	echo "<script type='text/javascript'>alert('searchaction');</script>";

if(isset($_POST['searchsub']) )
{
	$tweet = $_POST['searchsub'];
	$status = $_POST['status'];
  //$reg = $_POST['reg'];
	if($tweet)
	{
	session_start();
	$session = 	$_SESSION['session_id'];
	//echo "<script type='text/javascript'>alert('home');</script>";
	//echo "<script type='text/javascript'>alert('user id:$sessiontest session id:$session');</script>";
		//echo $status;
		$date = new DateTime();
	$userid = $_SESSION['id'];
	$response;
	$timestamp = $userid.$date->getTimestamp();
	$msg    = "{\"method\":\"tweet\",\"tweet_text\":\"$status\",\"creator_id\":\"$userid\"}";
	$loop = React\EventLoop\Factory::create();
	$factory = new React\Stomp\Factory($loop);
	$client = $factory->createClient(array('localhost:61613' => '/', 'login' => '', 'passcode' => ''));
	$con = $client->connect();
	$con->then(function ($client) use ($loop) {
		global $msg;global $response;global $timestamp;
		$client->send('TWEET.INQUEUE', $msg,array("JMSCorrelationID"=>$timestamp)); 
		$loop->addPeriodicTimer(0.01, function () use ($client) {
		 global $loop; $loop->stop();//echo "<script type='text/javascript'>alert('please reload again');</script>";
		});
	    });
	$loop->run();

		header('Location: home.php');
	}
}	
?>
