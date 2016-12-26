 <?php

$host 		= "localhost";
$user		= "Webgebruiker";
$password	= "Labo2017";
$database	= "Webshop";	
 


	$link = mysqli_connect($host, $user, $password) or die("Er kan geen connectie gelegd worden met $host");

	$database = mysqli_select_db($link, "webshop") or die("databank $database niet beschikbaar".mysqli_error());
 ?>





