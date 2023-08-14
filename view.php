<?php 

include "dbcon.php";

$sql = "SELECT * FROM bill_info";

$result = $con->query($sql);

?>

<!DOCTYPE html>

<html>
<head>

    <title>View Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>

    <div class="container">
    <div class="container mx-2">
        <h5>"Shree Hari"</h5> <span><h5 style="text-align:center;">"Shree Ganesh"</h5> <h5 style="text-align:right;">"Shree Bahuchar Ma"</h5></span>
        <h3>Nilkanth Eletricals</h3>
    </div>  
<a class="btn btn-info" href="billfrom.php">Insert</a>

<table class="table">

    <thead>

        <tr>

        <th>No</th>

        <th>Description</th>

        <th>Qty</th>

        <th>Rate</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['No']; ?></td>

                    <td><?php echo $row['Description']; ?></td>

                    <td><?php echo $row['Qty']; ?></td>

                    <td><?php echo $row['Rate']; ?></td>

                    <td><a class="btn btn-danger" href="delete.php?No=<?php echo $row['No']; ?>">Delete</a></td> 

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>