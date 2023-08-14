<?php
$servername = "localhost";
$username = "root";
$password  = "";
$dbname = "bill";

$conn = mysqli_connect($servername,$username,$password,$dbname);

//check connection 
if(!$conn)
{
   die("Connection failed : ".mysqli_connect_error());
}
//echo "|Connected|";

//get user input from login form
$Email = $_POST['username'];
$Password = $_POST['password'];

// Query to check if the email and password exist in the database.
$sql = "SELECT * FROM users WHERE email = '$Email' AND password = '$Password'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
   echo "Welcom Admin "."<br>".$Email;
   header("location:invo.php");
}else{
   echo "You are not ragistered : ".$Email;
}
mysqli_close($conn);

?>