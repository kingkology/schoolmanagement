<?php 
 require_once('twilio_master/Twilio/autoload.php'); // Loads the library
$version = "2010-04-01"; // Twilio REST API version
use Twilio\Rest\Client;
include 'tcons.php';
$textmess="this works";
$msg=$textmess;

// Set our Account SID and AuthToken
$sid = "ACf8b71051b696215f0eae798f16056050";
$token = "a8b9b5f3126689380da0f1b801db7a53";
$client = new Client($sid, $token);
$send_number = "+233544720636"; // Add Number to Send To
$twilio_number = '+18649009586';// Add Your registered Twilio Number
$message = $msg;
$client->messages->create(
    $send_number,
    array(
        'from' => $twilio_number,
        'body' => $message,
    )
);

 ?>
