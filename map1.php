<?php session_start(); 
$loc=$_GET['loc'];

$string=str_replace(" ","+",urlencode($loc));

   $details_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$string."&sensor=false";
 
   //$ch = curl_init();
   //curl_setopt($ch, CURLOPT_URL, $details_url);
   //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response=simplexml_load_file($details_url);
   //$response = json_decode(curl_exec($ch), true);
 
   // If Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST
   if ($response->status != 'OK') {
    echo "error";
   }
 
   //print_r($response);

   $geometry = $response->result[0]->geometry;
 
   
    echo $geometry->location->lat;
 
?>