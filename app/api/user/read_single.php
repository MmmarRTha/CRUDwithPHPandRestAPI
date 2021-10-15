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
$user->id = $_POST['id'] ?? die();

$result = $user->getUser();
echo json_encode($result);