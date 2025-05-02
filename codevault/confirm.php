<?php
require "config.php";
require "templates.php";
require "functions.php";
is_login();

//bejelentkezett felhasználó
$my_user = get_user();
//vásárolt fájl
$file = get_data("select * from files where id=$_GET[file_id]");
//fájl készítője
$file_user = get_data("select * from users where id=$file[userid]");


if(isset($_POST['confirm_btn'])){
	if($_POST['confirm_text']=='megerősítés'){
		
		if($my_user['token'] > $file['token']){
			//fájl feltőnek a token kiosztása
			$conn->query( "UPDATE users SET token = token + {$file['token']} WHERE id = {$file_user['id']}");
			//vásárlótol levonás
			$conn->query( "UPDATE users SET token = token - {$file['token']} WHERE id = {$my_user['id']}");
			message("Sikeres fizetés");
			file_payment($file['id'],$file_user['id'],$my_user['id'],$file['token']);
			file_download($file['id']);
			
		}else{
			alert_link('Nincs elég fedezet', 'index.php');
		}
	}
	
}

file_payment($file['id'],$file_user['id'],$my_user['id'],$file['token']);


?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Művelet megerősítése - CodeVault</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <?php nav(); ?>
    <div class="container d-flex justify-content-center align-items-center confirm-container">
        <div class="card text-center confirm-card">
            <?php if (isset($_GET['file_id'])): ?>
                <h2 class="mb-3 confirm-title">Sikeres művelet!</h2>
                <p class="mb-4 confirm-text">A fájl sikeresen feldolgozva (ID: <?= htmlspecialchars($_GET['file_id']) ?>).</p>
            <?php else: ?>
                <h2 class="mb-3 confirm-title">Nincs megadva azonosító!</h2>
                <p class="mb-4 confirm-text">Nem adtál meg érvényes azonosítót a művelethez.</p>
            <?php endif; ?>
            <a href="index.php" class="btn btn-primary confirm-button">Vissza a főoldalra</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>