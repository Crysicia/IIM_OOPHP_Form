<?php

class DBConnect {
  const DB_SERVER = 'localhost:8889';
  const DB_NAME = 'login';
  const DB_USERNAME = 'root';
  const DB_PASSWORD = 'root';
  protected static $connection = false;

  private static function connect(){
    if(!self::$connection){
      try{
        self::$connection = new PDO("mysql:host=". self::DB_SERVER .";dbname=". self::DB_NAME, self::DB_USERNAME, self::DB_PASSWORD);
      }
      catch(Exception $e){
        die("Failed to connect to MySQL : ".$e->getMessage());
      }
    }
  }

  public function query(string $query, array $parameters){
    $insert = $this->connection->prepare($query);
    $insert->execute($parameters);
  }

  public static function findAll(){
    $calling_class = get_called_class();
    $table = strtolower($calling_class).'s';

    $query = "SELECT * FROM $table";
    return self::fetch($query, $table);
  }

  public static function findBy(array $parameters){
    $calling_class = get_called_class();
    $table = strtolower($calling_class).'s';
    $parsed_parameters = self::parseParameters($parameters);

    $query = "SELECT * FROM $table WHERE $parsed_parameters";
    return self::fetch($query, $table);
  }

  public static function findOneBy(array $parameters){
    return self::findBy($parameters)[0];
  }

  public static function find(int $id){
    return self::findOneBy(['id' => $id]);
  }

  private static function fetch(string $query, string $table){
    self::connect();
    $select = self::$connection->prepare($query);
    $select->execute();
    return $select->fetchAll();
  }

  private static function parseParameters(array $parameters){
    $output = implode(', ', array_map(
      function ($v, $k) { return sprintf("%s='%s'", $k, $v); },
      $parameters,
      array_keys($parameters)
    ));
    return $output;
  }
}