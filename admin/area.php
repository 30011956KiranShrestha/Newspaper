<?php 
session_start();
include "../connection/connectadmin.php";
if(!isset($_SESSION["adminame"])){
	header("Location: login.php");
}

$page = 'Area';
$adminname = $_SESSION["adminame"];
if (isset($_POST['add_area'])) {
  $area_name = $_POST['area_name'];
  $address = $_POST['address'];
  $insert = mysqli_query($connection, "INSERT INTO area (area_name, address) VALUES ('$area_name', '$address')")  or die(mysqli_error($connection));
  if($insert){
    $sucess = "New area has been added";
    
  }
  else{
    $error = "Error while inserting data into the database.";
    $errorform = "adduser";
  }
  
}
if (isset($_POST['edit_area'])) {
  $area_id = $_POST['area_id'];
  $area_name = $_POST['area_name'];
  $address = $_POST['address'];
  $update = mysqli_query($connection, "UPDATE area SET area_name = '$area_name', address = '$address' WHERE area_id = $area_id")  or die(mysqli_error($connection));
  if($update){
    
      $sucess = "Area's data has been changed";
    
  }
  else{
    $error = "Error while upating data into the database.";
    $errorform = "editarea";

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
                  <li class="active"> <strong>Area</strong> </li> 
               </ol> 
               <h2>Area</h2> <br /> 
               <button class="btn btn-primary" onclick="jQuery('#adduser').modal('show');">Add Area</button>
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
                        <th data-hide="phone">Address</th> 
                        <th>Action</th> 
                     </tr> 
                  </thead> 
                  <tbody> 
                     <?php
                     $sqldata = mysqli_query($connection, "SELECT * FROM area") or die(mysqli_error($connection));
                     $num = mysqli_num_rows($sqldata);
                     if($num > 0){
                        $i = 1;
                        while($row = mysqli_fetch_assoc($sqldata)){
                           ?>
                           <tr>
                              <td><?php print $i; ?></td>
                              <td><?php print $row['area_name']; ?></td>
                              <td><?php print $row['address'] ?></td>
                              <td><button class="edit" data-id="<?php print $row['area_id']; ?>"><i class="entypo-pencil"></i></button> </td>
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
                  <h4 class="modal-title">Add area</h4>
               </div>
               <div class="modal-body">
                  
                 <form action="" method="POST">
                  <div class="mb-3">
                    <label class="form-label">Area name</label>
                    <input type="text" name="area_name" class="form-control" required="" >
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" required="">
                  </div>
                  <button type="submit" name="add_area" class="btn btn-primary mb-3">Add</button>
               </form>
               </div>
               
            </div>
         </div>
      </div>
      <div class="modal fade" id="editarea">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                  <h4 class="modal-title ">Edit details for <span class="editarea"></span></h4>
               </div>
               <div class="modal-body">
                 <form action="" method="POST">
                  <div class="mb-3">
                     <input type="hidden" name="area_id" required="">
                    <label class="form-label">Area name</label>
                    <input type="text" name="area_name" class="form-control" required="" >
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelectAreacode" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" required="">
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
         var editarea_id = $(this).attr('data-id');
         console.log(editarea_id);
         $.ajax({
            url: 'ajaxfile.php',method: 'POST', data: { editarea_id: editarea_id, editarea: true,},
               success: function(response)
               {
                  console.log(response);
                 var response = JSON.parse(response);
                  $('input[name="area_id"]').val(response.area_id);
                  $('input[name="area_name"]').val(response.area_name);
                  $('input[name="address"]').val(response.address);
                  $('span.editarea').html(response.area_name);
                  $('#editarea').modal('show');
               }
         })
      })
   </script>
</body> 
</html>