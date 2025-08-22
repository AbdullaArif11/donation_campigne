<?php
header('Content-Type: application/json');

$con = mysqli_connect('localhost', 'root', '', 'web_technology_lab_project');

if (!$con) {
    echo json_encode(['error' => 'Connection Error']);
    exit;
}

if (isset($_GET['branch'])) {
    $branch = mysqli_real_escape_string($con, $_GET['branch']);
    
    $query = "SELECT `id`, `first_name`, `last_name`, `email`, `contact_no`, `branch`, `address`, `photo`, `gender` FROM `volunteers` WHERE `branch` = '$branch'";
    $result = mysqli_query($con, $query);

    $volunteers = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $row['photo'] = base64_encode($row['photo']); // Encode photo as base64
        $volunteers[] = $row;
    }

    echo json_encode($volunteers);
} else {
    echo json_encode(['error' => 'Branch not specified']);
}

mysqli_close($con);
?>
