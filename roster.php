<html>
<head>
	<link rel="stylesheet" href="styles.css">
<script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
      <script type = "text/javascript" src = "script.js" ></script>

	<script>
	$(document).ready(function() {
		$( "#LastNinput, #year, #sport" ).change(function() {

			$.ajax({
				url: 'searchPlayers.php', 
				data: {searchLastName: $( "#LastNinput" ).val(), Sport: $("#sport :selected").text(), Year: $("#year :selected").text()},
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
<h1 id="head">Rosters</h1>

<section class="stats" id="stats">
	<div class="wthree-different-dot1">
		<div class="container">
			<h3 class="heading"><span>UVA Basketball</span></h3>

<select name="Sport" id="sport">
  <option value="Basketball">Basketball</option>
  <option value="Soccer">Soccer</option>
  <option value="Football">Football</option>
  <option value="Baseball">Baseball</option>
</select>

<select name="Year" id="year">
  <option value="2017">2017</option>
  <option value="2018">2018</option>
  <option value="2019">2019</option>
</select>

			
			<input class="xlarge" id="LastNinput" type="search" size="30" placeholder="Last Name Contains"/>
			<div id="LastNresult">Search Result</div>
		</div>
	</div>
</section>

</div>
</body>

</html>

