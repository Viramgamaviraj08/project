<?php
	include "dbcon.php";
	$irt=mysqli_fetch_array(mysqli_query($con,"select * from bill_info where No='".$_REQUEST['itm']."'"));
	$rd=$_REQUEST['nos'];
	//die('dfjsdfj');
?>
<input class="form-control" name="rate<?php echo $rd; ?>" id="rate<?php echo $rd; ?>"  type="text"  title="Rate" onChange="qtytotal('<?php echo $rd; ?>');"  style="width:80px;" value="<?php echo $irt['Rate'];?>"/>