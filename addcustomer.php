<?php include("navbar.php"); ?>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" 
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" 
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>
.wrapper {
  margin-top: 80px;
  margin-bottom: 80px;
}
body{
  background: #eee;
}
.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background: #2c2d31;
  /* background-color: #fff; */
  border: 2px solid rgba(0, 0, 0, 0.1);
  border-radius: 5px;
}

.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 30px;
  color: white;
}

.form-signin .checkbox {
  font-weight: normal;
}

.form-signin .form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.form-signin .form-control:focus {
  z-index: 2;
}

.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 20px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>

</head>
<main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
<body>
<div class="wrapper">
 <form class="form-signin" method="POST" action="addcustomer.php">
    <h2 class="form-signin-heading">Add Customer Here </h2>
    <!-- <input type="text" class="form-control" name="ID" placeholder="ID" id="username" required=""/> -->
    
    <input type="text" class="form-control" name="cust_id" placeholder="Customer Id"><br>
    
    <input type="text" class="form-control" name="name" placeholder="Name"><br>
 
    <input type="text" class="form-control" name="phonenumber" placeholder="Phone Number" ><br>

    <input type="text" class="form-control" name="address" placeholder="Address" ><br>

      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">submit</button>   
 </form>
</div> 
</div>
  </div>
  </div>
  </main>
</body>
</html>




<?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $cust_id=$_POST['cust_id'];
    $name=$_POST['name'];
    $phonenumber=$_POST['phonenumber'];
    $address=$_POST['address'];
//submit these to a database
$servername = 'localhost';
$user = 'root';
$password = '';
$database = 'bill';

$conn = mysqli_connect($servername, $user, $password, $database);

if (!$conn){
  die("sorry we failed to connect:".mysqli_connect_error());
}
else {
  $sql = "INSERT INTO `customer` (`cust_id`,`name`, `phonenumber`, `address`) VALUES ('$cust_id','$name', '$phonenumber', '$address');";
  $raw = mysqli_query($conn, $sql);
 
        if($raw){
          // echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          // <strong>success!</strong> your entry has been submitted successfully!
          // ';
          // header('location:allcustomer.php');
          echo '<script>alert("Customer add Successfully")</script>';
         
        }
        else{
             echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
        }




}
 




}
?>