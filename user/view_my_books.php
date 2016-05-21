<?php
  @session_start();
  include("../connect_database.php");
  if ($_SESSION['logged_user'] != true)
  {
	header("location: ../login.php");
  }
  include("menu_user.html"); 
?>	
<html>
  <head>    
    <link rel="stylesheet" href="../css/style_user.css" type="text/css">
	<meta name= "viewport" content="width=device-width, initial-scale=1.0">
  </head>
  
  <body class="display" style="background-color: #E6E6FA;">
    <div class="viewUserBooks">
	  <form action= <?php echo $_SERVER['PHP_SELF'] ?> method = 'POST'>	    
	    <b>	Cerca libro: </b>
        <br>
        <input style="outline: none; border-width: 1px; width: 20em; height: 2.5em; border-radius: .5em;" type="text" name="title" placeholder='Cerca...'>
	    <br>
		<br>
		<input style="outline: none; border-width: 1px; background-color: #3366CC; color: white; font-weight: bold; width: 14em; height: 3em; border-radius: .9em;" 
		    type="submit" value="Invio">
        <input style="outline: none; margin: 2px 0px 0px 0px; border-width: 1px; background-color: #3366CC; color: white; 
		    font-weight: bold; width: 14em; height: 3em; border-radius: .9em;" 
		    type="button" value="Torna alla home" onclick="location.href='homepage.php'">		  
	  </form>
      <table cellpadding='5px' style="border-collapse: collapse" align='center' border=1>
	    <tr rowspan = 2>
		  <th align='center'><font size=4 color='red' face='Lucida Calligraphy'> Codice <br> prenotazione </th>
		  <th align='center' width = '250px' ><font size=3 color='red' face='Lucida Calligraphy'> Titolo libro </font></th>
		  <th align='center' width = '200px'><font size=3 color='red' face='Lucida Calligraphy'> Autore </font></th>
		  <th align='center'><font size=3 color='red' face='Lucida Calligraphy'> Data di <br> prenotazione </font></th>
		</tr>
        
		<?php  
	      $username = $_SESSION['user'];
		  @$title = trim(mysqli_real_escape_string($conn, $_POST['title'])); 
          $query = mysqli_query($conn, "SELECT r.ID, r.date, b.Title, b.Author FROM reservations r, books b 
	        WHERE r.ID_book = b.ID AND r.username = '$username' AND Title LIKE '%$title%' ORDER BY r.date DESC, r.ID;");	  
          while($row = mysqli_fetch_array($query)) {
	        echo "<tr>";
		    echo "<td align='center'><h3>" . $row['ID'] . "</h3></td>";
		    echo "<td align='center'>" . $row['Title'] . "</td>";
			echo "<td align='center'>" . $row['Author'] . "</td>";
		    echo "<td align='center'>" . $row['date'] . "</td>";
		    echo "</tr>";
	      }
        ?> 
	  </table>
	  <br>
	</div>
  </body>
</html>
	