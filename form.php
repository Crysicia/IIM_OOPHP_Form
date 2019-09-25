<?php
include 'class/user.php';
//include 'db_connect.php';

try{
  $user = new User($_POST);
}
catch(Exception $e){
  echo "User error : ".$e->getMessage();
}