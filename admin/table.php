<?php
	session_start();
	require_once('../config.php');
	
	if(!isset($_SESSION['id'])) {
		header('Location:../index.php');
	}
  if(!isset($_GET['page'])){
	$page='';  
  }
	 else{
	  $page=$_GET['page'];
  }
	 $_SESSION['paging']=$page;

if(isset($_GET['sorting'])){
     $_SESSION['sorting']=$_GET['sorting'];
}
else{
	$_SESSION['sorting']='ASC';
}
		 
if(isset($_GET['field'])){		 
     $_SESSION['field']=$_GET['field'];
}
else{
	$_SESSION['field']='id';
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

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
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
                    <a class="navbar-brand" href="#">Table List</a>
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
<select name="limit" id="limit" >
  <option value="5">5</option>
  <option value="10">10</option>
  <option value="15">15</option>
  <option value="25">25</option>
</select>
</form>	
<div style="float:right;">								 
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>

</div>
<div>								
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
</html>
<!--
<script>
	function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
	var page= getParameterByName('page');
	
</script>
-->

<script>
$(document).ready(function(){

 load_data();
$('#limit').change(function(){
  var setlimit = $(this).val();
 var search = $('#search_text').val();
	if(setlimit !=0){
		if(search != ''){
			
			var search = $('#search_text').val();
			load_data(search,setlimit);
		}
		else
		{
			
		  load_limit(setlimit);	
		}
	}
  else {
	if(search != ''){
			load_data(search);
		}
		else
		{
			alert("null1");
		  load_data();	
		}  
  }
	  	
});
 function load_data(query,limit)
 {
  $.ajax({
   url:"search_db.php",
   method:"POST",
   data:{query:query,setlimit:limit},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
	
	function load_data(query)
 {
  $.ajax({
   url:"search_db.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
function load_limit(limit)
 {
  $.ajax({
   url:"search_db.php",
   method:"POST",
   data:{setlimit:limit},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }


 $('#search_text').keyup(function(){
	 var limit = $('#limit').val();
  var search = $(this).val();
	
  if(search != '')
  {
	  if(limit != ''){
		   var limit = $('#limit').val();
		 
   load_data(search,limit);
	  }
	  else {
		  load_data(search);
		  }
      }
  else
  {
	  if(limit != 0){
   load_limit(limit);
	  }
	  else {
		  load_data();
		  }
  }
 });
	
	
	
});
</script>





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



