<!DOCTYPE html>
<html>
<?php
	require('dbconfig/connect_mysql.php');
	include('header.php');
?>
<body>
<script>
	function openModal() {
	  document.getElementById("myModal").style.display = "block";
	}

	function closeModal() {
	  document.getElementById("myModal").style.display = "none";
	}

	var slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) {
	  showSlides(slideIndex += n);
	}

	function currentSlide(n) {
	  showSlides(slideIndex = n);
	}

	function showSlides(n) {
	  var i;
	  var slides = document.getElementsByClassName("mySlides");
	  var dots = document.getElementsByClassName("demo");
	  var captionText = document.getElementById("caption");
	  if (n > slides.length) {slideIndex = 1}
	  if (n < 1) {slideIndex = slides.length}
	  for (i = 0; i < slides.length; i++) {
		  slides[i].style.display = "none";
	  }
	  for (i = 0; i < dots.length; i++) {
		  dots[i].className = dots[i].className.replace(" active", "");
	  }
	  slides[slideIndex-1].style.display = "block";
	  dots[slideIndex-1].className += " active";
	  captionText.innerHTML = dots[slideIndex-1].alt;
	}
	</script>
	<?php
		include('menu.php');
		
		$all_files = glob("images/*.{jpg,png,gif}", GLOB_BRACE);
		
		//$all_files_length = glob("images/*.gif").glob("images/*.jpg").glob("images/*.jpeg").glob("images/*.png");

		
		$x =1;
		$images_to_show = '';
		$image_number = '';
		$image_full = '';
		
		for ($i=0; $i<count($all_files); $i++)
		{
		  $image_name = $all_files[$i];
		  $supported_format = array('gif','jpg','jpeg','png');
		  $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
		  if (in_array($ext, $supported_format))
			  {
				//echo '<img src="'.$image_name .'" alt="'.$image_name.'" />'."<br /><br />";
				
				$images_to_show = $images_to_show.'<div class="column">
									<img src="'.$image_name .'" style="width:100%" onclick="openModal();currentSlide('.$x.')" class="hover-shadow cursor">
								  </div>';
								  
								  
				$image_number =  $image_number.'<div class="mySlides">
								  <div class="numbertext">'.$x.' / '.count($all_files).'</div>
								  <img src="'.$image_name .'" style="width:100%">
								</div>';
								
				$image_full = $image_full.'<div class="column">
							  <img class="demo cursor" src="'.$image_name .'" style="width:100%" onclick="currentSlide('.$x.')" alt="">
							</div>';

				$x++;
			  } else {
				  continue;
			  }
		}
		
		
	?>

	<br>
  <br>
  <br>
  <!-- Start Gallery -->
  <section class="site-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <div class="heading-wrap  element-animate">
            <h2 class="heading" style="text-align:center">Lightbox</h2>
          </div>
        </div>
		
      </div>
	  
		<h2 style="text-align:center">Gallery</h2>

		<div class="row">
			<?php echo $images_to_show; ?>
		  <!--<div class="column">
			<img src="images/cus1.jpg" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
		  </div>
		  <div class="column">
			<img src="images/cus1.jpg" style="width:100%" onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
		  </div>
		  <div class="column">
			<img src="images/cus1.jpg" style="width:100%" onclick="openModal();currentSlide(3)" class="hover-shadow cursor">
		  </div>
		  <div class="column">
			<img src="images/cus1.jpg" style="width:100%" onclick="openModal();currentSlide(4)" class="hover-shadow cursor">
		  </div>-->
		</div>

		<div id="myModal" class="modal">
		  <span class="close cursor" onclick="closeModal()">&times;</span>
		  <div class="modal-content">
			
			<?php echo $image_number; ?>
			<!--<div class="mySlides">
			  <div class="numbertext">1 / 4</div>
			  <img src="images/cus1.jpg" style="width:100%">
			</div>

			<div class="mySlides">
			  <div class="numbertext">2 / 4</div>
			  <img src="images/cus1.jpg" style="width:100%">
			</div>

			<div class="mySlides">
			  <div class="numbertext">3 / 4</div>
			  <img src="images/cus1.jpg" style="width:100%">
			</div>
			
			<div class="mySlides">
			  <div class="numbertext">4 / 4</div>
			  <img src="images/cus1.jpg" style="width:100%">
			</div>-->
			
			<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			<a class="next" onclick="plusSlides(1)">&#10095;</a>

			<div class="caption-container">
			  <p id="caption"></p>
			</div>

			<?php echo $image_full; ?>
			<!--<div class="column">
			  <img class="demo cursor" src="images/cus1.jpg" style="width:100%" onclick="currentSlide(1)" alt="Nature and sunrise">
			</div>
			<div class="column">
			  <img class="demo cursor" src="images/cus1.jpg" style="width:100%" onclick="currentSlide(2)" alt="Snow">
			</div>
			<div class="column">
			  <img class="demo cursor" src="images/cus1.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
			</div>
			<div class="column">
			  <img class="demo cursor" src="images/cus1.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
			</div>-->
		  </div>
		</div>

    </div>
  </section>
  <!-- End Gallery -->
  
  

  

  <!-- Start Footer -->
    <?php include('footer.php'); ?>

  <!-- END footer -->


  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.boostrap.com/bootstrap/4.0.0/js/boostrap.min.js"></script>
  <script src="https://code.iconify.design/1/1.0.4/iconify.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.6.0/js/all.js"></script>
  <script src="js/jquery-migrate-3.0.0.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>

  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/magnific-popup-options.js"></script>

  <script src="js/main.js"></script>
  
  
  
		

</body>
</html>
