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
	
    <link rel="stylesheet" href="../css/style_admin.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  
  <body class="display" style="background-color: #E6E6FA;"> 
	<br>
	<div class="container_admin">
	  <form action= <?php echo $_SERVER['PHP_SELF'] ?> method='POST'>
	    <b> Inserire titolo del libro: </b>
	    <br>
	    <input style="outline: none; border-width: 1px; width: 20em; height: 2.5em;  border-radius: .5em;" type="text" name="title" placeholder='Titolo'>
	    <br>
	    <br>
	    <b> Incrementa o decrementa disponibilit&agrave: </b>
		<br>
		<select class="availability" style="outline: none; background: white; width: 10em; height: 2.5em;  border-radius: .5em;" name="availability">
		  <?php
            for($i = -20; $i < 21; $i++) {
			  echo "<option value = " . $i . ">" . $i . "</option>";	
			}
		    echo "</select>";
		  ?>
		  
	    <br>
	    <br>
	    <input style="outline: none;" class="submit" name="submit" type="submit" value="Invio"> 
	    <input style="outline: none;" class="returnHomepageAdmin" type="button" value="Torna alla home" onclick="location.href = 'administrator.php'"> 
	  </form>

	<?php
      include("../connect_database.php");
	  if(isset($_POST['submit'])) {
	    if((@$_POST['title'] != "")) {
	      $title = ucfirst(trim(mysqli_real_escape_string($conn, $_POST['title'])));
	      $availability = $_POST['availability'];
		  if($availability != 0)
		  {
		    $query = mysqli_query($conn, "SELECT Available FROM books WHERE Title = '$title';");
		    @$row = mysqli_fetch_array($query);
		    $num = $availability + $row['Available'];
		    if($num < 0) {
		      echo "<h3 align=center style='color: red'> Errore! </h3>";
		    }
		    else {
			  if(mysqli_num_rows($query) == 0){
				echo "<h3 align=center style='color: red'> Libro non presente <br> nel database! </h3>";
			  }
			  else {
	 	        @$modify =  mysqli_query($conn,"UPDATE books SET Available = Available + '$availability' WHERE Title = '$title'");	     
    	        $_POST['title'] = "";
                if($modify)	
	              echo "<h3 align=center style='color: red'> Modifica effettuata! </h3>";
		        else
			      echo "<h3 align=center style='color: red'> Errore! </h3>"; 
		      }
		    }
		  }
		  else {
            echo "<h3 align=center style='color: red'> Errore! </h3>"; 
		  }			
	    }
		else {
		   echo "<h3 align=center style='color: red'> Inserire titolo del libro! </h3>"; 
		}
	  }
	    mysqli_close($conn);
?>
</body>
</html>