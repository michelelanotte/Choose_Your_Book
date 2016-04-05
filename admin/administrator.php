<html>
  <head>
    <link rel = "stylesheet" href = "../css/style_admin.css" type = "text/css">
  </head>
  
  <body>
    
	<?php
      include("menu_admin.html");
	  session_start();
      if ($_SESSION['logged_admin'] != true) {
        header("location: ../login.php");
      }
    ?>
	
  </body>
</html>
