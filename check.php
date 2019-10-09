<?php

  if( !empty( $_POST['inemail']) && !empty($_POST['inpassword'])){
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

      $_SESSION['name']=$followingdata['name'];
      $_SESSION['username']=$followingdata['username'];
      $_SESSION['email']=$followingdata['email'];
      $_SESSION['gender']=$followingdata['gender'];
      $_SESSION['id']=$followingdata['id'];

      echo "success";
    }
    else {
        echo "Email or password are invalid.";
    }


  }else{
    if(empty( $_POST['inemail'])) echo"Fill the email field. <br>";
    if(empty( $_POST['inpassword'])) echo"Fill the password field.";
  }
?>
