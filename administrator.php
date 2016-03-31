<html>
  <body style = ' background-color: #FFFF99'>
    <?php
      include("menu_admin.html");
	  session_start();
      if ($_SESSION['logged_admin'] != true)
	  {
        header("location: login.php");
      }
    ?>
  </body>
</html>
