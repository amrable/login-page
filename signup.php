<?php

  if( isset($_POST['name'], $_POST['uname'], $_POST['email'], $_POST['password'], $_POST['gender'] ) ){

    $name=$_POST['name'];
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    $password= password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gender=$_POST['gender'];

    require 'connect_db.php';

    $sql = "INSERT into users (`name` , `username`, `email`, `password` , `gender`)
            VALUES ( '$name' , '$uname' , '$email', '$password', '$gender')";

    if($conn->query($sql)){
      session_start();
      $_SESSION['name']=$name;
      $_SESSION['username']=$uname;
      $_SESSION['email']=$email;
      $_SESSION['gender']=$gender;
      $_SESSION['id']=$conn->insert_id;;

      echo "success";
    }else{
      echo "fail";
    }
  }else{
    echo "Erros has occured";
  }


?>
