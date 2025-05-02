<?php
//index oldal, de a requestekkel, egybe hozni index oldallal??
require "config.php";


	




?>

<!DOCTYPE html>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeVault</title>
    <link rel="stylesheet" href="styles.css">
</head>

    <header class="header">
       


 
           
		   <nav>
                <a href="index.php">Kezdőlap</a>
               <a href="#">Termékek</a>
                
				
				<?php
				if(!isset($_COOKIE['userid'])){
				?>
				<a href="login.php?site=login">Bejelentkezés</a>
				<?php }else{ ?>
				<a href="upload.php">Kód feltöltése</a>
				<a href="logout.php">Kijelentkezés</a>
				<?php } ?>
				
            </nav>
    
    </header>
	<body onload="load();">
	    <form method="post">
        <input name="kereso" id="kereso" type="text" placeholder="Kód keresése">
		</form>

   
        <h1><div class="talalatok" id="talalatok"></div></h1>
  

    <script>
        function load() {
            const keresett = document.getElementById("kereso").value.toLowerCase();
            
            $("#talalatok").load("find_requests.php?keresett=" + keresett);
            document.getElementById("kereso").addEventListener('keyup', load);
        }
    </script>

   
</body>

</html>

