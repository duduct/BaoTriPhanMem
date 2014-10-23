<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script type="text/javascript">
$(document).ready(function() {



  $('#username').blur(function() {

    var username = $("#username").val();
 var dataString = 'username=' + username;
  
  alert(username);
  
 $.ajax({
  type: "POST",
  url: "/index.php/ajax/username_taken",
  data: dataString,
  success: function(msg) 
        {
   $("#status").html(msg);
  }
  });
  });  

});
  
  </script>
</head>

<body>


<form action="" method="post">
 username: <input type="text" id="username" /> <br /> 
</form>
<div id="status"></div>




</body>
</html> 