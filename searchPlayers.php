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

 $sql = "SELECT * from Player INNER JOIN PlayerSport on Player.Player_id = PlayerSport.Player_id WHERE Sport='".$_GET['Sport']."' AND Year=".$_GET['Year']." AND Last_name LIKE '%".$_GET['searchLastName']."%'";

//$sql2 = $conn->real_escape_string($sql);
}

else
{

$sql = "SELECT * from Player INNER JOIN PlayerSport on Player.Player_id = PlayerSport.Player_id WHERE Sport='".$_GET['Sport']."' AND Year=".$_GET['Year'];
}


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
                echo "<table class='gat' id='customers' align='center' style='margin-top:20px' border=1><th>First Name</th><th>Last Name</th><th>Position</th><th>Update?</th>\n";
    while($row = $result->fetch_assoc()) {

               echo "<tr data-user-id='".$row["Player_id"]."'><td>".$row["First_name"]."</td><td>".$row["Last_name"]."</td><td>".$row["Position"]."</td><td><a href='rosterUpdate.php?playerid=".$row["Player_id"]."'>Update<a/></td></tr>";
}

} else {
    echo "0 results";
}
                echo "</table>"; 
$conn->close();
         ?>
