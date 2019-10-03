$(document).on('click','#delete',function(e){

  var email = document.getElementById('email').value;
  $.ajax({
    url: "delete.php",
  })
  .done(
    function(data){

      if(data=="success"){
         window.location.assign("index.php");
      }else{
        alert("Error occured" +data);
      }
    }
  );
  e.preventDefault();
});
