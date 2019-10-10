
$("#success_pass").hide();
$("#fail_pass").hide();


$(document).on('click','#changepass',function(e){
  var data = new FormData(document.getElementById('changepassform'));
  var oldpass= document.getElementById('oldpass').value;
  var newpass= document.getElementById('newpass').value;
  var confnewpass= document.getElementById('confnewpass').value;

  if(oldpass === ""){
    $('#oldpass').css("border","2px solid red");
  }else{
    $('#oldpass').css("border","1px solid #cccccc");
  }
  if(newpass === ""){
    $('#newpass').css("border","2px solid red");
  }else{
    $('#newpass').css("border","1px solid #cccccc");
  }
  if(confnewpass === ""){
    $('#confnewpass').css("border","2px solid red");
  }else{
    $('#confnewpass').css("border","1px solid #cccccc");
  }

  $.ajax({
    url: "change_password_check.php",
    data: data,
    type: "POST",
    async: false,
    processData: false,
    contentType: false,
  })
  .done(
    function(data){
      if(data=="success"){
        $("#success_pass").show();
        $("#fail_pass").hide();
      }else{
        $("#success_pass").hide();
        $("#fail_pass").show();
        document.getElementById("failcontent").innerHTML = data;

      }
    }
  );
  e.preventDefault();
});
