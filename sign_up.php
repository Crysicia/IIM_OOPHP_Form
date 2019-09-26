<?php
include 'class/user.php';

try{
  //$user = new User($_POST);
}
catch(Exception $e){
  echo "User error : ".$e->getMessage();
}


print_r(User::findAll());
print_r(User::find(4));