<?php
include "config.php";
$input = file_get_contents('php://input');
$data = json_decode($input, true);
$message = array();
$nazivFilma = $data['nazivFilma'];
$godina = $data['godina'];
$ocena = $data['ocena'];
$id = $_GET['id'];

$q = mysqli_query($con, "UPDATE `film` SET `nazivFilma` = $nazivFilma, `godina` = $godina, `ocena` = $ocena WHERE `id` = '{$id}' LIMIT 1");


if ($q) {
    $message['status'] = "Success";
} else {
    http_response_code(422);
    $message['status'] = "Error";
}

echo json_encode($message);
echo mysqli_error($con);