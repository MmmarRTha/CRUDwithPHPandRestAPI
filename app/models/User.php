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
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
        //set properties
        //$this->name = $row['name'];
    }

    //Create User
    public function create()
    {
        //Create query
        $query = 'INSERT INTO user SET name = :name';
        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Clean data
        $this->name = htmlspecialchars(strip_tags($this->name));

        //Bind data
        $stmt->bindParam(':name', $this->name);
        $stmt->execute();
        return $stmt;
    }

    //Update User
    public function update()
    {
        //Create query
        $query = 'UPDATE user SET name = :name WHERE id = :id';
        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Clean data
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->id = htmlspecialchars(strip_tags($this->id));

        //Bind data
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    //Delete user
    public function delete()
    {
        //Create query
        $query = 'DELETE FROM user WHERE id = :id';
        //Prepare statement
        $stmt = $this->conn->prepare($query);
        //Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));
        //Bind data
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}