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

//User query
$result = $user->getAll();
$data = $result->fetchAll(PDO::FETCH_OBJ);
echo json_encode($data);