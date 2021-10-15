<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../core/Database.php';
include_once '../../models/User.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

//Instatiate User user object
$user = new User($db);

$dataID = $_GET['id'];
$dataName = $_POST['name'];
$dataLastName = $_POST['lastName'];

$data = [
    'id' => $dataID,
    'name' => $dataName,
    'lastName' => $dataLastName
];

$user->id = $data['id'];
$user->name = $data['name'];
$user->lastName = $data['lastName'];

if($user->update()){
    echo json_encode($data);
}

////Get raw user data
//$data = json_decode(file_get_contents("php://input"));
//
////Set id to update
//$user->id = $data->id;
//
//$user->name = $data->name;
//
////Update user
//if ($user->update()) {
//    echo json_encode(
//        array('message' => 'User Updated')
//    );
//} else {
//    echo json_encode(
//        array('message' => 'User Not Updated')
//    );
//}

