<!DOCTYPE html>
<html>
<head>
<title>Blood Bank</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fruit Crush Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- //fonts -->
	<!-- start-smoth-scrolling -->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
	<!-- start-smoth-scrolling -->
	 <style>


li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 230px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>
<!-- header -->
<div class="header-top">
	<div class="container">
				<div class="header-top-left">
					<p>Donate Blood Save Life !!!!</p>
				</div>
				<div class="header-top-mid">
					<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span><p>Call For Info: 02632-242944</p>
				</div>
				<div class="header-top-right">
					<ul>
						
					</ul>
				</div>
				<div class="clearfix"></div>
	</div>
</div>
<!-- //header -->
<!-- strip -->
<div class="strip"></div>
<!-- //strip -->
<!-- logo -->
<div class="logo-head">
	<div class="container">
		<div class="logo">
			<h1><a href="index.html"><img src="images/logo3.jpg" style="width:282px; height:90px;" alt=""/></a></h1>
		</div>
		<div class="navigation">
				<span class="menu"><img src="images/menu.png" alt=""/></span>
				<div class="clearfix"></div>
				<ul class="nav1">
					<li><a class="hvr-overline-from-center button2" href="search_blood.php">SEARCH BLOOD</a></li>
					<li><a class="hvr-overline-from-center button2" href="receiver_view_donor_list.php">DONOR LIST</a></li>
					
					
					<li><a class="hvr-overline-from-center button2" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a></li>	
					
					
					<li class="dropdown nav-item">
								<a href="javascript:void(0)" class="dropbtn nav-link">VIEW</a>
								<div class="dropdown-content">
									<a href="receiver_view_blood_req_status.php">CHECK BLOOD REQUEST STATUS</a>
									<a href="receiver_view_donor_blood_req_status.php">CHECK DONOR BLOOD REQUEST STATUS</a>
									<a href="receiver_view_plasma_req_status.php">CHECK PLASMA REQUEST STATUS</a>
						</div>
					</li>		
								
					<li><a class="hvr-overline-from-center button2" href="logout.php">LOGOUT</a></li>
				</ul>
				<!-- script for menu -->
					<script> 
						$( "span.menu" ).click(function() {
						$( "ul.nav1" ).slideToggle( 300, function() {
						 // Animation complete.
						});
						});
					</script>
				<!-- //script for menu -->	
		</div>
	</div>
</div>
<!-- //logo -->