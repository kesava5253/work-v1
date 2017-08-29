<?php
//pagination method
session_start();
function pagination($limit){	
$page=$_SESSION['paging'];	
	if($page=="" || $page=="1"||$page=="0")
	{
		$page1=0;
	}
	else{
	$page1=($page*$limit)-$limit ;
}
	$page=(int)$page;
	
	return array($page1,$page);
}

// Sorting 
$field='id';
$sort='ASC';

if(isset($_SESSION['sorting']))
{
  if($_SESSION['sorting']=='ASC')
  {
  $sort='DESC';
  }
  else
  {
    $sort='ASC';
  }
}
if(isset($_SESSION['field'])){
if($_SESSION['field']=='id')
{
   $field = "Id"; 
}
elseif($_SESSION['field']=='username')
{
   $field = "username";
}
/*elseif($_SESSION['field']=='docs'){
  $field="c";
}*/
}
//*****************************************************
$connect = mysqli_connect("localhost", "root", "", "NotaryHub");
$output = '';
$search='';
//search and set limit 
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
				   ORDER BY $field $sort
  				   LIMIT $start,$limit";
	  		  }
		else {
			  $query = "SELECT * FROM userdata 
 				   WHERE username LIKE '%".$search."%'
  				   OR email LIKE '%".$search."%' 
  				   OR Id LIKE '%".$search."%' 
				   OR city LIKE '%".$search."%' 
 				   OR state LIKE '%".$search."%'
				   ORDER BY $field $sort
  				  ";
	
			}
}
//set limit
else {
		
		if($limit != 0)
        {
			$query = "SELECT * FROM userdata ORDER BY $field $sort LIMIT $start,$limit";
	    }
		else{
			 echo "only limit set";
			$query = "SELECT * FROM userdata ORDER BY $field $sort";
			
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

$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th><a href="table.php?sorting='.$sort.'&field=id">ID</a></th>
     <th><a href="table.php?sorting='.$sort.'&field=username">username</a></th>
     <th>email</th>
	 <th>password</th>
   <!--  <th>city</th> -->
     <th><a href="table.php?sorting='.$sort.'&field=docs">Documents</a></th>
	 <th>LastLogin</th>
	 <th>Status</th>
	 <th>Apply Discount</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {  
$count_query="Select count(*) as c from userdata , UPLOADS where ".$row["Id"]." = UPLOADS.Id group by userdata.Id";
$count = mysqli_query($connect,$count_query);
$rows = mysqli_fetch_array($count);
	 // Set discount value update to DB
	 if($rows["c"] > 2 && $rows["c"] < 5 ){
		$disc_query= "UPDATE discount_data 
        SET discount=5 WHERE Id=".$row["Id"]; 
		  $disc_result = mysqli_query($connect, $disc_query);
	 }
	  if($rows["c"] > 4 && $rows["c"] < 10 ){
		$disc_query= "UPDATE discount_data 
        SET discount=10 WHERE Id=".$row["Id"];
		   $disc_result = mysqli_query($connect, $disc_query);
	 }
	  if($rows["c"] > 9 ){
		$disc_query= "UPDATE discount_data 
        SET discount=15 WHERE Id=".$row["Id"]; 
		   $disc_result = mysqli_query($connect, $disc_query);
	 }
	// -- End of discount //
  $output .= '
   <tr>
    <td>'.$row["Id"].'</td>
    <td><a href=user.php?userid='.$row["Id"].'&page='.$page.'>'.$row["username"].'</a></td>
    <td>'.$row["email"].'</td>
    <td><a href=password_change.php?userid='.$row["Id"].'&page='.$page.'>Change Password</a></td>
    <td><a href=user_docs.php?userid='.$row["Id"].'>'.$rows["c"].'</td>
	 <td>'.$row["last_login"].'</td>';
if ($row["status"] == 0 ){
	$output .= '<td><a href=update_status.php?userid='.$row["Id"].'>Deactivated</a></td>'
  ;
 }
if ($row["status"] == 1 ){
  $output .= '<td><a href=update_status.php?userid='.$row["Id"].'>Activated</a></td>'
  ;
 }
	 $output .='<td><a href=setDiscount.php?userid='.$row["Id"].'>Set Discount</a></td></tr>';
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
	 $output .= '<button><a href=table.php?page='.($page-1).'>Previous</a></button>';
	}
  for($b=1;$b<=$a;$b++){
	  $output.= '<button><a href=table.php?page='. $b.'>'. $b.'</a></button>'
  ;     
  }
if($page<$a){
  $output .= '<button><a href=table.php?page='.($page+1).'>Next</a></button>';	
}

unset($_SESSION['sorting']);
unset($_SESSION['field']);

 echo $output;



?>
