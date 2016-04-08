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
  
  <body>
	<br>
	  <div class = 'container_admin'>
	    <form action = 'remove_book.php' method = 'POST'>
	      <br>
		  <br>
		  <b> Inserire titolo del libro da eliminare: </b>
		  <br>
		  <input style = "width: 20em; height: 2.5em;  border-radius: .5em;" type = 'text' name = 'title' placeholder = 'Titolo'>
          <br>
          <br>
		  <input style = 'background-color: #3366CC; color: white; font-weight: bold; width: 14em; height: 3em; border-radius: .9em;' 
		    type = 'submit' value = 'Invio'> 
		  <input style = 'background-color: #3366CC; color: white; font-weight: bold; width: 14em; height: 3em; border-radius: .9em;' 
		    type = 'button' value = 'Torna alla home' onclick = "location.href = 'administrator.php'"> 
		</form>
	  
        <?php
		  include("../connect_database.php");
          @$title = ucfirst(trim(mysqli_real_escape_string($conn, $_POST['title'])));
		  if((@$_POST['title'] != "")) {
	        $query = mysqli_query($conn, "SELECT * FROM books WHERE Title = '$title';");
			if((mysqli_num_rows($query)) == 0 ){
			  echo "<h3 align = center style = 'color: red'> Libro non presente <br> nel database! </h3>";
			}
			else {
              $remove = mysqli_query($conn, "DELETE  FROM books WHERE Title = '$title';");				
		      echo "<h3 align = center style = 'color: red'> Libro eliminato! </h3>";
            }
		  }			
        ?>
		
      </div>
  </body>
</html>