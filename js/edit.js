$("#success").hide();
$("#fail").hide();
$(document).on('click','#homebtn',function(e){

  window.location.assign('home.php');
  e.preventDefault();
});
$(document).on('click','#changepassbtn',function(e){

  window.location.assign('change_password.php');
  e.preventDefault();
});

$(document).on('click','#settingsbtn',function(e){

  window.location.assign('settings.php');
  e.preventDefault();
});


$(document).on('click','#edit-name',function(e){

  var name= document.getElementById('name').value;

  if(name === ""){
    $('#name').css("border","2px solid red");
  }else{
    $('#name').css("border","1px solid #cccccc");
  }
  $.ajax({
    url: "edit_name.php",
    data:{name:name},
    type:"POST"

  })
  .done(
    function(data){
      if(data=="success"){
         $("#success").show();
         $("#fail").hide();

      }else{
         $("#success").hide();
         $("#fail").show();
         document.getElementById("fail-edit-content").innerHTML = data;


      }
    }
  );

  e.preventDefault();
});


$(document).on('click','#edit-uname',function(e){

  var uname= document.getElementById('uname').value;

  if(uname === ""){
    $('#uname').css("border","2px solid red");
  }else{
    $('#uname').css("border","1px solid #cccccc");
  }
    $.ajax({
      url: "edit_uname.php",
      data:{uname:uname},
      type:"POST"

    })
    .done(
      function(data){
        if(data=="success"){
           $("#success").show();
           $("#fail").hide();
        }else{
           $("#success").hide();
           $("#fail").show();
           document.getElementById("fail-edit-content").innerHTML = data;

        }
      }
    );


  e.preventDefault();
});


$(document).on('click','#edit-email',function(e){

  var email= document.getElementById('email-edit').value;

  if(email === ""){
    $('#email-edit').css("border","2px solid red");
  }else{
    $('#email-edit').css("border","1px solid #cccccc");
  }


  $.ajax({
    url: "edit_email.php",
    data:{email:email},
    type:"POST"

  })
  .done(
    function(data){
      if(data=="success"){
         $("#success").show();
         $("#fail").hide();
      }else{
         $("#success").hide();
         $("#fail").show();
         document.getElementById("fail-edit-content").innerHTML = data;

      }
    }
  );
  e.preventDefault();
});


$(document).on('click','#edit-gender',function(e){

  var gender="";
  var ele = document.getElementsByName('gender-edit');

  for(i = 0; i < ele.length; i++) {
     if(ele[i].checked) gender = ele[i].value;
  }


  $.ajax({
    url: "edit_gender.php",
    data:{gender:gender},
    type:"POST"

  })
  .done(
    function(data){
      if(data=="success"){
         $("#success").show();
         $("#fail").hide();
      }else{
         $("#success").hide();
         $("#fail").show();
      }
    }
  );
  e.preventDefault();
});
