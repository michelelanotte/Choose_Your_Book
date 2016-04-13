<?php
@session_start();
	    include("../connect_database.php");
	    if ($_SESSION['logged_user'] != true) {
	      header("location: ../login.php");
	    }
	    else {
		$name_book = $_GET['file'];
		$find = mysqli_query($conn, "SELECT * FROM books WHERE Name_File = '$name_book';");
		$tmp_file = mysqli_fetch_array($find);
			 header("Content-Type:" . $tmp_file['Type_File']);
			 echo $tmp_file['File'];		 
		}
?>