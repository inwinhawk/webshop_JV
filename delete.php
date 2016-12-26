<?php
include 'dbconnect.php';
// sql to delete a record
session_start();
		if(isset($_GET['ID']))
		{
		$ID = $_GET["ID"];
		$sql = "DELETE FROM klant WHERE Klant_ID = ".$ID." ";

		if (mysqli_query($link, $sql)) 
		{
			header("Refresh:0,url=admin.php");
		} 
		else 
		{
			echo "Error deleting record: " . mysqli_error($link);
		}
		mysqli_close($link);
		}
		
		if 

?>