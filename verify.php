<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'] ?? '';
    $secretKey = $_POST['secretKey'] ?? '';
    $remoteIp = $_POST['remoteIp'] ?? '';

    if (!$token || !$secretKey) {
        echo json_encode(array("error" => "Token and secretKey are required"));
        exit();
    }

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
        "secret" => $secretKey,
        "response" => $token,
        "remoteip" => $remoteIp
    )));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    if ($server_output === false) {
        echo json_encode(array("error" => "error: " . curl_error($ch)));
    } else {
        echo $server_output;
    }

    curl_close($ch);
} else {
    echo json_encode(array("error" => "Invalid request method, POST method expected"));
}
?>
