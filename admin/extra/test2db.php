<?php
//fetch.php
session_start();
function pagination($limit){	
$page=$_SESSION['paging'];	
	if($page=="" || $page=="1")
	{
		$page1=0;
	}
	else{
	$page1=($page*$limit)-$limit ;
}
	$page=(int)$page;
	
	return array($page1,$page);
}

$connect = mysqli_connect("localhost", "root", "", "NotaryHub");
$output = '';
$search='';
if(isset($_POST['query'])){
  $search = mysqli_real_escape_string($connect, $_POST["query"]);	
}
if(isset($_POST['setlimit'])){
  $limit = $_POST['setlimit'];	
  $start = pagination($limit)[0];
  $page = pagination($limit)[1];
}
else {
  $limit=5;	
  $start = pagination($limit)[0];
  $page = pagination($limit)[1];
}
if($search != '') {
		if($limit != 0){
			  echo "query - limit";
		  $query = "SELECT * FROM userdata 
 				   WHERE username LIKE '%".$search."%'
  				   OR email LIKE '%".$search."%' 
  				   OR Id LIKE '%".$search."%' 
				   OR city LIKE '%".$search."%' 
 				   OR state LIKE '%".$search."%'
  				   LIMIT $start,$limit";
	  		  }
		else {
			  $query = "SELECT * FROM userdata 
 				   WHERE username LIKE '%".$search."%'
  				   OR email LIKE '%".$search."%' 
  				   OR Id LIKE '%".$search."%' 
				   OR city LIKE '%".$search."%' 
 				   OR state LIKE '%".$search."%'
  				   ";
	
			}
}
//set limit
else {
		
		if($limit != 0)
        {
			$query = "SELECT * FROM userdata LIMIT $start,$limit";
	    }
		else{
			 echo "only limit set";
			$query = "SELECT * FROM userdata";
			
		}
	}
/*	elseif(isset($_SESSION['limit'])){
	  $limit=$_SESSION['limit'];
	  if(isset($_POST["query"]))
		{
 			$search = mysqli_real_escape_string($connect, $_POST["query"]);
				echo $limit, $search;
			 $query = "SELECT * FROM userdata 
 				   WHERE username LIKE '%".$search."%'
  				   OR email LIKE '%".$search."%' 
  				   OR Id LIKE '%".$search."%' 
				   OR city LIKE '%".$search."%' 
 				   OR state LIKE '%".$search."%'
  				   LIMIT $start,$limit";
		}
		else{
				echo $limit, $search;
			$query = "SELECT * FROM userdata LIMIT $start,$limit";
		}
	}
	*/

$count_query="Select count(*) as c from userdata , UPLOADS where userdata.Id = UPLOADS.Id group by userdata.Id";
$count = mysqli_query($connect,$count_query);
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>ID</th>
     <th>username</th>
     <th>email</th>
	 <th>password</th>
     <th>city</th>
     <th>Documents Uploaded</th>
	 <th>Status</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {  
	 $rows = mysqli_fetch_array($count);
  $output .= '
   <tr>
    <td>'.$row["Id"].'</td>
    <td><a href=user.php?userid='.$row["Id"].'>'.$row["username"].'</a></td>
    <td>'.$row["email"].'</td>
    <td><a href=password_change.php?userid='.$row["Id"].'>Change Password</a></td>
	<td>'.$row["city"].'</td>
    <td><a href=user_docs.php?userid='.$row["Id"].'>'.$rows["c"].'</td>';
if ($row["status"] == 0 ){
	$output .= '<td><a href=update_status.php?userid='.$row["Id"].'>Deactivated</a></td></tr>'
  ;
 }
if ($row["status"] == 1 ){
  $output .= '<td><a href=update_status.php?userid='.$row["Id"].'>Activated</a></td></tr>'
  ;
 }
 }
}
else
{
	
 echo 'Data Not Found';
}
$output .= '</table></div> ';
$pagination_query="Select * From userdata";
$pagination_result = mysqli_query($connect,$pagination_query);
$paging=mysqli_num_rows($pagination_result);
$a=ceil($paging/$limit);
	if($page>1){ 
	 $output .= '<button><a href=search_table%20(copy).php?page='.($page-1).'>Previous</a></button>';
	}
  for($b=1;$b<=$a;$b++){
	  $output.= '<button><a href=search_table%20(copy).php?page='. $b.'>'. $b.'</a></button>'
  ;     
  }
if($page<$a){
  $output .= '<button><a href=search_table%20(copy).php?page='.($page+1).'>Next</a></button>';	
}

 echo $output;



?>
