<?php include 'dbcon.php' ?>
<?php include("navbar.php"); ?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
    integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
  <style>
    @media screen {}

    @media print {

      .btn,
      .Noprint {
        display: none;
      }

      .form-control {
        border: 0px;
      }

      .input-group-text {
        border: 0px;
        background-color: white;
      }
      
    }
    #cus{
        width: 100px;
      }
  </style>
  <script>
    function Getprint() {
      window.print();
    }
    function BtnAdd() {
      var v = $("#TRow").clone().appendTo("#TBody");
      $(v).find("input").val('');
      $(v).removeClass("d-none");
    }
    function BtnDel(v) {
      $(v).parent().parent().remove();
      GetTotal();
    }
    function calc(v) {
      var index = $(v).parent().parent().index();

      var qty = document.getElementsByName("qty")[index].value;
      var rate = document.getElementsByName("rate")[index].value;
      var total = +qty * rate;
      document.getElementsByName("total")[index].value = total;
      GetTotal();
    }
    function GetTotal() {
      var sum = 0;
      var totals = document.getElementsByName("total");
      for (let index = 0; index < totals.length; index++) {
        var total = totals[index].value;
        sum = +(sum) + +(total);
      }
      document.getElementById("invo_total").value = sum;

      var rcdamt = document.getElementById("FReceived Amt").value;
      var netamt = +(sum) - +(rcdamt);
      document.getElementById("FNetAmt").value = netamt;
    }

  </script>
  <title>invoice</title>
</head>
<main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

<body>
<form method="post">

  <div class="container">

    <div class="card">
      <div class="card-header text-center">
        <h4>Invoice</h4>
      </div>
      <div class="row">
        <div class="col-8">
        <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">customer</span>
        <!-- <input type="text" class="form-control" name="cust_name" placeholder="customer" aria-label="Username" -->
              <!-- aria-describedby="basic-addon1"> -->
    <!-- </div>  -->
        <!-- <div> -->
                <?php
                $sql = "SELECT * FROM customer";
                $result = $con->query($sql);

                // Display the fetched data
                if ($result->num_rows > 0) {
                  //echo "Description:";
                  echo "<select style='width:300px;' name='cust_name'>";
                  while ($row = $result->fetch_assoc()) {
                    echo "<option id='cus' value='" . $row["Rate"] . "'>" . $row["name"] . "</option>";
                  }
                  echo "</select>";
                }
                ?>
              </div>
          <!-- <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">customer</span>
            </div>
            <input type="text" class="form-control" name="cust_name" placeholder="customer" aria-label="Username"
              aria-describedby="basic-addon1"> -->
          <!-- </div> -->


          <!-- <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Address</span>
            </div>
            <input type="text" class="form-control" placeholder="Address" aria-label="Username"
              aria-describedby="basic-addon1">
          </div>


          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Phone Numer</span>
            </div>
            <input type="text" class="form-control" placeholder="Phone Number" aria-label="Username"
              aria-describedby="basic-addon1">
          </div> -->

        </div>
        <div class="col-4">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Inv. No</span>
            </div>
            <input type="text" class="form-control" name="invo_number" placeholder="Invoice No" aria-label="Username"
              aria-describedby="basic-addon1">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Inv.Date</span>
            </div>
            <input type="date" class="form-control" name="invo_date" placeholder="Invoice date" aria-label="Username"
              aria-describedby="basic-addon1">
          </div>



        </div>
      </div>

      <table>
        <!-- <input type ="number" value ="number" name ="number"> -->
      </table>
      <table class="table table bordered">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Description</th>
            <th scope="col" class="text-end">Qty</th>
            <th scope="col" class="text-end">Rate</th>
            <th scope="col" class="text-end">Total</th>
            <th scope="col" class="Noprint">
              <button type="button" class="btn btn-warning" onclick="BtnAdd()"> +</button>
            </th>
          </tr>
        </thead>
        <tbody id="TBody">
          <tr id="TRow" class="d-none">
            <th scope="row">
              <input type="text" class="form-control text-end"  name="number">
            </th>

            <td>
              <div>
                <?php
                $sql = "SELECT * FROM bill_info";
                $result = $con->query($sql);

                // Display the fetched data
                if ($result->num_rows > 0) {
                  //echo "Description:";
                  echo "<select name='description'>";
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["Rate"] . "'>" . $row["Description"] . "</option>";
                  }
                  echo "</select>";
                }
                ?>
              </div>
            </td>

            <td><input type="number" class="form control text-end" name="qty" min="1" onchange="calc(this);"></td>
            <td><input type="text" class="form control text-end" name="rate" min="1" onchange="calc(this);"></td>
            <td><input type="number" class="form control text-end" name="total" disabled=''></td>
            <td class="Noprint"><button type="button" class="btn btn-danger" onclick="BtnDel(this)">x</button></td>

          </tr>
        
          <tr id="TRow" >
            <th scope="row">
              <input type="text" class="form-control text-end" value="" name="number">
            </th>

            <td>
              <div>
                <?php
                $sql = "SELECT * FROM bill_info";
                $result = $con->query($sql);

                // Display the fetched data
                if ($result->num_rows > 0) {
                  //echo "Description:";
                  echo "<select name='description'>";
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["Rate"] . "'>" . $row["Description"] . "</option>";
                  }
                  echo "</select>";
                }
                ?>
              </div>
            </td>

            <td><input type="number" class="form control text-end" name="qty" min="1" onchange="calc(this);"></td>
            <td><input type="text" class="form control text-end" name="rate" min="1" onchange="calc(this);"></td>
            <td><input type="number" class="form control text-end" name="total" disabled=''></td>
            <td class="Noprint"><button type="button" class="btn btn-danger" onclick="BtnDel(this)">x</button></td>

          </tr>


        </tbody>
      </table>


      <div class="row">
        <div class="col-8">
          <button type="button" class="btn btn-primary" onclick="Getprint()">Print</button>
        </div>
        <div class="col-4">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Total</span>
            </div>
            <input type="text" class="form-control" id="invo_total" name="invo_amount" disabled=''>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Received Amt.</span>
            </div>
            <input type="text" class="form-control" id="FReceived Amt" name="FReceived Amt" onchange="GetTotal()">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Net Amt</span>
            </div>
            <input type="text" class="form-control" id="FNetAmt" disabled='' name="FNetAmt">
          </div>
              <!-- <button>  <input type="submit" value="submit" name="submit"> submit </button> -->

          <button type="button" class="btn btn-primary" name="save">Save</button>
        </div>
      </div>
    </div>

  </div>
  </div>
              </form>
</body>
</div>
  </div>
  </div>
  </main>
</html>

<?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['save'])){
      $cust_name=$_POST['cust_name'];
    $invo_number=$_POST['invo_number'];
    $invo_date=$_POST['invo_date'];
    $num=$_POST['number'];
    $dec=$_POST['description'];
    $qty=$_POST['qty'];
    $rate=$_POST['rate'];
    $total=$_POST['total'];

    $invo_amount=$_POST['invo_amount'];

    }
    
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

  $sql = "INSERT INTO `invoice` (`cust_name`,`invo_number`, `invo_date`,`number`,`description`,`qty`,`rate`,`total`, `invo_amount`) VALUES ('$cust_name','$invo_number', '$invo_date', '$num','$dec','$qty',' $rate',' $total','$invo_amount')";
  $raw = mysqli_query($conn, $sql);
 
        if($raw){
          // echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          // <strong>success!</strong> your entry has been submitted successfully!
          // ';
          // header('location:allcustomer.php');
         
        }
        else{
             echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
        }




}
 
  }




?>