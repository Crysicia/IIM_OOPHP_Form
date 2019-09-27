<?php
include 'class/user.php';
const FORM_FIELDS = ['email', 'password'];

if(isset($_POST['sign_in'])){
  try{
    validate($_POST, FORM_FIELDS);
    $user = login($_POST);
    echo "Welcome ".$user->getUsername();
  }
  catch(Exception $e){
    echo "User error(s) : ".$e->getMessage();
  }
}

// --- Functions ---
function validate($params, $fields){
  $error = false;
  $exception = [];

  foreach ($fields as $field){
    if(empty($params[$field])){
      $exception[] = "Please fill in your $field.";
      $error = true;
    }
  }

  if($error){
    throw new Exception(implode("<br>", $exception));
  }
}

function login($params){
  $password = sha1($params['password']);
  $result = User::findOneBy(['email' => $_POST['email'], 'password' => $password]);

  if($result === NULL){
    throw new Exception("Sorry, wrong email or password.");
  } else {
    return new User($result);
  }
}