<html>
  <head>
    <?php
	  @session_start();
	  if ($_SESSION['logged_user'] != true) {
	    header("location: ../login.php");
	  }
	  include("menu_user.html"); 
    ?>
	
	<link rel = "stylesheet" href = "../css/style_user.css" type = "text/css">
	<meta name = 'viewport' content = 'width = device-width, initial-scale = 1.0'>
  </head>
  
  <body> 
	<br>
	<div class = 'viewBooks'>
	  
	  <form action = 'view_books_user.php' method = 'POST'>	    
	    <b>	Cerca libro: </b>
        <br>
        <input style = "width: 20em; height: 2.5em;  border-radius: .5em;" type = 'text' name = 'title' placeholder = 'Cerca...'>
	    <br>
		<br>
		<b>	Ordina per: </b>
		<br>
		<select style = "width: 20em; height: 2.5em;  border-radius: .5em;" name = 'order'>
		  <option value = '1'> ID </option>
		  <option value = '2'> Anno </option>
		  <option value = '3'> Autore </option>
		  <option value = '4'> Disponibilit&agrave </option>
		</select>
        <br>
		<br>
		<input class = 'button' type = 'submit' value = 'Invio'>
        <input class = 'button' type = 'button' value = 'Torna alla home' onclick = "location.href = 'homepage.php'">		  
	  </form>
	  
	  <table cellpadding = '5px' style ='border-collapse: collapse' align = 'center' border = 1>
	    <tr rowspan = 2>
		  <td><font size = 4 color = 'red' face = 'Lucida Calligraphy'> ID </td>
		  <td align = 'center' width = "35%" > <font size = 3 color = 'red' face = 'Lucida Calligraphy'> Titolo </font></td>
		  <td align = 'center' width = "30%"><font size = 3 color = 'red' face = 'Lucida Calligraphy'> Autore </font></td>
		  <td align = 'center'><font size = 3 color = 'red' face = 'Lucida Calligraphy'> Data <br> pubblicazione </font></td>
		  <td align = 'center'><font size = 3 color = 'red' face = 'Lucida Calligraphy'> Disponibile </font></td>
		</tr>
		  
	    <?php
	      include("../connect_database.php");
		  @session_start();
		  @$order = $_POST['order'];
		  @$title = trim(mysqli_real_escape_string($conn, $_POST['title']));
		  switch($order) {
			 case 1:  $find = mysqli_query($conn, "SELECT * FROM books WHERE Title LIKE '%$title%' ORDER BY ID;");
			 break;
			 
			 case 2:  $find = mysqli_query($conn, "SELECT * FROM books WHERE Title LIKE '%$title%' ORDER BY Year_publication DESC;");
			 break;
			 
			 case 3:  $find = mysqli_query($conn, "SELECT * FROM books WHERE Title LIKE '%$title%' ORDER BY Author, Year_publication;");
			 break;
			 
			 case 4:  $find = mysqli_query($conn, "SELECT * FROM books WHERE Title LIKE '%$title%' ORDER BY Available DESC, Year_publication DESC;");
			 break;
			 
			 default: $find = mysqli_query($conn, "SELECT * FROM books WHERE Title LIKE '%$title%';");
			 break;
			}
			        
	        while($row = mysqli_fetch_array($find)) {
		      echo "<tr>";
		      echo "<td align = 'center'><h3>" . $row['ID'] . "</h3></td>";
		      echo "<td align = 'center'>" . $row['Title'] . "</td>";
		      echo "<td align = 'center'>" . $row['Author'] . "</td>";
		      echo "<td align = 'center'>" . $row['Year_publication'] . "</td>";
		      if($row['Available'] > 0)
			    echo "<td align = 'center'>". $row['Available'] . "  </td>";
		      else
			    echo "<td align = 'center'> Non disponibile </td>";
			
			  $title = $row['Title']; 
			  echo "<td align = 'center'><a href = 'reserve_book.php?title=$title'> Prenota ora! </a></td></tr>";	
	        }
	  
          mysqli_close($conn);
		  echo "<font size =4 color = 'red'>" . @$_GET['failed'] . "</font><br><br>";
        ?>
      </table>
	  <br>
    </div>
  </body>
</html>  