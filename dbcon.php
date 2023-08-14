<?php
	$servername = 'localhost';
	$user = 'root';
	$password = '';
	$database = 'bill';

	$con = mysqli_connect($servername, $user, $password, $database);

	if (!$con){
		?>
			<script>alert("Connection Unsuccessful!!!");</script>
		<?php
	}
	
?>