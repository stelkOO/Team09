<?php 

require "config.php";
require "functions.php";

 $keresett = $_GET['keresett'] ?? '';
 findcode($keresett);
 
 

?>
