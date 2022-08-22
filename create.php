<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
header('Acccess-Control-Allow-Headers: token, Content-Type');
header('Access-Control-Max-Age: 1728000');
header('Content-Length: 0');
header('Content-Type: text/plain');

include "config.php";
$input=file_get_contents('php://input');
$data=json_decode($input, true);
$message= array();
$nazivFilma = $data['nazivFilma'];
$godina=$data['godina'];
$ocena = $data['ocena'];

$q = mysqli_query($con, "INSERT INTO `FILM` (`nazivFilma`, `godina`, `ocena`) VALUES ('$nazivFilma', '$godina', '$ocena')");

if ($q) {
    http_response_code(201);
    $message['status'] = "Success";
} else {
    http_response_code(422);
    $message['status'] = "Error";
}

echo json_encode($message);
echo mysqli_error($con);