<?php

  if(isset( $_POST['oldpass'], $_POST['newpass'], $_POST['confnewpass'] )){

    $oldpass=$_POST['oldpass'];
    $newpass=$_POST['newpass'];
    $confnewpass=$_POST['confnewpass'];

    session_start();
    $id=$_SESSION['id'];
    require 'connect_db.php';

    $sql = "SELECT *
            FROM users
            WHERE id='$id' limit 1";

    $res=$conn->query($sql);

    $followingdata = $res->fetch_array(MYSQLI_ASSOC);



    if (password_verify($oldpass, $followingdata['password'])) {
      //old password is valid
      if($newpass==$confnewpass){

        $hashed_new =password_hash($newpass, PASSWORD_DEFAULT);
        $sql="UPDATE users
              SET password='$hashed_new'
              WHERE id='$id'";

        if($conn->query($sql)){
          echo "success";
        }else{
          echo "Error";
        }



      }else{
        echo "passwords are not matched";
      }
    }
    else {
        echo "wrong old password";
    }

  }else{
    echo "Error occured";
  }
?>
