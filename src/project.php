<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_1_ang6";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully ";
// Debut de code
$sql = "SELECT *  FROM  project WHERE 1";


$result = $conn->query($sql);
$json_array =array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$json_array[] = $row ;		
		
	}

}

$conn->close();
$json = array("boards" => $json_array);
echo json_encode($json);

?>