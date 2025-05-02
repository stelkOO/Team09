<?php
require "config.php";
require "templates.php";
require "functions.php";
is_login();

$user_id = $_GET['id'];
$user = get_data("select * from users where id=$user_id");

if (isset($_POST['send_btn'])) {
    submit_review($user_id);
}
if (isset($_POST['chat_btn'])) {
    new_chat($user_id, get_user()['id']);
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/webp" href="files/img/logo.webp">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <title>CodeVault</title>
</head>
<body class='user_profile'>

<?php nav(); ?>

<div class='user_box'>
    <div class='user_header'>
        <h1><i class="fa-solid fa-circle-user fa-lg me-1"></i><?= $user['username'] ?></h1>
        <form method='post' action='user_profile.php?id=<?= $user_id ?>'>
            <input type='submit' value='beszélgetés' name='chat_btn'>
        </form>
    </div>
    <p>Átlagos felhasználói értékelés: <?= number_format(user_rating($user_id), 1) ?>/5</p>
</div>



<form action='user_profile.php?id=<?= $user_id ?>' method='post'>
    <select name='point' required>
        <option value='1'>1 pont</option>
        <option value='2'>2 pont</option>
        <option value='3'>3 pont</option>
        <option value='4'>4 pont</option>
        <option value='5'>5 pont</option>
    </select>
    <input type='text' name='description' placeholder='Vélemény indoklása'>
    <input type='submit' name='send_btn' value='Beküldés'>
</form>

<?php
load_reviews("select * from ratings where to_id=$user_id");
echo "<hr><br>";
echo "<h1>Feltöltések:</h1>";
load_requests("where userid=$user_id");
?>

</body>
</html>
