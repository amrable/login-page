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

  <button class="btn btn-outline-dark" id="homebtn" type="button" name="button">Home Page</button>
  <h1>Edit Data</h1>


  <table class="table">
    <tbody>
      <tr>
        <td> <label for="" >Name</label> </td>
        <td> <input  id="name" type="text" name="" value="<?php echo $_SESSION['name']; ?>"></td>
        <td> <button id="edit-name" style="margin-top:0;" class="btn btn-outline-info btn-block" type="button" name="button">Save name</button> </td>

      </tr>
        <tr>
          <td>Userame</td>
          <td> <input id="uname" type="text" name="" value="<?php echo $_SESSION['username']; ?>"></td>
          <td> <button id="edit-uname" style="margin-top:0;"  class=" btn btn-outline-info btn-block" type="button" name="button">Save username</button> </td>

        </tr>
      <tr>
        <td>Email</td>
        <td> <input type="text" id="email-edit" name="" value="<?php echo $_SESSION['email']; ?>"></td>
        <td> <button style="margin-top:0;"  id="edit-email" class=" btn btn-outline-info btn-block" type="button" name="button">Save email</button> </td>
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
        <input style="width:20px;" type="radio" name="gender-edit" <?php if($radio==0) echo "checked"; ?>  value="male"> <label for="">Male</label>
        <input style="width:20px;" type="radio" name="gender-edit" <?php if($radio==1) echo "checked"; ?>   value="female"> Female
        <input style="width:20px;" type="radio" name="gender-edit" <?php if($radio==2) echo "checked"; ?>   value="other"> Other
        </td>
        <td> <button  id="edit-gender" style="margin-top:0;"  class="btn btn-outline-info btn-block" type="button" name="button">Save gender</button> </td>

      </tr>
    </tbody>
  </table>

  <div id="success" class="alert alert-success hidden" role="alert">
    This is a success alert—check it out!
  </div>

  <div id="fail"class="alert alert-danger" role="alert">
    <p id="fail-edit-content"></p>
  </div>
  <button class="btn btn-outline-danger" type="button" id="changepassbtn" name="button">Change Password</button>
  <button class="btn btn-outline-danger"type="button" id="delete" name="button">Delete Account</button>
</div>
<?php include 'partials/footer.php'; ?>
