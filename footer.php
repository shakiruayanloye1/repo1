<!-- Start Footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-4 numbers">
          <h3>Phone Support</h3>
		  <?php

				require('dbconfig/connect_mysql.php');

jjj
hgkhj,jn
				$contact_statement = mysqli_prepare($con, "SELECT  email, phone_number, facebook, instagram, twitter, address FROM contact
																WHERE contact_user_type = 'stinson_contact_user'") or die(mysqli_error($con));

				//mysqli_stmt_bind_param($contact_statement,"s", $cat_id);
				mysqli_stmt_execute($contact_statement);

				mysqli_stmt_store_result($contact_statement);
				mysqli_stmt_bind_result($contact_statement, $footer_email, $footer_phone_number, $footer_facebook, $footer_instagram, $footer_twitter, $address);


				//$_SESSION['current_url']= 'http://' . $_SERVER['HTTP_HOST'] .'/eshopper/index.php';// $_SERVER['SERVER_NAME'];
				//echo $_SESSION['current_url'];
				$ft_phone_number = '';
				if (mysqli_stmt_num_rows($contact_statement) >= 1) {
					//$i = 1;
					while(mysqli_stmt_fetch($contact_statement))
					{
						$ft_phone_number = $ft_phone_number.$footer_phone_number." <br>";
						$ft_email = $footer_email;
						$ft_facebook = $footer_facebook;
						$ft_instagram = $footer_instagram;
						$ft_twitter = $footer_twitter;
						$ft_address = $address;
					}
				}


			?>
          <p>24/7 Call us now.</p>
          <p class="lead"><a href="tel://"><?php echo $ft_phone_number; ?></a></p>
        </div>
        <div class="col-md-4 socials">
          <h3>Connect With Us</h3>
          <p>We are up with the trends. Follow us</p>
          <p>
		  <!-- Add font awesome icons -->
            <a href="<?php echo $ft_facebook; ?>" class="pl-0 p-3"><span class="fa fa-facebook"></span></a>
            <a href="<?php echo $ft_twitter; ?>" class="p-3"><span class="fa fa-twitter"></span></a>
            <a href="<?php echo $ft_instagram; ?>" class="p-3"><span class="fa fa-instagram"></span></a>
          </p>
        </div>


        <div class="col-md-4">
          <h3>Subscribe to Our Newsletters</h3>
          <p id="sub_status">Get the latest updates from Stinson Hotel when you subscribe!</p>

		  <?php include('subscribe.php'); ?>
		  <iframe name="votar" style="display:none;"></iframe>
          <form action="" class="subscribe" method="POST" target="votar" >
            <div class="form-group">
				<div id="subscription_response"> </div>
              <button type="submit" name="submit_subscription" value="submit_subscription" class="btn btn-primary btn-sm"><span class="ion-ios-arrow-thin-right">Subscribe</span></button><br>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>

          </form>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-7 text-center">
          <p><b>2/3 Hosanna Close, Opposite Omega Clinic Rd, Off Ada George Rd, Port Harcourt.</b></p>
          &copy; <script>document.write(new Date().getFullYear())</script> All rights reserved | <a class="top" href="index.php">Stinson Hotels

       </div>
      </div>
    </div>
  </footer>
  <!-- END footer -->
