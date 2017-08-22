<?php
  session_start();
	if(!isset($_SESSION['id'])) {
		header('Location:../index.php');
	}
?>


<?php 

$connect = new mysqli("localhost", "root", "", "NotaryHub");

$query="SELECT date,count(id) as NewUser from UPLOADS where date BETWEEN '2017-08-01' AND Now() GROUP BY `date` ";

$result=$connect->query($query);
$chart_data = '';
while($row=$result->fetch_assoc()){

  $chart_data .= "{ Date:'".$row["date"]."', newuser:".$row["NewUser"]."}, ";
}
?>








<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

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

<!-- charts -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  



	
<style>
.active11 {
	font-size: 25px;
	align-items: center;
	align-self: center;
	background: url('images.jpg') center ;
	border-radius: 100%;
	display: flex;
	flex-direction: column;
	min-height: 150px;
	justify-content: center;
	width: 150px;
}
.center{
top: 40%;
left:0px;
right:auto;
margin-left: 300px;
}
 .footer{
	background-color: #FFF;
position:fixed;
bottom: 0px;
width: 100%;
text-align: center;
}

.button {
    background-color: purple; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

.button1 {width: 250px;height:150px;}
.button1:hover {background-color: #3e8e41}
.button2:hover {background-color:red}

</style>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Notary Hub
                </a>
            </div>

            <ul class="nav">
                <li class="active">
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
                <li>
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
                    <a href="pricelist.php">
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
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    

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
								   <i class="pe-7s-power"></i>
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
<div >
         
<div style="margin-left:10px">
<div class="w3-container">
  <div class="dashboard clearfix">
<div style="height:50px">
 <h3 style="text-align : left"> Welcome Administrator </h3>
</div>
<center>
 <ul class="tiles" >
<button class="button button1 " onclick="window.location.href='table.php'" ><b>User Details</b></button>
<button class="button button1" onclick="window.location.href='listFiles.php'"><b>Find Document</b></button>
<button class="button button1" onclick="window.location.href='admin/.html'"><b>Download Documnets</b></button>
<button class="button button1" onclick="window.location.href='index.html'"><b>Payment History</b></button>    
   </ul>

</center>
</div>
<div>
     
            

                
                    <div class="col-md-5">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> New Users</h4>
                                
                                <p class="category"></p>
                            </div>

                            <div class="content">
                                 <div class="container" style="width:200px;">
                                    
                                  <br /><br />
                                 <div id="chart"></div>
                                  </div>
                                  </div>

                               
                            </div>
                        </div>
</div>
                    

                   


<div class="col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">File Uploades</h4>
                            </div>
                            <div class="content">
                                <div id="" class="ct-chart">



<div class="container" style="width:300px;">
   <div id="chart1"></div>
  </div>



</div>



</div>
                              
<div style="height:85px;">
</div>








               



        <footer class="footer">
            <div class="container-fluid">
                
             
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

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Admin Dashboard</b>."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>




<script>
Morris.Area({

 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'Date',
 ykeys:['newuser'],
 labels:['newusers'],
 hideHover:'auto',
 stacked:true
});
</script>


<script>
Morris.Bar({

 element : 'chart1',
 data:[<?php echo $chart_data; ?>],
 xkey:'Date',
 ykeys:['newuser'],
 labels:['newusers'],
 hideHover:'auto',
 stacked:true
});
</script>









</html>
