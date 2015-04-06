<?php

$query = urldecode($_POST["keyword"]);

$url  = "http://openapi.map.naver.com/api/geocode.php?";
$url .= "key=YOUR_API_KEY_HERE&encoding=utf-8&coord=latlng&";
$url .= "query=".urlencode($query);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$xml = curl_exec($ch);
curl_close($ch);

$obj = SimpleXML_Load_String($xml);
echo json_encode($obj);