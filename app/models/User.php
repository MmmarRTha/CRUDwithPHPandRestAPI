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
    public function getAll()
    {
        $query = 'SELECT id, name FROM user';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //Get single User
    public function getUser()
    {
        $query = 'SELECT id, name FROM user WHERE id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //set properties
        $this->name = $row['name'];
    }

    //Create User
    public function create()
    {
        //Create query
        $query = 'INSERT INTO user SET name = :name';
        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Clean data
        $this->title = htmlspecialchars(strip_tags($this->name));

        //Bind data
        $stmt->bindParam(':name', $this->name);

        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}