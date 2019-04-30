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

if(isset($_POST['firstname']) && isset($_POST['lastname'])  && isset($_POST['position']) && isset($_POST['id']))
{

	echo "Okay Submitting to update database!<br>";
	 $sql = "Update Player SET 	First_name='".$_POST['firstname']."', 
					Last_name='".$_POST['lastname']."',
					Position='".$_POST['position']."' 
	WHERE Player_id = '".$_POST['id']."';";
}

else if(isset($_POST['firstname']) && isset($_POST['lastname'])  && isset($_POST['position']) && issett($_POST['sport']))
{

	echo "Okay Submitting to insert database!<br>";
	 $sql = "Insert into Player (First 	First_name='".$_POST['firstname']."', 
					Last_name='".$_POST['lastname']."',
					Position='".$_POST['position']."' 
	WHERE Player_id = '".$_POST['id']."';";
}

//echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully! <a href='home.html'>Home</a>";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

?>
