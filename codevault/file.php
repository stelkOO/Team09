<?php
require "config.php";
require "functions.php";
require "templates.php";

// ha a felhasználó nincs bejelentkezve
if (!isset($_COOKIE['userid'])) {
    header("Location: login.php");
    exit;
}

// ha nincs id a linkben
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

// ha a form elküldésre került
if (isset($_POST['upload']) && isset($_FILES['file-to-upload'])) {
    upload_file($_GET['id']);
}

// Lekérdezés a request táblából
$f_code = $conn->query("SELECT * FROM request WHERE id = " . intval($_GET['id']));

// ha nincs találat
if ($f_code && mysqli_num_rows($f_code) > 0) {
    $code = $f_code->fetch_assoc();

    // Felhasználó lekérdezése
    $f_user = $conn->query("SELECT * FROM users WHERE id = " . intval($code['userid']));
	if(mysqli_num_rows($f_user) > 0){
		 $user = $f_user->fetch_assoc();
		 $username= $user['username'];
	}else{
		$username = 'Törölt fiók';
	}
   if(isset($_POST['download_btn'])){
	file_download($_GET['download_id']);
}
?>

<!DOCTYPE html>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<html lang="hu">
<head>
<link rel="icon" type="image/webp" href="files/img/logo.webp">
    <meta charset="UTF-8">
	<link rel="icon" type="image/webp" href="files/img/logo.webp">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeVault</title>
	<?php nav();?>
</head>
<?php



?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="styles.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
    <div class="code_file">
        <h1><a href="user_profile.php?id=<?= $user['id']; ?>"><?= $username; ?></a></h1>
        <p><?= htmlspecialchars($code['name']); ?></p>
        <p><?= nl2br(htmlspecialchars($code['description'])); ?></p>

        <form method="post" enctype="multipart/form-data">
            <input type="file" name="file-to-upload" required>
            <button class="upload-btn" type="submit" name="upload">Fájl feltöltése</button>
        </form>
    </div>
    <div class='file_box'>
	
    <?php
	$id = $_GET['id'];
	load_files('select * from files where requestid='.$id);
	
	?>
    </div>
    <?php 
    } else {
        echo "<p>Nincs ilyen feladat!</p>";
       
    } 
    ?>
</body>
</html>