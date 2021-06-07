<?php 
session_start();
include "../connection/connectadmin.php";
if(!isset($_SESSION["adminame"])){
	header("Location: login.php");
}

$page = 'Users';
$adminname = $_SESSION["adminame"];
if (isset($_POST['add_user'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $status = 1;
  $insert = mysqli_query($connection, "INSERT INTO admin (adminame, adminpassword, adminstatus) VALUES ('$username', '$password', $status)")  or die(mysqli_error($connection));
  if($insert){
    $sucess = "User has been added";
    
  }
  else{
    $error = "Error while inserting data into the database.";
    $errorform = "adduser";
  }
  
}
if (isset($_POST['edit_user'])) {

  $editadminid = $_POST['editadminid'];
  $editstatus = $_POST['editstatus'];
  $update = mysqli_query($connection, "UPDATE admin SET adminstatus = $editstatus WHERE admin_id = $editadminid")  or die(mysqli_error($connection));
  if($update){
    
      $sucess = "User's data has been changed";
    
  }
  else{
    $error = "Error while upating data into the database.";
    $errorform = "edituser";

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
                  <li class="active"> <strong>Users</strong> </li> 
               </ol> 
               <h2>Users</h2> <br /> 
               <button class="btn btn-primary" onclick="jQuery('#adduser').modal('show');">Add User</button>
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
                        <th data-hide="phone">Admin</th> 
                        <th data-hide="phone">Status</th> 
                        <th>Action</th> 
                     </tr> 
                  </thead> 
                  <tbody> 
                     <?php
                     $sqldata = mysqli_query($connection, "SELECT * FROM admin") or die(mysqli_error($connection));
                     $num = mysqli_num_rows($sqldata);
                     if($num > 0){
                        $i = 1;
                        while($row = mysqli_fetch_assoc($sqldata)){
                           ?>
                           <tr>
                              <td><?php print $i; ?></td>
                              <td><?php print $row['adminame']; ?></td>
                              <td>
                                 <?php
                                 if($row['adminstatus'] == 1){
                                    print 'Active';
                                 } 
                                 else{
                                    print 'In active';
                                 }
                                 ?>
                              </td>
                              <td><button class="edit" data-id="<?php print $row['admin_id']; ?>"><i class="entypo-pencil"></i></button> </td>
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
    <div class="modal fade" id="adduser">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                  <h4 class="modal-title">Add user</h4>
               </div>
               <div class="modal-body">
                  
                 <form action="" method="POST">
                  <div class="mb-3">
                    <label class="form-label">User name</label>
                    <input type="text" name="username" class="form-control" required="" >
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required="">
                  </div>
                  <button type="submit" name="add_user" class="btn btn-primary mb-3">Add</button>
               </form>
               </div>
               
            </div>
         </div>
      </div>
      <div class="modal fade" id="edituser">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                  <h4 class="modal-title ">Edit details for <span class="edituser"></span></h4>
               </div>
               <div class="modal-body">
                 <form action="" method="POST">
                  <div class="mb-3">
                     <input type="hidden" name="editadminid" required="">
                    <label for="exampleSelectAreacode" class="form-label">Status</label>
                    <select class="form-control" name="editstatus" >
                       <option disabled="" >Select One</option>
                       <option value="1">Active</option>
                       <option value="0">In active</option>
                    </select>
                  </div>
                  <button type="submit" name="edit_user" class="btn btn-primary mb-3">Edit</button>
               </form>
               </div>
               
            </div>
         </div>
      </div>
	<?php include 'inc_script.php'; ?>  
   <script type="text/javascript">
      $('.edit').click(function(){
         var editadmin_id = $(this).attr('data-id');
         console.log(editadmin_id);
         $.ajax({
            url: 'ajaxfile.php',method: 'POST', data: { editadmin_id: editadmin_id, edituser: true,},
               success: function(response)
               {
                 var response = JSON.parse(response);
                  $('input[name="editadminid"]').val(response.admin_id);
                  $('select[name="editstatus"]').val(response.adminstatus);
                  $('span.edituser').html(response.adminname);
                  $('#edituser').modal('show');
               }
         })
      })
   </script>
</body> 
</html>