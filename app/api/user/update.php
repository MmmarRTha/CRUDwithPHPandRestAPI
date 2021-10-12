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

$_POST['id'];
$_POST['name'];


//$user->name = $result;
//if($user->update()){
//    echo json_encode($result);
//}

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

