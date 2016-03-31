<html>
  <head>
    <?php
	  @session_start();
	  if ($_SESSION['logged_user'] != true)
	  {
	    header("location: login.php");
	  }
	  include("menu_user.html"); 
    ?>
  </head>
  <body style = ' background-color: #FFFF99'> 
<?php
  //quando prenoto un libro, impostare disponibilità su false e memorizzare titolo del libro nell array associativo dell'utente  
  
  

?>