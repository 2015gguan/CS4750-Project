<html>
<head>
	<link rel="stylesheet" href="styles.css">
<script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
      <script type = "text/javascript" src = "script.js" ></script>

	<script>
	$(document).ready(function() {

		<?php 
			
		if(isset($_GET['Year']) && !empty($_GET['Year']))
		{
			echo "$(\"#year\").val(".$_GET['Year'].");\n";

		}

		if(isset($_GET['Sport']) && !empty($_GET['Sport']))
		{

			echo "$(\"#sport\").val(\"".$_GET['Sport']."\");\n";
		}


		?>
$.ajax({
				url: 'searchPlayers.php', 
				data: {searchLastName: $( "#LastNinput" ).val(), Sport: $("#sport :selected").val(), Year: $("#year :selected").text()},
				success: function(data){
					$('#LastNresult').html(data);	
				
				}
			});


		$( "#LastNinput, #year, #sport" ).change(function() {
			$('input#hideYear').val($('#year').val());
			$('input#hideSport').val($('#sport').val());
			$('input#hideLName').val($('#LastNinput').val());

		});

		$( "#LastNinput, #year, #sport" ).change(function() {

			$.ajax({
				url: 'searchPlayers.php', 
				data: {searchLastName: $( "#LastNinput" ).val(), Sport: $("#sport :selected").val(), Year: $("#year :selected").text()},
				success: function(data){
					$('#LastNresult').html(data);	
				
				}
			});
		});
		
	});
	</script>
</head>


<body>

<div id="wholething">
<h1 style="color:#232D4B;" id="head">Rosters</h1>

<section class="stats" id="stats">
	<div class="wthree-different-dot1">
		<div class="container">
			<h3 class="heading"><span><a href="home.html">Home</a></span></h3>

<select name="Sport" id="sport">
  <option value="Basketball">Basketball</option>
  <option value="Soccer">Soccer</option>
  <option value="Football">Football</option>
  <option value="Baseball">Baseball</option>
  <option value="wBasketball">Women's Basketball</option>
  <option value="wSoccer">Women's Soccer</option>
</select>

<select name="Year" id="year">
  <option value="2017">2017</option>
  <option value="2018">2018</option>
  <option value="2019">2019</option>
</select>

			
			<input class="xlarge" id="LastNinput" type="search" size="30" placeholder="Last Name Contains"/>
			<div style="text-align:center;" id="LastNresult">Search Result</div>

		</br>

			<input type="button" onclick="location.href='rosterInsert.php';" value="Insert Player" />
<form action="exportRoster.php" method="get">
			<input type="hidden" id="hideSport" name="Sport" value="<?php echo $_GET["Sport"]; ?>" />
			<input type="hidden" id="hideYear" name="Year" value="<?php echo $_GET["Year"];?>" />
			<input type="hidden" id="hideLName" name="searchLastName" value="<?php echo $_GET["searchLastName"];?>" />
		
			<input type="submit" id="exportButton" value="Export Roster" />
</form>

		</div>
	</div>
</section>

</div>
</body>

</html>

