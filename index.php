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
            <form id="signinform" class="" action="index.html" method="post">
              <label for="">Email</label>
              <input placeholder="email" required type="email" name="inemail" value="">
              <br>
              <label for="">Password</label>
              <input autocomplete="off" type="password" placeholder="password" name="inpassword" value="">
            </form>
            <button id="signin"class="btn btn-primary"type="button" name="button">Sign in</button>
          </div>
          <hr class="style-one">

          <div class="card">
            <h3>Sign up</h3>

            <form class="" action="index.html" method="post">

              <label for="">First Name</label>
              <small>*Required</small> <br>
              <input type="text" name="" value=""> <br>

              <label for="">Last Name</label> <br>
              <input type="text" name="" value=""> <br>

              <label for="">E-mail</label>
              <small>*Required</small> <br>
              <input type="Emails" name="" value=""> <br>

              <label for="">Password</label>
              <small>*Required</small> <br>
              <input  autocomplete="off" type="password" name="" value=""> <br>

              <label for="">Confirm Password</label>
              <small>*Required</small> <br>
              <input autocomplete="off" type="password" name="" value=""> <br>

              <label for="">Gender</label>
              <small>*Required</small> <br>
              <input style="width:20px;" type="radio" name="gender" value="male"> <label for="">Male</label>
              <input style="width:20px;" type="radio" name="gender" value="female"> Female
              <input style="width:20px;" type="radio" name="gender" value="other"> Other


              <br>
              <input style="width:20px;" type="checkbox" name="" value="">

              <small>*Accepted terms and condtitions</small>
            </form>
            <button class="btn btn-outline-primary"type="button" name="button">Sign up</button>
          </div>


        </div>
      </div>
    </div>

  </section>



  <?php include 'partials/footer.php'; ?>
