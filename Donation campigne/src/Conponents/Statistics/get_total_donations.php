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

// Query to fetch total donations per category
$query = "SELECT Category,Donation AS TotalDonation FROM DonationRecords GROUP BY Category";

$result = $conn->query($query);

if ($result) {
    $totalDonations = [];
    while ($row = $result->fetch_assoc()) {
        $totalDonations[] = [
            "Category" => $row["Category"],
            "TotalDonation" => floatval($row["TotalDonation"]), // Ensure to convert to float if it's a decimal in the database
        ];
    }
    echo json_encode(["status" => "success", "data" => $totalDonations]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to fetch total donations: " . $conn->error]);
}

$conn->close();
?>
