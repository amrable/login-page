<?php include 'partials/header.php'; ?>


<div class="home description container">

  <button class="btn btn-outline-dark" id="settingsbtn" type="button" name="button">Settings Page</button>
  <h1>Change Password</h1>


  <form id="changepassform" class="" action="index.html" method="post">

    <table class="table">
      <tbody>
        <tr>
          <td> <label for="" >Old Password</label> </td>
          <td> <input  id="oldpass" type="text" name="oldpass" value=""></td>

        </tr>
          <tr>
            <td>New Password</td>
            <td> <input id="newpass" type="text" name="newpass" value=""></td>

          </tr>
        <tr>
          <td>Confirm New Password</td>
          <td> <input type="text" id="confnewpass" name="confnewpass" value=""></td>
        </tr>

      </tbody>
    </table>
  </form>

  <button class="btn btn-outline-info" type="button" id="changepassbtn" name="button">Save</button>

</div>

<?php include 'partials/footer.php'; ?>
