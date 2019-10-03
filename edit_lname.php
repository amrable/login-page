<?php

  if( isset( $_POST['lname'] )){

    $lname=$_POST['lname'];

    session_start();

    require 'connect_db.php';
    $id=$_SESSION['id'];

    $sql="UPDATE users
          SET lname='$lname'
          WHERE id='$id'";



    if($conn->query($sql)){
      echo 'success';
      $_SESSION['lname']=$lname;
    }else{
      echo "fail";
    }


  }

  else{
    echo "Error has occured";
  }

?>
