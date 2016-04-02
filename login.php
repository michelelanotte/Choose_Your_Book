<html>
  <head>
	<style>
	  * {
          box-sizing: border-box;
        }
		
	.col-1 {width: 10%; border-color: red; }
    .col-2 {width: 20%;}
    .col-3 {width: 25%;}
    .col-4 {width: 33%;}
    .col-5 {width: 41%;}
    .col-6 {width: 80%;}
    .col-7 {width: 58%;}
    .col-8 {width: 66%;}
    .col-9 {width: 75%;}
    .col-10 {width: 83%;}
    .col-11 {width: 91%;}
    .col-12 {width: 100%;}

    [class* = "col-"]
	{
      float: left;
	}
	
	</style>
	<meta name = 'viewport' content = 'width = device-width, initial-scale = 1.0'>
	<link rel = "stylesheet" href = "css/style_css.css" type = "text/css">
  </head>
  
  <body class = 'background' background = 'sfondo_login.jpg'>
	<form action = 'login.php' method = 'POST'>
	  <br>	  
	  <div class = 'container'>
		<div class = 'col-6'>
	      <font size = 6 color = 'white' face = 'Lucida Calligraphy'> LOGIN: </font> 
		  <br>
		  <br>
          <input style = "height: 40px; width: 220px; height: 3em; border-radius: .5em;" type = 'text' name = 'username' placeholder = "Username">
          <br> 		   
		  <input style = " height: 40px; width: 220px; border-radius: .5em;" type = 'password' name = 'password' placeholder = "Password">
		  <br> 
		  <br>
	      <input style = 'background-color: #66CC99; margin: 0px 9px 10px 5px; width: 16.5em; height: 3em; border-radius: .6em;' type = 'submit' value = 'Accedi'> 	 
		  <p style = 'margin: 2px 9px 10px 0px;'><a href = "user/registration(html).php"><font color = 'red'> Non sei ancora iscritto? <br> Cosa aspetti, registrati! </font></p>
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

	  