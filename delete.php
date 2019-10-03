<?php

  session_start();

  $id = $_SESSION['id'];
  require 'connect_db.php';
  $sql = "DELETE from users where id = '$id'";

  if($conn->query($sql)){
    echo "success";
    session_destroy();
  }else{
    echo "fail";
  }


?>
