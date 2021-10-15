<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../core/Database.php';
include_once '../../models/User.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

//Instatiate User user object
$user = new User($db);

$dataName = $_POST['name'];
$dataLastName = $_POST['lastName'];

$data = [
  'name' => $dataName,
  'lastName' => $dataLastName
];

$user->name = $data['name'];
$user->lastName = $data['lastName'];

if($user->create()) {
    echo json_encode($data);
}
