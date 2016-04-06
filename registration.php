<?php
  include("connect_database.php");
  if((@$_POST['password'] != "") && (@$_POST['username'] != ""))
    if(strlen($_POST['password']) > 7 && $_POST['username'] != NULL){  
      @$name = trim(mysqli_real_escape_string($conn, $_POST['name']));
      @$surname = trim(mysqli_real_escape_string($conn, $_POST['surname']));
      @$date = $_POST['date'];
      @$nation = $_POST['nation'];
      @$email = trim($_POST['email']);
      @$username = trim(mysqli_real_escape_string($conn, $_POST['username'])); 
      @$password = md5($_POST['password']);
      @$sex = $_POST['sex']; 	  
      $query = mysqli_query($conn, "SELECT * FROM users");    
	  $insert =  mysqli_query($conn,"INSERT INTO users (name,surname,date_birth,nation,email,sex,username,password) VALUES ('$name','$surname','$date','$nation','$email','$sex','$username','$password')") 
        or header("location: registration(html).php?failed=Username non disponibile!");	  
		  
      $_POST['username'] = "";
      $_POST['password'] = ""; 
      if($insert)	  
	    header("location: login.php");
    }
    else{
	  header("location: registration(html).php?failed=La password non <br> rispetta i requisiti!");
    }
  else
	 header("location: registration(html).php?failed=Campi obbligatori vuoti!");
  
  mysqli_close($conn);   
?>
