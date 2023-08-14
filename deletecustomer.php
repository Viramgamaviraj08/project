<?php
include("dbcon.php");
error_reporting(0);

$cust_id = $_GET['cust_id'];

$query = "DELETE FROM CUSTOMER WHERE cust_id='$cust_id'";

$data = mysqli_query($con, $query);

if ($data) {
    // echo " Record delete from database";
    header('location:allcustomer.php');
} else {
    echo "Record  not delete from database";
}
?>