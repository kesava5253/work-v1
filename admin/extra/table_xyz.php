<?php
//fetch.php
								
/*function pagination($limit){	
$page='';
if(isset($_POST["page"])){
	
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
	
	return array($page1,$page);
}
*/
$connect = mysqli_connect("localhost", "root", "", "NotaryHub");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
	if(isset($_POST['setlimit'])){
	    $limit=$_POST['setlimit'];
	}
elseif(isset($_SESSION['limit'])){
	$limit=$_SESSION['limit'];
}
else{
	   $limit=10;
	}
 $start =pagination($limit)[0];
$page =pagination($limit)[1];
	echo $start, $limit, $page;
 $query = "
  SELECT * FROM userdata 
  WHERE username LIKE '%".$search."%'
  OR email LIKE '%".$search."%' 
  OR Id LIKE '%".$search."%' 
  OR city LIKE '%".$search."%' 
  OR state LIKE '%".$search."%'
  LIMIT $start,$limit
 ";
}

else
{
  if(isset($_POST['setlimit'])){
	    $limit=$_POST['setlimit'];
	}
elseif(isset($_SESSION['limit'])){
	$limit=$_SESSION['limit'];
}
 else{
	   $limit=5;
	}
  $start =pagination($limit)[0];
 $page =pagination($limit)[1];
	echo $start, $limit, $page;
 $query = "
  SELECT * FROM userdata LIMIT $start,$limit
 ";
}
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
    <td><a href=user_docs.php?userid='.$row["Id"].'>'.$rows["c"].'</td>
	<td><a href=update_status.php?userid='.$row["Id"].'>'.$row["status"].'</a></td>'
  ;
 }

 echo $output;
}
else
{
	
 echo 'Data Not Found';
}

?>
