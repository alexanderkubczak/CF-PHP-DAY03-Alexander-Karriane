<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION[ 'user' ]) ) {
 header("Location: index.php");
 exit;
}
// select logged-in users details 
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head >
<title>Welcome - <?php echo $userRow['userName' ]; ?></title>
<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body >
          <h1 class="welcome">Hi <?php echo $userRow['userName' ]; ?>
            
           <a  href="logout.php?logout">Sign Out</a></h1>
  
        
  
</body>
</html>
<?php ob_end_flush(); ?>