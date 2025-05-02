<?php 

	$conn = new mysqli("localhost", "root", "", "Project_CodeVault");
	
	if($conn->connect_error){
		die("Sikertelen kapcsolódás! ".$conn->connect_error);
	}

?>