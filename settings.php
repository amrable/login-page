<?php

  session_start();


  if( !isset($_SESSION['email'])){
    header('Location: index.php');
  }else{
    require 'connect_db.php';
    $email=$_SESSION['email'];
    $sql = "SELECT *
            FROM users
            WHERE email='$email'limit=1 ";
    $res=$conn->query($sql);
  }

?>

<?php include 'partials/header.php'; ?>

<div class="home description container">
  <h1>Edit Data</h1>
  

  <table class="table">
    <tbody>
      <tr>
        <td>Full Name</td>
        <td> <input type="text" name="" value=" <?php echo $_SESSION['name']; ?>"></td>
      </tr>
      <tr>
        <td>Email</td>
        <td> <input type="text" id="email" name="" value=" <?php echo $_SESSION['email']; ?>"></td>
      </tr>
      <tr>
        <td>Gender</td>
        <td><?php echo $_SESSION['gender']; ?></td>
      </tr>
    </tbody>
  </table>
  <button class="btn btn-info" type="button" name="button">Save Current Data</button>
  <button class="btn btn-danger" type="button" name="button">Change Password</button>
  <button class="btn btn-outline-danger"type="button" id="delete" name="button">Delete Account</button>
</div>
<?php include 'partials/footer.php'; ?>
