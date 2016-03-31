<html>
  <body>
    
	<?php
	  @session_start();
	  if ($_SESSION['logged_user'] != true)
	  {
	    header("location: login.php");
	  } 
	
      include("connect_database.php");
	  $title = $_GET['title'];
	  $username = $_SESSION['user'];
	  $query = mysqli_query($conn, "SELECT * FROM books WHERE Title = '$title';");
	  $book = mysqli_fetch_array($query);
      if($book['Available'] > 0)
	  {
		$modify_availability = mysqli_query($conn, "UPDATE books SET Available = Available - 1 WHERE Title = '$title'");   
		header("location: receipt.php?title=$title");
		$data = time();
        $data = date('Y-m-d H:i:s', $data);
		$id = $book['ID'];
		$insert_info = mysqli_query($conn, "INSERT INTO reservations(date, ID_books, username) 
		  VALUES('$data', '$id', '$username');");
      }
      else{
	    header("location: view_books_user.php?failed=Libro non disponibile!!");
      }
    ?>
  </body>
</html>