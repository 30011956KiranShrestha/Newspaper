
<!-- PRELOADER STARTS
      ========================================================================= -->   
    <div id="preloader"></div>
    <!-- PRELOADER END
      ========================================================================= -->
    <!-- HEADER STARTS
      ========================================================================= -->
    <header class="header-style-03">
      <!-- TOP ROW STARTS -->
      <div class="top-nav">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 hidden-xs">
              <ul class="small-nav">
                <li id="date"></li>
                <li><a href="customer-login"><?php if(isset($_SESSION['customer_name'])){print $_SESSION['customer_name']; } else { print 'Sign in / Register'; } ?></a></li>
                <li><a href="cart" ><i class="fa fa-shopping-cart"></i> <span class="numberofCartProduct"><?php print $numberofCartProduct; ?></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- LOGO & ADS STARTS -->
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 logo text-light"><a href="home"><h1 class="text-light">NewsPaper Distribution Limited</h1></div>
          
        </div>
      </div>
      <!-- NAVIGATION STARTS
        ========================================================================= -->
      <nav id="navigation">
        <div class="navbar yamm navbar-inverse" role="navigation">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="navbar-header">               
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" > <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>           
                </div>
                <div class="collapse navbar-collapse">
                  <div id="menu">
                    <ul class="nav navbar-nav">
                      <li class="dropdown yamm-fw">
                        <a class="dropdown-link" href="home">Home</a>
                        <a class="dropdown-caret dropdown-toggle hide" data-hover="dropdown" style="display: none !important;" ><b class="caret hidden-xs"></b></a>
                        
                      </li>
                      <li class="dropdown yamm-fw ">
                        <a class="dropdown-link" href="order" >Orders</a>
                      </li>
                      <li class="dropdown yamm-fw ">
                        <a class="dropdown-link" href="delivery/" >Delivery</a>
                      </li>
                      <li class="dropdown yamm-fw">
                        <a class="dropdown-link" href="aboutus" >About Us</a>
                      </li>
                     
                      <?php if(isset($_SESSION['customer_name'])): ?>
                      <li class="dropdown yamm-fw">
                        <a class="dropdown-link" href="customer-account">My account</a>
                      </li>
                      <?php else: ?> 
                      <li class="dropdown yamnu-fw d-none d-sm-block">
                        <a class="dropdown-link d-none d-sm-block" href="customer_login">Sign in / Register</a>
                      </li>
                      <?php endif; ?>
                      <li class="dropdown yamm-fw d-none d-sm-block">
                        <a href="cart" class="dropdown-link d-none d-sm-block"><i class="fa fa-shopping-cart"></i> <span class="numberofCartProduct"><?php print $numberofCartProduct; ?></span></a>
                      </li>
                     
                    </ul>
                    <!-- Search Starts -->
                    
                    <!-- Search Ends -->
                  </div>
                </div>
                <!--/.nav-collapse --> 
              </div>
            </div>
          </div>
        </div>
      </nav>
      <!-- /. NAVIGATION ENDS
        ========================================================================= -->
    </header>