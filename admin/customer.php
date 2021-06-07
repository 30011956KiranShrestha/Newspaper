<?php 
session_start();
include "../connection/connectadmin.php";
if(!isset($_SESSION["adminame"])){
	header("Location: login.php");
}

$page = 'Customers';
$adminname = $_SESSION["adminame"];
 ?>
<!DOCTYPE html> 
<html lang="en"> 
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
              
              <table class="table table-bordered datatable" id="table-1"> 
                  <thead> 
                     <tr> 
                        <th data-hide="phone">S.N</th> 
                        <th data-hide="phone">Full name</th>
                        <th data-hide="phone">Detail</th>  
                         
                     </tr> 
                  </thead> 
                  <tbody> 
                     <?php
                     $sqldata = mysqli_query($connection, "SELECT * FROM customer") or die(mysqli_error($connection));
                     $num = mysqli_num_rows($sqldata);
                     if($num > 0){
                        $i = 1;
                        while($row = mysqli_fetch_assoc($sqldata)){
                           ?>
                           <tr>
                              <td><?php print $i; ?></td>
                              <td><?php print $row['customer_name']; ?></td>
                              <td>Address :<?php print $row['customer_address']; ?><br/>
                                 Phone :<?php print $row['customer_phone']; ?><br/>
                                 Email :<?php print $row['customer_email']; ?><br/>
                                 Gender :<?php print $row['customer_gender'] ?>
                              </td>
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
   <?php include 'inc_script.php'; ?>  