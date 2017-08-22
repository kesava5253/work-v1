<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "NotaryHub");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM userdata 
  WHERE username LIKE '%".$search."%'
  OR email LIKE '%".$search."%' 
  OR Id LIKE '%".$search."%' 
  OR city LIKE '%".$search."%' 
  OR state LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM userdata ORDER BY Id
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>ID</th>
     <th>username</th>
     <th>Last name</th>
     <th>email</th>
     <th>city</th>
     <th>state</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["Id"].'</td>
    <td><a href="user.php?userid=">'.$row["username"].'</td>
    <td>'.$row["lname"].'</td>
    <td>'.$row["email"].'</td>
    <td>'.$row["city"].'</td>
    <td>'.$row["state"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
