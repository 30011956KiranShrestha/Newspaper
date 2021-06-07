<?php 
session_start();
include "../connection/connectadmin.php";
if(!isset($_SESSION["adminame"])){
   header("Location: login.php");
}

$page = 'Client';
$adminname = $_SESSION["adminame"];
$target_dir = "../images/";
$uploadOk = 1;
if (isset($_POST['add_client'])) {
   $client_name = $_POST['client_name'];
   $client_address = $_POST['client_address'];
   $client_phone = $_POST['client_phone'];
   $client_email = $_POST['client_email'];
   $status = 1;
   $price = $_POST['price'];
   $logo = $_FILES["logo"]["name"];
   $target_file = $target_dir . basename($_FILES["logo"]["name"]);
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   if (file_exists($target_file)) {
     $error =  "Sorry, file already exists.";
     $uploadOk = 0;
   }
  $insert = mysqli_query($connection, "INSERT INTO client (client_name, client_address,client_phone,client_email,status,price, logo) VALUES ('$client_name', '$client_address', '$client_phone','$client_email',$status,$price,'$logo')")  or die(mysqli_error($connection));
  if($insert){
   if($uploadOk == 0){
      $sucess = "New client has been added but";
   }
   else{
      move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file);
   }
    
  }
  else{
    $error = "Error while inserting data into the database.";
  }
  
}
if (isset($_POST['edit_area'])) {
  $client_id = $_POST['client_id'];
  $client_name = $_POST['client_name'];
  $client_address = $_POST['client_address'];
   $client_phone = $_POST['client_phone'];
   $client_email = $_POST['client_email'];
   $status = $_POST['status'];
   $price = $_POST['price'];
  $update = mysqli_query($connection, "UPDATE client SET client_name = '$client_name', client_address = '$client_address',client_phone = '$client_phone', client_email = '$client_email', status = $status, price = $price WHERE client_id = $client_id")  or die(mysqli_error($connection));
  if($update){
      $sucess = "Client's data has been changed";
      if(isset($_FILES['logo'])){
         $logo = $_FILES["logo"]["name"];
         $target_file = $target_dir . basename($_FILES["logo"]["name"]);
         $uploadOk = 1;
         $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
         if (file_exists($target_file)) {
           $error =  "Sorry, file already exists.";
           $uploadOk = 0;
         }
         if($uploadOk == 0){
            $sucess = "New client has been added but";
         }
         else{
            $update = mysqli_query($connection, "UPDATE area SET logo = '$logo' WHERE client_id = $client_id")  or die(mysqli_error($connection));
            move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file);
         }
      }
    
  }
  else{
    $error = "Error while upating data into the database.";

  }
  
}
 ?>
<!DOCTYPE html> 
<html lang="en"> 
<!-- Mirrored from demo.neontheme.com/layouts/collapsed-sidebar/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 May 2021 05:11:36 GMT -->
<!-- Added by HTTrack --><!-- /Added by HTTrack -->
<?php include 'inc_head.php'; ?> 
<body class="page-body">  
   <div class="page-container">
        <?php include 'inc_siderbar.php'; ?>
        <div class="main-content">
            <?php include 'inc_header.php'; ?>
            <div class="row">
               <ol class="breadcrumb bc-3"> 
                  <li> <a href="index.php"><i class="fa-home"></i>Home</a> </li> 
                  <li class="active"> <strong><?php print $page; ?></strong> </li> 
               </ol> 
               <h2><?php print $page; ?></h2> <br /> 
               <button class="btn btn-primary" onclick="jQuery('#addclient').modal('show');">Add <?php print $page; ?></button>
               <?php if(isset($sucess)): ?>
                 <div class="col-12 text-center ">
                   <p class="messagetodisplay">
                     <?php print $sucess; ?>  
                   </p>
                   
                 </div>
                 <?php endif; ?>
                 <?php if(isset($error)): ?>
                 <div class="col-12 text-center ">
                   <p class="errormsg messagetodisplay">
                     <?php print $error; ?>  
                   </p>
                   
                 </div>
                 <?php endif; ?>
              
               <table class="table table-bordered datatable" id="table-1"> 
                  <thead> 
                     <tr> 
                        <th data-hide="phone">S.N</th> 
                        <th data-hide="phone">Area name</th>
                        <th data-hide="phone">Logo</th> 
                        <th data-hide="phone">Price</th> 
                        <th data-hide="phone">Detail</th> 
                        <th>Action</th> 
                     </tr> 
                  </thead> 
                  <tbody> 
                     <?php
                     $sqldata = mysqli_query($connection, "SELECT * FROM client") or die(mysqli_error($connection));
                     $num = mysqli_num_rows($sqldata);
                     if($num > 0){
                        $i = 1;
                        while($row = mysqli_fetch_assoc($sqldata)){
                           ?>
                           <tr>
                              <td><?php print $i; ?></td>
                              <td><?php print $row['client_name']; ?></td>
                              <td><img class="imgsd" style="width: 20%;" src="../images/<?php print $row['logo'] ?>" alt="<?php print $row['client_name']; ?>"></td>
                              <td><?php print $row['price']; ?></td>
                              <td>Address :<?php print $row['client_address']; ?><br/>
                                 Phone :<?php print $row['client_phone']; ?><br/>
                                 Email :<?php print $row['client_email']; ?><br/>
                                 Status : <?php if($row['status'] == 1){
                                    print 'Active';
                                 } 
                                 else{
                                    print 'In active';
                                 } ?><br/>
                              </td>
                              <td><button class="edit" data-id="<?php print $row['client_id']; ?>"><i class="entypo-pencil"></i></button> </td>
                           </tr>
                           <?php
                           $i++;
                        }

                     }
                        
                     ?>
                  </tbody>
               </table>
            </div>
            <br /> 
            <?php include 'inc_footer.php'; ?>
        </div> 
    </div> 
    <div class="modal fade" id="addclient">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                  <h4 class="modal-title"><?php print $page; ?></h4>
               </div>
               <div class="modal-body">
                  
                 <form action="" method="POST" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label class="form-label">Client name</label>
                    <input type="text" name="client_name" class="form-control" required="" >
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Client address</label>
                    <input type="text" name="client_address" class="form-control" required="">
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Client phone</label>
                    <input type="text" name="client_phone" class="form-control" required="">
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Client email</label>
                    <input type="email" name="client_email" class="form-control" required="">
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Client Price</label>
                    <input type="text" name="price" class="form-control" required="">
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Client Logo</label>
                    <input type="file" name="logo" class="form-control" required="">
                  </div>
                  <button type="submit" name="add_client" class="btn btn-primary mb-3">Add</button>
               </form>
               </div>
               
            </div>
         </div>
      </div>
      <div class="modal fade" id="editclient">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                  <h4 class="modal-title ">Edit details for <span class="editclient"></span></h4>
               </div>
               <div class="modal-body">
                 <form action="" method="POST" enctype="multipart/form-data">
                  <div class="mb-3">
                     <input type="hidden" name="client_id" required="">
                    <label class="form-label">Client name</label>
                    <input type="text" name="client_name" class="form-control" required="" >
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Client address</label>
                    <input type="text" name="client_address" class="form-control" required="">
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Client phone</label>
                    <input type="text" name="client_phone" class="form-control" required="">
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Client email</label>
                    <input type="email" name="client_email" class="form-control" required="">
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Client Price</label>
                    <input type="text" name="price" class="form-control" required="">
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Client Logo</label>
                    <input type="file" name="logo" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Status</label>
                    <select class="form-control" name="status" required="">
                       <option disabled="" selected="">Select One</option>
                       <option value="1">Active</option>
                       <option value="0">In active</option>
                    </select>
                  </div>
                  <button type="submit" name="edit_area" class="btn btn-primary mb-3">Edit</button>
               </form>
               </div>
               
            </div>
         </div>
      </div>
   <?php include 'inc_script.php'; ?>  
   <script type="text/javascript">
      $('.edit').click(function(){
         var editclient_id = $(this).attr('data-id');
         $.ajax({
            url: 'ajaxfile.php',method: 'POST', data: { editclient_id: editclient_id, editclient: true,},
               success: function(response)
               {
                  console.log(response);
                 var response = JSON.parse(response);
                  $('input[name="client_id"]').val(response.client_id);
                  $('input[name="client_name"]').val(response.client_name);
                  $('input[name="client_address"]').val(response.client_address);
                  $('input[name="client_phone"]').val(response.client_phone);
                  $('input[name="client_email"]').val(response.client_email);                  
                  $('input[name="price"]').val(response.price);
                  $('select[name="status"]').val(response.status);
                  $('span.editclient').html(response.client_name);
                  $('#editclient').modal('show');
               }
         })
      })
   </script>
</body> 
</html>