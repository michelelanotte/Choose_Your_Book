<html>
  <head>
    <link rel = "stylesheet" href = "../css/style_admin.css" type = "text/css">
	<meta name = 'viewport' content = 'width = device-width, initial-scale = 1.0'>
  </head>
  
  <body style = 'background-color: white'> 
    <form action = 'reg_admin.php' method = 'POST'>
	  <h2 align = 'center' style = ' color : #C0C0C0;'> <font size = '6' face = 'Courier'> &nbspCrea il tuo account </font> </h2>
	  <div align = 'center' class = 'containerReg'>
        <br>
		<b> Nome: </b>
		<br>		
		<input size = 24 type = 'text' name = 'name' placeholder = 'Nome'>
		<br>
		<br>		
		<b> Cognome: </b>
		<br>		
		<input size = 24 type = 'text' name = 'surname' placeholder = 'Cognome'>
		<br>
		<br>
		<b> Data di nascita: </b> 
		<br>
		<input style = ' width: 200px;' align = 'center' type = 'date' name = 'date'> 
		<br>
		<br>		
		<b> Paese: </b> 
		<br>
		<select style = ' width: 200px;' name = 'nation'>
          <option value = 'default' select = 'selected'>  </option>	
		  <option value = 'Italia'> Italia </option>
		  <option value = 'Franciara'> Francia </option>
		  <option value = 'Germaniaer'> Germania </option>
		  <option value = 'Stati Uniti'> Stati Uniti </option>
		  <option value = 'Spagna'> Spagna </option>
		  <option value = 'Portogallo'> Portogallo </option>
		  <option value = 'Belgio'> Belgio</option>
		  <option value = 'Olanda'> Paesi Bassi </option>
		  <option value = 'Russia'> Russia </option>
		</select>
		<br>
		<br>
        <b> Email: </b> 
		<br>
	    <input size = 24 type = 'email' name = 'email' placeholder = 'esempio@hotmail.it'> 
		<br>
		<br>
		<b> Sesso: </b> 
		<br>		
        <select style = ' width: 200px;' name = 'sex'>
          <option value = 'default' select = 'selected'>  </option>	
		  <option value = 'male'> Maschio </option>
		  <option value = 'female'> Femmina </option>
		</select>
		<br>
		<br>
		<b> *Username: </b> 
		<br>
		<input size = 24 type = 'text' name = 'username' placeholder = 'Username'> 
		<br>
		<br>
        <b> *Password: (min 8 caratteri) </b> 
        <br>
		<input size = 24 type = 'password' name = 'password' placeholder = 'Password'> 
		<br>
		<p>* campi obbligatori</p>
		<br>
		<input class = 'buttonReg' type = 'submit' value = 'Conferma iscrizione' name = 'invio'>  
		<input class = 'buttonReg' type = 'button' value = 'Torna alla home' name = 'invio' onclick = "location.href = 'administrator.php'"> 
        
		<?php
		  echo "<br><br><font size = 4 color = 'red'>" . @$_GET['failed'] . "</font>";
	    ?>
	  </div>
	</form>	  
  </body>
</html>