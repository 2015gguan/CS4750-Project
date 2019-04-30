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

$sql = "SELECT * from Player where Last_name like '%".$_GET['searchLastName']."%'";

echo $sql;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
                echo "<table border=1><th>First Name</th><th>Last Name</th><th>Position</th>\n";
    while($row = $result->fetch_assoc()) {

               echo "<tr><td>".$row["First_name"]."</td><td>".$row["Last_name"]."</td><td>".$row["Position"]."</td></tr>";
}

} else {
    echo "0 results";
}
                echo "</table>"; 

$conn->close();
         ?>
