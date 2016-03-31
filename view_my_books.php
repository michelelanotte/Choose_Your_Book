<html>
  <head>
    <?php
	  @session_start();
	  include("connect_database.php");
	  if ($_SESSION['logged_user'] != true)
	  {
	    header("location: login.php");
	  }
	  include("menu_user.html"); 
	?>
  </head>
  <body style = ' background-color: #FFFF99'>
    <link rel = "stylesheet" href = "style_css.css" type = "text/css">
    <div id = 'container_admin2'>
      <table border = 1>
	    <tr rowspan = 2>
		  <td align = 'center'><font size = 4 color = 'red' face = 'Lucida Calligraphy'> Codice <br> prenotazione </td>
		  <td align = 'center' width = "250px" > <font size = 3 color = 'red' face = 'Lucida Calligraphy'> Titolo libro </font></td>
		  <td align = 'center' width = "200px"><font size = 3 color = 'red' face = 'Lucida Calligraphy'> Autore </font></td>
		  <td align = 'center'"><font size = 3 color = 'red' face = 'Lucida Calligraphy'> Data di <br> prenotazione </font></td>
		</tr>
        
		<?php  
	      $username = $_SESSION['user'];
          $query = mysqli_query($conn, "SELECT r.ID, r.date, b.Title, b.Author FROM reservations r, books b 
	        WHERE r.ID_book = b.ID AND '$username' = r.username;");	  
          while($row = mysqli_fetch_array($query)){
	        echo "<tr>";
		    echo "<td align = 'center'><h3>" . $row['ID'] . "</h3></td>";
		    echo "<td align = 'center'>" . $row['Title'] . "</td>";
			echo "<td align = 'center'>" . $row['Author'] . "</td>";
		    echo "<td align = 'center'>" . $row['date'] . "</td>";
		    echo "</tr>";
	      }
        ?>
	  </table>
	</div>
  </body>
</html>
	