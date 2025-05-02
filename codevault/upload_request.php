<?php
require "config.php";
require "templates.php";
require "functions.php";
is_login();

$user = get_user();

if(isset($_POST['upload_btn'])){
	if($user['token'] >= $_POST['offered_credits']){
		$conn->query("update users set token=token-$_POST[offered_credits]");
		$conn->query("insert into request values(id,$user[id], '$_POST[request_name]','$_POST[request_description]',$_POST[offered_credits],'$_POST[language]')");
		message("sikeres feltöltés");
	}else{
		
		message("Nincs elég kredited!");
	}
	
}

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/webp" href="files/img/logo.webp">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <title>CodeVault</title>
</head>
<?PHP
nav();
?>
<body class="upload-page">
	<div class="container mt-5">
		<h2 class="text-white text-center">Kód feltöltése</h2>
		<div class="upload-container p-4 rounded shadow-lg bg-dark text-white">
			<form method="post" action="upload_request.php">
				<div class="mb-3">
					<label for="request_name" class="form-label">Kérés neve</label>
					<input type="text" class="form-control" id="request_name" name="request_name" required>
				</div>
				<div class="mb-3">
					<label for="request_desc" class="form-label">Kérés leírása</label>
					<textarea class="form-control" id="request_desc" name="request_desc" rows="3" required></textarea>
				</div>
				<div class="mb-3">
					<label for="request_reward" class="form-label">Kérés jutalma</label>
					<input type="number" class="form-control" id="request_reward" name="request_reward" required>
				</div>
				<div class="mb-3">
					<label for="category" class="form-label">Kategória</label>
					<select class="form-select" id="category" name="category" required>
						<option value="c#">C#</option>
						<option value="java">Java</option>
						<option value="python">Python</option>
						<option value="php">PHP</option>
					</select>
				</div>
				<button type="submit" name="upload-btn" class="btn btn-primary w-100">Feltöltés</button>
			</form>
		</div>
	</div>
</body>
</html>
	
