<?php
require_once 'config.php';
class Database
{

    public function connect()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=".HOST. ";dbname=".DB,USER,PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $this->conn;
    }

}