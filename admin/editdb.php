<?php
session_start();
$id=$_SESSION['userid'];
$page=$_SESSION['pageno'];
$username = "root";
$password = "";
$dbname = "NotaryHub";
$con = new mysqli("localhost",$username,$password,$dbname);
$sql = "Update userdata  SET username='$_POST[fname]',lname='$_POST[lname]',email='$_POST[email]',password='$_POST[password]',Phone_Number='$_POST[phone]',city='$_POST[city]',state='$_POST[state]' where Id ='$id'";

$con->query($sql);
$_SESSION['userid']=$id;
header("location:table.php?page=$page");

?> 
