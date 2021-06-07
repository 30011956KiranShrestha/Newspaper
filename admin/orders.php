<?php 
session_start();
include "../connection/connectadmin.php";
if(!isset($_SESSION["adminame"])){
   header("Location: login.php");
}

$page = 'Orders';
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
                        <th data-hide="phone">Date</th>
                        <th data-hide="phone">Full name</th>
                        <th data-hide="phone">Detail</th> 
                        <th data-hide="phone">Status</th> 
                         
                     </tr> 
                  </thead> 
                  <tbody> 
                     <?php
                     $sqldata = mysqli_query($connection, "SELECT O.*, O.order_id as oid, O.enterDate as odate, C.* FROM orders O, customer C WHERE O.customer_id  = C.customer_id") or die(mysqli_error($connection));
                     $num = mysqli_num_rows($sqldata);
                     if($num > 0){
                        $i = 1;
                        while($row = mysqli_fetch_assoc($sqldata)){
                           ?>
                           <tr>
                              <td><?php print $i; ?></td>
                              <td><?php print date('d F Y h:i A',strtotime($row['odate'])); ?></td>
                              <td><?php print $row['customer_name']; ?></td>
                              <td>Address :<?php print $row['customer_address']; ?><br/>
                                 Newspaper :<?php $sqlnewspaper = mysqli_query($connection, "SELECT client_name FROM client WHERE client_id IN (SELECT client_id FROM orderitems WHERE order_id = ".$row['oid']." )") or die(mysqli_error($connection));
                           $nums = $x  = mysqli_num_rows($sqlnewspaper);
                           $j = 1;
                           while($row1 = mysqli_fetch_assoc($sqlnewspaper)){
                              print $row1['client_name'];

                              if(($x - 1) == $j){
                                 print ' and ';
                              }
                              else if($nums == $j){
                                 print ' ';
                              }
                              else{
                                 print ', ';
                              }
                              $j++;
                           }
                         ?>
                              </td>
                              <td>
                                 <?php
                                 if($row['status'] == 1){
                                    print 'Paid';
                                 } 
                                 else{
                                    print 'In progess';
                                 }
                                 ?>
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