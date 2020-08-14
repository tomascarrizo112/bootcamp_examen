<?php 

  $servername = "localhost";

  $username = "root";

  $password = "";
  
  $dbname = "bootcamp";


  // Create connection
  
  	$mysqli = new mysqli($servername, $username, $password, $dbname);

	  $mbd = new PDO('mysql:host=localhost;dbname=bootcamp', $username, $password);


 ?>