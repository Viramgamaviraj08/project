<?php ob_start(); ?>
<?php
	include"../include/connection.php";
	include "../include/oops_ap.php";
	include "../include/oops_function.php";
	include "../include/oops_selection.php";
	include "../include/oops_addfunction.php";
	$addcl= new addpage;
	$selclass= new selection;
	$coops= new coops;
	$coq=$coops->companyoops('5');
	$co=mysqli_fetch_array($coq);
	$_SESSION['pagemain']=$co['module'];
	$_SESSION['pagesub']=$co['adlink'];
?>
<?php
if(isset($_REQUEST['eid']))
{
	$v=select("quotation","id",$_REQUEST["eid"],"","","","");
	$ref_no=$v['ref_no'];
	$date=$v['date'];
	$cid=$v['cid'];
	$sub=addslashes($v['sub']);
	$remark=str_replace( "\n", '<br>', addslashes($v['remark']));
}
else
{
	$date=date("Y-m-d");
	$ref_no=srquo();
}

if(isset($_REQUEST['add']))
{
		$add['ref_no']=$ref_no;
		$date = str_replace('/', '-', $_REQUEST['date']);
		$add['date']=date('Y-m-d', strtotime($date));
		$add['cid']=$_REQUEST['cid'];
		$add['sub']=addslashes($_REQUEST['sub']);
		$add['remark']=str_replace( "\n", '<br>', addslashes($_REQUEST['remark']));
		$msg=add("quotation",$add);
		
		$rf=mysqli_fetch_array(mysqli_query($con,"select id from quotation where ref_no='".$ref_no."'"));
		$ref_id=$rf['id'];
		for($jk=1;$jk<=$_REQUEST["final"];$jk++)
		{
			$product = "product".$jk;
			$unit = "unit".$jk;
			$rate = "rate".$jk;
			if($_REQUEST[$rate]!=0)
			{
				$addme['quoid']=$ref_id;
				$addme['product']=addslashes($_REQUEST[$product]);
				$addme['unit']=addslashes($_REQUEST[$unit]);
				$addme['rate']=addslashes($_REQUEST[$rate]);
				$msg=add("quotation_item",$addme);
			}
		}
		echo $addcl->addredirect($co['title'],$co['vwlink']);
}

if(isset($_REQUEST['edit']))
{
	$date = str_replace('/', '-', $_REQUEST['date']);
	$ed['date']=date('Y-m-d', strtotime($date));
	$ed['cid']=$_REQUEST['cid'];
	$ed['sub']=addslashes($_REQUEST['sub']);
	$ed['remark']=str_replace( "\n", '<br>', addslashes($_REQUEST['remark']));
	$msg=edit("quotation",$ed,"id",$_REQUEST['eid']);
	
	$del=mysqli_query($con,"delete from quotation_item where quoid='".$_REQUEST["eid"]."'");
	for($jk=1;$jk<=$_REQUEST["final"];$jk++)
	{
		$product = "product".$jk;
		$unit = "unit".$jk;
		$rate = "rate".$jk;
		if($_REQUEST[$rate]!=0)
		{
			$addme['quoid']=$_REQUEST["eid"];
			$addme['product']=addslashes($_REQUEST[$product]);
			$addme['unit']=addslashes($_REQUEST[$unit]);
			$addme['rate']=addslashes($_REQUEST[$rate]);
			$msg=add("quotation_item",$addme);
		}
	}
	echo $addcl->editredirect($co['title'],$co['vwlink']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php echo $addcl->top(); ?>
<script language="javascript" type="text/javascript">

function setfocus()
{
	document.getElementById("ref_no").focus();
}
</script>
</head>

<?php echo $addcl->afterbodyadd($co['module'],$co['module'],$co['adtitle'],$co['vwlink'],$co['vwtitle']); ?>
<?php  if($_REQUEST['eid']==''){ $coops->access_control($co['id'],'1'); } else { $coops->access_control($co['id'],'3'); }?>
    <tr>
        <td align="right">* Quotation No. :</td>
        <td><input class="form-control" type="text" name="ref_no" id="ref_no" data-rel="tooltip" data-placement="bottom" value="<?php echo $ref_no; ?>" title="Quotation No" readonly required/></td>
        <td align="right">* Date :</td>
        <td><input name="date" id="id-date-picker-1" data-rel="tooltip" type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" class="form-control" title="Date" data-placement="bottom"  value="<?php if($date > '1960-01-01') { echo date("d-m-Y", strtotime($date)); }?>" required/></td>
    </tr>
    <tr>
        <td align="right">* Select Customer :</td>
        <td><?php echo $selclass->selectopt('customer_master','cid','Customer',$cid,'id','cperson','required'); ?></td>
        <td align="right" valign="top">Subject :</td>
        <td align="left" valign="top"><input class="form-control" type="text"   name="sub" id="sub" value="<?php echo $sub; ?>" title="Subject"	/></td>
    </tr>

      <tr>
                <td colspan="4" align="center"><strong>Quotation Description</strong></td>
           </tr>
           <tr>
            <td colspan="4" align="center">
                <table width="100%">
                    <tr>
                        <td align="center">Sr. No.</td>
                        <td align="center">Product</td>
                        <td align="center">QTY / Unit</td>
                        <td align="center" width="15%">Rate</td>
                    </tr>
                    <?php
						$countrow=0;
						$sd=mysqli_query($con,"select * from inv_item");
						while($v=mysqli_fetch_array($sd))
						{  	
							$c++;
							$countrow++;
					?>
                	<tr>
                    	<td align="center"><?php echo $c;?></td>
                    	<td align="center"><input type="hidden" name="product<?php echo $countrow; ?>" id="product<?php echo $countrow; ?>" value="<?php echo $v['name'];?>"/><?php echo $v['name'];?></td>
                        <td align="center"><input type="hidden" name="unit<?php echo $countrow; ?>" id="unit<?php echo $countrow; ?>" value="<?php echo $v['unit'];?>"/><?php echo $v['unit'];?></td>
                        <td align="center" width="15%"><input class="form-control" type="text" name="rate<?php echo $countrow; ?>" id="rate<?php echo $countrow; ?>" value="<?php echo $v['rate'];?>" title="Rate"></td>
                    </tr>
                    
                    <?php } ?>	<input type="hidden" name="final" value="<?php echo $countrow; ?>" />
                    <tr><td colspan="5" align="center"><a style="cursor:default; cursor:pointer" onClick="window.open('../ControlPanel/newsalesproduct.php?reload=yes', 'newwindow', 'width=15000, height=650, scrollbars=yes');"><img src="../assets/icons/24x24/plus.png"></a></td></tr>
             	</table>
             </td>
           </tr>
       	 <tr>
  <!--        <td colspan="4" align="right"><a class="btn btn-info" onClick="additem();" >Add Description</a></td>	-->
           </tr>
           <tr>
            <td align="right">Remark :</td>
            <td align="left" valign="top"><textarea class="form-control" name="remark" id="remark" ><?php echo $remark; ?></textarea></td>
           </tr>
<?php echo $addcl->endpart(); ?>
</body>
</html>
