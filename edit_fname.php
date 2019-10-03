<?php

  if( isset( $_POST['fname'] )){

    $fname=$_POST['fname'];

    session_start();

    require 'connect_db.php';
    $id=$_SESSION['id'];

    $sql="UPDATE users
          SET fname='$fname'
          WHERE id='$id'";



    if($conn->query($sql)){
      echo 'success';
      $_SESSION['fname']=$fname;
    }else{
      echo "fail";
    }
  }

  else{
    echo "Error has occured";
  }

?>
