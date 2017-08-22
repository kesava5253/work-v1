
<?php
session_start();
include("database.php");

$id=$_GET['userid'];
$sql ="SELECT * FROM userdata where Id ='$id'" ;
$result=$conn->query($sql);
while($row=$result->fetch_assoc()){
$fname=$row['username'];
$lname=$row['lname'];
$mail=$row['email'];
$pass=$row['password'];
$phone=$row['Phone_Number'];
}

?>        

<html lang="en">
  <head>
<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>profile</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />





 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  
<link rel='stylesheet prefetch' href='https://drop-uploader.borisolhor.com/pe-icon-7-stroke/css/pe-icon-7-stroke.css'>



      <link rel="stylesheet" href="css/uploadstyle.css">

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





   
<style>
input[type=text], select {
    
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;

}
div.a1{
width:100%;
height:70%;
}
input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width:150px;
}

input[type=submit]:hover {
    background-color: #45a049;
}
div.aa{
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>

  </head>

  <body>








<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="sidebar-4.jpg">

    <!--
        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag
    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
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
                            <a href="#">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

<div >
         
<div style="margin-left:0px">
<div class="w3-container">

  <div class="dashboard clearfix">
<div style="height:10px">
</div>
<center>

    <div class="header-wrapper">
      
<div class="a1">
     <form id="form1" name="myform"  method="post"  onsubmit="editprofile.php"  >

    <div>              

    </div> 

    <h2 align="center"> User Profile</h2>

    <table id="table1";  align="center">

       <tr>
              <td  align="right" class="style1">First Name</td>

              <td class="style1" ><input type="text"  id="fname" name="fname"  value="<?php echo $fname ?>" required /> <div id="div1"></div></td>
              

       </tr>
       <tr>
              <td  align="right" class="style1">Last Name</td>

              <td class="style1" ><input type="text" id="lname" name="lname"  value="<?php echo $lname ?>"  required /> <div id="div2"></div></td>
       </tr>
       <tr>
              <td  align="right" class="style1">Email Id</td>

              <td class="style1" ><input type="text"  id="emailid" name="email"  value="<?php echo $mail ?>"/> <div id="div3"></td>
              <div id="email_error" class="val_error"></div>
       </tr>

       
       <tr>

              <td align="right">Password</td>

              <td><input type="text" name="pwd" id="pwd"   value="<?php echo $pass ?>" /></td>

       </tr>

 
   <tr>

              <td align="right">Mobile Number</td>

              <td><input type="text" name="mobile" id="phno"  value="<?php echo $phone ?>"  /><div id="div5"></td>

       </tr>



</table> 
    <center>
    <button type="submit"  href="editprofile.php" >Edit</button><a href="editprofile.php">fff</a>
    <input type="submit" onclick="window.location.href='editprofile.php'" value="EDIT" />
   </center>
    </form>





</div>


<div style="height:60px">
</div>




</center>
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
                <p>
                    &copy 2017 <a href="http://www.rihusoft.com">RihuSoft</a>
                </p>
            </div>
        </footer>

    </div>
</div>


<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://drop-uploader.borisolhor.com/js/drop_uploader.js'></script>

    <script src="js/uploadindex.js"></script>









</div>

</div>
</body>
</html>
