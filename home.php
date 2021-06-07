<!doctype html>
<html lang="en">
  <?php include 'head.php'; ?>
  <body>
      <!-- <?php
            include "connect/connection.php"?> -->
  <!--menu row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col"><h1>NewsPaper Distribution Limited</h1></div>
    </div>
    <?php include 'navbar.php'; ?>
    <div class="row">
       <div class="col">
         <div class="slideshow-container">

            <div class="mySlides fade">
              <div class="numbertext">1 / 3</div>
              <img src="images/1.jpg" style="width:100%">
              <div class="text">Caption Text</div>
            </div>

            <div class="mySlides fade">
              <div class="numbertext">2 / 3</div>
              <img src="images/2.jpg" style="width:100%">
              <div class="text">Caption Two</div>
            </div>

            <div class="mySlides fade">
              <div class="numbertext">3 / 3</div>
              <img src="images/3.jpg" style="width:100%">
              <div class="text">Caption Three</div>
            </div>

          </div>
          <br>

          <div style="text-align:center">
            <span class="dot"></span> 
            <span class="dot"></span> 
            <span class="dot"></span> 
          </div>
       </div>   
          
     </div>
  </div>
    
    <?php include 'footer.php'; ?>

<!--database content here-->

    <?php include 'script.php'; ?>
    <script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 5000); // Change image every 2 seconds
    }
    </script>
  </body>
</html>