<?php
session_start();
include "../connection/connectadmin.php";
$data = array();
if(isset($_POST["login"])){
  
  $username  = $_POST["username"];
  $password = $_POST["password"];
  $sql = mysqli_query($connection, "SELECT * FROM admin WHERE adminame = '$username' AND adminpassword = '$password' AND adminstatus = 1") or die(mysqli_error($connection));
  $num = mysqli_num_rows( $sql);
  if ($num > 0) {
    
    $_SESSION["adminame"] = $username;
    $_SESSION['CREATED'] = time();
   $data['login_status'] = 'success';
  }
  else{
    $data['login_status'] = 'invalid';
  }
  print json_encode($data);
}
if(isset($_POST['edituser'])){
  $admin_id = $_POST['editadmin_id'];
  $sql = mysqli_query($connection, "SELECT * FROM admin WHERE admin_id = $admin_id") or die(mysqli_error($connection));
  $row = mysqli_fetch_assoc($sql);
  $data['admin_id'] = $row['admin_id'];
  $data['adminame'] = $row['adminame'];
  $data['adminstatus'] = $row['adminstatus'];
  print json_encode($data);
}
if(isset($_POST['editarea'])){
  $area_id = $_POST['editarea_id'];
  $sql = mysqli_query($connection, "SELECT * FROM area WHERE area_id = $area_id") or die(mysqli_error($connection));
  $row = mysqli_fetch_assoc($sql);
  $data['area_id'] = $row['area_id'];
  $data['area_name'] = $row['area_name'];
  $data['address'] = $row['address'];
  print json_encode($data);
}
if (isset($_POST['editclient'])) {
  $client_id = $_POST['editclient_id'];
  $sql = mysqli_query($connection, "SELECT * FROM client WHERE client_id = $client_id") or die(mysqli_error($connection));
  $row = mysqli_fetch_assoc($sql);
  $data['client_id'] = $row['client_id'];
  $data['client_name'] = $row['client_name'];
  $data['client_address'] = $row['client_address'];
  $data['client_phone'] = $row['client_phone'];
  $data['client_email'] = $row['client_email'];
  $data['status'] = $row['status'];
  $data['price'] = $row['price'];
  print json_encode($data);
}
if(isset($_POST['editdelivery'])){
  $delivery_id = $_POST['editdelivery_id'];
  $sql = mysqli_query($connection, "SELECT * FROM delivery WHERE delivery_id = $delivery_id") or die(mysqli_error($connection));
  $row = mysqli_fetch_assoc($sql);
  $data['delivery_id'] = $row['delivery_id'];
  $data['delivery_name'] = $row['delivery_name'];
  $data['delivery_address'] = $row['delivery_address'];
  $data['delivery_gender'] = $row['delivery_gender'];
  $data['delivery_email'] = $row['delivery_email'];
  $data['operating_area'] = $row['operating_area'];
  $data['status'] = $row['status'];
  print json_encode($data);
}
?>
