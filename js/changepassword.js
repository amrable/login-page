
$("#success_pass").hide();
$("#fail_pass").hide();


$(document).on('click','#changepass',function(e){
  var data = new FormData(document.getElementById('changepassform'));

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
