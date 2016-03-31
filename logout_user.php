<?php
  session_start();
  $_SESSION['logged_user'] = false;
  header("location: login.php"); 
?> 