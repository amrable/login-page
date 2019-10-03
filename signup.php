<?php

  if( isset($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password'], $_POST['gender'] ) ){

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password= password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $gender=$_POST['gender'];

    require 'connect_db.php';

    $sql = "INSERT into users (`fname` , `lname`, `email`, `password` , `gender`)
            VALUES ( '$fname' , '$lname' , '$email', '$password', '$gender')";

    if($conn->query($sql)){
      session_start();
      $_SESSION['name']=$fname." ".$lname;
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
