<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<title>CS4750 Sports Data</title>
<script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
 	<title>Group 20 Sports Home Page</title>
	<script>
	$(document).ready(function() {
		$( "#LastNinput" ).change(function() {
		
			$.ajax({
				url: 'searchPlayers.php', 
				data: {searchLastName: $( "#LastNinput" ).val()},
				success: function(data){
					$('#LastNresult').html(data);	
				
				}
			});
		});
		
	});
	</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Fit Club a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

	<!-- for Coaches css -->
	<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
	<!-- //for Coaches css -->

	<!-- testimonials css -->
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" /><!-- flexslider css -->
	<!-- //testimonials css -->

	<!-- default css files -->
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<!-- default css files -->
	
	<!--web font-->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=PT+Sans+Caption:400,700&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
	<!--//web font-->
		
</head>

<!-- Body -->
<body>

<!-- banner -->
					<h1 style='text-align:center;font-size:80px;color:#e56200;margin-top:20px;'>UVA Sports Data</h1> 
<!-- //banner -->

<!-- Modal pop-up -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4>Fit club</h4>
				<img src="images/b2.jpg" alt=" " class="img-responsive">
				<h5>Success your business </h5>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>
			</div>
		</div>
		<!-- //Modal content-->
	</div>
</div>
<!-- //Modal pop-up -->

<!-- agents section -->
<section class="demo" id="coaches">
	<div class="container">  
		<h3 class="heading" style="text-align:center;"><span>Coaches</span></h3>
		<div id="verticalTab">
			<ul class="resp-tabs-list">

<?php

$servername = "mysql.cs.virginia.edu";
$username = "gzg4zf";
$password = "pizzapizza";
$dbname = "gzg4zf";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * from Coach INNER JOIN Sports ON Coach.Sport = Sports.name ORDER BY Coach.First_name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

echo "

				<li>
					<div class='col-md-4 tab1'>
						<img src='".$row["ProfilePicUrl"]."' alt='' />
					</div>
					<div class='col-md-8 tab1'>
						<h3>".$row["First_name"]." ".$row["Last_name"]."</h3>
						<h4>".$row["dispname"]."</h4>
					</div>
					<div class='clearfix'></div>
				</li>
";

    }
} else {
    echo "0 results";
}
$conn->close();
         ?>
			</ul>
			<div class="resp-tabs-container">


<?php 

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * from Coach INNER JOIN Sports ON Coach.Sport = Sports.name ORDER BY Coach.First_name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

echo "
			<div>

					<div class='col-md-7 tabs-right1'>
						<h3>".$row["First_name"]." ".$row["Last_name"]."</h3>
						<h4>Coach: ".$row["dispname"]."</h4>
						<ul class='social'>
							<li><a  href='".$row["WikiUrl"]."'><i class='fa fa-wikipedia-w'></i></a></li>
							<li><a href='".$row["LinkUrl"]."'><i class='fa fa-dribbble'></i></a></li>
						</ul>
							<p>".$row["Description"]."</p>
						
					</div>	
					<div class='col-md-5 tabs-right2'>
							<img src='".$row["PictureUrl"]."' alt='' />
					</div>
					<div class='clearfix'></div>
				</div>"; 

    }
} else {
    echo "0 results";
}
$conn->close();
         ?>


				<div>
					<div class="col-md-7 tabs-right1">
						<h3>Bronco Mendenhall</h3>
						<h4>Coach : Men's Football</h4>
						<ul class="social">
							<li><a  href="#"><i class="fa fa-wikipedia-w"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
						</ul>
						
							<p>Marc Bronco Clay Mendenhall is the head coach of the Virginia Cavaliers football team at the University of Virginia.</p>
						
					</div>	
					<div class="col-md-5 tabs-right2">
							<img src="images/bronco.jpg" alt="" />
					</div>
					<div class="clearfix"></div>
				</div>
				<div>
					<div class="col-md-7 tabs-right1">
						<h3>Brian O'Connor</h3>
						<h4>Coach : Men's Baseball</h4>
						<ul class="social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a  href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
						<div class="tab-bottom">
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>4615 50 Ave, Lloydminster, Canada</p>
							<p><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:mail@example.com">bpo8n@virginia.edu</a></p>
							<p><i class="fa fa-phone" aria-hidden="true"></i>+1 (434) 982-4932</p>
						</div>
						
							<p>Brian Patrick O'Connor is the head baseball coach of the Virginia Cavaliers. Previously serving as an Associate Head Coach at Notre Dame, he was hired on July 8, 2003, to replace the retiring Dennis Womack.</p>
						
					</div>	
					<div class="col-md-5 tabs-right2">
							<img src="images/brian-oconnor.jpg" alt="" />
					</div>
					<div class="clearfix"></div>
				</div>
				<div>
					<div class="col-md-7 tabs-right1">
						<h3>mary lindey</h3>
						<h4>Coach : Fit club trainer</h4>
						<ul class="social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a  href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
						<div class="tab-bottom">
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>4615 50 Ave, Lloydminster, Canada</p>
							<p><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:mail@example.com">mail@example.com</a></p>
							<p><i class="fa fa-phone" aria-hidden="true"></i>+105 967 254 7834</p>
						</div>
						
							<p>Lorem ipsum dolor sit amet, consectetur adipisthn cingelit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit dolor sit amet.</p>
						
					</div>	
					<div class="col-md-5 tabs-right2">
							<img src="images/s33.jpg" alt="" />
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- //agents section -->


<!--pop-up-grid-->
<div id="popup">
	<div id="small-dialog" class="mfp-hide">
		<div class="signin-form profile">
			<h3>Sign Up</h3>
			<div class="login-form">
				<form action="#" method="post">
					<input type="text" name="name" placeholder="Username" required="">
					<input type="email" name="email" placeholder="E-mail" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<input type="password" name="password" placeholder="Confirm Password" required="">
					<input type="submit" value="Sign Up">
				</form>
			</div>
		</div>
	</div>
</div>						
<!--pop-up-grid-->

 
<!-- footer -->
<section class="footer">
	<div class="container">
		<div class="agile-nav">
			<ul>
				<li><a href="home.html">Home</a></li>
				<li><a href="#about" class="scroll">Basketball Rosters</a></li>
				<li><a href="#about" class="scroll">Football Rosters</a></li>
				<li><a href="#about" class="scroll">Soccer Rosters</a></li>
				<li><a href="#about" class="scroll">Baseball Rosters</a></li>
				<li><a href="#contact" class="scroll">Stats</a></li>
			</ul>
		</div>
	</div>
</section>
<!-- //footer -->

<!-- copyright -->
<div class="copyright">
	<div class="container">
		<p>© 2019 CS4750 Group 20. All Rights Reserved | Design by <a href="http://w3layouts.com/"> W3layouts</a> </p>
	</div>
</div>
<!-- //copyright -->


	<!-- Default-JavaScript-File -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- //Default-JavaScript-File -->

	<!-- Responsive tabs for coachhes section -->
	<script src="js/easy-responsive-tabs.js"></script>
	<script>
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
			type: 'default', //Types: default, vertical, accordion           
			width: 'auto', //auto or any width like 600px
			fit: true,   // 100% fit in a container
			closed: 'accordion', // Start closed if in accordion view
			activate: function(event) { // Callback function if tab is switched
			var $tab = $(this);
			var $info = $('#tabInfo');
			var $name = $('span', $info);
			$name.text($tab.text());
			$info.show();
			}
			});
			$('#verticalTab').easyResponsiveTabs({
			type: 'vertical',
			width: 'auto',
			fit: true
			});
		});
	</script>
	<!-- //Responsive tabs for coachhes section -->

	<!-- scrolling script -->
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script> 
	<!-- //scrolling script -->

	<!--banner Slider starts Here-->
	<script src="js/responsiveslides.min.js"></script>
	<script>
		// You can also use "$(window).load(function() {"
		$(function () {
		  // Slideshow 4
		  $("#slider4").responsiveSlides({
			auto: true,
			pager:true,
			nav:true,
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
	<!--banner Slider ends Here-->
			
	<!-- Pop-up for pricing tables -->
	<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
		<script>
			$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
			});
																							
		});
		</script>
	<!-- //Pop-up for pricing tables -->

	<!-- Stats-Number-Scroller-Animation-JavaScript -->
	<script src="js/waypoints.min.js"></script> 
	<script src="js/counterup.min.js"></script> 
	<script>
		jQuery(document).ready(function( $ ) {
			$('.counter').counterUp({
				delay: 10,
				time: 1000 
			});
		});
	</script>
	<!-- //Stats-Number-Scroller-Animation-JavaScript -->


	<!-- flexSlider --><!-- for testimonials -->
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	</script>
	<!-- //flexSlider --><!-- for testimonials -->


	<!-- Smooth scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- //Smooth scrolling -->
	
</body>
<!-- //Body -->

</html>
