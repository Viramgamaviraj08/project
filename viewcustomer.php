<?php 

include "dbcon.php";

$sql = "SELECT * FROM customer";

$result = $con->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>

    <div class="container">
    <div class="container mx-2">
        <!-- <h5>"Shree Hari"</h5> <span><h5 style="text-align:center;">"Shree Ganesh"</h5> <h5 style="text-align:right;">"Shree Bahuchar Ma"</h5></span>
        <h3>Nilkanth Eletricals</h3>
    </div>     -->
        <h2>Customer Infornation</h2>
<a class="btn btn-info" href="billfrom.php">Insert</a>

<table class="table">

    <thead>

        <tr>

        <th>customer ID</th>

        <th>Name</th>

        <th>Phone no</th>

        <th>Address</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['name']; ?></td>

                    <td><?php echo $row['phone number']; ?></td>

                    <td><?php echo $row['address']; ?></td>

                    <td><a class="btn btn-danger" href="delete.php?No=<?php echo $row['id']; ?>">Delete</a></td> 

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>
///

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

.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0, 0, 0, 0.1);
}

.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 30px;
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
<body>
<div class="wrapper">
 <form class="form-signin" method="POST">
    <h2 class="form-signin-heading">Update Customer </h2>
    <!-- <input type="text" class="form-control" name="ID" placeholder="ID" id="username" required=""/> -->

    <input type="text" class="form-control" name="cust_id" placeholder="cust_id">
    
    <input type="text" class="form-control" name="name" placeholder="Name">
 
    <input type="text" class="form-control" name="phonenumber" placeholder="Phone Number" >

    <input type="text" class="form-control" name="address" placeholder="Address" >

      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Update</button>   
 </form>
</div> 
</body>
</html>




<?php
include'dbcon.php';
  if(isset($_POST['submit'])){
    $cust_id=$_POST['cust_id'];
    $name=$_POST['name'];
    $phonenumber=$_POST['phonenumber'];
    $address=$_POST['address'];

  $sql = "UPDATE `customer` SET `cust_id`='$cust_id',`name`='$name',`phone number`='$phonenumber',`address`='$address' WHERE `srno`='$srno'";
  $raw = mysqli_query($con, $sql);
 
        if($raw){
          // echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          // <strong>success!</strong> your entry has been submitted successfully!
          // ';
         echo"update success";
        }
        else{
             echo "The record was not inserted successfully because of this error ---> ". mysqli_error($con);
        }




}
 





?>
