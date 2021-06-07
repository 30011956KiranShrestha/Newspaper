<?php 	
session_start();
include "../connection/connectforUser.php";
if(!isset($_SESSION["delivery_id"])){
	header("Location: login.php");
}
?>
<!DOCTYPE html> 
<html lang="en"> 
<!-- Mirrored from demo.neontheme.com/layouts/collapsed-sidebar/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 May 2021 05:11:36 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1" /> 
	<meta name="description" content="Neon Admin Panel" /> 
	<meta name="author" content="Laborator.co" /> 
	<link rel="icon" href="assets/images/favicon.ico"> 
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-141030632-1"></script> 
	<title>Dashboard | Delivery</title>
	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css" id="style-resource-1"> 
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css" id="style-resource-2"> 
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic" id="style-resource-3"> 
	<link rel="stylesheet" href="assets/css/bootstrap.css" id="style-resource-4">
	<link rel="stylesheet" href="assets/css/neon-core.css" id="style-resource-5"> 
	<link rel="stylesheet" href="assets/css/neon-theme.css" id="style-resource-6"> 
	<link rel="stylesheet" href="assets/css/neon-forms.css" id="style-resource-7"> 
	<link rel="stylesheet" href="assets/css/custom.css" id="style-resource-8"> 
	<script src="assets/js/jquery-1.11.3.min.js"></script> <!--[if lt IE 9]><script src="https://demo.neontheme.com/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->  <!--[if lt IE 9]> <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]-->  
</head> 
<body class="page-body">  
	<div class="page-container sidebar-collapsed">  
		<div class="sidebar-menu"> 
			<div class="sidebar-menu-inner"> 
				<header class="logo-env">  
					<div class="logo"> 
						<a href="dashboard/main/index.html"> 
							Newspaper distribution Ltd 
						</a> 
					</div>  
					<div class="sidebar-collapse"> 
						<a href="#" class="sidebar-collapse-icon"> <i class="entypo-menu"></i> </a> 
					</div>  
					<div class="sidebar-mobile-menu visible-xs"> 
						<a href="#" class="with-animation"> <i class="entypo-menu"></i> </a> 
					</div> 
				</header> 
				<ul id="main-menu" class="main-menu"> 
					<li> <a href="dashboard/main/index.html"><i class="entypo-gauge"></i><span class="title">Dashboard</span></a>  </li> 
				</ul> 
			</div> 
		</div> 
		<div class="main-content">  
			<div class="row">  
				<div class="col-md-6 col-sm-8 clearfix"> 
					<ul class="user-info pull-left pull-none-xsm">  
						<li class="profile-info dropdown"> 
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
								<i class="fa fa-user"></i> <?php print $_SESSION['delivery_name'] ?>
							</a> 
							
						</li> 
					</ul>  
				</div>  
				<div class="col-md-6 col-sm-4 clearfix hidden-xs"> 
					<ul class="list-inline links-list pull-right"> 
						<li> <a href="logout.php">Log Out <i class="entypo-logout right"></i> </a> </li> 
					</ul> 
				</div> 
			</div> <hr />  
			<ol class="breadcrumb bc-3"> 
				<li class="active"> <a href="index.php"><i class="fa-home"></i>Home</a> </li> 
				<!-- <li> <a href="../layout-api/index.html">Layouts</a> </li> 
				<li class="active"> <strong>Collapsed Sidebar</strong> </li>  -->
			</ol> 
			<h2>Main Dashboard</h2> <br /> 
			<p>There are list of address where you need to delivery the news paper</p>
			<script type="text/javascript">
				jQuery( document ).ready( function( $ ) {
				var $table1 = jQuery( '#table-1' );
				// Initialize DataTable
				$table1.DataTable( {
				"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"bStateSave": true
				});
				// Initalize Select Dropdown after DataTables is created
				$table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
				minimumResultsForSearch: -1
				});
				} );
			</script> 
			<?php 

			$delivery_id = $_SESSION['delivery_id'];
			$sql = mysqli_query($connection, "SELECT * FROM delivery WHERE delivery_id = $delivery_id");
			$row = mysqli_fetch_assoc($sql);
			$operating_area = $row['operating_area'];
			?>
			<table class="table table-bordered datatable" id="table-1"> 
				<thead> 
					<tr> 
						<th data-hide="phone">S.N</th> 
						<th data-hide="phone">Address</th> 
						<th data-hide="phone,tablet">Newspaper</th> 
						<th>Action</th> 
					</tr> 
				</thead> 
				<tbody> 
					<?php
					$sqldata = mysqli_query($connection, "SELECT O.*, O.order_id as oid, C.* FROM orders O, customer C WHERE O.customer_id  = C.customer_id AND C.address_code = $operating_area") or die(mysqli_error($connection));
					$num = mysqli_num_rows($sqldata);
					if($num > 0){
						$i = 1;
						while($row = mysqli_fetch_assoc($sqldata)){
							?>
							<tr>
								<td><?php print $i; ?></td>
								<td><?php print $row['customer_address']; ?></td>
								<td>
									<?php $sqlnewspaper = mysqli_query($connection, "SELECT client_name FROM client WHERE client_id IN (SELECT client_id FROM orderitems WHERE order_id = ".$row['oid']." )") or die(mysqli_error($connection));
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
								 ?></td>
								<td>
									<?php 
									$date = date('Y-m-d');
									$sqldelivery = mysqli_query($connection, "SELECT * FROM order_delivery WHERE delivery_id = $delivery_id AND order_id = ".$row['oid']." AND enter_date = '$date'")  or die(mysqli_error($connection));
									$numss = mysqli_num_rows($sqldelivery); 
									?>
									<input type="checkbox" class="done" value="<?php print $row['oid']; ?>" <?php if($numss > 0) print 'disabled checked'; ?> /></td>
							</tr>
							<?php
							$i++;
						}

					}
						
					?>
				</tbody>
			</table>
			<footer class="main"> 
				
				&copy; 2021 <strong>Newspaper distribution Ltd</strong>
			</footer>
		</div>  

	</div> 
	<link rel="stylesheet" href="assets/js/datatables/datatables.css" id="style-resource-1">
	<script src="assets/js/gsap/TweenMax.min.js" id="script-resource-1"></script> 
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script> <script src="assets/js/bootstrap.js" id="script-resource-3"></script> <script src="assets/js/joinable.js" id="script-resource-4"></script> 
	<script src="assets/js/resizeable.js" id="script-resource-5"></script> <script src="assets/js/neon-api.js" id="script-resource-6"></script> 
	<script src="assets/js/cookies.min.js" id="script-resource-7"></script> <script src="assets/js/neon-chat.js" id="script-resource-8"></script>  
	<script src="assets/js/neon-custom.js" id="script-resource-9"></script>  <script src="assets/js/neon-demo.js" id="script-resource-10"></script> 
	<script src="assets/js/neon-skins.js" id="script-resource-11"></script>  
	<script src="/assets/js/datatables/datatables.js" id="script-resource-12"></script>
	<script>
		$('.done').change(function(){
			if ($(this).is(':checked')) {
		        var order_id = $(this).val();
		        var delivery_id = <?php print $delivery_id; ?>;
		        $(this).attr('disabled','disabled');
		        $.ajax({
		        	url: 'ajaxcontroll.php',method: 'POST', data: { order_id: order_id, delivery_id: delivery_id, delivery: true,},
					success: function(response)
					{
						
					}
		        });
		    }
		});
	</script>
</body> 
</html>