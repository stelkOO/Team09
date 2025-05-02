<?php
require "config.php";
require "functions.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p class='text-danger'>Hiányzó partner azonosító!</p>";
    exit;
}

$to = (int)$_GET['id'];
$from = get_user()['id'];

// partner ellenőrzése
$partner = get_data("SELECT * FROM users WHERE id = $to");
if (!$partner || count($partner) === 0) {
    echo "<p class='text-danger'>Nem található ilyen partner.</p>";
    exit;
}

// üzenetküldés
message_send($from, $to);
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beszélgetés</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
	<link rel="icon" type="image/webp" href="files/img/logo.webp">
</head>
<body class="chat-body">

    <div class="chat-wrapper">
    <div class="chat-area">
        <div class="message-container">
        <?php get_messages($from, $to); ?>
        </div>

        <form action="chat.php?id=<?= $to ?>" method="POST" name="send-message">
        <input type="text" name="message_field" placeholder="Üzenet…" required autocomplete="off">
        <input type="submit" value="Küldés" name="send_btn">
        </form>
    </div>
    </div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
   const container = document.getElementById("messageContainer");
    if (container) {
      container.scrollTop = container.scrollHeight;
    }
    
   
  });
</script>

</body>
</html>
