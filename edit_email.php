<?php

  if( !empty( $_POST['email'] )){

    $email=$_POST['email'];


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid email format";
    }else{
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
        echo "This email is already taken.";
      }

    }



  }

  else{
    echo "Set value for the Email.";
  }

?>
