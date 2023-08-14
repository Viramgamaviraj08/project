<?php include("navbar.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
  <link href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" >
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/data Tables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css"/> -->
</head>
<main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
    
  <table id="myTable" class="display" >
  <thead>
        <tr>
          <th>Cust_Id</th>
          <th>Name</th>
          <th>Phone Number</th>
          <th>Address</th>
          <th>Operations</th>
          <th>Operations</th>
        </tr>
    </thead>

    <?php
    include("dbcon.php");
    error_reporting(0);
    $query="select * from customer";
    $data= mysqli_query($con,$query);
    $custid=0;
    $total=mysqli_num_rows($data);
   
  
    if($total!=0){
     ?>
    <tbody>
     <?php
      while( $raw=mysqli_fetch_assoc($data)){
        $custid=$custid+1;
        echo " 
        <tr>
        <td>".$custid."</td>
        <td>".$raw['name']."</td>
        <td>".$raw['phonenumber']."</td>
        <td>".$raw['address']."</td>
        <td><a href='updatecustomer.php? srno=$raw[srno]'class='btn btn-primary'>Edit/Update <i class='fa fa-pencil' aria-hidden='true'></i></td>
        <td><a href = 'deletecustomer.php? cust_id=$raw[cust_id]'class='btn btn-danger'>Delete <i class='fa fa-trash' aria-hidden='true'></i></td>
        </tr>";
      }
      ?>
    </tbody>
<?php
    }

?>

  
  </table>
      <!-- <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/data Tables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script> -->
  </div>
  </div>
  </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script>let table = new DataTable('#myTable');</script>
</body>
</html>