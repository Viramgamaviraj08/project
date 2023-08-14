<?php 

include "dbcon.php"; 
include "navbar.php";
include "oops_ap.php";
include "oops_function.php";
include "oops_selection.php";
$selclass= new selection;
?>
<?php

	$invoice_date = date('Y-m-d');
	$invoice_no=srout();

if(isset($_REQUEST['add']))
{	
	$invoice_no=srout();
	$addr=mysqli_fetch_array(mysqli_query($con,"select * from customer where srno ='".$_REQUEST['cid']."'"));
	$edd['cid']=addslashes($_REQUEST['cid']);
	$edd['invoice_no']=$invoice_no;
	$edd['invoice_date']=adddate($_REQUEST['invoice_date']);
	$edd['totalamount']=addslashes($_REQUEST['totalamount']);
	$msg=add("invoice",$edd);
	

	$row = mysqli_fetch_array(mysqli_query($con,"SELECT cid,id FROM `invoice` where invoice_no='".$_REQUEST['invoice_no']."' ORDER BY id DESC LIMIT 0 , 1"));
	for($i=1;$i<=50;$i++)
	{				 
		$item = "Description".$i;
		$qty = "qty".$i;
		$rate = "rate".$i;
		$total = "total".$i;
		
		if($_REQUEST[$qty]>0 && $_REQUEST[$rate]>0 && $_REQUEST[$total]>0)
		{
			$add1['invoiceid'] = $row['id'];
			$add1['itemid'] = addslashes($_REQUEST[$item]);
			$add1['qty'] = addslashes($_REQUEST[$qty]);
			$add1['rate'] = addslashes($_REQUEST[$rate]);
			$add1['total'] = addslashes($_REQUEST[$total]);	
			$msg1=add("invoice_item",$add1);
		}
	}
  $desn='Invoice Added Successfully.';
  echo "<script>window.location=allinvoice.php?notify=yes&desn=$desn';</script>";
}

?>

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

    #cus {
      width: 100px;
    }
  </style>
  
  <script>
    function setdate(dt)
    {
      document.getElementById('removaldate').value=dt;
    }
    var counter = 1;
    function createcont()
    {
      counter++;
      document.getElementById("cno"+counter).style.display="table-row";	
      document.getElementById("totalitem").value=counter;
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
    function qtytotal(nos)
    { //alert (nos);
      var rate=document.getElementById("rate"+nos).value;
      var qty=document.getElementById("qty"+nos).value;
      var total=rate*qty;
      var totalme=total.toFixed(2);
      document.getElementById("total"+nos).value=totalme;
    }
    function blmsubtotal()
    {
      var subtotal=0;
      for(var i=1;i<=50;i++)
      {
        var valme=parseFloat(document.getElementById("total"+i).value,2);
        if(valme>=0)
        {
          subtotal +=valme;
        }
      }
      document.getElementById("totalamount").value=parseFloat(subtotal,2);
    }
    function setrate(fval, id) {

      if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
      } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById("ratehide" + id).innerHTML = xmlhttp.responseText;
        }
      }
      xmlhttp.open("GET", "ajex_getcustomerrate.php?itm=" + fval + "&nos=" + id, true);
      xmlhttp.send();
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
                      <?php echo $selclass->selectopt('customer','cid','Select Customer','','srno','name','required'); ?>
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
                      <input type="text" class="form-control" name="invoice_no" placeholder="Invoice No"
                        aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $invoice_no;?>" readonly required /><samp id="invoice_no"></samp>
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Inv.Date</span>
                      </div>
                        <input type="text" class="form-control" name="invoice_date" id="invoice_date" data-rel="tooltip" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" title="Date" data-placement="bottom" required onChange="setdate(this.value);" value="<?php echo viewdate($invoice_date); ?>"/>
                    </div>



                  </div>
                </div>

                <table>
                  <!-- <input type ="number" value ="number" name ="number"> -->
                </table>
                <table class="table table bordered">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col" class="text-center">No</th>
                      <th scope="col" class="text-center">Description</th>
                      <th scope="col" class="text-center">Qty</th>
                      <th scope="col" class="text-center">Rate</th>
                      <th scope="col" class="text-center">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $countrow = 0;
                  
                    for ($i = 1; $i <= 50; $i++) {
                      $countrow++;
                      $read = $i - 1;
                      //$inv = mysqli_fetch_array(mysqli_query($con, "select * from invoice_item where invoice_id='" . $_REQUEST['eid'] . "' LIMIT $read,1"));
                      //$invi = mysqli_fetch_array(mysqli_query($con, "select * from bill_info where id='" . $inv['item'] . "'"));
                      if ($i != 1 /*&& $inv['rate'] <= 0*/) {
                        $disp = 'none';
                      } else {
                        $disp = 'table-row';
                      }
                      ?>
                      <tr id="cno<?php echo $countrow; ?>" style="display:<?php echo $disp; ?>">
                        <td align="center" valign="top"><span class="text-primary">
                            <?php echo $countrow; ?>
                          </span></td>
                        <td align="left" valign="top">
                          <?php echo $selclass->selectopt('bill_info', 'Description' . $countrow, 'Select Product', '', 'No', 'Description', "onChange=setrate(this.value," . $countrow . ")"); ?>
                        </td>
                        <td align="center" valign="top"><input class="form-control" name="qty<?php echo $countrow; ?>"
                            id="qty<?php echo $countrow; ?>" type="text" title="QTY"
                            onChange="qtytotal('<?php echo $countrow; ?>');" style="width:80px;"
                            value="<?php //echo $inv['qty']; ?>" /></td>
                        <td align="center" valign="top" id="ratehide<?php echo $countrow; ?>"><input class="form-control"
                            name="rate<?php echo $countrow; ?>" id="rate<?php echo $countrow; ?>" type="text" title="Rate"
                            onChange="qtytotal('<?php echo $countrow; ?>');" style="width:80px;"
                            value="<?php //echo $inv['rate']; ?>" /></td>
                        <td align="center" valign="top"><input class="form-control" name="total<?php echo $countrow; ?>"
                            id="total<?php echo $countrow; ?>" type="text" title="Total" style="width:80px;"
                            value="<?php //echo $inv['total']; ?>" readonly /></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                  <tr>
                    <td colspan="7" align="right">
                      <input type="button" value="Click Here To Add Quantity" onClick="createcont()"
                        class="btn btn-sm btn-primary" style="float:right;" />
                    </td>
                  </tr>
                </table>


                <div class="row">
                  <div class="col-8">
          
                  </div>
                  <div class="col-4 text-end">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Total</span>
                      </div>
                      <input class="form-control" name="totalamount" id="totalamount"  type="text"  title="Total Amount" readonly required onFocus="blmsubtotal();" value="<?php //echo $totalamount; ?>" width="20%"/>
                    </div>

                    <!--<div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Received Amt.</span>
                      </div>
                      <input type="text" class="form-control" id="FReceived Amt" name="FReceived Amt"
                        onchange="GetTotal()">
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Pendding Amount</span>
                      </div>
                      <input type="text" class="form-control" id="FNetAmt" disabled='' name="FNetAmt">
                    </div>-->
                    <input class="btn btn-primary" type="submit" value="Submit" name="add">
                    <!--<button type="button" class="btn btn-primary" name="save">Save</button>-->
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