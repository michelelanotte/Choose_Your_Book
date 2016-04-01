<html>
  <head>
    <?php
	  @session_start();
      if (@$_SESSION['logged_admin'] != true)
      {
	    header("location: login.php");
	  }
      include("menu_admin.html");
    ?>
  </head>
  <body style = ' background-color: #FFFF99'> 
    <link rel = "stylesheet" href = "style_css.css" type = "text/css">
	<br>
	<div id = 'container_admin2'>
	  
	  <form action = 'view_books.php' method = 'POST'>	    
	    <b>	Inserire titolo del libro: </b>
        <br>
        <input size = 60 type = 'text' name = 'title'>
	    <br>
		<br>
		<b>	Ordina per: </b>
		<br>
		<select style = ' width: 200px;' name = 'order'>
		  <option value = '1'> ID </option>
		  <option value = '2'> Anno </option>
		  <option value = '3'> Autore </option>
		  <option value = '4'> Disponibilit&agrave </option>
		</select>
        <br>
		<br>
		<input style = 'background-color: #3366CC; color: white; font-weight: bold; width: 14em; height: 3em; border-radius: .9em;' 
		  type = 'submit' value = 'Invio'>
        <input style = 'background-color: #3366CC; color: white; font-weight: bold; width: 14em; height: 3em; border-radius: .9em;' 
		  type = 'button' value = 'Torna alla home' onclick = "location.href = 'administrator.php'">		  
	  </form>
	  
	  <table border = 1>
	    <tr rowspan = 2>
		  <td><font size = 4 color = 'red' face = 'Lucida Calligraphy'> ID </td>
		  <td align = 'center' width = "35%" > <font size = 3 color = 'red' face = 'Lucida Calligraphy'> Titolo </font></td>
		  <td align = 'center' width = "30%"><font size = 3 color = 'red' face = 'Lucida Calligraphy'> Autore </font></td>
		  <td align = 'center'><font size = 3 color = 'red' face = 'Lucida Calligraphy'> Data <br> pubblicazione </font></td>
		  <td align = 'center'><font size = 3 color = 'red' face = 'Lucida Calligraphy'> Disponibile </font></td>
		</tr>
		  
	    <?php
	      include("connect_database.php");
		  @$order = $_POST['order'];
		  @$title = $_POST['title'];
         
		 switch($order)
			{
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
						        
	        while($row = mysqli_fetch_array($find)){
		      echo "<tr>";
		      echo "<td align = 'center'><h3>" . $row['ID'] . "</h3></td>";
		      echo "<td align = 'center'>" . $row['Title'] . "</td>";
		      echo "<td align = 'center'>" . $row['Author'] . "</td>";
		      echo "<td align = 'center'>" . $row['Year_publication'] . "</td>";
		      if($row['Available'] > 0)
			    echo "<td align = 'center'>". $row['Available'] . "  </td>";
		      else
			    echo "<td align = 'center'> Non disponibile </td>";
	        }
	    
          mysqli_close($conn);
        ?>
      </table>
    </div>
  </body>
</html>  