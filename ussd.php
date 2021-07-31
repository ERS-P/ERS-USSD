<?php
date_default_timezone_get("Africa/Accra");

include_once 'db.php';

// Reads the variables sent via POST from AT gateway
//Old-Way
// $sessionId=$_POST['sessionId'];
// $serviceCode=$_POST['serviceCode'];
// $phoneNumber=$_POST['phonenumber'];
// $text=$_POST['text'];

$TransId = $_GET["TransId"];
$RequestType = $_GET["RequestType"];
$MSISDN = $_GET["MSISDN"];
$SHORTCODE = $_GET["SHORTCODE"];
$AppID = $_GET["AppID"];
$USSDString = $_GET["USSDString"];
  
session_start();
if($text==""){
    // This is the first request
    $response="CON What would you want to do \n";
    $response .="1.Report an emergency \n";
    $response .="2.Send a feedback \n";
}
elseif($text=="1"){
    //Business logic for the first response
    $response="CON Choose the type of emergency \n";
    $response .="1.Fire \n";
    $response .="2.Flood \n";
    $response .="3.Landslide \n";
    $response .="4.Other \n";
}
elseif($text=="2"){
    //Business logic for the first response
    $response="CON Choose one of the feedbacks\n";
    $response .="1.Emergency has been stopped\n";
    $response .="2.Emergency got worse \n";
}
elseif($text=="1*1"){
    //This is second level response
   $title="Fire";
//    $description="Uncontrollable flames in my apartment at kasoa";
   $response .="CON Enter your location:";
}
elseif($text=='1*1*" "'){
    $response = "Please try again.";
}
elseif($text=="1*1*$text"){
    $response = "END Sent.";
}

elseif($text=="1*2"){
    //This is second level response
   $title="Flood";
   $description="Uncontrollable flames in my apartment at kasoa";
   $response=" END Emergency Post has been submitted";
}
elseif($text=="1*3"){
    //This is second level response
   $title="Landslide";
   $description="Uncontrollable flames in my apartment at kasoa";
   $response=" END Emergency Post has been submitted";
}
elseif($text=="1*4"){
    //This is second level response
   $title="Other";
   $description="Uncontrollable flames in my apartment at kasoa";
   $response=" END Emergency Post has been submitted";
}
elseif($text=="2*1" || $text=="2*2"){
    $response = "END Feedback Submitted";
}
else{
    $response ="END Wrond Input. Retry Again";
}

//echo the response to the API.The response depends on the statement that is fulfilled in each instance
header('Content-type: text/plain');
echo $response;


?>