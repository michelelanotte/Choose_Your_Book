<html>
  <head>
  	<?php
      include("menu_admin.html");
	  session_start();
      if ($_SESSION['logged_admin'] != true) {
        header("location: ../login.php");
      }
    ?>
    <link rel = "stylesheet" href = "../css/style_admin.css" type = "text/css">
  </head>
  
  <body>
    <br><font size = 4 align = 'left'> &nbsp Benvenuto, &nbsp Amministratore!</font>
    <div class = 'home_admin'>
	  <h3 align = 'center-left' style = 'color: red'> Cosa pu&ograve l'amministratore? </h3>
	  <font size = 4> L'amministratore del sito ha il compito di gestire il database dei libri e delle relative <br> 
	  prenotazioni fatte dagli utenti. <br> Pu&ograve aggiungere nuovi libri alla lista di libri gi&agrave presenti, rimuovere
	  un libro dal database, <br> modificare il numero di copie disponibili di un determinato libro, vedere tutti i libri<br>
	  presenti all'interno del database, controllare le prenotazioni dei libri e registrare, se &egrave necessario.	  
	  </font>
	  <br>
	  <br>
	  <img src = "../user/library.jpg" alt = "biblioteca scolastica" width = "200" height = "150" />
	  <a href = 'http://www.itisfermibarletta.it'><img style = "position: absolute; left: 35%;" src = "../user/school.jpg" alt = "biblioteca scolastica" width = "250" height = "150" /></a>
	  <br>
	  <br>
	  <br>
	  <br>
	  <h3 align = 'center-left' style = 'color: red'> A cosa serve la gestione della disponibilit&agrave dei libri? </h3>
	  <font size = 4> Questa funzione &egrave utile quando in due casi: <br> 
	  <br> -Se un libro dovesse subire danni(danni alla copertina, pagina strappata...), l'amministratore dovr&agrave <br> 
	  &nbsp aggiornare subito il numero di copie disponibili di quel determinato libro, questo &egrave utile per evitare disguidi <br>
	  &nbsp con l'utente(potrebbe prenotare un libro che in realt&agrave non &egrave disponibile in quanto soggetto a manutenzione). <br>
	  &nbsp Ovviamente una volta riparato, il libro torner&agrave ad essere disponibile. <br><br>
      -Una volta restituito il libro prestato, l'amministratore dovr&agrave rendere nuovamente disponibile quel libro. 	  
	  </font>
      <br>
	  <br>
	  <br>
	  <br>
	  <h3 align = 'center-left' style = 'color: red'> Come accertarsi che la ricevuta presentata dall'utente per la prenotazione del libro sia autentica? </h3>
	  <font size = 4> La ricevuta contiene informazioni relative all'utente, al libro e alla prenotazione, l'amministratore potr&agrave <br>
	  cercare il codice della prenotazione nell'apposita pagina di ricerca, se i dati combaciano con quelli <br> 
	  presenti nella ricevuta, la stessa potr&agrave essere autenticata.
	  <br>
	  <br>
	  <br>
      <br>	  
	</div>
  </body>
</html>
