<?php
include_once 'database.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Free Multipager Template : Linuji</title>

    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- ANIMATE STYLE  -->
    <link href="assets/css/animate.css" rel="stylesheet" />
    <!-- FLEXSLIDER STYLE  -->
    <link href="assets/css/flexslider.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONTS  -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css' />
     <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css' />
</head>
<body>

 <div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                    <h1 style="color:#008080">NOTARY</h1>
                </a>

            </div>
            <div class="right-div">
<strong>Support : </strong>  rihu@rihusoft.com
            </div>
          
        </div>
    </div>
    <!-- LOGO HEADER END-->

	
				<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
					<div class="profile-sidebar">
						<div class="profile-userpic">
							<img src="assets/img/profile.png"  alt="">
						</div>
						<div class="profile-usertitle">
							<div class="profile-usertitle-name">Username</div>
							<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
						</div>
						<div class="clear"></div>
					</div></br></br></br></br>
					<div class="divider"></div>
					<form role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					</form>
					<ul class="nav menu">
					<li class="active"><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
					<li><a href="view.php"><em class="fa fa-upload">&nbsp;</em> Recent Uploads</a></li>
					<li><a href="charts.html"><em class="fa fa-download">&nbsp;</em> Downloads</a></li>
					<li><a href="elements.html"><em class="fa fa-pencil">&nbsp;</em> edit profile</a></li>
			
					<li><a href="login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
					</ul>
				</div><!--/.sidebar-->
			</div>
		</div>
	</div>
</div>
<div class="middle">
<h2 style="left:1000px">Your Uploads</h2>
<div id="body">
	<table width="80%" border="1">
    
    <tr>
    <td><strong>File Name</strong></td>
    <td><strong>File Type</strong></td>
    <td><strong>File Size(KB)</strong></td>
    <td><strong>View</strong></td>
    </tr>
      <?php
	$sql="SELECT * FROM UPLOADS";
	$result_set=$conn->query($sql);
	while($row=$result_set->fetch_assoc())
	{
		?>
        <tr>
        <td><?php echo $row['file'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
	}
	?>
    </table>
    
</div></div>
</body>
</html>
