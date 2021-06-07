<?php 
session_start();
include "../connection/connectadmin.php";
if(!isset($_SESSION["adminame"])){
	header("Location: login.php");
}

$page = 'Dashboard';
$adminname = $_SESSION["adminame"];
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
            	<?php
            	$sqluser = mysqli_query($connection, "SELECT * FROM admin WHERE adminstatus = 1") or die(mysqli_error($connection));
            	$numuser = mysqli_num_rows($sqluser); 
            	$sqlclient = mysqli_query($connection, "SELECT * FROM client WHERE status = 1") or die(mysqli_error($connection));
            	$numclient = mysqli_num_rows($sqlclient);
            	$date = date('Y-m-d');
            	$sqlcontact = mysqli_query($connection, "SELECT * FROM contactus WHERE enterdate > '".$date." 00:00:00' AND enterdate < '".$date." 23:59:59' ") or die(mysqli_error($connection));
            	$numcontact = mysqli_num_rows($sqlcontact); 
            	$sqlcustomer = mysqli_query($connection, "SELECT * FROM customer") or die(mysqli_error($connection));
            	$numcustomer = mysqli_num_rows($sqlcustomer);  
            	?>
               <div class="col-sm-3 col-xs-6">
                  <div class="tile-stats tile-red">
                     <div class="icon"><i class="entypo-users"></i></div>
                     <div class="num" data-start="0" data-end="<?php print $numuser; ?>" data-postfix="" data-duration="1500" data-delay="0">0</div>
                     <h3>Users</h3>
                  </div>
               </div>
               <div class="col-sm-3 col-xs-6">
                  <div class="tile-stats tile-green">
                     <div class="icon"><i class="entypo-chart-bar"></i></div>
                     <div class="num" data-start="0" data-end="<?php print $numcustomer; ?>" data-postfix="" data-duration="1500" data-delay="600">0</div>
                     <h3>Customers</h3>
                  </div>
               </div>
               <div class="clear visible-xs"></div>
               <div class="col-sm-3 col-xs-6">
                  <div class="tile-stats tile-aqua">
                     <div class="icon"><i class="entypo-mail"></i></div>
                     <div class="num" data-start="0" data-end="<?php print $numcontact; ?>" data-postfix="" data-duration="1500" data-delay="1200">0</div>
                     <h3>Contact Form</h3>
                  </div>
               </div>
               <div class="col-sm-3 col-xs-6">
                  <div class="tile-stats tile-blue">
                     <div class="icon"><i class="entypo-folder"></i></div>
                     <div class="num" data-start="0" data-end="<?php print $numclient; ?>" data-postfix="" data-duration="1500" data-delay="1800">0</div>
                     <h3>Clients</h3>
                  </div>
               </div>
            </div>
            <br /> 
            <?php include 'inc_footer.php'; ?>
        </div> 
    </div> 
	<?php include 'inc_script.php'; ?>  
</body> 
</html>
