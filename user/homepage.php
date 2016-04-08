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
	<meta name = 'viewport' content = 'width = device-width, initial-scale = 1.0'>
  </head>
  
  <body>
    <?php
      include("../connect_database.php");
	  $username = $_SESSION['user'];
	  $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username';");
	  $user = mysqli_fetch_array($query);
		echo "<br><font size = 4 align = 'left'> Benvenuto, &nbsp" . ucfirst($user['name']) . "!";
	  ?>
	<div align = 'center' class = 'home_user'>
	  <h3 align = 'center' style = 'color: red'> Cosa puoi fare su questo sito? </h3>
	  <font size = 4> E' una piattaforma a disposizione degli studenti mediante la quale, <br> sar&agrave
          possibile visualizzare e/o prenotare un libro scelto tra una vasta gamma di testi <br> messi a disposizione dalla biblioteca scolastica dell' 
		  <a href = 'http://www.itisfermibarletta.it'> I.T.I.S. E.Fermi </a> di Barletta. <br>
		  Con lo scopo d'incentivare i giovani alla cultura della lettura,il servizio &egrave del tutto gratuito!  </font>
	  <br>
	  <br>
	  <img src = "library.jpg" alt = "biblioteca scolastica" width = "250" height = "180" />
	  <br>
	  <br>
	  <h3 align = 'center-left' style = 'color: red'> Come si pu&ograve prenotare un libro sul nostro sito? </h3>
	  <font size = 4> Niente di pi&ugrave semplice! Andando sulla pagina relativa ai libri presenti in biblioteca, <br>
	      si potr&agrave prenotare un libro cliccando sulla voce corrispondente al titolo del testo "Prenota ora!". <br> 
		  Se il libro &egrave disponibile, comparir&agrave automaticamente una pagina contenente una ricevuta <br> 
		  che riporta le informazioni dell'utente e del libro prenotato. <br>
		  La ricevuta potr&agrave essere semplicemente fotografata o stampata cliccando sull'apposito pulsante "Stampa". <br>
		  La ricevuta dovr&agrave essere poi presentata al bibliotecario scolastico. Al fine di responsabilizzare l'utente <br>
		  durante il periodo di noleggio del libro, &egrave stato adottato un sistema che prevede di dare <br> 
		  una cauzione al momento del ritiro.
      <br>
	  <br>
	  <br>
	  <br>
	</div>
  </body>
</html>
