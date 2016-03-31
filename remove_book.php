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
	    <form action = 'remove_book.php' method = 'POST'>
	      <br>
	      <br>
		  <br>
		  <b> Inserire titolo del libro da eliminare: </b>
		  <br>
		  <input size = 60 type = 'text' name = 'title'>
          <br>
          <br>
		  <input style = 'background-color: #3366CC; color: white; font-weight: bold; width: 14em; height: 3em; border-radius: .9em;' 
		    type = 'submit' value = 'Invio'> 
		  <input style = 'background-color: #3366CC; color: white; font-weight: bold; width: 14em; height: 3em; border-radius: .9em;' 
		    type = 'button' value = 'Torna alla home' onclick = "location.href = 'administrator.php'"> 
		</form>
	  
        <?php
		  include("connect_database.php");
          @$title = $_POST['title'];
		  if((@$_POST['title'] != ""))
	      {
	        $remove = mysqli_query($conn, "DELETE  FROM books WHERE Title = '$title';");
		    echo "<h3 align = center style = 'color: red'> Libro eliminato! </h3>";
          }  
        ?>
      </div>
  </body>
</html>