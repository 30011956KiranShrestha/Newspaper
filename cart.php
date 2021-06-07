
<?php
session_start();
include "connection/connectforUser.php";
if(isset($_SESSION['customerId'])){
  $customerId = $_SESSION['customerId'];
}
$numberofproduct = 0;
if (!isset($_COOKIE['cart'])) {
  $emptycart = true;
} 
else{
  $cart = json_decode($_COOKIE['cart']);
  $numberofproduct = sizeof($cart);
  if(sizeof($cart)<1){
    $emptycart = true;
  }
}
$totalPrice = 0;
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
    <div class="row mainbody">
      <div class="col-12">
        <h1>List of product on cart</h1>
        <div class="row">
          <div class="col-md-8">
            <div class="card p-3">
                <?php if (!isset($emptycart)) {
                  $cart = json_decode($_COOKIE['cart']);
                  foreach ($cart as $cartItem) {
                    $sql = mysqli_query($connection, "SELECT * FROM client WHERE client_id = ".$cartItem) or die(mysqli_error($connection));
                    while ($row = mysqli_fetch_assoc($sql)) {
                      $totalPrice += $row['price'];
                      ?>
                      <div class="row item-<?php print $row['client_id']; ?>">
                        <div class="col-4 mb-4">
                          <img style="width: 100%" src="images/<?php print $row['logo']; ?>" alt="<?php print $row['client_name']; ?>">
                        </div>
                        <div class="col-8 mb-4">
                          <h4><?php print $row['client_name']; ?></h4>
                           <p>Price : $<?php print $row['price']; ?></p>
                           <button class="removechart btn btn-danger" data-client="<?php print $row['client_id']; ?>">Remove</button>
                        </div>
                      </div>
                      <?php
                    }
                  }
                } ?>
                
            </div>
          </div>
          <div class="col-md-4">
            <div class="card p-3">
              <h3>Order Summary</h3>
              <p>Items (<span class="totalProduct"><?php echo $numberofproduct; ?></span>) : <span class="totalPrice">$<?php echo $totalPrice; ?></span></p>
              <p>Tax:</p>
              <p>Net Total:</p>
              <button class="btn btn-primary continue" data-toggle="modal" data-target="#exampleModal">Continue to order</button>
            </div>
          </div>
        </div>
          
      </div>
          
     </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login/Register</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <h4>Login</h4>
              <form>
                
              </form>
            </div>
            <div class="col-md-6">
              <h4>Register</h4>
              <form>
                
              </form>
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