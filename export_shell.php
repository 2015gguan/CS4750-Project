<?php
//connect to the DB up here
$servername = "mysql.cs.virginia.edu";
    $username = "gzg4zf";
    $password = "pizzapizza";
    $dbname = "gzg4zf";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);

//get records from database
$query = $db->query("SELECT * FROM Player ORDER BY Player_id ASC");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "Player_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('Player_id', 'First_name', 'Last_name', 'Year', 'Position');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        $status = ($row['status'] == '1')?'Active':'Inactive';
        $lineData = array($row['Player_id'], $row['First_name'], $row['Last_name'], $row['Year'], $row['Position']);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>