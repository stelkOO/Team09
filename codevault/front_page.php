<?php
require "config.php";
require "templates.php";
require "functions.php";

setcookie("landed",1,time()+360000);

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
	
</head>
<body >
	
	<section class="container mt-5">
        <div class="container frontpage-container">
        <h1 class="frontpage-title">Üdvözlünk a CodeVault oldalán!</h1>
        <p class="frontpage-subtitle">A CodeVault egy egyedi platform, ahol egyedi kódkéréseket adhatsz le, amelyeket adminisztrátoraink átnéznek, értékelnek és jóváhagyás után megvásárolhatóvá tesznek.</p>

        <div class="row mt-5">
            <div class="col-md-4 mb-4">
                <div class="card p-3 frontpage-card" style="background-color:#0b58a6;">
                    <h4 class="card-title"style="color:white;">Szakmai ellenőrzés</h4>
                    <p class="card-text"style="color:white;">Minden beküldött kérést szakértőink átnéznek és minősítenek, hogy garantált legyen a minőség.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card p-3 frontpage-card" style="background-color:#0b58a6;">
                    <h4 class="card-title"style="color:white;">Biztonságos vásárlás</h4>
                    <p class="card-text" style="color:white;">Csak ellenőrzött, jóváhagyott kódokat kínálunk megvételre, hogy nyugodt szívvel vásárolhass.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card p-3 frontpage-card" style="background-color:#0b58a6;">
                    <h4 class="card-title" style="color:white;">Közösségi támogatás</h4>
                    <p class="card-text" style="color:white;" >Csatlakozz egy fejlődő közösséghez, ahol a tudásmegosztás és a szakmai segítség alapvető érték.</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-5" >
            <a href="login.php" class="btn btn-lg frontpage-button" style="background-color:#0b58a6;">Regisztrálj!</a>
        </div>
    </section>
</body>

</html>


