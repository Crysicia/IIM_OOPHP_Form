<?php
include 'class/user.php';
const FORM_FIELDS = ['username', 'email', 'password', 'password_confirmation'];

if(isset($_POST['sign_up'])){
  try{
    validate($_POST, FORM_FIELDS);
    $user = new User($_POST);
    $user->save();
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