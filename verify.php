<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$token =  $_POST['token'];
$secretKey =  $_POST['secretKey'];
$remoteIp = $_POST['remoteIp'];

if ($token && $secretKey && $remoteIp) {
      $ch = curl_init();
  
      curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, "secret=$secretKey&response=$token&remoteip=$remoteIp");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      
      $server_output = curl_exec($ch);
      curl_close ($ch);
      echo $server_output;
  
  } else {
    echo json_encode(array());
  }
  
?>