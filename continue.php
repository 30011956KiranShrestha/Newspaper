<?php
session_start();
include "connection/connectforUser.php";
$cart = json_decode($_COOKIE['cart']);
?>