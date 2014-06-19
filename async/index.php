<?php 
	require_once "../vendor/autoload.php";
	//echo "Loading done";
	$date = new DateTime();
	$userid = 3;
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
		  //$client->subscribe('USER.INQUEUE', function ($frame) {
		 //$response=$frame->body;  echo "Message received: $response\n";exit();}array("selector"=>"JMSCorrelationID=$timestamp");
		//}); 
		$client->subscribe('USER.OUTQUEUE', function ($frame) {
		global $loop;global $response;
		  echo "Message received: {$frame->body}\n";$response=$frame->body;$loop->stop();
		}, array("selector"=>"JMSCorrelationID=$timestamp"));
		

		//$loop->addPeriodicTimer(1, function () use ($client) {
		  
		//});
	    });


	echo "yadi el nela";
	$loop->run();
	echo "sjhsjshjshssjhsjhsjshjshsjhsjshsjhsshjshsjhsjhs";

?>
<html>
<h1>response </h1><br><h3><?php echo $response; ?></h3>
</html>
