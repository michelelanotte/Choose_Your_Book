<html>
  <head>
    <?php
      include("menu_user.html");
	  @session_start();
      if ($_SESSION['logged_user'] != true) {
        header("location: ../login.php");
      }
    ?>
    <link rel = "stylesheet" href = "../css/style_user.css" type = "text/css">
  </head>
  
  <body>
    <?php
      include("../connect_database.php");
	  $username = $_SESSION['user'];
	  $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username';");
	  $user = mysqli_fetch_array($query);
		echo "<br><font size = 4 align = 'left'> &nbsp Benvenuto, &nbsp" . ucfirst($user['name']) . "!";
	  ?>
	<div class = 'home_user'>
	  <h3 align = 'center-left' style = 'color: red'> Cosa puoi fare su questo sito? </h3>
	  <font size = 4> E' una piattaforma a disposizione degli studenti mediante la quale, <br> sar&agrave
          possibile visualizzare e/o prenotare un libro scelto tra una vasta gamma di testi <br> messi a disposizione della biblioteca scolastica dell' 
		  <a href = 'http://www.itisfermibarletta.it'> I.T.I.S. E.Fermi </a> di Barletta. <br>
		  Il servizio &egrave inoltre del tutto gratuito! </font>
	  <br>
	  <br>
	  <img src = "library.jpg" alt = "biblioteca scolastica" width = "200" height = "150" />
	  <a href = 'http://www.itisfermibarletta.it'><img style = "position: absolute; left: 35%;" src = "school.jpg" alt = "biblioteca scolastica" width = "250" height = "150" /></a>
	  <br>
	  <br>
	  <h3 align = 'center-left' style = 'color: red'> Come si pu&ograve prenotare un libro sul nostro sito? </h3>
	  <font size = 4> Niente di pi&ugrave semplice! Andando sulla pagina nella quale vengono visualizzati i libri della biblioteca, <br>
	      si potr&agrave prenotare un libro facendo clic sulla voce associata "Prenota ora!". <br> 
		  Se il libro &egrave disponibile, verr&agrave visualizzata automaticamente una pagina contenente una ricevuta <br> 
		  nella quale saranno riportate le informazioni dell'utente e del libro prenotato. <br>
		  La ricevuta potr&agrave essere semplicemente fotografata o stampata facendo clic sull'apposito pulsante. <br>
		  La ricevuta dovr&agrave essere poi presentata al bibliotecario scolastico.
      <br>
	  <br>
	  <br>
	  <br>
	</div>
  </body>
</html>
