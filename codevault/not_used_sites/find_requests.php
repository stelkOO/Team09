<?php 
//kód kérések közötti keresés, request.php ba belinkelve
require "config.php";

$keresett = $_GET['keresett'] ?? '';
//keresés aktiv

if ($keresett !== '') {
   
    $lekerdezes = "SELECT * FROM request 
                   WHERE name LIKE '%$keresett%' 
                   OR description LIKE '%$keresett%' 
                   ORDER BY id";
    $talalat = $conn->query($lekerdezes);

    if ($talalat && $talalat->num_rows > 0) {
        while ($code = $talalat->fetch_assoc()) {
            $codename = $code['name'];
            $leiras = substr($code['description'], 0, 20) . (strlen($code['description']) > 20 ? '...' : '');
            echo "<a href='solution.php?id={$code['id']}'><div class='code'>
                    <h2>{$codename}</h2>
                   
                  </div></a><div class='leiras'><p>{$leiras}</p></div>";
        }
    } else {
        echo "Nincs találat...";
    }
	//a keresés üres, összes kilistázása
} else {
   
    $talalat = $conn->query("SELECT * FROM request ORDER BY id");

    if ($talalat && $talalat->num_rows > 0) {
        while ($code = $talalat->fetch_assoc()) {
            $codename = $code['name'];
            $leiras = substr($code['description'], 0, 20) . (strlen($code['description']) > 20 ? '...' : '');
            echo "<a href='solution.php?id={$code['id']}'><div class='code'>
                    <h2>{$codename}</h2>
                  
                  </div></a><div class='leiras'><p>{$leiras}</p></div>";
        }
    }
}

?>
