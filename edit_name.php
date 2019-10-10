<?php

  if( !empty( $_POST['name'] )){

    $name=$_POST['name'];

    session_start();

    require 'connect_db.php';
    $id=$_SESSION['id'];

    $sql="UPDATE users
          SET name='$name'
          WHERE id='$id'";



    if($conn->query($sql)){
      echo 'success';
      $_SESSION['name']=$name;
    }else{
      echo "fail";
    }
  }

  else{
    echo "You have to set a value for the name.";
  }

?>
