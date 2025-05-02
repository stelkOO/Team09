<?php
require "config.php";
require "templates.php";
require "functions.php";

is_login();
is_admin();
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

    <div class="container admin-page-container">
        <h1 class="admin-page-title">Admin page!</h1>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card p-4 text-center admin-card">
                        <?php load_users_admin(); ?>
                    </div>
                </div>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
