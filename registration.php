<?php
  include("connect_database.php");
  if((@$_POST['password'] != "") && (@$_POST['username'] != ""))
    if(strlen($_POST['password']) > 7 && $_POST['username'] != NULL){  
      @$name = $_POST['name'];
      @$surname = $_POST['surname'];
      @$date = $_POST['date'];
      @$nation = $_POST['nation'];
      @$email = $_POST['email'];
      @$username = $_POST['username']; 
      @$password = md5($_POST['password']);
      @$sex = $_POST['sex']; 	  
      $query = mysqli_query($conn, "SELECT * FROM users");    
	  $insert =  mysqli_query($conn,"INSERT INTO users (name,surname,date_birth,nation,email,sex,username,password) VALUES ('$name','$surname','$date','$nation','$email','$sex','$username','$password')") 
        or die ("<h3 align = center style = 'color: red'>Registrazione fallita! <br> Probabilmente hai inserito un username gi&agrave 
		  utilizzato  <br><br> Attendi 3 secondi, tornerai automaticamente alla pagina di registrazione</h3>");	  
		  
      $_POST['username'] = "";
      $_POST['password'] = ""; 
      if($insert)	  
	    header("location: login.php");
    }
    else{
	  echo "<h3 align = center style = 'color: red'> La password non <br> rispetta i requisiti! <br><br> 
	    Attendi 3 secondi, tornerai automaticamente alla pagina di registrazione</h3>";
    }
  else
	 echo "<h3 align = center style = 'color: red'> Campi obbligatori vuoti! 
       <br><br> Attendi 3 secondi, tornerai automaticamente alla pagina di registrazione</h3>";
  
  mysqli_close($conn);
  header("Refresh: 3; registration.html");    
?>
