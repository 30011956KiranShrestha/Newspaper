<?php
include "connection/connectadmin.php";
$page = "Order";
?>
<!doctype html>
<html lang="en">
  <?php include 'head.php'; ?>
  <body>
  <!--menu row -->
    <?php include 'navbar.php'; ?>
  <div class="container">
    <div class="mt-2">
      <?php 
      $sql = mysqli_query($connection, "SELECT * FROM client WHERE status = 1") or die(mysqli_error($connection));
      $i = 1;
      while ($row = mysqli_fetch_assoc($sql)) {
        if($i % 2 != 0 ){ print '<div class="row">'; }
        ?>
        <div class="col-md-6 col-sm-12 mb-2 mt-2 ">
          <div class="card p-3">
            <img class="imgsd" style="width: 70%;" src="images/<?php print $row['logo'] ?>" alt="<?php print $row['client_name']; ?>">
            <h3><?php print $row['client_name']; ?></h3>
            <p>Price : <?php print $row['price']; ?></p>
            <a class="addtocart text-light" data-client="<?php print $row['client_id']; ?>"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
          </div>
          
        </div>
        <?php
        if($i % 2 == 0 ){ print '</div>'; }
        $i++;
      }
      if($i % 2 == 0){ print '</div>'; }
        
      ?>
    </div>
      
  </div>
    
    <?php include 'footer.php'; ?>

<!--database content here-->

    <?php include 'script.php'; ?>
  </body>
</html>