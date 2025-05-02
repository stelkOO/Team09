<?php

$to = "stelkooli@gmail.com"; // Címzett e-mail címe
$subject = "Téma"; // Az e-mail tárgya
$message = "Ez egy teszt e-mail üzenet."; // Az üzenet szövege
$headers = "From: sender@example.com"; // Feladó e-mail címe

if (mail($to, $subject, $message, $headers)) {
    echo "Az e-mail sikeresen elküldve!";
} else {
    echo "Hiba történt az e-mail küldése során.";
}





?>