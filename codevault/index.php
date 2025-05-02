<?php
require "config.php";
require "templates.php";
require "functions.php";
is_login();
// $keresett = isset($_GET['search']) ? trim($_GET['search']) : '';


	




?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<link rel="icon" type="image/webp" href="files/img/logo.webp">
    <title>CodeVault</title>
	<?php nav();?>
</head>
<body >
	
	<?php 
	filter();
	load_requests(filter_value());
	
	?>

 
</body>

</html>


