<html>
  <head>
    <meta name = 'viewport' content = 'width = device-width, initial-scale = 1.0'>
    <link rel = "stylesheet" href = "../css/receipt.css" type = "text/css">
	<link media = 'print' rel = 'stylesheet' href = '../css/print.css' type = 'text/css'>
  </head>
  
  <body>
	<div class = 'receipt'>
      <?php
	    @session_start();
	    include("../connect_database.php");
	    if ($_SESSION['logged_user'] != true) {
	      header("location: ../login.php");
	    }
	    else {
		  $title = $_GET['title'];
	      $username = $_SESSION['user'];
		  $data = $_GET['data'];
          $row = mysqli_query($conn, "SELECT name, surname, nation, email, sex FROM users WHERE username = '$username';");
      	  $user = mysqli_fetch_array($row);		
		  
		  echo "<font color = 'red' size = '5' style = 'position: absolute; top: 4px; left: 135px' ><b>DATI DELL'UTENTE:</b></font><br>";
		  
		  echo "<font size = 5 style = 'position: absolute; top: 40px; left: 130px' ><b>NOME:</b></font> 
		    <font size = 4 style = 'position: absolute; top: 42px; left: 280px' >" . $user['name'] . "</font> <br>";
		  
		  echo "<font size = 5 style = 'position: absolute; top: 70px; left:75px' ><b>COGNOME:</b></font>
 		    <font size = 4 style = 'position: absolute; top: 73px; left: 280px' >" . $user['surname'] . "</font><br>";
		  
		  echo "<font size = 5 style = 'position: absolute; top: 102.5px; left: 92.5px'><b>NAZIONE:</b></font> 
		    <font size = 4 style = 'position: absolute; top: 105.5px; left: 280px' >" . $user['nation']. "</font><br>";
		  
		  echo "<font size = 5 style = 'position: absolute; top: 135px; left: 124px' ><b>EMAIL:</b></font> 
		    <font size = 4 style = 'position: absolute; top: 137px; left: 280px' >" . $user['email']. "</font><br>";
		  
		  if($user['sex'] === 'male') {
			$user['sex'] = "maschio";
		  }
		  else {
			$user['sex'] = "femmina"; 
		  }			
  		  echo "<font size = 5 style = 'position: absolute; top: 168px; left: 130.5px' ><b>SESSO:</b></font> 
		      <font size = 4 style = 'position: absolute; top: 170px; left: 280px' >"  . $user['sex']. "</font><br>";
		  
		  echo "<br><font color = 'red' size = '5' style = 'position: relative; top: 100px; left: 10px' ><b>INFORMAZIONI LIBRO:</b></font><br>";
		  
		  echo "<font size = 4 style = 'position: absolute; top: 270px; left: 65px' ><b>LIBRO PRENOTATO : </b></font> 
		    <font size = 4 style = 'position: absolute; top: 270px; left: 280px' >" .  $title . "</font><br>";
		  
		  $query = mysqli_query($conn, "SELECT ID, Year_publication, Author FROM books WHERE Title = '$title';");
		  $book_info = mysqli_fetch_array($query);
		   $id_book = $book_info['ID'];
		  
		  echo "<font size = 4 style = 'position: absolute; top: 315px; left: 167px' ><b>CODICE : </b></font>
		    <font size = 4 style = 'position: absolute; top: 315px; left: 280px' >" . $id_book . "</font><br>";
			
		  echo "<font size = 4 style = 'position: absolute; top: 355px; left: 30px' ><b>ANNO PUBBLICAZIONE : </b></font>
		    <font size = 4 style = 'position: absolute; top: 355px; left: 280px' >" . $book_info['Year_publication'] . "</font><br>";
			
		  echo "<font size = 4 style = 'position: absolute; top: 395px; left: 162' ><b>AUTORE :</b></font>
		    <font size = 4 style = 'position: absolute; top: 395px; left: 280px' >" . $book_info['Author'] . "</font><br>";
          
          echo "<font size = 4 style = 'position: absolute; top: 460px; left: 145px' ><b>DATA PRENOTAZIONE :</b></font>
            <font size = 4 style = 'position: absolute; top: 485px; left: 170px' >" . $data . "</font><br>";
			
		  $query_id = mysqli_query($conn, "SELECT ID FROM reservations 
		      WHERE ID_book = '$id_book' && username = '$username' && date = '$data';");
		  $reservation_info = mysqli_fetch_array($query_id);
		  $id = $reservation_info['ID'];
		   
		  echo "<font size = 4 style = 'position: absolute; top: 520px; left: 135px' ><b>CODICE PRENOTAZIONE :</b></font>
            <font size = 4 style = 'position: absolute; top: 545px; left: 240px' >" . $id . "</font><br>";
		  
          echo "<font size = 3 style = 'position: absolute; top: 585px; left: 20px'> Presentandoti con questo tagliando, avrai modo di 
		    ritirare il libro da te <br> prenotato presso la biblioteca scolastica dell'Istituto I.T.I.S E.Fermi </font>";	   
        }
	  ?>
	  
	</div>
    <input class = 'returnToView' type = 'button' value = 'Torna indietro' onclick = "location.href = 'view_books_user.php?failed='">
	 <input class = 'printButton' type = button value = 'Stampa ricevuta' onClick = 'window.print()'>
	 

  </body>
</html>  