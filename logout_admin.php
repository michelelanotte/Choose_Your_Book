<?php
  session_start();
  $_SESSION['logged_admin'] = false;
  header("location: login.php"); 
?> 