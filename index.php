<?php	session_start();	require_once('config.php');?><!DOCTYPE html><html><head>	<title>User's Account Activiation/Deactivation</title>		<link href="css/bootstrap.css" rel="stylesheet" media="screen">		<link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">		<link rel="stylesheet" type="text/css" href="css/style1.css"></head><body><?php	if(isset($_POST['submit'])) {		$username = $_POST['username'];		$password = $_POST['password'];		$result = $dbh->prepare("SELECT * FROM admin WHERE username= :username AND password= :password");		$result->bindParam(':username', $username);		$result->bindParam(':password', $password);		$result->execute();		$rows = $result->fetch(PDO::FETCH_NUM);		if($rows > 0) {			$result=$dbh->prepare("SELECT * FROM admin WHERE username= :username");			$result->bindParam(':username', $username);			$result->execute();			while($row = $result->fetch(PDO::FETCH_ASSOC)){				$res_id = $row['Id'];				$curr_status = $row['status'];			}				if($curr_status== 0) {					$message = "Sorry <b>$username</b>, your account is temporarily deactivated by the admin.";				}else{					$_SESSION['id'] = $res_id;					header("location: admin/AdminDashBoard.php?logid=$res_id");				}		}		else{			$message = 'Username and Password are not exists.';		}	}?><div class="container"><h1 align="center">Admin's LogIn</h1><hr>	<form action="index.php" method="post" align="center">		<div class="form-group">			<label for="name">Username:</label>			<input type="text" id="username" name="username" class="form-control" placeholder="Username" autofocus required />		</div>		<div class="form-group">			<label for="name">Password:</label>			<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>		</div>		<div>			<?php				if(!empty($message)) {					echo "<p style='color: red; padding: 2px;'>".$message."</p>";				}			?>		</div>		<input type="submit" name="submit" value="Access Account" class="btn btn-primary"/>	</form><br/></div></body></html>