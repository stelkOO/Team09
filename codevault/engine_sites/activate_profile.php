<?php
require "../functions.php";

$f_code= $conn->query("select * from profile_codes where code='$_GET[code]'");
if(mysqli_num_rows($f_code) ==1){
	$code = $f_code->fetch_assoc();
	$user = get_data("select * from profile_requests where id=$code[userid]");
	$conn->query("insert into users values(id,'$user[username]','$user[password]',0,'$user[email]',10,'live')");
	$conn->query("delete * from profile_requests where id=$user[id]");
	$conn->query("delete * from profile_codes where id=$code[id]");
	
	alert_link("Sikeres megerősítés","../login.php");
	
}



?>