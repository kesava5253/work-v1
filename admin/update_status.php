<?php
	session_start();
	if(!isset($_SESSION['id'])) {
		header('Location:../index.php');
	}
	
	require_once('../config.php');
	
	$get_userid = $_GET['userid'];
	$_SESSION['alert']=$get_userid;
	$result=$dbh->prepare("Select * From userdata Where Id='$get_userid'");
	$result->execute();
	while($row = $result->fetch(PDO::FETCH_ASSOC)){	
		echo $curr_status = $row['status'];
	}
		
	if($curr_status == 1) {
		$sql = "UPDATE userdata 
        SET status=?
		WHERE Id=?";
		
		$this_status = 0;
		$q = $dbh->prepare($sql);
		$q->execute(array($this_status, $get_userid));
		
	} else {
		$sql = "UPDATE userdata 
        SET status=?
		WHERE Id=?";
		
		$this_status = 1;
		$q = $dbh->prepare($sql);
		$q->execute(array($this_status, $get_userid));
		
	}

header("location: table.php");
?>