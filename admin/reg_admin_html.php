<html>
  <head>
  <?php
  session_start();
    if ($_SESSION['logged_admin'] != true) {
      header("location: ../login.php");
    }
  ?>
    <link rel="stylesheet" href="../css/style_admin.css" type="text/css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  
  <body class="display" style="background-color: white">
    <form action="reg_admin.php" method="POST">
	  <h2 style="color : #C0C0C0" align='center'> <font size='6' face='Courier'> &nbspCrea il tuo account </font> </h2>
	  <div align='center' class="form-horizontal" style="background-color: #FAEBD7">
        <br>
		<b> Nome: </b>
		<br>		
		<input class="form-control" style="width: 250px;" type="text" name="name" placeholder="Nome">
		<br>
		<br>		
		<b> Cognome: </b>
		<br>		
		<input class="form-control" style="width: 250px;" type="text" name="surname" placeholder="Cognome">
		<br>
		<br>
		<b> *Username: </b> 
		<br>
		<input class="form-control" style="width: 250px;" type="text" name="username" placeholder="Username" required> 
		<br>
		<br>
        <b> *Password: (min 8 caratteri) </b> 
        <br>
		<input class="form-control" style="width: 250px;" type="password" name="password" value="" placeholder="Password" required> 
		<br>
		<p>* campi obbligatori</p>
		<br>
		<input style="outline: none;" class="buttonReg" type="submit" value="Conferma iscrizione" name="invio">  
		<input style="outline: none;" class="buttonReg" type="button" value="Torna alla home" name="invio" onclick="location.href='administrator.php'"> 
        
		<?php
		  echo "<br><br><font size=4 color='red'>" . @$_GET['failed'] . "</font>";
	    ?>
	  </div>
	</form>	  
  </body>
</html>