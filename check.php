<?php

  if( isset( $_POST['inemail'] , $_POST['inpassword'])){
    $email= $_POST['inemail'] ;
    $password= $_POST['inpassword'] ;

    require 'connect_db.php';

    $sql = "SELECT *
            FROM users
            WHERE email='$email' limit 1";

    $res=$conn->query($sql);

    $followingdata = $res->fetch_array(MYSQLI_ASSOC);


    if (password_verify($password, $followingdata['password'])) {
      session_start();

      $_SESSION['name']=$followingdata['fname']." ".$followingdata['lname'];
      $_SESSION['fname']=$followingdata['fname'];
      $_SESSION['lname']=$followingdata['lname'];
      $_SESSION['email']=$followingdata['email'];
      $_SESSION['gender']=$followingdata['gender'];
      $_SESSION['id']=$followingdata['id'];

      echo "success";
    }
    else {
        echo "not found";
    }


  }else{
    echo "error";
  }
?>
