
<?php
include "connection/connectadmin.php";
?>
<!doctype html>
<html lang="en">
  <?php include 'head.php'; ?>
  <body>
  <!--menu row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col"><h1>NewsPaper Distribution Limited</h1></div>
    </div>
    <?php include 'navbar.php'; ?>
    <div class="row">
      <?php 
      $sql = mysqli_query($connection, "SELECT * FROM client WHERE status = 1") or die(mysqli_error($connection));
      while ($row = mysqli_fetch_assoc($sql)) {
        ?>
        <div class="col-md-6 col-sm-12 mb-2 mt-2 ">
          <div class="card p-3">
            <img class="imgsd" src="images/<?php print $row['logo'] ?>" alt="<?php print $row['client_name']; ?>">
          <h3><?php print $row['client_name']; ?></h3>
          <p>Price : <?php print $row['price']; ?></p>
          <a class="addtocart" data-client="<?php print $row['client_id']; ?>"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
          </div>
          
        </div>
        <?php
      }
        
      ?>
          
     </div>
  </div>
    
    <?php include 'footer.php'; ?>

<!--database content here-->

    <?php include 'script.php'; ?>
  </body>
</html>