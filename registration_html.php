<html>
  <head>
    <link rel="stylesheet" href="css/style_user.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  
  <body class="display" style="background-color: white">
    <form action="registration.php" method="POST">
	  <h2 style="color : #C0C0C0" align='center'> <font size='6' face='Courier'> &nbspCrea il tuo account </font> </h2>
	  <div align='center' class="form-horizontal" style="background-color: #FAEBD7">
        <br>
		<b> *Nome: </b>
		<br>		
		<input class="form-control" style="width: 250px;" type="text" name="name" placeholder="Nome" required>
		<br>
		<br>		
		<b> *Cognome: </b>
		<br>		
		<input class="form-control" style="width: 250px;" type="text" name="surname" placeholder="Cognome" required>
		<br>
		<br>
		<b> *Email: </b> 
		<br>
	    <input class="form-control" style="width: 250px;" type="email" name="email" placeholder="esempio@hotmail.it" required> 
		<br>
		<br>
		<b> Data di nascita: </b> 
		<br>
		<input class="form-control" style="width: 200px;" align='center' type="date" name="date"> 
		<br>
		<br>		
		<b> Paese: </b> 
		<br>
		<select class="form-control" style = "width: 200px;" name="nation">
          <option value="default" selected="selected"></option>	
		  <option value="Italia"> Italia </option>
		  <option value="Francia"> Francia </option>
		  <option value="Germania"> Germania </option>
		  <option value="Stati Uniti"> Stati Uniti </option>
		  <option value="Spagna"> Spagna </option>
		  <option value="Portogallo"> Portogallo </option>
		  <option value="Belgio"> Belgio </option>
		  <option value="Olanda"> Paesi Bassi </option>
		  <option value="Russia"> Russia </option>
		</select>
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
		<input style="outline: none;" class="Submit" type="submit" value="Conferma iscrizione" name="invio">  
		<input style="outline: none;" class="Submit" type="button" value="Torna al login" name="invio" onclick="location.href='login.php'"> 
        
		<?php
		  echo "<br><br><font size=4 color='red'>" . @$_GET['failed'] . "</font>";   //print error like "username already used"
	    ?>
	  </div>
	</form>	  
  </body>
</html>