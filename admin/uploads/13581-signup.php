
<?php
if (isset($_POST["Signup"])) {
$fname = $_POST["first"];
$lname = $_POST["last"];
$email = $_POST["emailid"];
$pass = $_POST["pass"];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "manojkumar";// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}$sql = "INSERT INTO SIGNUP (FirstName, LastName, EmailAddress,Password)
VALUES ('$fname', '$lname', '$email', '$pass')";
if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}$conn->close();
}
?>



