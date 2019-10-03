<?php

  if( isset( $_POST['gender'] )){

    $gender=$_POST['gender'];

    session_start();

    require 'connect_db.php';
    $id=$_SESSION['id'];

    $sql="UPDATE users
          SET gender='$gender'
          WHERE id='$id'";



    if($conn->query($sql)){
      echo 'success';
      $_SESSION['gender']=$gender;
    }else{
      echo "fail";
    }


  }

  else{
    echo "Error has occured";
  }

?>
