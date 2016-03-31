<html>
  <body id = 'background' background = 'sfondo_login.jpg'>
	<form action = 'login.php' method = 'POST'>
	  <br>
	  <link rel = "stylesheet" href = "style_css.css" type = "text/css">
	    <div id = 'container'>
	      <font size = 6 color = 'white' face = 'Lucida Calligraphy'> LOGIN: </font> 
		  <br>
		  <br>
          <input style = "height: 40px; width: 220px; height: 3em; border-radius: .5em;" type = 'text' name = 'username' placeholder = "Username">
          <br> 		   
		  <input style = " height: 40px; width: 220px; border-radius: .5em;" type = 'password' name = 'password' placeholder = "Password">
		  <br> 
		  <br>
		  <br>
		  <div id = 'access'>
	        <input style = 'background-color: #66CC99; width: 16.5em; height: 3em; border-radius: .6em; margin: -5px 0 0 65px;' type = 'submit' value = 'Accedi'> 	 
		    <div id = 'alternative'>
		      <p><a href = "registration.html"><font color = 'red'> Non sei ancora iscritto? <br> Cosa aspetti, registrati! </font></p>
		    </div>
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
		  header("location: administrator.php");
		break;
		
		case 0:
		  $_SESSION['logged_user'] = true;
		  $_SESSION['user'] = $row['username'];
		  header("location: homepage.php"); 
		break;
	  }	
  }
  mysqli_close($conn);
?> 

	  