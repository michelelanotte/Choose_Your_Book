<?php
  include("../connect_database.php"); 
  session_start();
  if((@$_POST['password'] != "") && (@$_POST['username'] != "")) {
    if(strlen($_POST['password']) > 7 && $_POST['username'] != NULL) {
      @$name = ucfirst(trim(mysqli_real_escape_string($conn, $_POST['name'])));
      @$surname = ucfirst(trim(mysqli_real_escape_string($conn, $_POST['surname'])));
	  @$surname = trim(mysqli_real_escape_string($conn, $surname));
      @$date = $_POST['date'];
      @$nation = $_POST['nation'];
      @$email = trim($_POST['email']);
      @$username = trim(mysqli_real_escape_string($conn, $_POST['username']));  
      @$password = md5($_POST['password']);
      $admin = true;	  
      $insert =  mysqli_query($conn,"INSERT INTO users (name,surname,date_birth,nation,email,username,password,admin) 
		VALUES ('$name','$surname','$date','$nation','$email','$username','$password','$admin')") 
        or header("location: reg_admin_html.php?failed=Username non disponibile!");		  
              
      $_POST['username'] = NULL;
      $_POST['password'] = NULL;		
      if($insert)  
        header("location: administrator.php");
	}
    else {
	  header("location: reg_admin_html.php?failed=La password non <br> rispetta i requisiti!");
    }
  }
  else {
	header("location: reg_admin_html.php?failed=Campi obbligatori vuoti!");
  }
  mysqli_close($conn);	 
?>
