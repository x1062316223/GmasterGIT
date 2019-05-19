<?php
	$servername = "localhost";
	$user = "root";
	$pw = "";
	$dbname = "product";
						
	$conn = new mysqli($servername, $user, $pw, $dbname);
	if ($conn -> connect_error){
		die("Connection failed: ".$conn -> connect_error);
	}
?>