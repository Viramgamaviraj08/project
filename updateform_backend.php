<?php 

include "dbcon.php";

    if (isset($_POST['submit'])) {

        $No = $_POST['No'];

        $Description = $_POST['Description'];

        $Qty = $_POST['Qty'];

        $Rate = $_POST['Rate'];


        $sql = "UPDATE `bill_info` SET `No`='$No',`Description`='$Description',`Qty`='$Qty' WHERE `No`='$No'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";
		header("Location: view.php");

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['No'])) {

    $No = $_GET['No']; 

    $sql = "SELECT * FROM `bill` WHERE `No`='$No'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

           $No = $row['No'];

            $Description = $row['Description'];

            $Qty = $row['Qty'];

            $Rate  = $row['Rate'];


        } 
    }
}
    ?>