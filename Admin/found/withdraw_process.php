<?php
// Database connection
$con = mysqli_connect('localhost', 'root', '', 'web_technology_lab_project');
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
$category = $_POST['category'];
$amount = $_POST['amount'];

// Fetch the current total donation for the selected category
$query = "SELECT `TotalDonation` FROM `totaldonations` WHERE `Category` = '$category'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

if ($row) {
  $totalDonation = $row['TotalDonation'];

  if ($amount <= $totalDonation) {
    // Update the total donation
    $newTotalDonation = $totalDonation - $amount;
    $updateQuery = "UPDATE `totaldonations` SET `TotalDonation` = '$newTotalDonation' WHERE `Category` = '$category'";
    if (mysqli_query($con, $updateQuery)) {
      echo "Withdrawal successful. New balance: " . $newTotalDonation;
    } else {
      echo "Error updating record: " . mysqli_error($con);
    }
  } else {
    echo "Insufficient balance.";
  }
} else {
  echo "Category not found.";
}

mysqli_close($con);
?>
