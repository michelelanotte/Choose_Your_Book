<html>
  <head>
    <?php
	  @session_start();
      if ($_SESSION['logged_admin'] != true)
      {
	    header("location: ../login.php");
      }		
  	  include("menu_admin.html"); 
	?>
	
    <link rel = "stylesheet" href = "../css/style_css.css" type = "text/css">
    <meta name = 'viewport' content = 'width = device-width, initial-scale = 1.0'>
  </head>
  <body style = ' background-color: #FFFF99'> 
	<br>
	<div class = 'container_admin'>
	  <form action = 'availability_books.php' method = 'POST'>
	    <br>
	    <b> Inserire titolo del libro: </b>
	    <br>
	    <input size = 60 type = 'text' name = 'title'>
	    <br>
	    <br>
	    <b> Incrementa o decrementa disponibilit&agrave: </b>
		<br>
		<select style = " width: 100px;" name = 'availability'>
          <option value = 0 selected></option>
		  <?php
            for($i = -20; $i < 21; $i++)
			{
			  echo "<option value = " . $i . ">" . $i . "</option>";	
			}
		    echo "</select>";
		  ?>
		  
	    <br>
	    <br>
	    <input style = 'background-color: #3366CC; color: white; font-weight: bold; width: 14em; height: 3em; border-radius: .9em;' 
		  type = 'submit' value = 'Invio'> 
	    <input style = 'background-color: #3366CC; color: white; font-weight: bold; width: 14em; height: 3em; border-radius: .9em;' 
	      type = 'button' value = 'Torna alla home' onclick = "location.href = 'administrator.php'"> 
	  </form>

	<?php
      include("../connect_database.php");
	  if((@$_POST['title'] != ""))
	    {
	      $title = $_POST['title'];
	      $availability = $_POST['availability'];
		  if($availability != 0)
		  {
		    $query = mysqli_query($conn, "SELECT Available FROM books WHERE Title = '$title';");
		    @$row = mysqli_fetch_array($query);
		    $num = $availability + $row['Available'];
		    if($num < 0)
		    {
		      echo "<h3 align = center style = 'color: red'> Errore! </h3>";
		    }
		    else{
	 	      @$modify =  mysqli_query($conn,"UPDATE books SET Available = Available + '$availability' WHERE Title = '$title'");	     
    	      $_POST['title'] = "";
              if($modify)	
	            echo "<h3 align = center style = 'color: red'> Modifica effettuata! </h3>";
		      else
			    echo "<h3 align = center style = 'color: red'> Errore! </h3>"; 
		    }
		  }
		  else{
            echo "<h3 align = center style = 'color: red'> Errore! </h3>"; 
		  }			
	    }
	    mysqli_close($conn);
?>
</body>
</html>