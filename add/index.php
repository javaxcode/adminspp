<?php 
// echo "api insta";

$Login = 71308237; #Must be Changed
$apiPassword = "Sablenk212"; #Must be Changed
$data = array(
			"Login" => $Login, 
			"Password" => $apiPassword
			);
// $data = array(
// 			"Login" => $Login, 
// 			"Password" => $apiPassword,
// 			"submit"=> "submit"
// 			);
$data_string = json_encode($data);

$ch = curl_init('https://client-api.instaforex.com/api/Authentication/RequestClientApiToken');

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data_string)));
$token = curl_exec($ch);
curl_close($ch);

$apiMethodUrl = 'client/RequestBalanceInformation/'; #possibly Must be Changed
$parameters = $Login; #possibly Must be Changed. Depends on the method param
$ch = curl_init('https://client-api.instaforex.com/'.$apiMethodUrl.$parameters);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false); # Turn it ON to get result to the variable
curl_setopt($ch, CURLOPT_HTTPHEADER, array('passkey: '.$token));
$result = curl_exec($ch);
curl_close($ch);

$gabung = json_decode($result);
echo "<br>";
var_dump($gabung);


 ?>