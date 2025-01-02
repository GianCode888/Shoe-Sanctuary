<?php
require_once 'databaseconnection.php';
session_start();

class Database{
    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function query($query, $parameter){
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute($parameter);
    }
}

?>