<html>
  <head>
  	<?php
      include("menu_admin.html");
	  session_start();
      if ($_SESSION['logged_admin'] != true) {
        header("location: ../login.php");
      }
    ?>
    <link rel="stylesheet" href="../css/style_admin.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  
  <body class="display" style="background-color: #E6E6FA;">
    <br><br><br><font size=4 align='left'> Benvenuto, &nbsp Amministratore!</font>
    <div align='center' class="home_admin">
	<br>
	<br>
	<br>
	  <h3 align='center' style="color: red"> Cosa pu&ograve fare l'amministratore? </h3>
	  <font size=4> L'amministratore del sito ha il compito di gestire il database dei libri e delle relative <br> 
	  prenotazioni fatte dagli utenti. <br> Pu&ograve aggiungere nuovi libri alla lista dei testi gi&agrave presenti, rimuovere
	  un libro dal database, <br> modificare il numero di copie disponibili di un determinato libro, vedere tutti i libri<br>
	  presenti all'interno del database, controllare le prenotazioni dei libri e registrare, <br> 
	  se &egrave necessario, un altro amministratore.	  
	  </font>
	  <br>
	  <br>
	  <img src="../user/library.jpg" alt = "biblioteca scolastica" width='250' height='180' />
	  <br>
	  <br>
	  <br>
	  <br>
	  <h3 align='center-left' style="color: red"> A cosa serve la gestione della disponibilit&agrave dei libri? </h3>
	  <font size=4> Questa funzione &egrave utile in due casi: <br> 
	  <br> -Se un libro subisse dei danni,verrebbe temporaneamente eliminato dalla disponibilit&agrave <br> 
	  &nbsp e il compito dell'amministratore in questo caso sarebbe quello di aggiornare <br> 
	  &nbsp il numero copie presenti per evitare disguidi&nbsp con l'utente(potrebbe prenotare un libro <br>
	  &nbsp che in realt&agrave non &egrave disponibile in quanto soggetto a manutenzione).
	  <br> &nbsp Ovviamente una volta riparato, il libro torner&agrave ad essere disponibile e presente nuovamente nell'elenco.<br><br>
      -A restituzione avvenuta, l'amministratore dovr&agrave rendere nuovamente disponibile quel libro. 	  
	  </font>
      <br>
	  <br>
	  <br>
	  <br>
	  <h3 align='center-left' style="color: red"> Come accertarsi che la ricevuta presentata dall'utente per la prenotazione del libro sia autentica? </h3>
	  <font size = 4> La ricevuta contiene informazioni relative all'utente, al libro e alla prenotazione. <br>
	  L'amministratore potr&agrave <br>
	  cercare il codice della prenotazione nell'apposita pagina di ricerca, se i dati corrispondono con quelli <br> 
	  presenti nella ricevuta, la stessa potr&agrave essere autenticata.
	  <br>
	  <br>
	  <br>
	</div>			
  </body>
</html>
