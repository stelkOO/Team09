<?php
//ha nincs is bejentkezés
if(!isset($_COOKIE['userid'])){
	header("Location:login.php");
}

setcookie("userid", '', time() - 86400, '/');

    header("Location: index.php");
   

?>
