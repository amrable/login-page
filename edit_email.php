<?php

  if( isset( $_POST['email'] )){

    $email=$_POST['email'];

    session_start();

    require 'connect_db.php';
    $id=$_SESSION['id'];

    $sql="UPDATE users
          SET email='$email'
          WHERE id='$id'";



    if($conn->query($sql)){
      echo 'success';
      $_SESSION['email']=$email;
    }else{
      echo "fail";
    }


  }

  else{
    echo "Error has occured";
  }

?>
