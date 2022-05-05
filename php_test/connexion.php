<?php 
 define("HOST", "localhost");
 define("username", "root");
 define("password", "");
 define("database", "boutique");
  $mysqli = new mysqli(HOST, username, password, database);


 if ($mysqli->connect_errno) {
   printf("Connect failed: %s<br />", $mysqli->connect_error);
   exit();
 }
//  printf('Connected successfully.<br />');