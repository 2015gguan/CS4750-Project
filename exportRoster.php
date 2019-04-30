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

}

else
{
$sql = "SELECT * from Player INNER JOIN PlayerSport on Player.Player_id = PlayerSport.Player_id WHERE Sport='".$_GET['Sport']."' AND Year=".$_GET['Year'];
}


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $delimiter = ",";
    $filename = "Roster_".$_GET['Sport']."_".$_GET['Year']."_" . date('Y-m-d') . ".csv";
    // output data of each row


    $f = fopen('php://memory', 'w');
    $fields = array('Player_id', 'First_name', 'Last_name', 'Year', 'Position');
    fputcsv($f, $fields, $delimiter);

    while($row = $result->fetch_assoc()) {

//               echo "<tr data-user-id='".$row["Player_id"]."'><td>".$row["First_name"]."</td><td>".$row["Last_name"]."</td><td>".$row["Position"]."</td><td><a href='rosterUpdate.php?playerid=".$row["Player_id"]."'>Update<a/></td></tr>";

        $lineData = array($row['Player_id'], $row['First_name'], $row['Last_name'], $row['Year'], $row['Position']);
        fputcsv($f, $lineData, $delimiter);
    }
    fseek($f, 0);
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    fpassthru($f);

	

} else {
    echo "0 results";
}
exit;
$conn->close(); 
         ?>
