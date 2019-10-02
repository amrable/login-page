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
