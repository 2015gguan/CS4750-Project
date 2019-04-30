<html>
<head>
	<link rel="stylesheet" href="styles.css">
<script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
      <script type = "text/javascript" src = "script.js" ></script>

</head>


<body>

<div id="wholething">
<h1 style="color:#232D4B;" id="head">Insert into  Rosters</h1>

<section class="stats" id="stats">
	<div class="wthree-different-dot1">
		<div class="container">
			<h3 class="heading"><span><a href="home.html">Home</a></span></h3>


			<form action="rosterSubmit.php" method="POST">

			 First Name: 
	  <input type="text" name="firstname" ><br><br>
			 Last Name: 
	  <input type="text" name="lastname" ><br><br>
			 Position: 
	  <input type="text" name="position" ><br><br>
			 Sport: 

<select name="sport">
  <option value="Football">Football</option>
  <option value="Basketball">Basketball</option>
  <option value="Baseball">Baseball</option>
  <option value="Soccer">Soccer</option>
</select> <br> </br>
			 Year: 
<select name="year">
  <option value="2016">2016</option>
  <option value="2017">2017</option>
  <option value="2018">2018</option>
  <option value="2019">2019</option>
</select> <br> </br>

		  <input type="submit" value="Insert">

			<?php
			$conn->close();	

			?>

		</form>

		</div>
	</div>
</section>

</div>
</body>

</html>

