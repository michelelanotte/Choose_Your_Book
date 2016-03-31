<html>
  <head>
    <?php
	  @session_start();
      if ($_SESSION['logged_admin'] != true)
      {
	    header("location: login.php");
      }		
  	  include("menu_admin.html"); 
	?>
  </head>
  <body style = ' background-color: #FFFF99'> 
    <link rel = "stylesheet" href = "style_css.css" type = "text/css">
	<br>
	<div id = 'container_admin'>
	  <form action = 'availability_books.php' method = 'POST'>
	    <br>
	    <b> Inserire titolo del libro: </b>
	    <br>
	    <input size = 60 type = 'text' name = 'title'>
	    <br>
	    <br>
	    <b> Disponibile: </b>
	    <br>
	    <select style = ' width: 200px;' name = 'availability'>	
		  <option value = 1> Si </option>
		  <option value = 0> No </option>
	    </select>
	    <br>
	    <br>
	    <input style = 'background-color: #3366CC; color: white; font-weight: bold; width: 14em; height: 3em; border-radius: .9em;' 
		  type = 'submit' value = 'Invio'> 
	    <input style = 'background-color: #3366CC; color: white; font-weight: bold; width: 14em; height: 3em; border-radius: .9em;' 
	      type = 'button' value = 'Torna alla home' onclick = "location.href = 'administrator.php'"> 
	  </form>

	<?php
      include("connect_database.php");
	  if((@$_POST['title'] != ""))
	    {
	      $title = $_POST['title'];
	      $availability = $_POST['availability'];
		  
	 	  @$modify =  mysqli_query($conn,"UPDATE books SET Available = '$availability' WHERE Title = '$title'");	     
    	  $_POST['title'] = "";
          if($modify)	{	
	        echo "<h3 align = center style = 'color: red'> Modifica effettuata! </h3>";
		  }
		  else{
            echo "<h3 align = center style = 'color: red'> Errore! </h3>"; 
		  }
	    }
	    mysqli_close($conn);
?>
</body>
</html>