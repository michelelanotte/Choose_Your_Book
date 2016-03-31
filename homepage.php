<html>
  <body style = ' background-color: #FFFF99'>
    <?php
      include("menu_user.html");
	  session_start();
      if ($_SESSION['logged_user'] != true)
	  {
        header("location: login.php");
      }
    ?>
  </body>
</html>
