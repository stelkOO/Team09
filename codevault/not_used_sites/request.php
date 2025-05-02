<?php
//kód igénylése, és feltöltése az adatbázis oldalra

require "config.php";
// ha nincs bejelentkezés
if(!isset($_COOKIE['userid'])){
	header("Location:login.php");
}

if(isset($_POST['btn'])){
	$conn->query("insert into request values(id,$_COOKIE[userid], '$_POST[name]','$_POST[description]')");
	
}



?>
<form method='post' action='request.php'>
<input type='text' name='name' placeholder='Név' required>
<input type='text' name='description' placeholder='Leírás' required>
<input type='submit' name='btn' value='Beküldés' >

</form>