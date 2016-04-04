<html>
  <head>   
	<?php
	  @session_start();
      if ($_SESSION['logged_admin'] != true) {
	    header("location: ../login.php");
      }		
      
	  include("menu_admin.html");
    ?>
		
	<link rel = "stylesheet" href = "../css/style_admin.css" type = "text/css">
	<meta name = 'viewport' content = 'width = device-width, initial-scale = 1.0'> 
  </head>
  
  <body class = 'body'>
	<br>
	<div class = 'container_admin'>
	  <form action = 'add_book.php' method = 'POST'>	    
	    <b> Inserire titolo del libro: </b>
		<br>
		<input size = 60 type = 'text' name = 'title'>
        <br>
        <br>
        <b>	Inserire nome dell'autore: </b>
        <br>
     	<input size = 60 type = 'text' name = 'author'>
        <br>
        <br>
        <b>	Inserire data di pubblicazione: </b>
        <br>
     	<select class = 'yearSelection' name = 'year'>
		  <option value = 'default' select = 'selected'></option>	
          <?php
		    for($i = 1950; $i < 2017; $i++)
			{
			echo "<option value = " . $i . ">" . $i . "</option>";	
			}
		    echo "</select>";
		  ?>
		</select>
        <br>
        <br>
		<input class = 'submit' type = 'submit' value = 'Invio'> 
		<input class = 'returnHomepageAdmin' type = 'button' value = 'Torna alla home' onclick = "location.href = 'administrator.php'"> 
	  </form>
      
	  <?php
        include("../connect_database.php");
	    if((@$_POST['title'] != "") && (@$_POST['author'] != "")) {
	      @$title = $_POST['title'];
	      @$author = $_POST['author'];
		  @$date = $_POST['year'];
		
	 	  @$insert =  mysqli_query($conn,"INSERT INTO books (Title,Author,Year_publication,Available) 
		      VALUES ('$title','$author','$date', 1)");	 
     
    	  $_POST['title'] = "";
          $_POST['author'] = "";
          if($insert) {	
	        echo "<h3 align = center style = 'color: red'> Libro inserito! </h3>";
		  }
		  else {
            echo "<h3 align = center style = 'color: red'> Libro gi&agrave presente! </h3>"; 
		  }
	    }
	    mysqli_close($conn);
      ?>
	  
    </div>
  </body>
</html>

