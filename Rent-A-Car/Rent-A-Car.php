<?php
ob_start();
session_start(); // start a new session or continues the previous
if( isset($_SESSION['user'])!="" ){
 header("Location: home.php" ); // redirects to home.php
}
include_once 'dbconnect.php';
$error = false;
if ( isset($_POST['btn-signup']) ) {
 
 // sanitize user input to prevent sql injection
 $name = trim($_POST['name']);

  //trim - strips whitespace (or other characters) from the beginning and end of a string
  $name = strip_tags($name);

  // strip_tags — strips HTML and PHP tags from a string

  $name = htmlspecialchars($name);
 // htmlspecialchars converts special characters to HTML entities
 $email = trim($_POST[ 'email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);

  // basic name validation
 if (empty($name)) {
  $error = true ;
  $nameError = "Please enter your full name.";
 } else if  (strlen($name) < 3) {
  $error = true;
  $nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
  $error = true ;
  $nameError = "Name must contain alphabets and space.";
 }

 //basic email validation 
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address." ;
 } else {
  // checks whether the email exists or not
  $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
 // password validation
  if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have atleast 6 characters." ;
 }

 // password hashing for security
$password = hash('sha256' , $pass);


 // if there's no error, continue to signup
 if( !$error ) {
  
  $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
  $res = mysqli_query($conn, $query);
  
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($name);
    unset($email);
   unset($pass);
  } else  {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later..." ;
  }
  
 }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rent-A-Car</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="Rent-A-Car.css">
  <?php 
 include "nav.php";
 ?>

</head>
<body>



<?php
// this will avoid mysql_connect() deprecation error.
error_reporting( ~E_DEPRECATED & ~E_NOTICE );


define ('DBHOST', 'localhost');
define('DBUSER' , 'root');
define('DBPASS', '');
define ('DBNAME', 'Car_Rental');

$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);


if  ( !$conn ) {
 die("Connection failed : " . mysqli_error());
}


?>

<h1>
  Click on the type of data you would like to submit
</h1>


<?php

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
   die("Connection failed: "  . mysqli_connect_error());
}
// Create database
// $sql = "CREATE DATABASE $dbname";
// if  (mysqli_query($conn, $sql)) {
//    echo "Database $dbname created successfully! \n";
// } else {
//    echo "Error creating database $dbname: " . mysqli_error($conn);
// }

//sql to create table
/*$sql = "CREATE TABLE Customers (
user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(20) NOT NULL,
lastname VARCHAR(20) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)" ;
if (mysqli_query($conn, $sql)) {
   echo "Table Customers created successfully"  . "\n";
} else {
   echo  "Error creating table: " . mysqli_error($conn) . "\n";
}*/

//sql to insert data in table
/*$sql = "INSERT INTO Customers (firstname, lastname, email)
VALUES ('Karianne', 'Dramdal', 'karri@dramdal.com')";
if (mysqli_query($conn, $sql)) {
   echo "New record created.\n";
} else {
  echo  "Record creation error for: " . $sql . "\n" . mysqli_error($conn);
}

$sql = "INSERT INTO Customers (firstname, lastname, email)
VALUES ('Nicole', 'Dobraszkiewicz', 'nici@dobraszkiewicz.com')";
if (mysqli_query($conn, $sql)) {
    echo "New record created.\n";
} else {
   echo  "Record creation error for: " . $sql . "\n" . mysqli_error($conn);
}*/

// Escape user inputs for security
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST[ 'lastname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
// attempt insert query execution
//$sql = "INSERT INTO Customers (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')";
/*if (mysqli_query($conn, $sql)) {
    echo "<h1>New record created.<h1>";
} else {
    echo "<h1>Record creation error for: </h1>" .
         "<p>"  . $sql . "</p>" .
         mysqli_error($conn);
}*/
mysqli_close($conn);
echo  "</body></html>";

?>

</body>
</html>





</body>
</html>
