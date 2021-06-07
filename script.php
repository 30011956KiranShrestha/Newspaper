 <!-- LOAD JQUERY LIBRARY -->
    <script type="text/javascript" src="js/jquery-1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.lazyload.js"></script>
    <script>
      $("img.lazy").lazyload({
        effect : "fadeIn"
      });
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Hover Dropdown Menu --> 
    <script src="js/bootstrap-hover/twitter-bootstrap-hover-dropdown.min.js"></script> 
    <!-- Mean Menu -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- Sticky --> 
    <script type="text/javascript" src="js/sticky/jquery.sticky.js"></script>        
    <!-- SmoothScroll --> 
    <script type="text/javascript" src="js/SmoothScroll/SmoothScroll.js"></script>
    <!-- Owl Carousel --> 
    <script type="text/javascript" src="owl-carousel/owl-carousel/owl.carousel.js"></script>
    <!-- Magnific Popup core JS file -->
    <script type="text/javascript" src="js/magnific-popup/jquery.magnific-popup.js"></script>
    <!-- REVOLUTION JS FILES -->
    <script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
      (Load Extensions only on Local File Systems !  
      The following part can be removed on Server for On Demand Loading) -->  
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script type="text/javascript" src="revolution/js/slider-fullwidth.js"></script>
    <!-- AJAX Contact Form -->      
    <script type="text/javascript" src="js/contact/contact-form.js"></script>
    <!-- Style Switcher --> 
    <script type="text/javascript" src="js/styleswitcher/styleswitcher.js"></script>
    <!-- FitVids --> 
    <script type="text/javascript" src="js/fitvids/jquery.fitvids.js"></script>
    <!-- Custom --> 
    <script type="text/javascript" src="js/custom/custom.js"></script>
    <script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className == "navbar") {
        x.className = "navbar mobileexpand responsive";
      } else {
        x.className = "navbar navbar-dark navbar navbar-expand-md";
      }
    }
    $('.addtocart').click(function(){
      var cilent_id = $(this).attr('data-client');
      $.ajax({
        url: 'ajax.php',method: 'POST',
        data: {action:'addintocart',cilent_id:cilent_id},
        success: function(result) {
          $('.numberofCartProduct').text(result);
        }
      });
    });
    $(".removechart").click(function(){
      var cilent_id = $(this).attr('data-client');
      $.ajax({
        url: 'ajax.php',method: 'POST',
        data: {action:'removingchart',cilent_id:cilent_id},
        success: function(result) {
          var obj = jQuery.parseJSON(result);
          $('.numberofCartProduct').text(obj.total_product);
          $('.totalProduct').text(obj.total_product);
          $('.totalPrice').text("$"+obj.total_price);
          $('.item-'+cilent_id).hide();
          $('.item-'+cilent_id).html('');
        }
      });
    });
    </script>