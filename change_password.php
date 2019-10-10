<?php
  session_start();

  if( !isset($_SESSION['email'])){
    header('Location: index.php');
  }else{
  }
?>

<?php include 'partials/header.php'; ?>


<div class="home description container">

  <button class="btn btn-outline-dark" id="settingsbtn" type="button" name="button">Settings Page</button>
  <h1>Change Password</h1>


  <form id="changepassform" class="" action="index.html" method="post">

    <table class="table">
      <tbody>
        <tr>
          <td> <label for="" >Old Password</label> </td>
          <td> <input  id="oldpass" type="password" name="oldpass" value=""></td>

        </tr>
          <tr>
            <td>New Password</td>
            <td> <input id="newpass" type="password" name="newpass" value=""></td>

          </tr>
        <tr>
          <td>Confirm New Password</td>
          <td> <input type="password" id="confnewpass" name="confnewpass" value=""></td>
        </tr>

      </tbody>
    </table>
  </form>

  <div id="success_pass" class="alert alert-success " role="alert">
    This is a success alert—check it out!
  </div>

  <div id="fail_pass"class="alert alert-danger" role="alert">
    <h5 id="failcontent"></h5>
  </div>
  <button class="btn btn-outline-info" type="button" id="changepass" name="button">Save</button>

</div>

<?php include 'partials/footer.php'; ?>
