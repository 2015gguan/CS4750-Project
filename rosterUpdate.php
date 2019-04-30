<html>
<head>
	<link rel="stylesheet" href="styles.css">
<script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
      <script type = "text/javascript" src = "script.js" ></script>

</head>


<body>

<div id="wholething">
<h1 style="color:#232D4B;" id="head">Update Rosters</h1>

<section class="stats" id="stats">
	<div class="wthree-different-dot1">
		<div class="container">
			<h3 class="heading"><span><a href="home.html">Home</a></span></h3>

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

 $sql = "SELECT * from Player WHERE Player_id = '".$_GET['playerid']."'";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();



?>

			<form action="rosterSubmit.php" method="POST">

			 ID: <?php echo $row["Player_id"]?> <br><br>

    <input type="hidden" name="id" value="<?php echo $row["Player_id"]; ?>">  

			 First Name: 
	  <input type="text" name="firstname" value="<?php echo $row["First_name"]?>"><br><br>
			 Last Name: 
	  <input type="text" name="lastname" value="<?php echo $row["Last_name"]?>"><br><br>
			 Position: 
	  <input type="text" name="position" value="<?php echo $row["Position"]?>"><br><br>

		  <input type="submit" value="Submit">

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

