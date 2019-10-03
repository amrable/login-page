<?php
  session_start();

  if( !isset($_SESSION['email'])){
    header('Location: index.php');
  }else{
  }
?>

<?php include 'partials/header.php'; ?>


<div class="home description container">
  <h1>Current Data</h1>

  <table class="table">
    <tbody>
      <tr>
        <td>Full Name</td>
        <td><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?php echo $_SESSION['email']; ?></td>
      </tr>
      <tr>
        <td>Gender</td>
        <td><?php echo $_SESSION['gender']; ?></td>
      </tr>
    </tbody>
  </table>

  <button id="settings" class="btn btn-warning" type="button" name="button">Settings</button>
  <button id="logout" class="btn btn-outline-dark" type="button" name="button">Logout</button>
</div>


<?php include 'partials/footer.php'; ?>
