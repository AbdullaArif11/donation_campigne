<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST");
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

// Get POST data
$id = isset($_POST['id']) ? $_POST['id'] : null;
$category = isset($_POST['Category']) ? $_POST['Category'] : null;
$title = isset($_POST['Title']) ? $_POST['Title'] : null;
$donation = isset($_POST['Donation']) ? $_POST['Donation'] : null;

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO DonationRecords (id, Category, Title, Donation) VALUES (?, ?, ?, ?)");
$stmt->bind_param("issd", $id, $category, $title, $donation);

if ($stmt->execute()) {
    // Update the TotalDonations table
    $updateStmt = $conn->prepare("INSERT INTO TotalDonations (Category, TotalDonation) VALUES (?, ?) ON DUPLICATE KEY UPDATE TotalDonation = TotalDonation + VALUES(TotalDonation)");
    $updateStmt->bind_param("sd", $category, $donation);
    
    if ($updateStmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Donation saved and total donation updated successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to update total donation: " . $updateStmt->error]);
    }
    
    $updateStmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Failed to save donation: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
