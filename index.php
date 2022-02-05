<?php
include("header.php");
?>
<!-- banner -->
<div class="banner">
	<div class="container">
		<script src="js/responsiveslides.min.js"></script>
			<script>
									// You can also use "$(window).load(function() {"
									$(function () {
									 // Slideshow 4
									$("#slider3").responsiveSlides({
										auto: true,
										pager: true,
										nav: false,
										speed: 500,
										namespace: "callbacks",
										before: function () {
									$('.events').append("<li>before event fired.</li>");
									},
									after: function () {
										$('.events').append("<li>after event fired.</li>");
										}
										});
										});
			</script>
			<div  id="top" class="callbacks_container">
				
			</div>
	</div>
</div>
<!-- //banner -->
<!-- welcome -->
<div class="welcome">
	<div class="container">
		<div class="welcome-head">
			<h3 class="tittle">WELCOME</h3>
			<div class="wel-img mask text-center">
					<a href="#" class="mask"><img class="img-responsive zoom-img" src="images/home1.gif" alt=""/></a>
			</div>
			<h4>DONATE A BLOOD AND HELP THE NEEDY TIDE OVER THIS DIFFICULT SITUATION.</h4>
			<p>The blood bank is committed to protecting the safety of both donors and potential recipients by providing quality blood and blood products from non-remunerated, healthy donors following a stringent screening process. Voluntary blood donation, being the safest form of blood donation, is encouraged. The blood bank provides for the blood requirements of patients within the hospital as well as various other hospitals and nursing homes in the city. The blood bank is ready to provide you blood if it is available, but if blood is not available the we provide you our donor list to send them request for blood donation.</p>
		</div>	
	</div>
</div>
<!-- //welcome -->
<!-- specials -->
<div class="specials">
	<div class="container">
		<h3 class="tittle t-two"></h3>
		<div class="special-grids">
			<div class="col-md-6 special-left l-grids">
				 <figure class="effect-bubba">
						<img src="images/side1.jpg" style="width:570px; height:246px;" alt=""/>
						<figcaption>
							<h4>Donate Blood</h4>
							
						</figcaption>			
				 </figure>
			</div>
			<div class="col-md-6 special-right">
				<div class="sp-wid">
					<h4>Donate Blood</h4>
					<p>Donor Can Donate a Blood On Patient Request as per requirements or request generated
					by patient. Donor should not be donate blood in last 3 months and must have a proper haemoglobin in their body for donation of blood.</p>
				</div>
			</div>
			<div class="col-md-6 special-right l-left">
				<div class="sp-wid l-wid">
					<h4>Request a Blood</h4>
					<p>Patient Can Request a blood to blood bank first with doctor prescription, if blood bank contains that blood than patient can get the blood. But if blood bank doesnt have the requested blood than patient can send a request to donor for donate a required blood.</p>
				</div>
				
			</div>
			<div class="col-md-6 special-left l-right l-grids">
				 <figure class="effect-bubba">
						<img src="images/i4.jpg" style="width:570px; height:246px;" alt=""/>
						<figcaption>
							<h4>Request Blood</h4>
							<p></p>																
						</figcaption>			
				 </figure>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- specials -->




<?php
include("footer.php");
?>