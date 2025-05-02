<?php
require "config.php";
require "functions.php";

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
    $user = $f_user->fetch_assoc();
?>
<link rel='stylesheet' href='styles.css'>

<div class="code_file">
    <h1><a href="user_profile.php?id=<?= $user['id']; ?>"><?= htmlspecialchars($user['username']); ?></a></h1>
    <p><?= htmlspecialchars($code['name']); ?></p>
    <p><?= nl2br(htmlspecialchars($code['description'])); ?></p>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file-to-upload" required>
        <button type="submit" name="upload">Fájl feltöltése</button>
    </form>
</div>
<?php 
} else {
    echo "<p>Nincs ilyen feladat!</p>";
    echo "<p>Nincs ilyen feladat!</p>";
} 
?>
