<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 

    <?php
// Establish database connection
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bill";

 try {
     $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     // Set PDO error mode to exception
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
 }
// Retrieve all data from 'request_upload' table
$stmt = $pdo->query("SELECT * FROM Bill_info");

// Display data in a table
echo "<table class='table'>";
echo "<thead>";
echo "<tr>";
echo "<th scope='col'>No </th>";
echo "<th scope='col'>Description</th>";
echo "<th scope='col'>Qty</th>";
echo "<th scope='col'>Rate</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

// echo "<tr>
// <th>Uploader_id </th>
// <th>Material Name</th>
// <th>Material Category</th>
// <th>Class</th>
// <th>Keywords</th>
// <th>Subject</th>
// <th>File Description</th>
// <th>File Description</th>
// <th> Add Remarks </th>
// <th> Delete</th></tr>";




while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  echo "<tr>";
  echo "<td>" . $row['No'] . "</td>";
  echo "<td>" . $row['Description'] . "</td>";
  echo "<td>" . $row['Qty'] . "</td>";
  echo "<td>" . $row['Rate'] . "</td>";
  if(isset($_POST['submit'])){
    // $add_remarks =$_POST['add_remarks'];
    // $sql = "UPDATE upload_request 
    // SET remarks = $add_remarks
    //  where upload_request_id=" . $row['upload_request_id'] . "";
    // // write update query
    $conn-> query($sql);
    // $upload_id = $conn-> insert_id;
  }
  // delete button
  echo "<td><form action='delete.php'  method='post'><input type='hidden'  name='no' value='" . $row['No'] . "'><input type='submit'  class='btn btn-danger' value='Delete'></form></td>";

  echo "</tr>";
}
echo "</table>";

//Insert data into author table

?>
</html>
</body>
