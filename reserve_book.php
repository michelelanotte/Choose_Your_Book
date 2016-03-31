<html>
  <head>
    
	<?php
	  @session_start();
	  if ($_SESSION['logged_user'] != true)
	  {
	    header("location: login.php");
	  } 
    ?>
	
  </head>
  
<?php
  include("connect_database.php");
  @session_start();
  $title = $_GET['title'];
  $query = mysqli_query($conn, "SELECT * FROM books WHERE Title = '$title';");
  $book = mysqli_fetch_array($query);
  if($book['Available'] > 0){
	$query = mysqli_query($conn, "UPDATE books SET Available = Available - 1 WHERE Title = '$title'");   
	header("location: receipt.php?title=$title");
  }
  else{
	header("location: view_books_user.php?failed=Libro non disponibile!!");
  }
?>