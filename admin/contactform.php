<?php 
session_start();
include "../connection/connectadmin.php";
if(!isset($_SESSION["adminame"])){
   header("Location: login.php");
}

$page = 'Contact Form';
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
                        <th>Date</th>
                        <th data-hide="phone">Full name</th>
                        <th data-hide="phone">Email</th> 
                        <th data-hide="phone">Subject</th> 
                        <th data-hide="phone">Message</th> 
                         
                     </tr> 
                  </thead> 
                  <tbody> 
                     <?php
                     $sqldata = mysqli_query($connection, "SELECT * FROM contactus ORDER BY enterdate DESC") or die(mysqli_error($connection));
                     $num = mysqli_num_rows($sqldata);
                     if($num > 0){
                        $i = 1;
                        while($row = mysqli_fetch_assoc($sqldata)){
                           ?>
                           <tr>
                              <td><?php print $i; ?></td>
                              <td><?php print date('d F Y h:i A',strtotime($row['enterdate'])); ?></td>
                              <td><?php print $row['firstname'].' '.$row['lastname']; ?></td>
                              <td><?php print$row['email']; ?></td>
                              <td><?php print $row['subject']; ?></td>
                              <td><?php print $row['message']; ?></td>
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
</body> 
</html>