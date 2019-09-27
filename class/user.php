<?php
require_once 'db_connect.php';

class User extends DBConnect
{
  private $username;
  private $email;
  private $password;

  public function setUsername($username){
    $this->username = $username;
  }

  public function setEmail($email){
    $this->email = $email;
  }

  public function setPassword($password){
    $this->password = $password;
  }

  public function getUsername(){
    return $this->username;
  }

  public function getEmail(){
    return $this->email;
  }

  public function getPassword(){
    return $this->password;
  }

  public function save(){
    $this->setPassword(sha1($this->getPassword()));
    $this->persist(get_object_vars($this));
  }

  public function __construct($params){
    $this->setUsername($params['username']);
    $this->setEmail($params['email']);
    $this->setPassword($params['password']);
  }
}