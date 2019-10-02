<?php

  $dbname="login";
  $dbusername="root";
  $dbpassword="i4m_GOOD";
  $dbserver="localhost";

  $conn =mysqli( $dbserver , $dbusername , $dbpassword , $dbname );

  if($conn->connect_error){
    die("Cannot connect to database");
  }
?>
