<?php
session_start();
$id=$_POST['UserId'];
$page=$_SESSION['pageno'];
$username = "root";
$password = "";
$dbname = "NotaryHub";
$con = new mysqli("localhost",$username,$password,$dbname);
$sql = "Update userdata  SET password='$_POST[password]' where Id ='$id'";

$con->query($sql);
$_SESSION['userid']=$id;
header("location:table.php?page=$page");
?>
