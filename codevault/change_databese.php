<?php
require "config.php";

$sql = $conn->query("SELECT * FROM files");

while($adat = $sql->fetch_assoc()) {
    $token = rand(1, 10);
    $conn->query('UPDATE files SET token=' . $token . ' WHERE id=' . $adat['id']);
}
?>
