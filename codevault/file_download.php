<?php
require"config.php";
require"functions.php";
if(is_admin_value()){
	file_download($_GET['id']);
	alert_link("Sikeres letöltés","admin_index.php");
}else{
	alert_link("Nincs jogosultságod","index.php");
	
}



?>