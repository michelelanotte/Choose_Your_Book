<html>
  <head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style_login.css" type="text/css">
  </head>
  
  <body style="top: 100%; left: 100%; background-size: cover; width: 100%; height: 100%" background = "background_login.jpg">
	<form action="login.php" method='POST'>
	  <br>	  
	  <div class="containerLogin">
		<div class="col-6">
	      <font class="title" size=6 color='white' face='Lucida Calligraphy'> LOGIN: </font> 
		  <br>
		  <br>
          <input style="outline: none; width: 220px; height: 2.5em; border-width: 0.5px; border-radius: .4em;" type="text" name="username" placeholder='Username' required>
          <br> 		   
		  <input style="outline: none; width: 220px; height: 2.5em; border-width: 0.1px; border-radius: .4em;" type="password" name="password" placeholder='Password' required>
		  <br> 
		  <br>
	      <input style="outline: none;" class="submit" type="submit" value='Accedi'> 	 
		  <p style="margin: 2px 9px 10px 0px;"><a style="text-decoration: none;" href="registration_html.php">
		      <font color='red'> &nbsp Non sei ancora iscritto? <br> Cosa aspetti, registrati! </font></p>
		</div>
      </div>
    </form>
  </body>
</html>

<?php
  session_start();
  include("connect_database.php");
  @$username = trim($_POST['username']);
  @$password = md5($_POST['password']);
  $query = mysqli_query($conn, "SELECT * FROM users");
  
  /*with next instruction, the variable row will contains all rows from users. With the controls between fields into
    the table and input values, there will be authenticate*/
  while($row = mysqli_fetch_array($query))
  {
    if($row['username'] === $username && $row['password'] === $password)
      switch($row['admin']){
        case 1: 
		  $_SESSION['logged_admin'] = true;       
		  header("location: admin/administrator.php");
		break;
		
		case 0:
		  $_SESSION['logged_user'] = true;
		  $_SESSION['user'] = $row['username'];
		  header("location: user/homepage.php"); 
		break;
	  }	
  }
  mysqli_close($conn);
?> 

	  