<?php
require "config.php";
require "templates.php";
require "functions.php";

is_login();

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
	<link rel="icon" type="image/webp" href="files/img/logo.webp">
    <title>CodeVault</title>
</head>
<body>
    <?php nav(); ?>
    <div class="container contacts-container">
    <div class="contacts-card text-center">
        <h2 class="contacts-title">Kapcsolat</h2>
        <p>Amennyiben kérdésed vagy problémád van, keress minket az alábbi elérhetőségeken:</p>
        <div class="contacts-details">
            <p><strong>Email cím:</strong> <a href="mailto:phpora2024@gmail.com">phpora2024@gmail.com</a></p>
            <p><strong>Projektnév:</strong> CodeVault</p>
            <p><strong>Cég székhelye:</strong> Budapest, József utca 9.</p>
            <p><strong>Probléma bejelentése:</strong> <a href="report.php">Kattints ide</a></p>
        </div>
    </div>
</div>
</body>
</html>
