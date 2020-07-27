<!DOCTYPE html>
<html>
<?php
require('dbconfig/connect_mysql.php');
include('header.php');
?>cxzcxvcx
<body>

<?php
include('menu.php');
?>

  <!-- Start Contact Us Form-->
  <section class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2 class="mb-5">Contact Form</h2>
        <form action="#" method="post">
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control ">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" class="form-control ">
                  </div>
                </div>
              cvxvcx  <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control ">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="message">Write Message</label>
                    <textarea name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="submit" value="Send Message" class="btn btn-primary">
                  </div>
                </div>
              </form>
            </div>
            <dvcxviv class="col-md-1"></div>
            <div class="col-md-5">
              <br>
<div class="row contact-info">
<div class="col-md-12">
<h2 class="mb-5">Our Phone Numbers</h2>
<ul id="phone_number" class="list-unstyled">


</ul>
</div>

<div class="col-md-12">
<h2 class="mb-5">Our Address</h2>
<p id="address">.</p>
</div>

<div class="col-md-12">
<h2 class="mb-5">Our E-mail</h2>
<p id="contact_email"></p>
</div>
</div>
            </div>
      </div>
    </div>
  </section>
  <!-- END section -->


  <?php include('footer.php'); ?>


  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.boostrap.com/bootstrap/4.0.0/js/boostrap.min.js"></script>
  <script src="https://code.iconify.design/1/1.0.4/iconify.min.js"></script>
  <script src="js/jquery-migrate-3.0.0.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>

  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/magnific-popup-options.js"></script>

  <script src="js/main.js"></script>
  
  <script> 
    $(document).ready(function() {
        // jQuery code goes here
        
        $("#phone_number").html("<?php echo $ft_phone_number ?>");
        $("#contact_email").text("<?php echo $ft_email ?>");
        $("#address").text("<?php echo $ft_address ?>");
    });
  </script>

</body>
</html>
