<?php
	session_start();
	require_once('../config.php');
	
	if(!isset($_SESSION['id'])) {
		header('Location:../index.php');
	}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Notary Hub</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.rihusoft.com" class="simple-text">
                    ADMINISTRATOR
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="AdminDashBoard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="userdata.php">
                        <i class="pe-7s-user"></i>
                        <p>User Profiles</p>
                    </a>
                </li>
                <li >
                    <a href="table.php">
                        <i class="pe-7s-note2"></i>
                        <p>Users List</p>
                    </a>
                </li>
                <li>
                    <a href="listFiles.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Documents</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
				
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Table List</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret"></b>
                                    <span class="notification">5</span>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               Account
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Dropdown
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="../logout.php">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Users Account Information</h4>
                              
                            </div>
                            <div class="content table-responsive table-full-width">
		<!--   Drop Down to set limit         -->
<form method="GET" action="">
Set Limit :								
<select name="limit" id="limit" onChange="window.location='table.php?setlimit='+this.value"  >
  <option value="5">-Limit-</option>
  <option value="5">5</option>
  <option value="10">10</option>
  <option value="15">15</option>
  <option value="25">25</option>
</select>
</form>								
								
								
                                <table class="table table-hover table-striped" id="table_view">
                                    <thead>
                                        <th><a href="?orderBy=Id">Id:</a></th>
                                    	<th><a href="?orderBy=username">Username:</a></th>
                                    	<th><a href="?orderBy=email">Email Id:</a></th>
										<th>Status</th>
										
                                    </thead>
                                    <tbody>
										
																  
<?php		
	if(isset($_GET['setlimit'])){
	    $limit=$_GET['setlimit'];
	}
	   else{
	   $limit=5;
	}
$orderBy = array('Id', 'username', 'email');
$page="";

$order = 'Id';
if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy)) {
    $order = $_GET['orderBy'];
}	
// Pagination	
	
										
										
if(isset($_GET["page"])){
	
	$page=$_GET["page"];
}
else{
	$page=1;
}
															
	if($page=="" || $page=="1")
	{
		$page1=0;
	}
	else{
	$page1=($page*$limit)-$limit ;
}
	$page=(int)$page;		
										
			$result=$dbh->prepare("Select * From userdata Order By $order ASC limit $page1,$limit");
			$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC))
{
 $Id=$row['Id'];
 $user=$row['username'];
 $mail=$row['email'];
$status=$row['status'];
	
	if($status == '1'){
		$stat ="active";
	?>	  	 <tr>
               <td><?php echo $Id ?></td>
        <?php	
         echo "<td><a href='editprofile.php?userid=$Id' style='color: #cc0000'>$user</a></td>";
			?>
               <td><?php echo $mail ?></td>
            <?php	
			   echo "<td><a href='update_status.php?userid=$Id'>Active</a></td>";
			?>
             </tr>
  <?php   
	}
	else{
		$stat="Deactivated";
	
	
	?>
         <tr>
            <td><?php echo $Id ?></td>
		<?php	
		echo "<td><a href='editprofile.php?userid=$Id' style='color: #cc0000'>$user</a></td>";
		?>
             <td><?php echo $mail ?></td>
        
			<?php	
				  echo "<td><a href='update_status.php?userid=$Id'>Deactivated</a></td>";
			?>
            </tr>
<?php
	}
}
										
$real=$dbh->prepare("Select * From userdata");
$real->execute();
$count=$real->rowCount();
$a=ceil($count/$limit);
	?>
           </tbody>
	</table>
<?php   if($page>1){ ?>
						<button><a href="table.php?page=<?php echo ($page-1)?>"style="text-decoration:none"> Previous </a> 	</button>
		<?php } ?>							<?php
			           for($b=1;$b<=$a;$b++){  ?>
			<button><a href="table.php?page=<?php echo $b?>"style="text-decoration:none"><?php echo $b." ";?></a></button><?php
			}
										?>
								
<?php if($page<$a) { ?>
										<button><a href="table.php?page=<?php echo ($page+1)?>"style="text-decoration:none"> next</a> </button>
          <?php } ?>                      

                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2017 <a href="http://www.rihusoft.com">Rihu Soft</a>
                </p>
            </div>
        </footer>


    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
