<?php
  @session_start();
  if ($_SESSION['logged_admin'] != true) {
	header("location: ../login.php");
  }		
      
  include("menu_admin.html");
?>
		
<html>
  <head>   
	<link rel="stylesheet" href="../css/style_admin.css" type = "text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  </head>
  
  <body class="display" style="background-color: #E6E6FA;">
	<br>
	<div class="container_admin">
	  <form action= <?php echo $_SERVER['PHP_SELF'] ?> method='POST' enctype="multipart/form-data">	    
	    <b> Inserire titolo del libro: </b>
		<br>
		<input style="outline: none; border-width: 1px; width: 20em; height: 2.5em; border-radius: .5em;" type="text" name="title" placeholder='Titolo'>
        <br>
        <br>
        <b>	Inserire nome dell'autore: </b>
        <br>
     	<input style="outline: none; border-width: 1px; width: 20em; height: 2.5em; border-radius: .5em;" type="text" name="author" placeholder='Autore'>
        <br>
        <br>
        <b>	Inserire data di pubblicazione: </b>
        <br>
     	<select style="outline: none; background: white; width: 10em; height: 2.5em; border-radius: .5em;" name="year">
		  <option value="default" select="selected"></option>	
          <?php
		    for($i = 1900; $i < 2017; $i++)
			{
			echo "<option value = " . $i . ">" . $i . "</option>";	
			}
		    echo "</select>";
		  ?>
		</select>
        <br>
        <br>
		<input style="outline: none;" class="select_file" type="file" name="file">
		<br>
		<br>
		<input style="outline: none;" class="submit" type="submit" name="submit" value="Invio"> 
		<input style="outline: none;" class="returnHomepageAdmin" type="button" value="Torna alla home" onclick="location.href='administrator.php'"> 
	  </form>
      
	  <?php
        include("../connect_database.php");
	    if(isset($_POST['submit'])) {
		  if((@$_POST['title'] != "") && (@$_POST['author'] != "")) {
	        @$title = ucfirst(trim(mysqli_real_escape_string($conn, $_POST['title'])));
	        @$author = ucfirst(trim(mysql_real_escape_string($_POST['author'])));
		    @$date = $_POST['year'];
		    @$name_pdf_temp = $_FILES['file']["tmp_name"];
		    @$name_pdf = $_FILES['file']['name'];
		    @$type_pdf = $_FILES['file']['type'];
		    @$pdf = addslashes(file_get_contents($name_pdf_temp));
		
	 	    @$insert =  mysqli_query($conn,"INSERT INTO books (Title,Author,Year_publication,Available,File,Name_File,Type_File) 
		        VALUES ('$title','$author','$date',0,'$pdf','$name_pdf','$type_pdf')");	 
     
    	    $_POST['title'] = "";
            $_POST['author'] = "";
            if($insert) {	
	          echo "<h3 align = center style = 'color: red'> Libro inserito! </h3>";
		    }
		    else {
              echo "<h3 align = center style = 'color: red'> Libro gi&agrave presente! </h3>"; 
		    }
	      }
		  else {
		    echo "<h3 align = center style = 'color: red'> Campi vuoti! </h3>";
		  }
		}
	    mysqli_close($conn);
      ?>
	  
    </div>
  </body>
</html>


