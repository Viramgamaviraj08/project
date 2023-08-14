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



<!-- <div class="wrapper">
 <form class="form-signin" method="POST" action="">

<table>
  <tr>
    <td>cust_id</td>
    <td><input type="text" value="" name=cust_id required></td>
  </tr>
  <tr>
    <td>name</td>
    <td><input type="text" value="" name=name required></td>
  </tr>
  <tr>
    <td>phonenumber</td>
    <td><input type="text" value="" name=phonenumber required></td>
  </tr>
  <tr>
    <td>address</td>
    <td><input type="text" value=" name=address required></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" id="button" name="submit" value="Upadate Details"></a></td>
  </tr>

</table>
 </form>
</div> 
</body>
</html>
?php
// include("dbcon.php");
// error_reporting(0);

// if($_POST['submit']){
//     $cust_id=$_POST['cust_id'];
//     $name=$_POST['name'];
//     $phonenumber=$_POST['phonenumber'];
//     $address=$_POST['address'];

//     $query="UPDATE CUSTOMER SET cust_id='cust_id', name='$name', phonenumber ='$phonenumber', address='$address' WHERE phonenumber ='$phonenumber'";
//     $data=mysqli_query($con,$query);
    
//     if($data){
//       echo "<script>alert('Record Updated')</script>";
//     }
//     else{
//       echo"failed to update data";
//     }    
// }
//?>////

 -->

 



<?php 

include "dbcon.php";

    if (isset($_POST['submit'])) {

        $name = $_POST['name'];

        $invoice_no = $_POST['invoice_no'];

        $invoice_date = $_POST['invoice_date'];

        $totalamount = $_POST['totalamount'];

        $sql = "UPDATE `invoice` SET `name`='$name',`invoice_no`='$invoice_no',`invoice_date`='$invoice_date' ,`totalamount`='$totalamount' WHERE `name`='$name'"; 

        $result = $con->query($sql); 

        if ($result == TRUE) {
          echo '<script>alert("Record updated successfully")</script>';
            // echo "Record updated successfully.";
		                // header("Location: allcustomer.php");

        }else{

            echo "Error:" . $sql . "<br>" . mysqli_error($con);

        }

    } 

if (isset($_GET['id'])) {

    $id = $_GET['id']; 

    $sql = "SELECT * FROM `invoice` WHERE `id`='$id'";

    $result = $con->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            

            $name = $row['name'];

            $invoice_no = $row['invoice_no'];

            $invoice_date  = $row['invoice_date'];

            $totalamount = $row['totalamount'];

        

            // $srno = $row['srno'];

        } 

    ?>

        <h2>User Update Form</h2>

        <form action="" method="post">

          <fieldset>

    

           

            <!-- <input type="hidden" name="srno" value=""> -->

            <br>

           name:<br>

            <input type="text" name="name" value="<?php echo $name; ?>">

            <br>

            invoice_no<br>

            <input type="text" name="invoice_no" value="<?php echo $invoice_no; ?>">

            <br>

            invoice_date:<br>

            <input type="text" name="invoice_date" value="<?php echo $invoice_date; ?>">
            <br>

            totalamount:<br>

            <input type="text" name="totalamount" value="<?php echo $totalamount; ?>">

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

        // header('Location: allcustomer.php');

    } 

}

?> 