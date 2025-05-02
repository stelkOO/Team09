<?php
session_start();
require "config.php";
require "functions.php";

if(!isset($_GET['id'])){
	message('Helytelen URL');
	
	
}
if(!isset($_SESSION['target'])){
	$_SESSION['target'] = $_GET['id'];
	
}






?>