<?php
	 ob_start();
	 include "dbcon.php";
 	
 class selection
 {
	public function selectopt($table,$name,$title,$argue,$field,$field2,$required)
	{ global $con;?>
		<select class="form-control"  name="<?php echo $name; ?>" id="<?php echo $name; ?>" data-placeholder="Choose a <?php echo $title; ?>" <?php echo $required; ?>>
			<?php if($argue!='') { ?>
			<option value="<?php echo $argue; ?>"><?php echo selectone($table,$field,$argue,$field2); ?></option>
            <option value="">De-Select</option>
			<?php } else { ?>
			<option value="">Select <?php echo $title; ?></option>
			<?php }
			$usrq=mysqli_query($con,"select $field,$field2 from $table group by $field2 order by $field2");
			while($usr=mysqli_fetch_array($usrq))
			{ ?>
			<option value="<?php echo $usr[$field]; ?>"><?php if($table=='contract') { echo $usr[$field2]." - ".substr($usr[$field2],2,4); } else { echo $usr[$field2]; }  ?></option>
			<?php } ?>
		</select>
	<?php }
	public function selectatypeother($atype)
	{  global $con;?>
        <span id="atypeold"><select class="form-control" name="atype" title="Select atype" required onChange="otherselect(this.value,'atypeold','atypenew','atypeopt');">
        <?php if($atype != '') {  $allatype = mysqli_fetch_array(mysqli_query($con,"select * from atype where id ='".$atype."'")); ?>
            <option value="<?php echo $allatype['id'];?>"><?php echo $allatype['name']; ?></option>
            <?php } else { ?>
            <option value="">Select Account Type</option>
            <option value="wantnewopt">Other</option>	
            <?php }  									
                $allatype = mysqli_query($con,"select * from atype order by name");											
                while($allatype1 = mysqli_fetch_array($allatype)) { ?>
                <option value="<?php echo $allatype1['id'];  ?>"><?php echo $allatype1['name']; ?></option>
                <?php } ?>																										
        </select></span>
         <span id="atypenew" style="display:none;"><input class="form-control" type="text" name="atypeopt" id="atypeopt"  data-rel="tooltip" title="New atype" data-placement="bottom"> 
        <a style="color:#FF0000; cursor: pointer; cursor: hand; " onClick="otherselect('resetit','atypenew','atypeold','atype');"><i class="far fa-trash-alt"></i></a></span>
   	
	<?php }
	public function selectbanknameother($bankname)
	{ global $con;?>
        <span id="banknameold">
        <select class="form-control" name="bankname" id="bankname" title="bankname Of Address" onChange="otherselect(this.value,'banknameold','banknamenew','banknameopt');" required>
                <?php if($bankname != '') { 
                    $allbankname = mysqli_fetch_array(mysqli_query($con,"select * from bankname where id ='".$bankname."'")); ?>
                    <option value="<?php echo $allbankname['id'];  ?>"><?php echo $allbankname['name']; ?></option>
                <?php } else { ?>
                    <option value="">Select bankname</option>
                    <option value="wantnewopt">Other</option>
                <?php } 									
                    $allbankname = mysqli_query($con,"select * from bankname order by name");											
                    while($allbankname1 = mysqli_fetch_array($allbankname))
                    { ?>
                    	<option value="<?php echo $allbankname1['id'];  ?>"><?php echo $allbankname1['name']; ?></option>
					<?php } ?>
            </select></span>
         <span id="banknamenew" style="display:none;"><input class="form-control" type="text" name="banknameopt" id="banknameopt"  data-rel="tooltip" title="New bankname" data-placement="bottom" />
         <a style="color:#FF0000; cursor: pointer; cursor: hand;" onClick="otherselect('resetit','banknamenew','banknameold','bankname');"><i class="far fa-trash-alt"></i></a></span>
	<?php }
	public function selecttypeother($type)
	{ global $con;?>
    	<span id="typeold"><select class="form-control" name="type" id="type" title="Transaction Type" onChange="otherselect(this.value,'typeold','typenew','typeopt');">
		<?php if($type != '') { 
            $alltype = mysqli_fetch_array(mysqli_query($con,"select * from type where name ='".$type."'")); ?>
            <option value="<?php echo $alltype['name'];  ?>"><?php echo $alltype['name']; ?></option>
        <?php } else { ?>
            <option value="">Select Place</option>
        <?php } ?>
        <option value="wantnewopt">Other</option>
        <?php 										
            $alltype = mysqli_query($con,"select * from type order by name");											
            while($alltype1 = mysqli_fetch_array($alltype))
            {  ?>
            <option value="<?php echo $alltype1['name'];  ?>"><?php echo $alltype1['name']; ?></option>
            <?php } ?>
         </select></span>
         <span id="typenew" style="display:none;"><input class="form-control" type="text" name="typeopt" id="typeopt"  data-rel="tooltip" title="New Transaction Type" data-typement="bottom"> 
         <a style="color:#FF0000; cursor: pointer; cursor: hand;" onClick="otherselect('resetit','typenew','typeold','type');"><i class="far fa-trash-alt"></i></a></span>
    <?php }
	public function selectoptpro($table,$name,$title,$argue,$field,$field2,$required)
	{ global $con;?>
		<select class="form-control" name="<?php echo $name; ?>" id="<?php echo $name; ?>"  data-placeholder="Choose a <?php echo $title; ?>" <?php echo $required; ?>>
			<?php if($argue!='') { ?>
			<option value="<?php echo $argue; ?>"><?php echo selectone($table,$field,$argue,$field2); ?></option>
            <option value="">De-Select</option>
			<?php } else { ?>
			<option value="">Select <?php echo $title; ?></option>
			<?php }
			$usrq=mysqli_query($con,"select $field,$field2 from $table group by $field2 order by $field2");
			while($usr=mysqli_fetch_array($usrq))
			{ ?>
			<option value="<?php echo $usr[$field]; ?>"><?php echo $usr[$field2];  ?></option>
			<?php } ?>
		</select>
	<?php }
	public function selectoptunit($table,$name,$title,$argue,$field,$field2,$required)
	{ global $con; ?>
		<select class="form-control" name="<?php echo $name; ?>" id="<?php echo $name; ?>" data-placeholder="Choose a <?php echo $title; ?>" style="width:13%;" <?php echo $required; ?>>
			<?php if($argue!='') { ?>
			<option value="<?php echo $argue; ?>"><?php echo selectone($table,$field,$argue,$field2); ?></option>
            <option value="">De-Select</option>
			<?php } else { ?>
			<option value="">Select <?php echo $title; ?></option>
			<?php }
			$usrq=mysqli_query($con,"select $field,$field2,unit from $table group by $field2 order by $field2");
			while($usr=mysqli_fetch_array($usrq))
			{ $unit=selectone('unit','id',$usr['unit'],'name'); ?>
			<option value="<?php echo $usr[$field]; ?>"><?php echo $usr[$field2]; ?> - <?php echo $unit; ?></option>
			<?php } ?>
		</select>
	<?php }
	public function selectoptadd($table,$name,$title,$argue,$field,$field2,$required)
	{ global $con; ?>
		<select class="form-control" name="<?php echo $name; ?>" id="<?php echo $name; ?>"  data-placeholder="Choose a <?php echo $title; ?>" style="width:13%;" <?php echo $required; ?>>
			<?php if($argue!='') { ?>
			<option value="<?php echo $argue; ?>"><?php echo selectone($table,$field,$argue,$field2); ?></option>
            <option value="">De-Select</option>
			<?php } else { ?>
			<option value="">Select <?php echo $title; ?></option>
			<?php }
			$usrq=mysqli_query($con,"select $field,$field2 from $table group by $field2 order by $field2");
			while($usr=mysqli_fetch_array($usrq))
			{ ?>
			<option value="<?php echo $usr[$field]; ?>"><?php if($table=='contract') { echo $usr[$field2]." - ".substr($usr[$field2],2,4); } else { echo $usr[$field2]; }  ?></option>
			<?php } ?>
		</select>
	<?php }
	public function selectoptbank($table,$name,$title,$argue,$field,$field2,$required)
	{ global $con; ?>
		<select class="form-control" name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="chosen-select"  data-placeholder="Choose a <?php echo $title; ?>" <?php echo $required; ?>>
			<?php if($argue!='') { ?>
			<option value="<?php echo $argue; ?>"><?php echo selectone($table,$field,$argue,$field2); ?></option>
            <option value="">De-Select</option>
			<?php } else { ?>
			<option value="">Select <?php echo $title; ?></option>
			<?php }
			$usrq=mysqli_query($con,"select $field,$field2,acof,bankname from $table group by $field2 order by $field2");
			while($usr=mysqli_fetch_array($usrq))
			{ $bank=selectone('bankname','id',$usr['bankname'],'name'); ?>
			<option value="<?php echo $usr[$field]; ?>"><?php echo $usr[$field2]; ?> : <?php echo $usr['acof']; ?> - <?php echo $bank; ?></option>
			<?php } ?>
		</select>
	<?php } 
	public function selectoptaddsmall($table,$name,$title,$argue,$field,$field2,$required)
	{ global $con; ?>
		<select class="form-control" name="<?php echo $name; ?>" id="<?php echo $name; ?>" data-placeholder="Choose a <?php echo $title; ?>" style="width:5%;" <?php echo $required; ?>>
			<?php if($argue!='') { ?>
			<option value="<?php echo $argue; ?>"><?php echo selectone($table,$field,$argue,$field2); ?></option>
            <option value="">De-Select</option>
			<?php } else { ?>
			<option value="">Select <?php echo $title; ?></option>
			<?php }
			$usrq=mysqli_query($con,"select $field,$field2 from $table group by $field2 order by $field2");
			while($usr=mysqli_fetch_array($usrq))
			{ ?>
			<option value="<?php echo $usr[$field]; ?>"><?php if($table=='contract') { echo $usr[$field2]." - ".substr($usr[$field2],2,4); } else { echo $usr[$field2]; }  ?></option>
			<?php } ?>
		</select>
	<?php }
	public function selectcityother($city)
	{  global $con;?>
        <span id="cityold"><select class="form-control" name="city" title="Select City" required onChange="otherselect(this.value,'cityold','citynew','cityopt');">
        <?php if($city != '') {  $allcity = mysqli_fetch_array(mysqli_query($con,"select * from city where id ='".$city."'")); ?>
            <option value="<?php echo $allcity['id'];?>"><?php echo $allcity['name']; ?></option>
            <?php } else { ?>
            <option value="">Select City</option>
            <?php } ?>
            <option value="wantnewopt">Other</option>
            <?php 										
                $allcity = mysqli_query($con,"select * from city order by name");											
                while($allcity1 = mysqli_fetch_array($allcity)) { ?>
                	<option value="<?php echo $allcity1['id'];  ?>"><?php echo $allcity1['name']; ?></option>
                <?php } ?>
        </select></span>
         <span id="citynew" style="display:none;"><input class="form-control" type="text" name="cityopt" id="cityopt"  data-rel="tooltip" title="New City" data-placement="bottom"> 
        <a style="color:#FF0000; cursor: pointer; cursor: hand;" onClick="otherselect('resetit','citynew','cityold','city');"><i class="far fa-trash-alt"></i></a></span>
   	<?php }
	public function selectstateother($state)
	{  global $con;?>
        <span id="stateold"><select class="form-control" name="state" title="Select State" required onChange="otherselect(this.value,'stateold','statenew','stateopt');">
        <?php if($state != '') {  $allstate = mysqli_fetch_array(mysqli_query($con,"select * from state where id ='".$state."'")); ?>
            <option value="<?php echo $allstate['id'];?>"><?php echo $allstate['name']; ?></option>
            <?php } else { ?>
            <option value="">Select state</option>
            <?php } ?>
            <option value="wantnewopt">Other</option>
            <?php 										
                $allstate = mysqli_query($con,"select * from state order by name");											
                while($allstate1 = mysqli_fetch_array($allstate)) { ?>
                	<option value="<?php echo $allstate1['id'];  ?>"><?php echo $allstate1['name']; ?></option>
                <?php } ?>
        </select></span>
         <span id="statenew" style="display:none;"><input class="form-control" type="text" name="stateopt" id="stateopt"  data-rel="tooltip" title="New State" data-placement="bottom"> 
        <a style="color:#FF0000; cursor: pointer; cursor: hand;" onClick="otherselect('resetit','statenew','stateold','state');"><i class="far fa-trash-alt"></i></a></span>
   	<?php }
 } ?>
 
<?php ob_end_flush(); ?>