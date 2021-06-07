<?php 
$db="newspaper";
$user="root";
$pwd="";
$host="localhost";
$connection = new mysqli('localhost', $user, $pwd, $db) or die(mysqli_error($connection));

function checkforemail($email){
	$db="newspaper";
$user="root";
$pwd="";
$host="localhost";
$connection = new mysqli('localhost', $user, $pwd, $db) or die(mysqli_error($connection));
	$sql  =  mysqli_query($connection,"SELECT customer_email FROM customer WHERE customer_email = '$email'");
	$num = mysqli_num_rows( $sql);
	if ($num > 0) {
		return false;
	}
	else{
		return true;
	}
}
?>