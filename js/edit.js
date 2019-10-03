$(document).on('click','#homebtn',function(e){

  window.location.assign('home.php');
  e.preventDefault();
});

$(document).on('click','#edit-fname',function(e){

  var fname= document.getElementById('fname').value;
  $.ajax({
    url: "edit_fname.php",
    data:{fname:fname},
    type:"POST"

  })
  .done(
    function(data){
      if(data=="success"){
         window.location.reload();
      }else{
        alert("Error occured " +data);
      }
    }
  );
  e.preventDefault();
});

$(document).on('click','#edit-lname',function(e){

  var lname= document.getElementById('lname').value;
  $.ajax({
    url: "edit_lname.php",
    data:{lname:lname},
    type:"POST"

  })
  .done(
    function(data){
      if(data=="success"){
         window.location.reload();
      }else{
        alert("Error occured " +data);
      }
    }
  );
  e.preventDefault();
});


$(document).on('click','#edit-email',function(e){

  var email= document.getElementById('email-edit').value;
  alert(email);
  $.ajax({
    url: "edit_email.php",
    data:{email:email},
    type:"POST"

  })
  .done(
    function(data){
      if(data=="success"){
         window.location.reload();
      }else{
        alert("Error occured " +data);
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
         window.location.reload();
      }else{
        alert("Error occured " +data);
      }
    }
  );
  e.preventDefault();
});
