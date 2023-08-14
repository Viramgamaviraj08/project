<?php
	include "dbcon.php";
	
	class coops
	{
		function companyoops($coppsid)
		{
			global $con;
			$sd=mysqli_query($con,"select * from btmodule where id='".$coppsid."'");
			return $sd;
		}
		function access_control($mid,$inopt)
		{	
			global $con;
			$acc=mysqli_num_rows(mysqli_query($con,"select id from setting_access where type='".$mid."' && uid='".$_SESSION['apuserid']."' && inopt='".$inopt."'"));
			if($acc<=0) { die("<center>Access to this page is denied by Administrator for you ! <br> Please Contact Administrator for Access Control. </center>"); }
		}
	}
	 
	  function gotptitle($code)
	  {
		if($code=='SD47WEWF4SDC48V4')
		{
			$usertypename="Super Admin";
		}
		else if($code=='S4DF84A8F46S74F98')
		{
			$usertypename="Administrator";
		}
		else if($code=='S4DF84A8F46S74F44')
		{
			$usertypename="Support Employee";
		}
		else if($code=='BLIOY7857HIUY756')
		{
			$usertypename="Central Account";
		}
		else if($code=='SUPODF8548E48DFE')
		{
			$usertypename="Not Working";
		}
		return $usertypename;
	  }
	  
	  
	function srquo()
	{	global $con;
		$tc_letter='NEA/Q';
		$tc_no_max=000;
		$cno=mysqli_query($con,"select * from quotation order by ref_no");
		while($cnov=mysqli_fetch_array($cno))
		{
			if($tc_no_max<substr($cnov['ref_no'],6,4))
			{
					$tc_no_max=substr($cnov['ref_no'],6,4);
			}
		}
		$tc_no_max++;
		if($tc_no_max<=9)
		{
			$tc_no_max="000".$tc_no_max;
		}
		else if($tc_no_max<=99)
		{
			$tc_no_max="00".$tc_no_max;
		}
		else if($tc_no_max<=999)
		{
			$tc_no_max="0".$tc_no_max;
		}
		$ref_no=$tc_letter."/".$tc_no_max;
		return $ref_no;
	}
	
	function srin()
	{
		global $con;
		$date = date('Y-m-d');
		if(date("m")>=4)
		{
			$year=date("y");
		}
		else
		{
			$year=date("y")-1;
		}
		if(date("m")>=4)
		{
			$year1=date("y")+1;
		}
		else
		{
			$year1=date("y");
		}		
		
		$mymax=000;		
		$tc_no_max = '';
		
		$cno=mysqli_query($con,"select * from inward");
		while($cnov=mysqli_fetch_array($cno))
		{		
			if(substr($cnov['inward_no'],0,2)==$year)
			{
				$mymax=substr($cnov['inward_no'],6,4);
				if($mymax>$tc_no_max)
				{				
					$tc_no_max=substr($cnov['inward_no'],6,4);
				}
			}
		}
				
		$tc_no_max++;		
		
		if($tc_no_max<=9)
		{
			$tc_no_max="000".$tc_no_max;
		}
		else if($tc_no_max<=99)
		{
			$tc_no_max="00".$tc_no_max;
		}
		else if($tc_no_max<=999)
		{
			$tc_no_max="0".$tc_no_max;
		}		
		$inward_no =$year."-".$year1."/".$tc_no_max;
		return $inward_no;
	}
	
	function payno()
	{	global $con;
		$date = date('Y-m-d');
		if(date("m")>=4)
		{
			$year=date("y");
		}
		else
		{
			$year=date("y")-1;
		}
		if(date("m")>=4)
		{
			$year1=date("y")+1;
		}
		else
		{
			$year1=date("y");
		}		
		
		$mymax=000;		
		$tc_no_max = '';
		
		$cno=mysqli_query($con,"select * from payment");
		while($cnov=mysqli_fetch_array($cno))
		{		
			if(substr($cnov['payment_no'],0,2)==$year)
			{
				$mymax=substr($cnov['payment_no'],6,4);
				if($mymax>$tc_no_max)
				{				
					$tc_no_max=substr($cnov['payment_no'],6,4);
				}
			}
		}
				
		$tc_no_max++;		
		
		if($tc_no_max<=9)
		{
			$tc_no_max="000".$tc_no_max;
		}
		else if($tc_no_max<=99)
		{
			$tc_no_max="00".$tc_no_max;
		}
		else if($tc_no_max<=999)
		{
			$tc_no_max="0".$tc_no_max;
		}		
		$payment_no =$year."-".$year1."/".$tc_no_max;
		return $payment_no;
	}
	
	function recno()
	{	global $con;
		if(date("m")>=4)
		{
			$year=date("y");
		}
		else
		{
			$year=date("y")-1;
		}
		if(date("m")>=4)
		{
			$year1=date("y")+1;
		}
		else
		{
			$year1=date("y");
		}		
		
		$mymax=000;		
		$tc_no_max = '';
		
		$cno=mysqli_query($con,"select * from receipt");
		while($cnov=mysqli_fetch_array($cno))
		{		
			if(substr($cnov['receipt_no'],0,2)==$year)
			{
				$mymax=substr($cnov['receipt_no'],6,4);
				if($mymax>$tc_no_max)
				{				
					$tc_no_max=substr($cnov['receipt_no'],6,4);
				}
			}
		}
				
		$tc_no_max++;		
		
		if($tc_no_max<=9)
		{
			$tc_no_max="000".$tc_no_max;
		}
		else if($tc_no_max<=99)
		{
			$tc_no_max="00".$tc_no_max;
		}
		else if($tc_no_max<=999)
		{
			$tc_no_max="0".$tc_no_max;
		}		
		$receipt_no =$year."-".$year1."/".$tc_no_max;
		return $receipt_no;
	}
	
	function srout()
	{	global $con;
		$date = date('Y-m-d');
		if(date("m")>=4)
		{
			$year=date("y");
		}
		else
		{
			$year=date("y")-1;
		}
		if(date("m")>=4)
		{
			$year1=date("y")+1;
		}
		else
		{
			$year1=date("y");
		}		
		
		$mymax=000;		
		$tc_no_max = '';
		$cno=mysqli_query($con,"select * from invoice where invoice_date>='2017-07-01'");
		while($cnov=mysqli_fetch_array($cno))
		{
			//echo "<br>".substr($cnov['invoice_no'],3,2);
			if(substr($cnov['invoice_no'],0,2)==$year && substr($cnov['invoice_no'],3,2)==$year1)
			{
				$mymax=substr($cnov['invoice_no'],-4);
				if($mymax>$tc_no_max)
				{
					$tc_no_max=substr($cnov['invoice_no'],-4);
				}
			}
		}
				
		$tc_no_max++;
		//$bookno=intval($tc_no_max/100);
		//if($bookno<=0) { $bookno=1; }
		if($tc_no_max<=9)
		{
			$tc_no_max="000".$tc_no_max;
		}
		else if($tc_no_max<=99)
		{
			$tc_no_max="00".$tc_no_max;
		}
		else if($tc_no_max<=999)
		{
			$tc_no_max="0".$tc_no_max;
		}		
		$invoice_no =$year."-".$year1."/".$tc_no_max;
		return $invoice_no;
	}
	
	function prono()
	{			
		global $con;
		$tc_letter='B';
		$tc_no_max=000;
		$cno=mysqli_query($con,"select * from production order by srno");
		while($cnov=mysqli_fetch_array($cno))
		{
			if($tc_no_max<substr($cnov['srno'],4,2))
			{
					$tc_no_max=substr($cnov['srno'],4,2);
			}
		}
		$tc_no_max++;
		if($tc_no_max<=9)
		{
			$tc_no_max="000".$tc_no_max;
		}
		else if($tc_no_max<=99)
		{
			$tc_no_max="00".$tc_no_max;
		}
		else if($tc_no_max<=999)
		{
			$tc_no_max="0".$tc_no_max;
		}
		$srno=$tc_letter."/".$tc_no_max;
		return $srno;
	}
	
	function srno($table,$field,$letter)
	{
		global $con;
		$cmcode=$letter;
		if(date("m")>=4)
		{
			$meno=date("Y")-1967;
		}
		else
		{
			$meno=date("Y")-1968;
		}
		$no_max=000;
		$tbl=mysqli_query($con,"select $field from $table order by $field");
		while($tv=mysqli_fetch_array($tbl))
		{
			$ff=substr($tv[$field],6,2);
			$ss=$meno;
			if($ff==$ss)
			{
				
				$tno=substr($tv[$field],9,4);
				if($no_max<$tno)
				{
					$no_max=$tno;
				}
			}
		}
		$no_max++;
		if($no_max<=9)
		{
			$no_max="000".$no_max;
		}
		else if($no_max<=99)
		{
			$no_max="00".$no_max;
		}
		else if($no_max<=999)
		{
			$no_max="0".$no_max;
		}
		$autono=$cmcode."/".$meno."/".$no_max;
		return $autono;
	}
	function invoiceno($table,$field,$letter)
	{
		global $con;
		$cmcode=$letter;
		if(date("m")>=4)
		{
			$year1=date("y");
			$year2=$year1+1;
		}
		else
		{
			$year1=date("y")-1;
			$year2=date("y");
		}
		$no_max=000;
		$tbl=mysqli_query($con,"select $field from $table order by $field");
		while($cnov=mysqli_fetch_array($tbl))
		{
			if(substr($cnov[$field],0,2)==$year1 && substr($cnov[$field],11,2)==$year2)
			{
				if($no_max<substr($cnov[$field],13))
				{
					$no_max=substr($cnov[$field],13);
				}
			}
		}
		$no_max++;
		if($no_max<=9)
		{
			$no_max="000".$no_max;
		}
		else if($no_max<=99)
		{
			$no_max="00".$no_max;
		}
		else if($no_max<=999)
		{
			$no_max="0".$no_max;
		}
		$autono=$cmcode."/".$year1."-".$year2."/".$no_max;
		return $autono;
	}
	function certificateno($table,$field,$letter)
	{
		global $con;
		//$mdb=databasefind('1');
		$cmcode='CHM/'.$letter.'/'.$_SESSION['statecd'];
		if(date("m")>=4)
		{
			$year1=date("y");
			$year2=$year1+1;
		}
		else
		{
			$year1=date("y")-1;
			$year2=date("y");
		}
		$no_max=000;
		$tbl=mysqli_query($con,"select $field from $table order by $field");
		while($cnov=mysqli_fetch_array($tbl))
		{
			if(substr($cnov[$field],11,2)==$year1 && substr($cnov[$field],14,2)==$year2 &&  substr($cnov[$field],8,2)==$_SESSION['statecd'])
			{
				if($no_max<substr($cnov[$field],17))
				{
					$no_max=substr($cnov[$field],17);
				}
			}
		}
		$no_max++;
		if($no_max<=9)
		{
			$no_max="000".$no_max;
		}
		else if($no_max<=99)
		{
			$no_max="00".$no_max;
		}
		else if($no_max<=999)
		{
			$no_max="0".$no_max;
		}
		$autono=$cmcode."/".$year1."-".$year2."/".$no_max;
		return $autono;
	}
	function expenceno()
{
	global $con;
	$tc_letter='JME/E';
	if(date("m")>=4)
	{
		$year1=date("y");
		$year2=$year1+1;
	}
	else
	{
		$year1=date("y")-1;
		$year2=date("y");
	}
	$tc_no_max=000;
	$cno=mysqli_query($con,"select exp_no from expence_master order by exp_no");
	while($cnov=mysqli_fetch_array($cno))
	{
		if(substr($cnov['exp_no'],6,2)==$year1 && substr($cnov['exp_no'],9,2)==$year2)
		{
			if($tc_no_max<substr($cnov['exp_no'],12))
			{
				$tc_no_max=substr($cnov['exp_no'],12);
			}
		}
	}
	
	$tc_no_max++;
	if($tc_no_max<=9)
	{
		$tc_no_max="000".$tc_no_max;
	}
	else if($tc_no_max<=99)
	{
		$tc_no_max="00".$tc_no_max;
	}
	else if($tc_no_max<=999)
	{
		$tc_no_max="0".$tc_no_max;
	}
	$exp_no=$tc_letter."/".$year1."-".$year2."/".$tc_no_max;
	return $exp_no;
}
	
	function numrecs($mid)
	{
		global $con;
		//$mdb=databasefind('1');
		$q=mysqli_fetch_array(mysqli_query($con,"select * from setting_display where type='".$mid."' && uid='".$_SESSION['apuserid']."'"));
		$re['noofrecord']=$q['noofrecord'];
		$re['oby']=$q['oby'];
		return $re;
	}
/*	function databasefind($id)
	{
		$dbs=mysqli_fetch_array(mysqli_query($con,"select id,dbname from bloomr48_spcps.bloomtech_dbs where id='".$id."'"));
		return $dbs['dbname'];
	}																									*/
	 function selectone($table,$field,$val,$return)
	 {
	 	/*global $con;
	 	$ftch=mysqli_fetch_array(mysqli_query($con,"select $return from $table where $field='".$val."'"));
		return $ftch[$return];*/
		global $con;
		$ftq=mysqli_query($con,"select $return from $table where $field='".$val."'");
		if(!$ftq){ die("ERROR SELECTONE : select $return from $table where $field='".$val."'"); }
		$ftch=mysqli_fetch_array($ftq);
		return $ftch[$return];
	 }
	 function cusinfo($cusid)
	 {
	 	global $con;
	 	$ftch=mysqli_fetch_array(mysqli_query($con,"select id,address from customer_master where id='".$cusid."'"));
		return $ftch['address'];
	 }
	 
	 function supinfo($supid)
	 {
	 	global $con;
	 	$ftch=mysqli_fetch_array(mysqli_query($con,"select id,address from seller_master where id='".$supid."'"));
		return $ftch['address'];
	 }
		
	 function csetup($id)
	 {
	 	global $con;
	 	$csel=mysqli_fetch_array(mysqli_query($con,"select * from company_setup where id='".$id."'"));
		return $csel['cval'];
	 }
	 function dfltname($dfltval)
	 {
	 	
	 	if($dfltval==1) { $dfltname='Yes'; } else { $dfltname='No'; }
	 	return $dfltname;
	 }
	 function amcexp($expval)
	 {
	 	if($expval=='-365') { $expname='Expired'; }
		else if($expval=='5') { $expname='In 5 Days'; }
		else if($expval=='10') { $expname='In 10 Days'; }
		else if($expval=='20') { $expname='In 20 Days'; }
		else if($expval=='30') { $expname='In 30 Days'; }
		else if($expval=='45') { $expname='In 45 Days'; }
		else if($expval=='60') { $expname='In 60 Days'; }
	 	return $expname;
	 }
	 function access($expval)
	 {
	 	if($expval=='0') { $expname='Yes'; }
		else if($expval=='1') { $expname='No'; }
	 	return $expname;
	 }
	 function remarkview($rm)
	 {
	 	if($rm=='regularsales')
		{
		  $rreturn='REGULAR SALES';
		}
		elseif($rm=='standby')
		{
		  $rreturn='STAND BY';
		}
		elseif($rm=='approvalbais')
		{
		  $rreturn='APPROVAL BASIS';
		}
		elseif($rm=='replacement')
		{
		  $rreturn='REPLACEMENT';
		}
		elseif($rm=='rrnoncharg')
		{
		  $rreturn='REPAIR & RETURNE - NON CHARGEBLE';
		}
		elseif($rm=='rrcharge')
		{
		  $rreturn='REPIAR & RETURNE - CHARGEBLE';
		}
		elseif($rm=='rwr')
		{
		  $rreturn='RETURNE WITHOUT REPAIR';
		}
		elseif($rm=='refilling')
		{
		  $rreturn='REFILLING';
		}
		elseif($rm=='warranty')
		{
		  $rreturn='WARRANTY';
		}
		return $rreturn;
	 }
	 
	  function personal($code)
	  {
			if($code=='SD47WEWF4SDC48V4')
			{
				$usertypename="Administrator";
			}
			else if($code=='S4DF84A8F46S74F98')
			{
				$usertypename="HOD";
			}
			else if($code=='FG454SFG4ER4GEG')
			{
				$usertypename="Support Engineer";
			}
			else if($code=='AF4E4FEW65DSFE8F')
			{
				$usertypename="Office Assistance";
			}
			else if($code=='SUPODF8548E48DFE')
			{
				$usertypename="Not Woking";
			}
			return $usertypename;
	  }
	  
	   function backtype($code)
	  {
			if($code=='SD47WEWF4SDC48V4')
			{
				$backtype="blue";
			}
			else if($code=='S4DF84A8F46S74F98')
			{
				$backtype="green";
			}
			else if($code=='FG454SFG4ER4GEG')
			{
				$backtype="orange";
			}
			else if($code=='AF4E4FEW65DSFE8F')
			{
				$backtype="dark";
			}
			else if($code=='SUPODF8548E48DFE')
			{
				$backtype="dark";
			}
			return $backtype;
	  }
	
	 
	  function entuser($id)
		{
			global $con;
			$u=mysqli_fetch_array(mysqli_query($con,"select id,bloom_user from bloomtech_login where id='".$id."'"));
			return $u['bloom_user'];
		}
	  function loginuser($table,$row,$operation)
		{
			global $con;
			$ufid=mysqli_fetch_array(mysqli_query($con,"select * from user_track where tbl='".$table."' && fid='".$row."' && operation='".$operation."' order by id desc"));
			$u=mysqli_fetch_array(mysqli_query($con,"select * from bloomtech_login where id='".$ufid['usr']."'"));
			return $u['bloom_user'];
		}
	  function adddate($date)
		{
			if($date!='')
			{
				$datecnv=date("Y-m-d",strtotime($date));
				return $datecnv;
			}
			else
			{
				return '';
			}
		}
		function viewdate($date)
		{
			if($date!='0000-00-00' && $date!='' && $date!='1970-01-01')
			{
				$datecnv=date("d-m-Y",strtotime($date));
				return $datecnv;
			}
			else
			{
				return '';
			}
		}
		
	  function srnumber($sr_no)
	  {
	  		$sr_no++;
	  		if($sr_no<=9)
			{
				$sr_no="000".$sr_no;
			}
			else if($sr_no<=99)
			{
				$sr_no="00".$sr_no;
			}
			else if($sr_no<=999)
			{
				$sr_no="0".$sr_no;
			}
			return $sr_no;
	  }
	  
	  function otscheduleno()
	  {
	  	global $con;
	  	$tc_letter='SPT';
		if(date("m")>=4)
		{
			$year=28+date("y");
		}
		else
		{
			$year=28+date("y")-1;
		}
		$month=date("m");
		$tc_no_max=000;
		$cno=mysqli_query($con,"select sr_no from scheduled_general order by sr_no");
		while($cnov=mysqli_fetch_array($cno))
		{
			
			if(substr($cnov['sr_no'],7,2)==date("m") && substr($cnov['sr_no'],4,2)==$year)
			{
				if($tc_no_max<substr($cnov['sr_no'],10))
				{
					$tc_no_max=substr($cnov['sr_no'],10);
				}
			}
		}
		$tc_no_max++;
		if($tc_no_max<=9)
		{
			$tc_no_max="00".$tc_no_max;
		}
		else if($tc_no_max<=99)
		{
			$tc_no_max="0".$tc_no_max;
		}
		$sr_no=$tc_letter."/".$year."/".$month."/".$tc_no_max;
		return $sr_no;
	  }

?>
