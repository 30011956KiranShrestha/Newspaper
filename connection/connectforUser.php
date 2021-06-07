<?php 
$db="newspaper";
$user="user";
$pwd="";
$host="localhost";

$connection = new mysqli('localhost', $user, $pwd, $db) or die(mysqli_error($connection));
?>