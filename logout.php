<?php
	ob_start();
?>
<?php
include "dbcon.php";
 session_start();
	session_destroy(); 
	echo "<script>window.parent.location.href='index.php';</script>";
?>
<?php
	ob_end_flush();
?>
