<?php
$hostname='localhost';	
$username = "root";
$password = "";
$dbname = "NotaryHub";
$conn = new mysqli($hostname,$username,$password,$dbname);
	session_start();
	$get_id = $_SESSION['uid'];
	
  
		$sql = "UPDATE discount_data SET discount='$_POST[discount]' ,No_of_documents='$_POST[document]'
		WHERE Id='$get_id'";
	$conn->query($sql);
header("location:discountlist.php");
?>