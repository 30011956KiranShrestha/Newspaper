<?php 
session_start();
include "../connection/connectadmin.php";
if(!isset($_SESSION["adminame"])){
   header("Location: login.php");
}

$page = 'Delivery User';
$adminname = $_SESSION["adminame"];
$uploadOk = 1;
if (isset($_POST['add_delivery'])) {
   $delivery_name = $_POST['delivery_name'];
   $delivery_address = $_POST['delivery_address'];
   $delivery_gender = $_POST['delivery_gender'];
   $delivery_email = $_POST['delivery_email'];
   $operating_area = $_POST['operating_area'];
   $status = 1;
    $delivery_password = $_POST['delivery_password'];
   $insert = mysqli_query($connection, "INSERT INTO delivery (delivery_name, delivery_address,delivery_gender,delivery_email,status,operating_area, delivery_password) VALUES ('$delivery_name', '$delivery_address', '$delivery_gender','$delivery_email',$status,$operating_area,'$delivery_password')")  or die(mysqli_error($connection));
   if($insert){
      $sucess = "New Delivery User has been added but";
   }
   else{
    $error = "Error while inserting data into the database.";
   }
  
}
if (isset($_POST['edit_area'])) {
  $delivery_id = $_POST['delivery_id'];
  $delivery_name = $_POST['delivery_name'];
   $delivery_address = $_POST['delivery_address'];
   $delivery_gender = $_POST['delivery_gender'];
   $delivery_email = $_POST['delivery_email'];
   $operating_area = $_POST['operating_area'];
   $status = $_POST['status'];
  $update = mysqli_query($connection, "UPDATE delivery SET delivery_name = '$delivery_name', delivery_address = '$delivery_address',delivery_gender = '$delivery_gender', delivery_email = '$delivery_email', status = $status, operating_area = $operating_area WHERE delivery_id = $delivery_id")  or die(mysqli_error($connection));
  if($update){
      $sucess = "Delivery User's data has been changed";
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
               <button class="btn btn-primary" onclick="jQuery('#adddelivery').modal('show');">Add <?php print $page; ?></button>
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
                        <th data-hide="phone">Full name</th>
                        <th>Operating Area</th>
                        <th data-hide="phone">Detail</th> 
                        <th>Action</th> 
                     </tr> 
                  </thead> 
                  <tbody> 
                     <?php
                     $sqldata = mysqli_query($connection, "SELECT * FROM delivery") or die(mysqli_error($connection));
                     $num = mysqli_num_rows($sqldata);
                     if($num > 0){
                        $i = 1;
                        while($row = mysqli_fetch_assoc($sqldata)){
                           ?>
                           <tr>
                              <td><?php print $i; ?></td>
                              <td><?php print $row['delivery_name']; ?></td>
                              <td>
                                 <?php $sqlq = mysqli_query($connection,"SELECT area_name FROM area WHERE area_id = ".$row['operating_area']);
                                 $rowq = mysqli_fetch_assoc($sqlq);
                                 print $rowq['area_name'];
                                  ?>
                              </td>
                              <td>Address :<?php print $row['delivery_address']; ?><br/>
                                 Email :<?php print $row['delivery_email']; ?><br/>
                                 Status : <?php if($row['status'] == 1){
                                    print 'Active';
                                 } 
                                 else{
                                    print 'In active';
                                 } ?><br/>
                              </td>

                              <td><button class="edit" data-id="<?php print $row['delivery_id']; ?>"><i class="entypo-pencil"></i></button> </td>
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
    <div class="modal fade" id="adddelivery">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                  <h4 class="modal-title"><?php print $page; ?></h4>
               </div>
               <div class="modal-body">
                  
                 <form action="" method="POST" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="delivery_name" class="form-control" required="" >
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Address</label>
                    <input type="text" name="delivery_address" class="form-control" required="">
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Email</label>
                    <input type="email" name="delivery_email" class="form-control" required="">
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Gender</label>
                    <select class="form-control" name="delivery_gender" required="">
                       <option disabled="" selected="">Select One</option>
                       <option value="male">Male</option>
                       <option value="female">Female</option>
                       <option value="other">Other</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Operating Area</label>
                    <select class="form-control" name="operating_area" required="">
                       <option disabled="" selected="">Select One</option>
                       <?php $sql = mysqli_query($connection, "SELECT * FROM area"); 
                       while($row = mysqli_fetch_assoc($sql)){
                           print '<option value="'.$row['area_id'].'">'.$row['area_name'].'</option>';
                       }
                       ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Password</label>
                    <input type="password" name="delivery_password" class="form-control" required="">
                  </div>
                  <button type="submit" name="add_delivery" class="btn btn-primary mb-3">Add</button>
               </form>
               </div>
               
            </div>
         </div>
      </div>
      <div class="modal fade" id="editdelivery">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                  <h4 class="modal-title ">Edit details for <span class="editdelivery"></span></h4>
               </div>
               <div class="modal-body">
                 <form action="" method="POST" enctype="multipart/form-data">
                  <div class="mb-3">
                     <input type="hidden" name="delivery_id" required="">
                    <label class="form-label">Name</label>
                    <input type="text" name="delivery_name" class="form-control" required="" >
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Address</label>
                    <input type="text" name="delivery_address" class="form-control" required="">
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Email</label>
                    <input type="email" name="delivery_email" class="form-control" required="">
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Gender</label>
                    <select class="form-control" name="delivery_gender" required="">
                       <option disabled="" selected="">Select One</option>
                       <option value="male">Male</option>
                       <option value="female">Female</option>
                       <option value="other">Other</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Operating Area</label>
                    <select class="form-control" name="operating_area" required="">
                       <option disabled="" selected="">Select One</option>
                       <?php $sql = mysqli_query($connection, "SELECT * FROM area"); 
                       while($row = mysqli_fetch_assoc($sql)){
                           print '<option value="'.$row['area_id'].'">'.$row['area_name'].'</option>';
                       }
                       ?>
                    </select>
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
         console.log('asdasd');
         var editdelivery_id = $(this).attr('data-id');
         $.ajax({
            url: 'ajaxfile.php',method: 'POST', data: { editdelivery_id: editdelivery_id, editdelivery: true,},
               success: function(response)
               {
                  console.log(response);
                 var response = JSON.parse(response);
                  $('input[name="delivery_id"]').val(response.delivery_id);
                  $('input[name="delivery_name"]').val(response.delivery_name);
                  $('input[name="delivery_address"]').val(response.delivery_address);
                  $('select[name="delivery_gender"]').val(response.delivery_gender);
                  $('input[name="delivery_email"]').val(response.delivery_email);                  
                  $('select[name="operating_area"]').val(response.operating_area);
                  $('select[name="status"]').val(response.status);
                  $('span.editdelivery').html(response.delivery_name);
                  $('#editdelivery').modal('show');
               }
         })
      })
   </script>
</body> 
</html>