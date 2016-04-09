<html>
  <head>
    <?php
	  @session_start();
      if (@$_SESSION['logged_admin'] != true)
      {
	    header("location: ../login.php");
	  }
      include("menu_admin.html");
    ?>
	
	<link rel = "stylesheet" href = "../css/style_admin.css" type = "text/css">
	<meta name = 'viewport' content = 'width = device-width, initial-scale = 1.0'>
  </head>
  
  <body> 
	<br>
	<div class = 'container_view'>
	  
	  <form action = 'reservations.php' method = 'POST'>
        <b> Cerca prenotazione: </b>
        <br>
        <input style = "border-width: 1px; width: 20em; height: 2.5em; border-radius: .5em;" type = 'text' name = 'id' placeholder = 'Cerca ID...'>
	    <br>
		<br>	  
		<input class = 'submit' type = 'submit' value = 'Invio'>
        <input class = 'returnHomepageAdmin' type = 'button' value = 'Torna alla home' onclick = "location.href = 'administrator.php'">		  
	  </form>
	  
	  <table cellpadding = '5px' style ='border-collapse: collapse' align = 'center' border = 1>
	    <tr rowspan = 2>
		  <td align = 'center' width = "15%" ><font size = 3 color = 'red' face = 'Lucida Calligraphy'> Codice <br> Prenotazione </font></td>
		  <td align = 'center' width = "22%"><font size = 3 color = 'red' face = 'Lucida Calligraphy'> Data </font></td>
		  <td align = 'center' width = "27%"><font size = 3 color = 'red' face = 'Lucida Calligraphy'> Libro </font></td>
		  <td align = 'center' width = "18%"><font size = 3 color = 'red' face = 'Lucida Calligraphy'> Nome </font></td>
		  <td align = 'center' width = "20%"><font size = 3 color = 'red' face = 'Lucida Calligraphy'> Cognome </font></td>
		</tr>
		  
	    <?php
	      include("../connect_database.php");
          @$id = trim(mysqli_real_escape_string($conn, $_POST['id']));
          $find = mysqli_query($conn, "SELECT r.ID, r.date, b.Title, u.name, u.surname FROM books b, reservations r, users u
		      WHERE r.ID LIKE '%$id%' && b.ID = r.ID_book && r.username = u.username ORDER BY r.ID;");
						        
	      while($row = mysqli_fetch_array($find)){
		    echo "<tr>";
		    echo "<td align = 'center'><h3>" . $row['ID'] . "</h3></td>";
		    echo "<td align = 'center'>" . $row['date'] . "</td>";
		    echo "<td align = 'center'>" . $row['Title'] . "</td>";
			echo "<td align = 'center'>" . ucfirst($row['name']) . "</td>";
		    echo "<td align = 'center'>" . ucfirst($row['surname']) . "</td>";
	      }
	    
          mysqli_close($conn);
        ?>
      </table>
	  <br>
    </div>
  </body>
</html>  
