<?php
session_start();
include "../connection/connectforUser.php";
if (isset($_POST['login'])) {
  $data = array();
  $delivery_email = $_POST['email'];
  $delivery_password = $_POST['password'];
  $sql = mysqli_query($connection, "SELECT * FROM delivery WHERE delivery_email = '$delivery_email' AND delivery_password  = '$delivery_password'") or die(mysqli_error($connection));
  $num = mysqli_num_rows( $sql);
  if ($num > 0) {
    $_SESSION["delivery_email"] = $delivery_email;
    $_SESSION['CREATED'] = time();
    while ($row = mysqli_fetch_assoc($sql)) {
      $_SESSION['delivery_name'] = $row['delivery_name'];
      $_SESSION['delivery_id'] = $row['delivery_id'];
    }

    $data['login_status'] = 'success';
  }
  else{
    $data['login_status'] = 'invalid';
  }
  print json_encode($data);
}
?>