<!-- 
//  Database connection details
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "material_uploading_system";
//  echo "welcome"; 

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     Retrieve data from the form
//     $name = $_POST['username'];
//     $email = $_POST['email'];
//    $age = $_POST['age'];

//     try {
//        Connect to the database
//         $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

//          Prepare the SQL statement
//         $stmt = $dbh->prepare("INSERT INTO student (name, email, ) VALUES (:name, :email, )");

//         Bind the parameters
//         $stmt->bindParam(':name', $name);
//         $stmt->bindParam(':email', $email);
//          $stmt->bindParam(':age', $age);

//          Execute the statement
//         $stmt->execute();

//          Output success message
//         echo "Data inserted successfully!";
//     } catch (PDOException $e) {
//         Handle database errors
//         echo "Error: " . $e->getMessage();
//     }
// } -->

<?php include 'dbcon.php'; ?>
<?php

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bill";
// echo "welcome";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $No=$_POST['No'];
    $Description = $_POST['Description'];
    $Qty = $_POST['Qty'];
    $Rate = $_POST['Rate'];

    try {
        // Connect to the database
        $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username);
        // $off = $dbh->prepare("SET FOREIGN_KEY_CHECKS = 0");
        // $off->execute();
        // Prepare the SQL statement
        $stmt = $dbh->prepare("INSERT INTO bill_info(No,Description,Qty,Rate) VALUES (:No,:Description,:Qty,:Rate)");

        // Bind the parameters
        $stmt->bindParam(':No', $No);
        $stmt->bindParam(':Description', $Description);
        $stmt->bindParam(':Qty', $Qty);
        $stmt->bindParam(':Rate', $Rate);


        // Execute the statement
        $stmt->execute();

        // Output success message
        // echo "Data inserted successfully!";
        header("location:view.php");
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
    }
}
?>