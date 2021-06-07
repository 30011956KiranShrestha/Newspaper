<?php 
session_start();
include "../connection/connectadmin.php";
if(!isset($_SESSION["adminame"])){
	header("Location: login.php");
}
print(time() - $_SESSION['CREATED']);
if (time() - $_SESSION['CREATED'] > 40) {
    session_destroy();
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
	Welcome <?php echo $_SESSION["adminame"]; ?>
</body>
</html>
