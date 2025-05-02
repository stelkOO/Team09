<?php
require "config.php";
require "templates.php";
require "functions.php";




?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<link rel='stylesheet' href='styles.css'>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<link rel="icon" type="image/webp" href="files/img/logo.webp">
    <title>CodeVault</title>
	<?php 
		nav(); 
	?>
</head>
<body>

	<h1 class="text-center my-4">Értesítéseid</h1>

	<div class="container mt-4 mb-5" id="notification-container">
	<?php 
		load_notifications(); 
		see_notifications(); 
	?>
	</div>

</body>
</html>