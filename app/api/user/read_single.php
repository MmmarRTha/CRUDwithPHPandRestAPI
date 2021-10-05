<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../core/Database.php';
include_once '../../models/User.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

//Instatiate User user object
$user = new User($db);

//Get id
$user->id = isset($_GET['id']) ? $_GET['id'] : die();

//Get user
$user->getUser();
var_dump();

////Create array
//$user_arr = array(
//    'id' => $user->id,
//    'name' => $user->name
//);
//
////Make JSON
//print_r(json_encode($user_arr));
