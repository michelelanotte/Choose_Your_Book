<html>
  <head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style_login.css" type="text/css">
  </head>
  
  <body style="top: 100%; left: 100%; background-size: cover;" background = "background_login.jpg">
	<form action="login.php" method='POST'>
	  <br>	  
	  <div class="containerLogin">
		<div class="col-6">
	      <font class="title" size=6 color='white' face='Lucida Calligraphy'> LOGIN: </font> 
		  <br>
		  <br>
          <input style="width: 220px; height: 2.5em; border-width: 1px; border-radius: .4em;" type="text" name="username" placeholder='Username'>
          <br> 		   
		  <input style="width: 220px; height: 2.5em; border-width: 1px; border-radius: .4em;" type="password" name="password" placeholder='Password'>
		  <br> 
		  <br>
	      <input class="submit" type="submit" value='Accedi'> 	 
		  <p style="margin: 2px 9px 10px 0px;"><a style="text-decoration: none;" href="registration_design.php">
		      <font color='red'> &nbsp Non sei ancora iscritto? <br> Cosa aspetti, registrati! </font></p>
		</div>
      </div>
    </form>
  </body>
</html>

<?php
  session_start();
  include("connect_database.php");
  @$username = $_POST['username'];
  @$password = md5($_POST['password']);
  $query = mysqli_query($conn, "SELECT * FROM users");
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

	  