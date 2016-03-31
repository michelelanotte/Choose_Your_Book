<?php
  include("connect_database.php");
  @session_start();
  $title = $_GET['title'];
  $query = mysqli_query($conn, "SELECT * FROM books WHERE Title = '$title';");
  $book = mysqli_fetch_array($query);
  if($book['Available']){
	$query = mysqli_query($conn, "UPDATE books SET Available = 0 WHERE Title = '$title'");
    header("location: receipt.php");
  }
  else{
	header("location: view_books_user.php?failed=Libro non disponibile!!");
  }
?>