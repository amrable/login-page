// Check male radio initially
$("#radio_1").prop("checked", true);

// Hide error messages initially
$("#fail_login").hide();
$("#fail_signup").hide();

// Submitting forms

$(document).on('click','#signin',function(e){
  var data = new FormData(document.getElementById('signinform'));

  var email=$('#login-email');
  var password=$('#login-password');

  if(email.val()===""){
    email.css("border","2px solid red");
  }else{
    email.css("border","1px solid #aaa");
  }
  if(password.val()===""){
    password.css("border","2px solid red");
  }else{
    password.css("border","1px solid #aaa");
  }

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
        $("#fail_login").show();
        document.getElementById("fail_login_content").innerHTML = data;
      }
    }
  );
  e.preventDefault();
});



$(document).on('click','#signup',function(e){
  var data = new FormData(document.getElementById('signupform'));
  var email= validateEmail(document.getElementById('signupemail').value,'email_check') ;
  var password= CheckPasswordStrength(document.getElementById('txtPassword').value) ;
  var name= document.getElementById('name-signup').value !=="" ;
  var username= document.getElementById('username-signup').value !=="" ;
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


  if( email && confpassword && password && terms && name && username ){
    $('#signupemail').css("border","1px solid #aaa");
    $('#confpassword').css("border","1px solid #aaa");
    $('#txtPassword').css("border","1px solid #aaa");
    $('#name-signup').css("border","1px solid #aaa");
    $('#username-signup').css("border","1px solid #aaa");


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

          alert(data);


        }
      }
    );

  }else{
    if( !email ){
      $('#signupemail').css("border","2px solid red");

    }else{
      $('#signupemail').css("border","1px solid #aaa");

    }
    if( !confpassword ){
      $('#confpassword').css("border","2px solid red");


    }else{
      $('#confpassword').css("border","1px solid #aaa");

    }

    if( !password ){
      $('#txtPassword').css("border","2px solid red");

    }else{
      $('#txtPassword').css("border","1px solid #aaa");

    }

    if( !name ){
      $('#name-signup').css("border","2px solid red");

    }else{
      $('#name-signup').css("border","1px solid #aaa");

    }

    if( !username ){
      $('#username-signup').css("border","2px solid red");

    }else{
      $('#username-signup').css("border","1px solid #aaa");

    }

  }

  e.preventDefault();
});

// Handling wrong submissions
$(document).on('click',"#checkbox" , function(e){

  if ($('#checkbox').is(":checked")){
    terms=true;
    document.getElementById("terms_check").innerHTML = "";
  }else{
    document.getElementById("terms_check").innerHTML = "Unchecked";
    document.getElementById("terms_check").style.color = "red";
  }
});

function notempty(text , id){

  if(text === "" ){
    $(id).css("border","2px solid red");
  }else{
    $(id).css("border","1px solid #aaa");
  }
}

function validateEmail(email , email_span , email_border) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  var email_check = document.getElementById(email_span);
  var strength = "";
  var state=false;
  if(re.test(email)){
    $('#'+email_span).css("color","green");
    strength="Valid";
    $('#'+email_border).css("border","1px solid #aaa");

    state=true;
  }else{
    $('#'+email_span).css("color","red");
    strength="Invalid";
  }
  email_check.innerHTML = strength;

  return state;
}

function matchpassword(password){

  if(password==="")return false;
  var first_password = document.getElementById("txtPassword").value;
  var sec_password = document.getElementById("password_match");

  var color = "";
  var strength = "";
  var state_pass=false;
  if(password===first_password){
    color="green";
    strength="Match";
    $('#confpassword').css("border","1px solid #aaa");

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
            $('#txtPassword').css("border","1px solid #aaa");

            state_conf=true;
            break;
        case 3:
        case 4:
            strength = "Strong";
            color = "green";
            $('#txtPassword').css("border","1px solid #aaa");

            state_conf=true;
            break;
        case 5:
            strength = "Very Strong";
            color = "darkgreen";
            $('#txtPassword').css("border","1px solid #aaa");

            state_conf=true;
            break;
    }
    password_strength.innerHTML = strength;
    password_strength.style.color = color;
    return state_conf;
}
