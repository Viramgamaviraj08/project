<?php 

include "dbcon.php"; 

if (isset($_GET['No'])) {

    $No = $_GET['No'];

    $sql = "DELETE FROM `bill_info` WHERE `No`='$No'";

     $result = $con->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";
	 header("Location: view.php");

    }else{

        echo "Error:" . $sql . "<br>" . $con->error;

    }

} 

?>