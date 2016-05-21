<?php
  @session_start();
  if ($_SESSION['logged_admin'] != true) {
	header("location: ../login.php");
  }	
  include("menu_admin.html");
?>	
<html>
  <head>
	<link rel="stylesheet" href="../css/style_admin.css" type="text/css">
	<meta name="viewport" content="width = device-width, initial-scale=1.0">
  </head>
  
  <body class="display" style="background-color: #E6E6FA;">
	<br>
	<div class="container_admin">
	  <form action= <?php echo $_SERVER['PHP_SELF'] ?> method="POST">
		<b> Inserire titolo del libro da eliminare: </b>
		<br>
		<input style="outline: none; border-width: 1px; width: 20em; height: 2.5em; border-radius: .5em;" type="text" name="title" placeholder="Titolo">
        <br>
        <br>
		<input style="outline: none; border-width: 1px; background-color: #3366CC; color: white; font-weight: bold; width: 14em; height: 3em; border-radius: .9em;" 
		    type="submit" name="submit" value="Invio"> 
		<input style="outline: none; margin: 2px 0px 0px 0px; border-width: 1px; background-color: #3366CC; color: white; 
		    font-weight: bold; width: 14em; height: 3em; border-radius: .9em;" type="button" value="Torna alla home" 
			  onclick="location.href='administrator.php'"> 
		</form>
	  
        <?php
		  include("../connect_database.php");
		  if(isset($_POST['submit'])) {
            @$title = ucfirst(trim(mysqli_real_escape_string($conn, $_POST['title'])));
		    if((@$_POST['title'] != "")) {
	          $query = mysqli_query($conn, "SELECT * FROM books WHERE Title = '$title';");
			  if((mysqli_num_rows($query)) == 0 ){
			    echo "<h3 align='center' style='color: red'> Libro non presente <br> nel database! </h3>";
			  }
			  else {
                $remove = mysqli_query($conn, "DELETE  FROM books WHERE Title = '$title';");				
		        echo "<h3 align='center' style='color: red'> Libro eliminato! </h3>";
              }
		    }
			else {
			  echo "<h3 align='center' style='color: red'> Inserire titolo del libro! </h3>";
			}
		  }
        ?>
		
      </div>
  </body>
</html>