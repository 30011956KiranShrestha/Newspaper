<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
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