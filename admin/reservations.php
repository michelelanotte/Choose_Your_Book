<?php
  @session_start();
  if (@$_SESSION['logged_admin'] != true)
  {
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
	<div class="container_view">
	  
	  <form action= <?php echo $_SERVER['PHP_SELF'] ?> method="POST">
        <b> Cerca prenotazione: </b>
        <br>
        <input style="outline: none; border-width: 1px; width: 20em; height: 2.5em; border-radius: .5em;" type="text" name="id" placeholder="Cerca ID...">
	    <br>
		<br>	  
		<input style="outline: none;" class="submit" type="submit" value="Invio">
        <input style="outline: none;" class="returnHomepageAdmin" type="button" value="Torna alla home" onclick="location.href='administrator.php'">		  
	  </form>
	  
	  <table cellpadding='5px' style="border-collapse: collapse" align='center' border=1>
	    <tr rowspan=2>
		  <th align='center'><font size=3 color='red' face='Lucida Calligraphy'> Codice <br> Prenotazione </font></th>
		  <th align='center'><font size=3 color='red' face='Lucida Calligraphy'> Data </font></th>
		  <th align='center' width='25%'><font size=3 color='red' face='Lucida Calligraphy'> Libro </font></th>
		  <th align='center' width='15%'><font size=3 color='red' face='Lucida Calligraphy'> Nome </font></th>
		  <th align='center' width='15%'><font size=3 color='red' face='Lucida Calligraphy'> Cognome </font></th>
		  <th align='center' width='20%'><font size=3 color='red' face='Lucida Calligraphy'> Email </font></th>
		</tr>
		  
	    <?php
	      include("../connect_database.php");
          @$id = trim(mysqli_real_escape_string($conn, $_POST['id']));
          $find = mysqli_query($conn, "SELECT r.ID, r.date, b.Title, u.name, u.surname, u.email FROM books b, reservations r, users u
		      WHERE r.ID LIKE '%$id%' && b.ID = r.ID_book && r.username = u.username ORDER BY r.ID;");
						        
	      while($row = mysqli_fetch_array($find)){
		    echo "<tr>";
		    echo "<td align='center'><h3>" . $row['ID'] . "</h3></td>";
		    echo "<td align='center'>" . $row['date'] . "</td>";
		    echo "<td align='center'>" . $row['Title'] . "</td>";
			echo "<td align='center'>" . ucfirst($row['name']) . "</td>";
		    echo "<td align='center'>" . ucfirst($row['surname']) . "</td>";
			echo "<td align='center'>" . $row['email'] . "</td>";
	      }
	    
          mysqli_close($conn);
        ?>
      </table>
	  <br>
    </div>
  </body>
</html>  
