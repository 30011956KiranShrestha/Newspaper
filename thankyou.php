<?php
session_start();
$page = "Thank you";
include "connection/connectforUser.php";
?>
<!doctype html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
	<?php include 'navbar.php'; ?>
	<!--menu row -->
	<div class="container">
	    
	    <div class="row mainbody">
	    	<div class="col-8 mx-auto">
	      		<div class="card-body">
		            <div class="row">
		            	<div class="col-md-5">
		            		<h2>Thank You</h2>
			            	<p>Your order has been entered into system. We had also send you details of order to your email.</p>
		            	</div>
		            	<div class="col-md-6">
		            		<img src="images/thankyou.png"  class="float-right">
		            	</div>
		            </div>
		        </div>
			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>

	<!--database content here-->

    <?php include 'script.php'; ?>
</body>
</html>
