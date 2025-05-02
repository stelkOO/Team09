<?php
require "config.php";
require "templates.php";
require "functions.php";
is_login();
is_admin();
// $keresett = isset($_GET['search']) ? trim($_GET['search']) : '';


	




?>
<!DOCTYPE html>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/webp" href="files/img/logo.webp">
	<link rel="icon" type="image/webp" href="files/img/logo.webp">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
    <title>CodeVault</title>
	<?php nav();?>
</head>
<body >
	
	<div class="container reports-container mt-4">
        <div class="reports-card p-4 text-center">
            <?php load_reports_admin(); ?>
        </div>
    </div>

 
</body>

</html>


