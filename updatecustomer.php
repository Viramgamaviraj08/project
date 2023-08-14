<?php include("navbar.php"); ?>





<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
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

<main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
<body>
<?php 

include "dbcon.php";

    if (isset($_POST['submit'])) {

        $cust_id = $_POST['cust_id'];

        $name = $_POST['name'];

        $phonenumber = $_POST['phonenumber'];

        $address = $_POST['address'];

        $sql = "UPDATE `customer` SET `cust_id`='$cust_id',`name`='$name',`phonenumber`='$phonenumber',`address`='$address' WHERE `cust_id`='$cust_id'"; 

        $result = $con->query($sql); 

        if ($result == TRUE) {
          echo '<script>alert("Record updated successfully")</script>';
            // echo "Record updated successfully.";
		                // header("Location: allcustomer.php");

        }else{

            echo "Error:" . $sql . "<br>" . mysqli_error($con);

        }

    } 

if (isset($_GET['srno'])) {

    $srno = $_GET['srno']; 

    $sql = "SELECT * FROM `customer` WHERE `srno`='$srno'";

    $result = $con->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $cust_id = $row['cust_id'];

            $name = $row['name'];

            $phonenumber = $row['phonenumber'];

            $address  = $row['address'];

        

            // $srno = $row['srno'];

        } 

    ?>

        <h2>User Update Form</h2>

        <form action="" method="post">

          <fieldset>

    

            cust_id<br>

            <input type="text" name="cust_id" value="<?php echo $cust_id; ?>">

            <!-- <input type="hidden" name="srno" value=""> -->

            <br>

           name:<br>

            <input type="text" name="name" value="<?php echo $name; ?>">

            <br>

            phone number:<br>

            <input type="text" name="phonenumber" value="<?php echo $phonenumber; ?>">

            <br>

            address:<br>

            <input type="text" name="address" value="<?php echo $address; ?>">

            <br>

           
            <br><br>

            <input type="submit" value="Update" name="submit">

          </fieldset>

        </form> 
        </div>
  </div>
  </div>
  </main>
        </body>

        </html> 

    <?php

    } else{ 

        header('Location: allcustomer.php');

    } 

}

?> 