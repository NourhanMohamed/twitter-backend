<?php

$response = "{\"app\":\"tweet\",\"method\":\"followers\",\"status\":\"ok\",\"code\":\"200\",\"following\":[{\"username\":\"koko\",\"name\":\"jejeje\",\"avatar_url\":\"null\"},{\"username\":\"joe\",\"name\":\"jejeje\",\"avatar_url\":\"null\"}]}";

$response = "{\"app\":\"tweet\",\"method\":\"get_feeds\",\"status\":\"ok\",\"code\":\"200\",\"feeds\":[{\"id\":\"2\",\"tweet_text\":\"shit man\",\"created_at\":\"2014-05-19 15:29:46.173491\",\"creator\":{\"username\":\"koko\",\"name\":\"jejeje\",\"avatar_url\":\"null\"}}]}";

$response = "{\"app\":\"tweet\",\"method\":\"get_feeds\",\"status\":\"ok\",\"code\":\"200\",\"feeds\":[{\"id\":\"2\",\"tweet_text\":\"shit man\",\"created_at\":\"2014-05-19 15:29:46.173491\",\"creator\":{\"username\":\"koko\",\"name\":\"jejeje\",\"avatar_url\":\"null\"}},{\"id\":\"2\",\"tweet_text\":\"shit man\",\"created_at\":\"2014-05-19 15:29:46.173491\",\"creator\":{\"username\":\"soso\",\"name\":\"jejeje\",\"avatar_url\":\"null\"}}]}";


$arr = json_decode($response, true);
print_r ($arr);

foreach($arr["feeds"] as $follower)
{
	echo "\n".$follower['creator']['username'];
}

?>