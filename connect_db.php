<?php

  $dbname="fish";
  $dbusername="root";
  $dbpassword="i4m_GOOD";
  $dbserver="localhost";

  $conn =new mysqli( $dbserver , $dbusername , $dbpassword , $dbname );

  if($conn->connect_error){
    die("Cannot connect to database");
  }
?>
