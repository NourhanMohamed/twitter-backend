<?php
$x = "{\"app\":\"user\",\"method\":\"followers\",\"status\":\"ok\",\"code\":\"200\",\"followers\":[{\"username\":\"koko\",\"name\":\"jejeje\",\"avatar_url\":\"null\"},{\"username\":\"joe\",\"name\":\"jejeje\",\"avatar_url\":\"null\"}]}";

echo $x;
$arr = json_decode($x, true);
foreach($arr["followers"] as $follower)
{
echo $follower['username']."\n shit";

}
?>