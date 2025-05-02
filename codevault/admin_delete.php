<?php
require "config.php";
require "templates.php";
require "functions.php";
is_login();
is_admin();
if(isset($_POST['cancel'])){
	alert_link("Visszairányítás a főoldalra", "admin_index.php");
}
if(isset($_POST['delete'])){
	$data_base = $_GET['data_base'];
	
	$conn->query("delete from $data_base where id=$_GET[id]");
	alert_link("Sikeres törlés","admin_index.php");
}




?>
<!DOCTYPE html>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
    <title>CodeVault</title>
	<?php nav();?>
</head>
<body>
	<h1 class="text-center my-4 text-light">Biztosan törölni szeretnéd?</h1>

	<div class="container d-flex justify-content-center">
	<div class="delete-box text-center p-4 rounded">
		<form method="post">
		<button type="submit" name="cancel" class="btn btn-secondary btn-lg me-3">Mégse</button>
		<button type="submit" name="delete" class="btn btn-danger btn-lg">Törlés</button>
		</form>
	</div>
	</div>

</body>
</html>