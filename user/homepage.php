<html>
  <head>
    <link rel = "stylesheet" href = "../css/style_user.css" type = "text/css">
  <body>
    <?php
      include("menu_user.html");
	  session_start();
      if ($_SESSION['logged_user'] != true) {
        header("location: ../login.php");
      }
    ?>
  </body>
</html>
