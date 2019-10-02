<?php

  if( isset( $_POST['inemail'] , $_POST['inpassword'])){
    $email= $_POST['inemail'] ;
    $password= $_POST['inpassword'] ;

    require 'connect_db.php';

    $sql = "SELECT *
            FROM users";

    $res=$conn->query($sql);

    if($res->num_rows>0){
      session_start();
      foreach ($res as $key => $value) {
        $_SESSION['name']=$value['fname']." ",$value['lname'];
        $_SESSION['email']=$value['email'];
        $_SESSION['gender']=$value['gender'];

      }
      echo "success";
    }else{
      echo "not found";
    }
  }else{
    echo "error";
  }
?>
