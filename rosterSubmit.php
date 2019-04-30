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

else if(isset($_POST['firstname']) && isset($_POST['lastname'])  && isset($_POST['position']) && isset($_POST['sport']) & isset($_POST['year']))
{

	echo "Okay Submitting to insert database!<br>";
	 $sql = "Insert into Player (First_name, Last_name, Position, Year) VALUES ('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['position']."','".$_POST['year']."');";

}

if ($conn->query($sql) === TRUE) 
{

   if(isset($_POST['firstname']) && isset($_POST['lastname'])  && isset($_POST['position']) && isset($_POST['sport']) & isset($_POST['year']))
   {
      $sql1 = "Select Player_id FROM Player WHERE Last_name='".$_POST['lastname']."' AND First_name='".$_POST['firstname']."' AND Year=".$_POST['year']." AND Position='".$_POST['position']."';";
	 $result1 = $conn->query($sql1);

	//echo $sql1;
	 $row1 = $result1->fetch_assoc();

	print_r($row1);

	 $sql2 = "Insert into PlayerSport (Player_id, Sport) VALUES ('".$row1["Player_id"]."','".$_POST['sport']."');";
	// echo $sql2;
	if ($conn->query($sql2) === TRUE) 
	{

	    echo "<br> Record also inserted successfully in PlayerSport!";
	}
	else
	{
		echo "Failure to enter into PlayerSport db";

}	

   }

    echo "Record updated successfully! <a href='home.html'>Home</a>";

} 
else 
{
    echo "Error updating record: " . $conn->error;
}

$conn->close();

?>
