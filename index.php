<?php include 'partials/header.php'; ?>

  <section class="body">


    <div class="container">
      <div class="row">
        <div class="col-md left">
          <h1>Control over the world !</h1>
          <h5 class="description">Connect Fish helps you to manipulate datasets, sign up to know more.</h5>
          <div class="center-img">
            <img class="myimg"  src="images/database.png" alt="">
          </div>
        </div>
        <div class="col-md form">
          <div class="card">
            <h3>Sign in</h3>

            <div id="fail_login" class="alert alert-danger" role="alert">
              <p id="fail_login_content"></p>
            </div>
            <form id="signinform" class="" action="index.html" method="post">
              <label for="">Email</label>
              <input placeholder="email" required type="email" name="inemail" value="" id="login-email" onkeyup="validateEmail(this.value,'email_check_login','login-email')"><span id="email_check_login"></span>
              <br>
              <label for="">Password</label>
              <input autocomplete="off" type="password" required placeholder="password" name="inpassword" value="" id="login-password"  onkeyup="notempty(this.value,'#login-password')">
            </form>
            <button id="signin"class="btn btn-primary"type="button" name="button">Sign in</button>
          </div>
          <hr class="style-one">

          <div class="card">
            <h3>Sign up</h3>
            <div id="fail_signup" class="alert alert-danger" role="alert">
              <p id="fail_signup_content"></p>
            </div>
            <form id="signupform" class="" action="index.html" method="post">

              <label for="">Name</label>
              <small>*Required</small> <br>
              <input type="text" name="name" value="" id="name-signup" onkeyup="notempty(this.value,'#name-signup')"> <span id="name-span"></span><br>

              <label for="">Username</label>
              <small>*Required</small> <br>
              <input type="text" name="uname" value="" id="username-signup" onkeyup="notempty(this.value,'#username-signup')"> <span id="username-span"></span> <br>

              <label for="">E-mail</label>
              <small>*Required</small> <br>
              <input type="Emails" name="email" value="" id="signupemail" onkeyup="validateEmail(this.value,'email_check','signupemail')"><span id="email_check"></span> <br>

              <label for="">Password</label>
              <small>*Required</small> <br>
              <input  autocomplete="off" type="password" id="txtPassword" onkeyup="CheckPasswordStrength(this.value)" name="password" value=""> <span id="password_strength"></span><br>

              <label for="">Confirm Password</label>
              <small>*Required</small> <br>
              <input autocomplete="off" type="password" id="confpassword"name="" value="" onkeyup="matchpassword(this.value)" ><span id="password_match"></span> <br>

              <label for="">Gender</label>
              <small>*Required</small> <br>
              <input style="width:20px;" type="radio" name="gender" id="radio_1" value="male"> <label for="">Male</label>
              <input style="width:20px;" type="radio" name="gender" value="female"> Female
              <input style="width:20px;" type="radio" name="gender" value="other"> Other
              <span id="gender_check"></span>

              <br>
              <input style="width:20px;" id="checkbox" type="checkbox" name="" value="">

              <small>*Accepted terms and condtitions</small>
              <span id="terms_check"></span>
            </form>
            <button id="signup" class="btn btn-outline-primary"type="button" name="button">Sign up</button>
          </div>


        </div>
      </div>
    </div>

  </section>



  <?php include 'partials/footer.php'; ?>
