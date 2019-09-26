<?php
include 'class/user.php';

try{
  $user = User::connect($_POST);
}
catch(Exception $e){
  echo "User error : ".$e->getMessage();
}

echo User::find(1);