<?php
require "../config.php";


$keresett = isset($_POST['search']) ? trim($_POST['search']) : '';


$query = "SELECT * FROM request";
if (!empty($keresett)) {

    $keresett = $conn->real_escape_string($keresett);
    $query = "SELECT * FROM request WHERE description LIKE '%$keresett%'";
}


$lekerdezes = $conn->query($query);


if ($lekerdezes->num_rows > 0) {
    while ($request = $lekerdezes->fetch_assoc()) {
        $requestname = htmlspecialchars($request['name']);
        $description = htmlspecialchars(substr($request['description'], 0, 20)) . (strlen($request['description']) > 20 ? '...' : '');
        
        echo "<div class='doboz'>";
        echo "<a href='file.php?id={$request['id']}'><div class='code'>
                <h2>{$requestname}</h2>
              </div></a>
              <div class='leiras'><p>{$description}</p></div>";
        echo "</div>";
    }
} else {
    echo "<p>Nincs találat.</p>";
}
?>
