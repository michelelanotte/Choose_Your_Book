<?php
  //creation DB and hers tables if not exist it
  //Authentication admin -->   Username: admin   Password: prova1234
  $conn = mysqli_connect("localhost", "root", "");
  $db = mysqli_query($conn, "CREATE DATABASE my_chooseyourbook");
  $books = mysqli_query($conn, "CREATE TABLE IF NOT EXISTS my_chooseyourbook.books( 
                                  ID int(11) NOT NULL AUTO_INCREMENT,
								  Title varchar(100) NOT NULL,
								  Author varchar(200) NOT NULL,
								  Year_publication year(4) DEFAULT NULL,
								  Available int(11) NOT NULL,
								  File longblob,
								  Name_File varchar(100) DEFAULT NULL,
							      Type_File varchar(100) DEFAULT NULL,
								  PRIMARY KEY (ID),
						          UNIQUE KEY Title (Title)
								)") or die ("Tabella non creata");
								
  $reservations = mysqli_query($conn, "CREATE TABLE IF NOT EXISTS my_chooseyourbook.reservations(
									     ID int(11) NOT NULL AUTO_INCREMENT,
										 date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                         ID_book int(11) DEFAULT NULL,
                                         username varchar(50) DEFAULT NULL,
                                         PRIMARY KEY (ID)
									   )") or die ("Tabella non creata");
									   
  $users = mysqli_query($conn, "CREATE TABLE IF NOT EXISTS my_chooseyourbook.users(
                                  name varchar(30) DEFAULT NULL,
								  surname varchar(30) DEFAULT NULL,
								  date_birth date DEFAULT NULL,
								  nation varchar(30) DEFAULT NULL,
								  email varchar(50) DEFAULT NULL,
								  username varchar(50) NOT NULL,
								  password varchar(350) NOT NULL,
                                  admin tinyint(1) NOT NULL DEFAULT '0',
								  PRIMARY KEY (`username`)
								)") or die ("Tabella non creata");
	
  $password = md5('prova1234');	
  $admin_account = mysqli_query($conn, "INSERT INTO my_chooseyourbook.users(username,password,admin)
                                          VALUES('admin','$password', 1)");
									
  //check if the database was created
  if($db && $books && $reservations && $users && $admin_account)
	echo "Database creato!";
  else
    echo "Database non creato!";
mysqli_close($conn);
?>								