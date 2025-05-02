<?php
require "config.php";

if (!isset($_COOKIE['userid'])) {
    header("Location: login.php");
}

$f_request = $conn->query("SELECT * FROM request WHERE id = $_GET[id]");
$request = $f_request->fetch_assoc();

if (isset($_POST['upload-btn'])) {

   
    $cel_mappa = "files/file/";
	 // Feltöltött fájl neve
	 $fajl_nev = $_FILES['file-to-upload']['name'];
    
    // Fájl kiterjesztése
    $fajl_tipus = pathinfo($fajl_nev, PATHINFO_EXTENSION);

    // meret
    $fajl_merete = $_FILES['file-to-upload']['size'];

    //fájl típusok elmentése
    $elfogadott_tipusok = ['rar', 'zip'];

    // 20mb méret szabályozása
    $max_fajl_merete = 20 * 1024 * 1024;  /

    // Új, egyedi fájl név generálása
    $fajl_nev = uniqid('file_', true) . '.' . $fajl_tipus;
    $cel_fajl = $cel_mappa . $fajl_nev;

    // Ellenőrzése a fájl típusának
    if (!in_array(strtolower($fajl_tipus), $elfogadott_tipusok)) {
        echo "<script>alert('Csak .zip vagy .rar fájlokat tölthetsz fel!');</script>";
    }
    //Méret ellenőrzése
    elseif ($fajl_merete > $max_fajl_merete) {
        echo "<script>alert( Maximum 10 MB engedélyezett');</script>";
    } 
   
    else {
        // Ellenőrizzük, hogy a fájl már létezik-e
        if (file_exists($cel_fajl)) {
            echo "<script>alert('Próbáld meg kérlek újra!');</script>";
        } else {
            $name = $_POST['name'];
            $date = date('Y-m-d H:i:s');
            
            // fájl adatai feltöltése az adatbázisba
            $conn->query("INSERT INTO files VALUES ($_COOKIE[userid], '$name', '$fajl_nev', '$date', '$_POST[desc]', $request[id])");

            // fájl áthelyezése a megfelelő mappába
            move_uploaded_file($_FILES['file-to-upload']['tmp_name'], $cel_fajl);
            echo "<script>alert('Sikeres feltöltés!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fájl feltöltés</title>
</head>
<body>
    <div class='request'>
        <?= $request['name'];?><br>
        <?= $request['description'];?>
    </div>
    <h1>Kód feltöltése</h1>
    <form action="solution.php?id=<?=$request['id'];?>" method="post" enctype="multipart/form-data">
        <label>Kód neve</label><br>
        <input name="name" type="text" placeholder="Név"><br><br>
        
        <label>Kód leírása</label><br>
        <input name="desc" type="text" placeholder="Leírás"><br><br>
        
        <label>Válassz egy fájlt:</label>
        <input type="file" name="file-to-upload" accept=".rar, .zip"><br><br>
        
        <button type="submit" name="upload-btn">Feltöltés</button>
    </form>
</body>
</html>
