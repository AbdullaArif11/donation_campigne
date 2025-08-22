<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "web_technology_lab_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

// Fetch last 10 donations
$sql = "SELECT * FROM DonationRecords ORDER BY DonationTime DESC LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $donations = [];
    while($row = $result->fetch_assoc()) {
        $donations[] = $row;
    }
    echo json_encode(["status" => "success", "data" => $donations]);
} else {
    echo json_encode(["status" => "error", "message" => "No donations found"]);
}

$conn->close();
?>
