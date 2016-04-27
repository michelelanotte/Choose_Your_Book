<?php
  //instructions that allows to connect to DB
  $server = "localhost";
  $username = "root";
  $password = "";
  $db = "manage_db";
  $conn = mysqli_connect($server, $username, $password, $db); 
  if(!($conn)) {
    die ('Non riesco a connettermi: errore ');
  }
?>