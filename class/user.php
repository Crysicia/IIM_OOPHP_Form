<?php
require_once 'db_connect.php';

class User extends DBConnect
{
  const FORM_FIELDS = ['username', 'email', 'password', 'password_confirmation'];
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
    $this->password = sha1($password);
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

  public function validate($params){
    $error = false;
    $exception = [];

    foreach (self::FORM_FIELDS as $field){
      if(empty($params[$field])){
        $exception[] = "Please fill in your $field.";
        $error = true;
      }
    }

    if(!filter_var($params['email'], FILTER_VALIDATE_EMAIL)){
      $exception[] = "Please fill in a valid email address.";
    } 

    if($params['password'] !== $params['password_confirmation']){
      $exception[] = "Your password and the password confirmation doesn't match.";
    }

    if($error){
      throw new Exception(implode("<br>", $exception));
    }
  }

  private function save(){
    $query = "INSERT INTO user(username, email, password) VALUES (:username, :email, :password)";
    $parameters = array(
      'username' => $this->getUsername(),
      'email'    => $this->getEmail(),
      'password' => $this->getPassword()
    );
    $this->query($query, $parameters);
  }

  public function __construct($params){
    parent::__construct();
    $this->validate($params);
    $this->setUsername($params['username']);
    $this->setEmail($params['email']);
    $this->setPassword($params['password']);
    $this->save();
  }
}