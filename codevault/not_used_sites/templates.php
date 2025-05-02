<?php
function nav(){
	?>
	
<nav>
    <a href="index.php"></a>
    <a href="#"></a>

    <?php if (!isset($_COOKIE['userid'])): ?>
        <a href="login.php?site=login"></a>
    <?php else: ?>
        <a href="upload.php"> </a>
        <a href="logout.php"></a>
    <?php endif; ?>

    
</nav>



<?php }

function kereso() {
    $keresett = $_GET['search'] ?? ''; 
    ?>
    <form method="get">
        <input type="text" name="search" placeholder="Keresés a leírásban..." value="<?= htmlspecialchars($keresett); ?>">
        <button type="submit">Keresés</button>
    </form>
    <?php
}

?>

