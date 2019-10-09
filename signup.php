<?php

  if( !empty($_POST['name']) && !empty($_POST['uname']) && !empty($_POST['email']) && !empty($_POST['confpassword']) &&  !empty($_POST['password']) &&  !empty($_POST['gender']) ){

    $name=$_POST['name'];
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    $password= password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gender=$_POST['gender'];

    $errors = array();

    if($_POST['confpassword'] != $_POST['password']){
      array_push($errors, "Not matched passwords");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      array_push($errors, "Invalid email format");
    }



    require 'connect_db.php';

    $sql ="SELECT * from users";
    $res=$conn->query($sql);

    $foundemail= false;
    $foundusername = false ;

    while($value = $res->fetch_assoc()) {
      if($value['username']==$uname) $foundusername=true;
      if($value['email']==$email) $foundemail=true;
    }


    if($foundemail){
      array_push($errors, "This email is already taken");

    }

    if($foundusername){
      array_push($errors, "This username is already taken");

    }

    $rows=count($errors);
    if ($rows==0) {
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
        echo "Try again";
      }
    }else{
      foreach($errors as $result) {
          echo $result.'<br>';
      }
    }

  }else{
    if(empty( $_POST['name'])) echo"Fill the Name field. <br>";
    if(empty( $_POST['uname'])) echo"Fill the Username field. <br>";
    if(empty( $_POST['email'])) echo"Fill the Email field. <br>";
    if(empty( $_POST['password'])) echo"Fill the Matching string passwords field. <br>";
    if(empty( $_POST['gender'])) echo"Specify a gender. <br>";


  }


?>
