$(document).on('click','#changepassbtn',function(e){
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
         alert("Succ");
      }else{
        alert("Wrong username or password " +data);
      }
    }
  );
  e.preventDefault();
});
