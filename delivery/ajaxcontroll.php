<?php
session_start();
include "../connection/connectforUser.php";
if (isset($_POST['delivery'])) {
  $data = array();
  $order_id = $_POST['order_id'];
  $delivery_id = $_POST['delivery_id'];
  $date = date('Y-m-d');
  $sql = mysqli_query($connection, "INSERT INTO order_delivery (order_id,delivery_id, enter_date) VALUES ($order_id,$delivery_id, '$date')") or die(mysqli_error($connection));
  if ($sql) {
    $data['status'] = 'success';
  }
  else{
    $data['status'] = 'invalid';
  }
  print json_encode($data);
}
?>