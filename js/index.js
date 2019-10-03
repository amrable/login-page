$("#radio_1").prop("checked", true);

$(document).on('click','#signin',function(e){
  var data = new FormData(document.getElementById('signinform'));

  $.ajax({
    url: "check.php",
    data: data,
    type: "POST",
    async: false,
    processData: false,
    contentType: false,
  })
  .done(
    function(data){
      if(data=="success"){
         window.location.assign("home.php");
      }else{
        alert("Wrong username or password" +data);
      }
    }
  );
  e.preventDefault();
});

$(document).on('click','#signup',function(e){
  var data = new FormData(document.getElementById('signupform'));
  var email= validateEmail(document.getElementById('signupemail').value) ;
  var password= CheckPasswordStrength(document.getElementById('txtPassword').value) ;
  var confpassword= matchpassword(document.getElementById('confpassword').value);
  var gender= $('input[name=gender]:checked').val();
  var terms=false;
  if ($('#checkbox').is(":checked")){
    terms=true;
    document.getElementById("terms_check").innerHTML = "";
  }else{
    document.getElementById("terms_check").innerHTML = "Unchecked";
    document.getElementById("terms_check").style.color = "red";
  }


  if( email && confpassword && password && terms){

    $.ajax({
      url: "signup.php",
      data: data,
      type: "POST",
      async: false,
      processData: false,
      contentType: false,
    })
    .done(
      function(data){
        if(data=="success"){
           window.location.assign("home.php");
        }else{
          alert("Wrong username or password" +data);
        }
      }
    );

  }

  e.preventDefault();
});


function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  var email_check = document.getElementById("email_check");
  var color = "";
  var strength = "";
  var state=false;
  if(re.test(email)){
    color="green";
    strength="Valid";
    state=true;
  }else{
    color="red";
    strength="Invalid";
  }
  email_check.innerHTML = strength;
  email_check.style.color = color;
  return state;
}

function matchpassword(password){
  var first_password = document.getElementById("txtPassword").value;
  var sec_password = document.getElementById("password_match");

  var color = "";
  var strength = "";
  var state_pass=false;
  if(password===first_password){
    color="green";
    strength="Match";
    state_pass=true;
  }else{
    color="red";
    strength="Don't match";
  }
  sec_password.innerHTML = strength;
  sec_password.style.color = color;
  return state_pass;
}


function CheckPasswordStrength(password) {
    var password_strength = document.getElementById("password_strength");

    //TextBox left blank.
    if (password.length == 0) {
        password_strength.innerHTML = "Weak";
        password_strength.style.color = "red";
        return;
    }

    //Regular Expressions.
    var regex = new Array();
    regex.push("[A-Z]"); //Uppercase Alphabet.
    regex.push("[a-z]"); //Lowercase Alphabet.
    regex.push("[0-9]"); //Digit.
    regex.push("[$@$!%*#?&]"); //Special Character.

    var passed = 0;

    //Validate for each Regular Expression.
    for (var i = 0; i < regex.length; i++) {
        if (new RegExp(regex[i]).test(password)) {
            passed++;
        }
    }

    //Validate for length of Password.
    if (passed > 2 && password.length > 8) {
        passed++;
    }

    //Display status.
    var color = "";
    var strength = "";
    var state_conf=false;

    switch (passed) {
        case 0:
        case 1:
            strength = "Weak";
            color = "red";
            state_conf=false;
            break;
        case 2:
            strength = "Good";
            color = "darkorange";
            state_conf=true;
            break;
        case 3:
        case 4:
            strength = "Strong";
            color = "green";
            state_conf=true;
            break;
        case 5:
            strength = "Very Strong";
            color = "darkgreen";
            state_conf=true;
            break;
    }
    password_strength.innerHTML = strength;
    password_strength.style.color = color;
    return state_conf;
}
