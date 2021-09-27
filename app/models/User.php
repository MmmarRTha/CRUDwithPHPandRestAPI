<?php

class User
{
    private $conn;
    private $table = 'user';

    //User properties
    public $id;
    public $name;

    //constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Get Users
    public function read()
    {
        $query = 'SELECT id, name FROM user';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}