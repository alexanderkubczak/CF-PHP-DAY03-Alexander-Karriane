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

$vehicleID = mysqli_real_escape_string($conn, $_POST['VehicleID']);
$description = mysqli_real_escape_string($conn, $_POST['Description']);
$with_customer = mysqli_real_escape_string($conn, $_POST['with_customer']);

$sql = "UPDATE vehicle SET VehicleID = '$vehicleID', Description = '$description' WHERE vehicle.vehicleID = $vehicleID";

  if (mysqli_query($conn, $sql)) {
      echo "$vehicleID Record updated.\n";
  } else {
     echo  "Record creation error for: " . $sql . "\n" . mysqli_error($conn);
  }
mysqli_close($conn);
echo  "</body></html>";
?>