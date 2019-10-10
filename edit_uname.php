<?php

  if( !empty( $_POST['uname'] )){

    $uname=$_POST['uname'];

    session_start();

    require 'connect_db.php';
    $id=$_SESSION['id'];

    $sql="UPDATE users
          SET username='$uname'
          WHERE id='$id'";



    if($conn->query($sql)){
      echo 'success';
      $_SESSION['username']=$uname;
    }else{
      echo "This username is already taken.";
    }


  }

  else{
    echo "You have to set a value for the username";
  }

?>
