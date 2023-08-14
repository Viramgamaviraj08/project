<?php
	ob_start();
	include "dbcon.php";	
	
 	function convertNumberToWordsForIndia($number)
	{
        //A function to convert numbers into Indian readable words with Cores, Lakhs and Thousands.
        $words = array(
        '0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five',
        '6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten',
        '11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen',
        '16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty',
        '30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy',
        '80' => 'eighty','90' => 'ninty');
       
        //First find the length of the number
        $number_length = strlen($number);
        //Initialize an empty array
        $number_array = array(0,0,0,0,0,0,0,0,0);       
        $received_number_array = array();
       
        //Store all received numbers into an array
        for($i=0;$i<$number_length;$i++){    $received_number_array[$i] = substr($number,$i,1);    }

        //Populate the empty array with the numbers received - most critical operation
        for($i=9-$number_length,$j=0;$i<9;$i++,$j++){ $number_array[$i] = $received_number_array[$j]; }
        $number_to_words_string = "";       
        //Finding out whether it is teen ? and then multiplying by 10, example 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
        for($i=0,$j=1;$i<9;$i++,$j++){
            if($i==0 || $i==2 || $i==4 || $i==7){
                if($number_array[$i]=="1"){
                    $number_array[$j] = 10+$number_array[$j];
                    $number_array[$i] = 0;
                }       
            }
        }
       
        $value = "";
        for($i=0;$i<9;$i++){
            if($i==0 || $i==2 || $i==4 || $i==7){    $value = $number_array[$i]*10; }
            else{ $value = $number_array[$i];    }           
            if($value!=0){ $number_to_words_string.= $words["$value"]." "; }
            if($i==1 && $value!=0){    $number_to_words_string.= "Crores "; }
            if($i==3 && $value!=0){    $number_to_words_string.= "Lakhs ";    }
            if($i==5 && $value!=0){    $number_to_words_string.= "Thousand "; }
            if($i==6 && $value!=0){    $number_to_words_string.= "Hundred"; }
        }
        if($number_length>9){ $number_to_words_string = "Sorry This does not support more than 99 Crores"; }
        return ucwords(strtolower($number_to_words_string));
    }
	
	

	 function lastid($asdgwef)
	 {
	 	global $con;
		$SQL="select id from $asdgwef order by id desc";
		$resql=mysqli_query($con,$SQL);
		if(!$resql) { $msg="Error..."; die("BTECH ERRLASTID:44984 = ".$SQL); }
		$d=mysqli_fetch_array($resql);
		return $d['id'];
	 }
	 function add($table_name, $input_array)
	 {
	 	//echo "error";
		global $con;
		$SQL = "INSERT INTO $table_name ";
		$arraycount=sizeof($input_array);
		$cnt=$arraycount;
		foreach ($input_array as $k => $v) 
		{
	  		$fields .= "`$k`";
		  	$values .= "'$v'";
	    	if($cnt!=1)
	  		{
			  	$fields.=",";
				$values.=",";
	  		}
	  		$cnt=$cnt-1;
		}
		$SQL .= "(".$fields.")" . " VALUES " ."(".$values.")";				
		$resql=mysqli_query($con,$SQL);
		if(!$resql) { $msg="Error..."; die("BTECH ERRADD:44984 = ".$SQL); } else { 	$msg="Added Successfully"; }
		$lid=lastid($table_name);
		
		$desn='Invoice Added Successfully.';
  echo "<script>window.location=allinvoice.php?notify=yes&desn=$desn';</script>";
	 }
	function edit($table, $data, $id_field, $id_value) 
	{
		global $con;
		foreach ($data as $field=>$value) 
		{
			$fields[] = sprintf("`%s` = '%s'", $field,$value);
		}
		$field_list = join(',', $fields);
		$query = sprintf("UPDATE `%s` SET %s WHERE `%s` = '%s'", $table, $field_list, $id_field, $id_value);
		$mqr=mysqli_query($con,$query);
		if(!$mqr) { die($query); }
		$msg="Edited Successfully";
		return $msg;
	}
	function lastidmdb($asdgwef)
	{
		global $con;
		$d=mysqli_fetch_array(mysqli_query($con,"select id from $asdgwef order by id desc"));
		return $d['id'];
	 }
	 function usermdb($table_name, $operation,$lid)
	{
		$usr['tbl']=$table_name;
		$usr['operation']=$operation;
		$usr['fid']=$lid;
		$usr['usr']=$_SESSION["apuserid"];
		$usr['date']=date("Y-m-d");
		$usr['time']=date("h:i:s");
		$usr['stamp']=time();
		$usr['ip']=$_SERVER['SERVER_ADDR'];
		$usr['sys']=gethostbyaddr($_SERVER['SERVER_ADDR']);
		$msg=addusertrack("user_track",$usr);
	}
	
	
	function delete($table,$field,$value)
	{
		global $con;
		mysqli_query($con,"delete from $table where $field='$value'");
	}
	
	function select($table,$field="",$value="",$num='0',$array="",$extra="",$column="")
	{
		global $con;
		if($array!="")
		{
			$cn=sizeof($array);
			foreach($array as $f => $val)
			{
				$f1="`$f`";
				$v1="'$val'";
				
				$s.="$f1=$v1";
				
				if($cn!=1)
				{
					$s.="and";
				}
			}
			if($cn!=1)
			{
				$s1=substr($s,0,-3);
			}
			else
			{
				$s1=$s;
			}
			if($extra=="") 
			{ 
				if($column!="")
				{
					//echo "select $column from $table where $s1";
					$sel=mysqli_query($con,"select $column from $table where $s1");
				}
				else
				{
					//echo "select * from $table where $s1";
					$sel=mysqli_query($con,"select * from $table where $s1");
				}
			}
			else if($extra!="")
			{
				if($column!="")
				{
					$sel=mysqli_query($con,"select $column from $table where $s1 $extra");
				}
				else
				{
					//echo "select * from $table where $s1 $extra";
					$sel=mysqli_query($con,"select * from $table where $s1 $extra");
				}
			}
			
			
			return $sel;
		}
		if($num=='1')
		{
			if(($field!="") && ($value!=""))
			{
				if($extra!="")
				{
					$sel=mysqli_query($con,"select * from $table where $field='$value'");
				}
				else
				{
					$sel=mysqli_query($con,"select * from $table where $field='$value' $extra");
				}
			}
			else if($array!="")
			{
				$cn=sizeof($array);
				foreach($array as $f => $val)
				{
					$f1="`$f`";
					$v1="'$val'";
				
					$s.="$f1=$v1";
				
					if($cn!=1)
					{
						$s.="and";
					}
				}
				if($cn!=1)
				{
					$s1=substr($s,0,-3);
				}
				else
				{
					$s1=$s;
				}
				if($extra=="") 
				{
					//echo "select * from $table where $s1";
					$sel=mysqli_query($con,"select * from $table where $s1");
				}
				else
				{
					//echo "select * from $table where $s1 $extra";
					$sel=mysqli_query($con,"select * from $table where $s1 $extra");
				}
			}
			else
			{
				$sel=mysqli_query($con,"select * from $table");
			}
			$num=mysqli_num_rows($sel);
			return $num;
		}
		if($field=="" && $value=="")
		{
			if($extra!="")
			{ 
				//echo "select * from $table $extra"; 
				$sel=mysqli_query($con,"select * from $table $extra");
			}
			else
			{
				$sel=mysqli_query($con,"select * from $table");
			}
			if($column!="")
			{
				if($extra=="")
				{
					//echo "select $column from $table";
					$sel=mysqli_query($con,"select $column from $table");
				}
				else
				{
					//echo "select $column from $table $extra"; exit;
					$sel=mysqli_query($con,"select $column from $table $extra");
				}
		    }
			return $sel;
		}
		if($field!="" && $value!="")
		{
			if($extra!="")
			{
				$sel=mysqli_query($con,"select * from $table where $field='$value'");
			}
			else
			{
				$sel=mysqli_query($con,"select * from $table where $field='$value' $extra");
			}
			$v=mysqli_fetch_array($sel);
			return $v;
		}
	}
	
	class page_code
	{
		function page($table,$pagename,$page,$fields,$limit,$order,$group="")
		{
			global $con;
			if($order!='')
			{
				$order="ORDER BY ".$order;
			}
			$adjacents = 3;
			if($group=="")
			{
				$query = "SELECT COUNT(*) as num FROM $table $order";
				$total_pages = mysqli_fetch_array(mysqli_query($con,$query));
				$total_pages = $total_pages['num'];
				if($page) 
					$start = ($page - 1) * $limit;         
				else
					$start = 0;                            
				$query = "SELECT $fields FROM $table $order LIMIT $start, $limit";
				$portfolio = mysqli_query($con,$query);
			}
			else
			{
				$query = "SELECT COUNT(*) as num FROM $table group by '$group' $order";
				$total_pages = mysqli_fetch_array(mysqli_query($con,$query));
				$total_pages = $total_pages['num'];    
				if($page) 
					$start = ($page - 1) * $limit;         
				else
					$start = 0;                            
				$query = "SELECT $fields FROM $table group by '$group' $order LIMIT $start, $limit";
				$portfolio = mysqli_query($con,$query);
			}
			
			if($order=="")
			{
				$query = "SELECT COUNT(*) as num FROM $table  $order";
				$total_pages = mysqli_fetch_array(mysqli_query($con,$query));
				$total_pages = $total_pages['num'];    
				if($page) 
					$start = ($page - 1) * $limit;         
				else
					$start = 0;                            
				$query = "SELECT $fields FROM $table  $order LIMIT $start, $limit";
				$portfolio = mysqli_query($con,$query);
			}
			else
			{
				$query = "SELECT COUNT(*) as num FROM $table $order";
				$total_pages = mysqli_fetch_array(mysqli_query($con,$query));
				$total_pages = $total_pages['num'];
				$limit;
				if($page) 
					$start = ($page - 1) * $limit;         
				else
					$start = 0;                            
				 $query = "SELECT $fields FROM $table $order LIMIT $start, $limit";
				 $portfolio = mysqli_query($con,$query);
			}
			if(!$portfolio) { $msg="Error..."; die("BTECH page:449484 = ".$query); } else { 	$msg="Edited Successfully"; }
			if ($page == 0) $page = 1;                  
			$prev = $page - 1;                          
			$next = $page + 1;                          
			$lastpage = ceil($total_pages/$limit); 
			$lpm1 = $lastpage - 1;                 
			$pagination = "";
			if($lastpage > 1)
			{   
			$pagination .= "<div class=\"dataTables_paginate paging_bootstrap\"><ul class=\"pagination\">";
			if ($page > 1) 
			{
				$pagination.= "<li><a href=\"$pagename&page=1\">First</a></li>";
				$pagination.= "<li><a href=\"$pagename&page=$prev\">Previous</a></li>";
			}
			else
			{
				 $pagination.= "<li class='prev disabled'><a >First</a></li>";
				 $pagination.= "<li class='prev disabled'><a>Previous</a></li>";
			}
			 if ($lastpage < 7 + ($adjacents * 2))  
			 {   
				 for ($counter = 1; $counter <= $lastpage; $counter++)
				 {
					if ($counter == $page)
					{
						$pagination.= "<li class=\"active\"><span>$counter</span></li>";
					}
					else
					{
						$pagination.= "<li><a href=\"$pagename&page=$counter\">$counter</a></li>";                   
					}
				 }
			}
			else if($lastpage > 5 + ($adjacents * 2))    
			{
				if($page < 1 + ($adjacents * 2))        
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
						{
						 $pagination.= "<li class=\"active\"><span>$counter</span></li>";
						}
						else
						{
						 $pagination.= "<li><a href=\"$pagename&page=$counter\">$counter</a></li>";                   
						}
					}
					$pagination.= "...";
					$pagination.= "<li><a  href=\"$pagename&page=$lpm1\">$lpm1</a></li>";
					$pagination.= "<li><a  href=\"$pagename&page=$lastpage\">$lastpage</a></li>";     
				}
			
				else if($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
					$pagination.= "<li class=\"active\"><a href=\"$pagename&page=1\">1</a></li>";
					$pagination.= "<li class=\"active\"><a href=\"$pagename&page=2\">2</a></li>";
					$pagination.= "...";
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
						{
							$pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
						}
						else
						{
							$pagination.= "<li><a class=\"paginate_button\" href=\"$pagename&page=$counter\">$counter</a></li>";                   
						}
					}
					$pagination.= "...";
					$pagination.= "<li><a class=\"paginate_button\" href=\"$pagename&page=$lpm1\">$lpm1</a></li>";
					$pagination.= "<li><a class=\"paginate_button\" href=\"$pagename&page=$lastpage\">$lastpage</a></li>";     
				}
		
				else
				{
					$pagination.= "<li><a class=\"paginate_button\" href=\"$pagename&page=1\">1</a></li>";
					$pagination.= "<li><a class=\"paginate_button\" href=\"$pagename&page=2\">2</a></li>";
					$pagination.= "...";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
						{
							$pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
						}
						else
						{
							$pagination.= "<li><a class=\"paginate_button\" href=\"$pagename&page=$counter\">$counter</a></li>";
						}
					}
				}
			}
		}
	
		if ($page < $counter - 1) 
		{
			$pagination.= "<li><a class=\"last paginate_button\" href=\"$pagename&page=$next\">Next</a></li>";
			$pagination.= "<li><a class=\"last paginate_button\" href=\"$pagename&page=$lastpage\">Last</a></li>";
		}
		else if ($page < $counter) 
		{
			$pagination.= "<li class='prev disabled'><a class=\"last paginate_button paginate_button_disabled\">Next</a></li>";
			$pagination.= "<li class='prev disabled'><a class=\"last paginate_button paginate_button_disabled\">Last</a></li>";
			
		}
		$pagination.= "</div>\n";
		$countrow=mysqli_query($con,"select *from $table $order");
		$countrow1=mysqli_num_rows($countrow);
		$data['pagination']= $pagination;
		$data['portfolio']= $portfolio;
		$data['no_of_rows']=$countrow1;		
		return $data;
	}
	
	
}
	
?>

<?php ob_end_flush(); ?>