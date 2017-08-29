<?php
	session_start();
	require_once('../config.php');
	
	if(!isset($_SESSION['id'])) {
		header('Location:../index.php');
	}
  if(isset($_GET["id"])){
  	$get_id=$_GET["id"];
  	$_SESSION['uid']=$get_id;
  }
  else{
   $get_id=""; 
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


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


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
                <a href="http://www.creative-tim.com" class="simple-text">
                    Administrator
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
                    <a href="table.php">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li class="active">
                    <a href="table.php">
                        <i class="pe-7s-note2"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li>
                    <a href="listFiles.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Documents</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-config"></i>
                        <p>Configuration</p>
                    </a>
                </li>
                <li>
                    <a href="pricelist.php">
                        <i class="pe-7s-cash"></i>
                        <p>PriceList</p>
                    </a>
                </li>
				      <li>
                    <a href="discountlist.php">
                        <i class="pe-7s-piggy"></i>
                        <p>Discount</p>
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
    
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               Account
                            </a>
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
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Discounts</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                             <form method="POST" name="proform" action="update_discount.php">
                                <table class="table table-hover">
                                    <thead>
										<th>Id</th>
                                        <th>No of Documents</th>
                                    	<th>Discount</th>
                                       <th></th>
                                    </thead>
                                    <tbody>
         <?php
      $result =$dbh->prepare("Select * from discount_data ");
      $result->execute();
      while($row=$result->fetch(PDO::FETCH_ASSOC)){
      	
            
      
?>                                        <tr>
                                        	<td><?php echo $row["Id"] ?></td>
                 <?php                       	
                                   if($row["Id"]==$get_id){
                          ?>
                                     <td> <input type="text"   name="document" size="3"  value="<?php echo $row['No_of_documents'] ?>"></td>   	                
                                    <td> <input type="text"   name="discount" size="3" value="<?php echo $row['discount'] ?>"></td>
                            
                           		<td><input type="submit" name="update" style="color:green" value="Update" ></td>
       <?php
    }
    else {
           ?>
				<td><?php echo $row["No_of_documents"] ?></td>
            	<td><?php echo $row["discount"] ?></td>
                            
                           		<td><button><a href="discountlist.php?id=<?php echo $row['Id']?>">Change</a> </button></td>
                           <?php 
                        }
                     }
                     ?>
                                     </tr>  
                                    </tbody>
                                 
                                </table>
                                </form>

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
                    &copy; 2016 <a href="http://www..com">Rihu Soft</a>
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
