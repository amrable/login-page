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
        <td> <label for="" >First Name</label> </td>
        <td> <input  type="text" name="" value=" <?php echo $_SESSION['fname']; ?>"></td>
        <td> <button style="margin-top:0;" class="btn btn-outline-info btn-block" type="button" name="button">Save first name</button> </td>

      </tr>
        <tr>
          <td>Second Name</td>
          <td> <input type="text" name="" value=" <?php echo $_SESSION['lname']; ?>"></td>
          <td> <button style="margin-top:0;"  class=" btn btn-outline-info btn-block" type="button" name="button">Save second name</button> </td>

        </tr>
      <tr>
        <td>Email</td>
        <td> <input type="text" id="email" name="" value=" <?php echo $_SESSION['email']; ?>"></td>
        <td> <button style="margin-top:0;"  class=" btn btn-outline-info btn-block" type="button" name="button">Save email</button> </td>
      </tr>
      <tr>
        <td>Gender</td>
        <?php $gender=$_SESSION['gender'];
          $radio=0;
          if($gender=="male") $radio=0;
          else if($gender=="female") $radio=1;
          else $radio=2;

         ?>
        <td>
        <input style="width:20px;" type="radio" name="gender" <?php if($radio==0) echo "checked"; ?>  value="male"> <label for="">Male</label>
        <input style="width:20px;" type="radio" name="gender" <?php if($radio==1) echo "checked"; ?>   value="female"> Female
        <input style="width:20px;" type="radio" name="gender" <?php if($radio==2) echo "checked"; ?>   value="other"> Other
        </td>
        <td> <button style="margin-top:0;"  class="btn btn-outline-info btn-block" type="button" name="button">Save gender</button> </td>

      </tr>
    </tbody>
  </table>
  <button class="btn btn-danger" type="button" name="button">Change Password</button>
  <button class="btn btn-outline-danger"type="button" id="delete" name="button">Delete Account</button>
</div>
<?php include 'partials/footer.php'; ?>
