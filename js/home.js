$(document).on('click','#logout',function(e){

  $.ajax({
    url: "logout.php"
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

$(document).on('click','#settings',function(e){

  window.location.assign("settings.php");
  e.preventDefault();
});
