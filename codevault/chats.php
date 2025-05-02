<?php
require "config.php";
require "templates.php";
require "functions.php";
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeVault - Beszélgetések</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
	<link rel="icon" type="image/webp" href="files/img/logo.webp">
</head>
<body>
    <?php nav(); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 p-3 chats-sidebar">
                <h5 class="mb-4">Üzenetek</h5>
                <div class="list-group chats-list">
                    <?php get_chats(get_user()['id']); ?>
                </div>
            </div>
            <div class="col-md-10 p-0 chats-content">
                <iframe id="chat-frame" src="" style="width: 100%; height: 100vh; border: none;"></iframe>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function openChat(chatId) {
      
        const frame = document.getElementById('chat-frame');
        frame.src = 'chat.php?id=' + chatId;

      
        const links = document.querySelectorAll('.chat-link');
        links.forEach(link => link.classList.remove('active'));

        
        const triggeringLink = Array.from(links).find(link => link.getAttribute('onclick')?.includes(chatId));
        if (triggeringLink) {
            triggeringLink.classList.add('active');
        }

      
        window.scrollTo(0, 0);
    }
</script>

</body>
</html>
