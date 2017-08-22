<?php
$hostname='localhost';	
$username = "root";
$password = "";
$dbname = "NotaryHub";
$conn = new mysqli($hostname,$username,$password,$dbname);
	session_start();
	$get_id = $_SESSION['uid'];
	
	echo $get_id;
  
		$sql = "UPDATE Price SET file_size='$_POST[size]' ,amount_Rs='$_POST[amount]'
		WHERE Id='$get_id'";
	$conn->query($sql);
	
	echo $get_id;
	echo "size = $_POST[size]";
	echo "amount= $_POST[amount]";
header("location:pricelist.php");
?>