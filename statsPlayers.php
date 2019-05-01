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
if(isset($_GET['searchLastName']) && !empty($_GET['searchLastName']))
{

 $sql = "SELECT * from Player INNER JOIN PlayerSport on Player.Player_id = PlayerSport.Player_id ";
		if($_GET['Sport'] == "Football")
{
	$sql = $sql."INNER JOIN  Football_Stats on Player.Player_id = Football_Stats.Player_id";
}
		else if($_GET['Sport'] == "Soccer")
{
	$sql = $sql."INNER JOIN  wSoccer_Stats on Player.Player_id = wSoccer_Stats.Player_id";
}
		else if($_GET['Sport'] == "wSoccer")
{
	$sql = $sql."INNER JOIN  Soccer_Stats on Player.Player_id = Soccer_Stats.Player_id";
}
		else if($_GET['Sport'] == "Basketball")
{
	$sql = $sql."INNER JOIN  wBasketball_Stats on Player.Player_id = wBasketball_Stats.Player_id";
}
		else if($_GET['Sport'] == "wBasketball")
{
	$sql = $sql."INNER JOIN  Basketball_Stats on Player.Player_id = Basketball_Stats.Player_id";
}
		else if($_GET['Sport'] == "Baseball")
{
	$sql = $sql."INNER JOIN  Baseball_Stats on Player.Player_id = Baseball_Stats.Player_id"; 
}

 $sql = $sql." WHERE Sport='".$_GET['Sport']."' AND Player.Year=".$_GET['Year']." AND Last_name LIKE '%".$_GET['searchLastName']."%'";


}

else
{
$sql = "SELECT * from Player INNER JOIN PlayerSport on Player.Player_id = PlayerSport.Player_id ";

		if($_GET['Sport'] == "Football")
{
	$sql = $sql."INNER JOIN  Football_Stats on Player.Player_id = Football_Stats.Player_id";
}
		else if($_GET['Sport'] == "Soccer")
{
	$sql = $sql."INNER JOIN  Soccer_Stats on Player.Player_id = Soccer_Stats.Player_id";
}
		else if($_GET['Sport'] == "wSoccer")
{
	$sql = $sql."INNER JOIN  wSoccer_Stats on Player.Player_id = wSoccer_Stats.Player_id";
}
		else if($_GET['Sport'] == "Basketball")
{
	$sql = $sql."INNER JOIN  Basketball_Stats on Player.Player_id = Basketball_Stats.Player_id";
}
		else if($_GET['Sport'] == "wBasketball")
{
	$sql = $sql."INNER JOIN  wBasketball_Stats on Player.Player_id = wBasketball_Stats.Player_id";
}
		else if($_GET['Sport'] == "Baseball")
{
	$sql = $sql."INNER JOIN  Baseball_Stats on Player.Player_id = Baseball_Stats.Player_id"; 
}

$sql = $sql." WHERE Sport='".$_GET['Sport']."' AND Player.Year=".$_GET['Year'];
}


$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
                echo "<div style='overflow-x:auto;'> <table id='customers' align='center' style='margin-top:20px' border=1><th>First Name</th><th>Last Name</th><th>Position</th>";

		if($_GET['Sport'] == "Football")
{
			echo "<th>Touchdowns</th><th>Yards</th><th>Long</th><th>Tackles</th><th>Sacks</th><th>Turnovers</th>";
}
		else if($_GET['Sport'] == "Soccer" || $_GET['Sport'] == "wSoccer")
{
			echo "<th>Minutes</th><th>Goals</th><th>Assists</th><th>SOG</th><th>Saves</th>";
}
		else if($_GET['Sport'] == "Basketball" || $_GET['Sport'] == "wBasketball")
{
			echo "<th>Points_per_game</th><th>Rebounds_per_game</th><th>Assists_per_game</th><th>Blocks_per_game</th><th>Steals_per_game</th><th>Field_goal_percentage</th><th>Three_pointers_made</th><th>Three_point_percentage</th><th>Free_throw_percentage</th><th>Games_Played</th>";
}
		else if($_GET['Sport'] == "Baseball")
{
			echo "<th>Runs</th><th>Hits</th><th>Home_runs</th><th>Runs_batted_in</th><th>ERA</th>";
}


		echo "\n";
    while($row = $result->fetch_assoc()) {

               echo "<tr data-user-id='".$row["Player_id"]."'><td>".$row["First_name"]."</td><td>".$row["Last_name"]."</td><td>".$row["Position"]."</td>";

		if($_GET['Sport'] == "Football")
		{
			echo "<td>".$row["Touchdowns"]."</td><td>".$row["Yards"]."</td><td>".$row["Long"]."</td><td>".$row["Tackles"]."</td><td>".$row["Sacks"]."</td><td>".$row["Turnovers"]."</td>";
		}
		else if($_GET['Sport'] == "Soccer" || $_GET['Sport'] == "wSoccer")
		{
	echo "<td>".$row["Minutes"]."</td><td>".$row["Goals"]."</td><td>".$row["Assists"]."</td><td>".$row["SOG"]."</td><td>".$row["Saves"]."</td>";

		}
		else if($_GET['Sport'] == "Basketball" || $_GET['Sport'] == "wBasketball")
		{
echo "<td>".$row["Points_per_game"]."</td><td>".$row["Rebounds_per_game"]."</td><td>".$row["Assists_per_game"]."</td><td>".$row["Blocks_per_game"]."</td><td>".$row["Steals_per_game"]."</td><td>".$row["Field_goal_percentage"]."</td><td>".$row["Three_pointers_made"]."</td><td>".$row["Three_point_percentage"]."</td><td>".$row["Free_throw_percentage"]."</td><td>".$row["Games_Played"]."</td>";

		}
		else if($_GET['Sport'] == "Baseball")
		{
echo "<td>".$row["Runs"]."</td><td>".$row["Hits"]."</td><td>".$row["Home_runs"]."</td><td>".$row["Runs_batted_in"]."</td><td>".$row["ERA"]."</td>";
		}

}
} else {
    echo "0 results";
}		echo "</tr>";
                echo "</table> </div>"; 
$conn->close();
         ?>
