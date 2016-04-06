<html>
  <head>
    
	<?php
	  @session_start();
	  include("../connect_database.php");
	  if ($_SESSION['logged_user'] != true)
	  {
	    header("location: ../login.php");
	  }
	  include("menu_user.html"); 
	?>
	
  </head>
  
  <body>
    <link rel = "stylesheet" href = "../css/style_user.css" type = "text/css">
	<meta name = 'viewport' content = 'width = device-width, initial-scale = 1.0'>
    <div class = 'viewUserBooks'>
	  <form action = 'view_my_books.php' method = 'POST'>	    
	    <b>	Cerca libro: </b>
        <br>
        <input size = 40 type = 'text' name = 'title' placeholder = 'Cerca...'>
	    <br>
		<br>
		<input style = 'background-color: #3366CC; color: white; font-weight: bold; width: 14em; height: 3em; border-radius: .9em;' 
		  type = 'submit' value = 'Invio'>
        <input style = 'background-color: #3366CC; color: white; font-weight: bold; width: 14em; height: 3em; border-radius: .9em;' 
		  type = 'button' value = 'Torna alla home' onclick = "location.href = 'homepage.php'">		  
	  </form>
      <table border = 1>
	    <tr rowspan = 2>
		  <td align = 'center'><font size = 4 color = 'red' face = 'Lucida Calligraphy'> Codice <br> prenotazione </td>
		  <td align = 'center' width = "250px" > <font size = 3 color = 'red' face = 'Lucida Calligraphy'> Titolo libro </font></td>
		  <td align = 'center' width = "200px"><font size = 3 color = 'red' face = 'Lucida Calligraphy'> Autore </font></td>
		  <td align = 'center'"><font size = 3 color = 'red' face = 'Lucida Calligraphy'> Data di <br> prenotazione </font></td>
		</tr>
        
		<?php  
	      $username = $_SESSION['user'];
		  @$title = trim(mysqli_real_escape_string($conn, $_POST['title'])); 
          $query = mysqli_query($conn, "SELECT r.ID, r.date, b.Title, b.Author FROM reservations r, books b 
	        WHERE r.ID_book = b.ID AND r.username = '$username' AND Title LIKE '%$title%' ORDER BY r.date DESC, r.ID;");	  
          while($row = mysqli_fetch_array($query)) {
	        echo "<tr>";
		    echo "<td align = 'center'><h3>" . $row['ID'] . "</h3></td>";
		    echo "<td align = 'center'>" . $row['Title'] . "</td>";
			echo "<td align = 'center'>" . $row['Author'] . "</td>";
		    echo "<td align = 'center'>" . $row['date'] . "</td>";
		    echo "</tr>";
	      }
        ?> 
	  </table>
	  <br>
	</div>
  </body>
</html>
	