<!DOCTYPE html>
<html>
<?php
	require('dbconfig/connect_mysql.php');
	include('header.php');
?>
<body>

	<?php
		include('menu.php');
		
	
	?>

  <section class="container-fluid padding">
    <div class="row welcome1 text-center">
      <div class="col-12">
        <h1 class="display-4">BOOKING CONFIRMATION</h1>
        <p>Please present either an electronic or paper copy of your booking confirmation uopn check-in.</p>
        <hr class="my-4">
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <table class="table table-condensed">
            <tbody>
              <tr>
                <td>Full name: </td>
                <td>Madoks Charles</td>
              </tr>
              <tr>
                <td>Private Address: </td>
                <td>Genting highlands, Pahang, Tamah Tinggi Genting</td>
              </tr>

              <tr>
                <td>Country of Residence: </td>
                <td>Malaysia</td>
              </tr>
              <tr>
                <td>Company Address: </td>
                <td>Genting highlands, Pahang, Tamah Tinggi Genting</td>
              </tr>
              <tr>
                <td>Phone: </td>
                <td>+90109698862</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="col-lg-6">
          <table class="table table-condensed myTable">
            <tbody>
              <tr>
                <td>Booking ID: </td>
                <td class="deco">290841965</td>
              </tr>

              <tr>
                <td>Number of Rooms: </td>
                <td class="deco">1</td>
              </tr>

              <tr>
                <td>Number of Adults: </td>
                <td class="deco">2</td>
              </tr>
              <tr>
                <td>Number of Children: </td>
                <td class="deco">1</td>
              </tr>
              <tr>
                <td>Type of Room: </td>
                <td class="deco">Silver</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <div class="row welcome2 text-center">
    <div class="col-12">
      <p>Any cancellation one day prior to check-in will incure the first night charge. Failure to show up is automatic forfeit and no refunds will be issued.</p>
    </div>
  </div>


  <section class="container payment_details">
    <form class="text-center border border-light p-5" action="#">
      <div class="form-row mb-4">
        <label for="check-in" class="col-sm-2 col-form-label">Check-in: </label>
        <div class="col">
          <input type="text" id="check-in" class="form-control" placeholder="14 - 03 - 2012">
        </div>

        <label for="check-out" class="col-sm-2 col-form-label">Check-out: </label>
        <div class="col">
          <input type="text" id="check-out" class="form-control" placeholder="19 - 03 - 2012">
        </div>
      </div>

      <div class="form-row mb-4">
      <label for="Payment-details" class="col-sm-2 col-form-label">Payment details: </label>
      <div class="col">
        <input type="text" id="Payment-details" class="form-control" placeholder="Payment method: Visa">
      </div>
      <div class="col">
        <input type="text" id="Payment-details" class="form-control" placeholder="Card type: xxx - xxx - xxx - 2323">
      </div>
      <div class="col">
        <input type="text" id="Payment-details" class="form-control" placeholder="EXP: 21 / 2028">
      </div>
      </div>

      <div class="form-row mb-4">
        <label for="Payment-details" class="col-sm-2 col-form-label">Booked and Paid for by: </label>
        <div class="col">
          <input type="text" id="Payment-details" class="form-control" placeholder="Madoks Charles">
        </div>
        <div class="col">
          <input type="text" id="Payment-details" class="form-control" placeholder="2, Genting highlands, Pahang, Tamah Tinggi Genting">
        </div>
        <div class="col">
          <input type="text" id="Payment-details" class="form-control" placeholder="+90109698862">
        </div>
      </div>
    </form>
  </section>

  
  <!-- Start Footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-4">
          <h3>Phone Support</h3>
          <p>24/7 Call us now.</p>
          <p class="lead"><a href="tel://">+6109698862</a></p>
        </div>
        <div class="col-md-4">
          <h3>Connect With Us</h3>
          <p>We are socialized. Follow us</p>
          <p>
            <a href="#" class="pl-0 p-3"><span class="fa fa-facebook"></span></a>
            <a href="#" class="p-3"><span class="fa fa-twitter"></span></a>
            <a href="#" class="p-3"><span class="fa fa-instagram"></span></a>
          </p>
        </div>
        <div class="col-md-4">
          <h3>Subscribe to Our Newsletters</h3>
          <p>Get the latest updates from Stinson Hotel when you subcribe!</p>
          <form action="#" class="subscribe">
            <div class="form-group">
              <button type="submit"><span class="ion-ios-arrow-thin-right"></span></button>
              <input type="email" class="form-control" placeholder="Enter email">
            </div>

          </form>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-7 text-center">
          &copy; 2020 All rights reserved | Stinson Hotel
        </div>
      </div>
    </div>
  </footer>
  <!-- END footer -->


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

</body>
</html>
