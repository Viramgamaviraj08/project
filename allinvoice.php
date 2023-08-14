<?php include("navbar.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" >
</head>
<main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
<body>
  <table id="myTable" class="display" >
    <thead> 
      <tr>
        <td>cust_name</td>
        <td>invo_number</td>
        <td>invo_date</td>
        <!-- <td>description</td>
        <td>qty</td>
        <td>rate</td>
        <td>total</td> -->
        <td>invo_amount</td>
        <td>Operation</td>
      </tr>
    </thead>
   

    <?php
    include("dbcon.php");
    error_reporting(0);
    $query="select * from invoice";
    $data= mysqli_query($con,$query);
    $total=mysqli_num_rows($data);
   

    if($total!=0){
      ?>
    <tbody>
    <?php
    
      while( $result=mysqli_fetch_assoc($data)){
        $cid= mysqli_fetch_array(mysqli_query($con,"select * from customer where srno='".$result['cid']."'"));
        echo " 
        <tr>
        <td>".$cid['name']."</td>
        <td>".$result['invoice_no']."</td>
        <td>".$result['invoice_date']."</td>
        
        <td>".$result['totalamount']."</td>
                <td><a href='updateinvoice.php? id=$raw[id]'class='btn btn-primary'>Edit/Update <i class='fa fa-pencil' aria-hidden='true'></i></td>

        </tr>";
      }
      ?>
    </tbody>
    <?php

    }

?>


  </table>
  </div>
  </div>
  </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script>let table = new DataTable('#myTable');</script>
</body>
</html>