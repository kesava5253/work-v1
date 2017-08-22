<?php
include("database.php");
$id=$_POST['UserId'];
$sql = "Update userdata  SET password='$_POST[password]' where Id ='$id'";

$conn->query($sql);
$_SESSION['userid']=$id;
header("location:table.php");
?>
