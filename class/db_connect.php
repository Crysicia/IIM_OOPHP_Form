<?php

class DBConnect {
  const DB_SERVER = 'localhost';
  const DB_NAME = 'login';
  const DB_USERNAME = 'root';
  const DB_PASSWORD = 'root';
  protected $connection = false;

  public function __construct(){
    if($this->connection === false){
      try{
        $this->connection = new PDO("mysql:host=". self::DB_SERVER .";dbname=". self::DB_NAME, self::DB_USERNAME, self::DB_PASSWORD);
      }
      catch(Exception $e){
        die("Failed to connect to MySQL : ".$e->getMessage());
      }
    }
  }

  public function __destruct(){
    $this->connection = null;
  }

  public function query($query, $parameters){
    $insert = $this->connection->prepare($query);
    $insert->execute($parameters);
  }
}