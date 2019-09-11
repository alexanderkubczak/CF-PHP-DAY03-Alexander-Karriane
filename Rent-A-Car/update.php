<?php
echo ("<html><body>");
$servername = "localhost" ;
$username = "root";
$password = "";
$dbname = "car_rental";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if  (!$conn) {
   die("Connection failed: " . mysqli_connect_error() . "\n" );
}
// $car_reg_no = mysqli_real_escape_string($conn, $_POST['car_registration_no']);
// $model = mysqli_real_escape_string($conn, $_POST[ 'model']);
// $brand = mysqli_real_escape_string($conn, $_POST['brand']);
// $image = mysqli_real_escape_string($conn, $_POST['image']);
$sql = "SELECT VehicleID, Description, With_customer, Location FROM vehicle WHERE VehicleID = 1";
$result = mysqli_query($conn, $sql);
// $i = 1;
while($row = mysqli_fetch_assoc($result)) {
   $save_vehicleID = $row[ "VehicleID"];
   $save_description = $row["Description"];
   $save_with_customer = $row["With_customer"];
   $save_Location = $row["Location"];
}
echo  "<br>Fetched data successfully\n";
// Free result set
mysqli_free_result($result);
mysqli_close($conn);
echo  "</body></html>";
?>

<form action="update_1.php" method ="post">
   <p>
     <label for="VehicleID">Vehicle ID:</label>
     <input type="text" name= "VehicleID" id="VehicleID" value="<?= $save_vehicleID ?>">
   </p>
   <p>
     <label for ="Description">Description:</label>
     <input type="text" name="Description"  id="Description" value="<?= $save_description ?>">
   </p>
   <p>
     <label for= "with_customer">With Customer:</label>
     <input type="text" name= "with_customer" id="with_customer" value="<?= $save_with_customer ?>">
   </p>
    <p>
     <label for= "Location">Location:</label>
     <input type="text" name= "Location" id="Location" value="<?= $save_Location ?>">
   </p>
   <input type= "submit" value="Update">
</form>