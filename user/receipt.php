<html>
  <head>
    <meta name = 'viewport' content = 'width = device-width, initial-scale = 1.0'>
    <link rel = "stylesheet" href = "../css/receipt.css" type = "text/css">
  </head>
  <body>
	<div>
      <?php
	    @session_start();
	    include("../connect_database.php");
	    if ($_SESSION['logged_user'] != true)
	    {
	      header("location: ../login.php");
	    }
	    else{
		  $title = $_GET['title'];
	      $username = $_SESSION['user'];
          $row = mysqli_query($conn, "SELECT name, surname, nation, email, sex FROM users WHERE username = '$username';");
      	  $user = mysqli_fetch_array($row);		
		  
		  echo "<font color = 'red' size = '5' style = 'position: absolute; top: 4px; left: 110px' ><b>DATI DELL'UTENTE:</b></font><br>";
		  
		  echo "<font size = 5 style = 'position: absolute; top: 40px; left: 130px' ><b>NOME:</b></font> 
		    <font size = 4 style = 'position: absolute; top: 42px; left: 280px' ><u>" . $user['name'] . "</u></font> <br>";
		  
		  echo "<font size = 5 style = 'position: absolute; top: 70px; left:75px' ><b>COGNOME:</b></font>
 		    <font size = 4 style = 'position: absolute; top: 73px; left: 280px' ><u>" . $user['surname'] . "</u></font><br>";
		  
		  echo "<font size = 5 style = 'position: absolute; top: 102.5px; left: 92.5px'><b>NAZIONE:</b></font> 
		    <font size = 4 style = 'position: absolute; top: 105.5px; left: 280px' ><u>" . $user['nation']. "</u></font><br>";
		  
		  echo "<font size = 5 style = 'position: absolute; top: 135px; left: 124px' ><b>EMAIL:</b></font> 
		    <font size = 4 style = 'position: absolute; top: 137px; left: 280px' ><u>" . $user['email']. "</u></font><br>";
		  
		  if($user['sex'] === 'male')
			$user['sex'] = "maschio";
		  else
			$user['sex'] = "femmina";  
			echo "<font size = 5 style = 'position: absolute; top: 168px; left: 130.5px' ><b>SESSO:</b></font> 
		      <font size = 4 style = 'position: absolute; top: 170px; left: 280px' ><u>"  . $user['sex']. "</u></font><br>";
		  
		  echo "<br><font color = 'red' size = '5' style = 'position: relative; top: 100px; left: -10px' ><b>INFORMAZIONI LIBRO:</b></font><br>";
		  
		  echo "<font size = 4 style = 'position: absolute; top: 260px; left: 150px' ><b>LIBRO PRENOTATO :</b></font> 
		    <font size = 4 style = 'position: absolute; top: 280px; left: 190px' ><u>" .  $title . "</u></font><br>";
		  
		  $query = mysqli_query($conn, "SELECT ID, Year_publication, Author FROM books WHERE Title = '$title';");
		  $book_info = mysqli_fetch_array($query);
		  
		  echo "<font size = 4 style = 'position: absolute; top: 315px; left: 200px' ><b>CODICE :</b></font>
		    <font size = 4 style = 'position: absolute; top: 335px; left: 230px' ><u>" . $book_info['ID'] . "</u></font><br>";
			
		  echo "<font size = 4 style = 'position: absolute; top: 370px; left: 138px' ><b>ANNO PUBBLICAZIONE :</b></font>
		    <font size = 4 style = 'position: absolute; top: 393px; left: 223px' ><u>" . $book_info['Year_publication'] . "</u></font><br>";
			
		  echo "<font size = 4 style = 'position: absolute; top: 428px; left: 201' ><b>AUTORE :</b></font>
		    <font size = 4 style = 'position: absolute; top: 448px; left: 190px' ><u>" . $book_info['Author'] . "</u></font><br>";
          
		  $data=time();
          $data=date('Y-m-d H:i:s', $data);
          echo "<font size = 4 style = 'position: absolute; top: 488px; left: 140px' ><b>DATA PRENOTAZIONE :</b></font>
            <font size = 4 style = 'position: absolute; top: 510px; left: 165px' ><u>" . $data . "</u></font><br>";
		  
          echo "<font size = 3 style = 'position: absolute; top: 570px; left: 20px'> Presentandoti con questo tagliando, avrai modo di 
		    ritirare il libro da te <br> prenotato presso la biblioteca scolastica dell'Istituto I.T.I.S E.Fermi </font>";	   
        }
	  ?>
	</div>
    <input style = 'position: absolute; top: 640px; left:540px; background-color: #3366CC; 
      color: white; font-weight: bold; width: 14em; height: 3em; border-radius: .9em;' 
      type = 'button' value = 'Torna indietro' onclick = "location.href = 'view_books_user.php?failed='">
  </body>
</html>  