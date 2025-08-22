<?php
// Enable CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Database connection
$con = mysqli_connect('localhost', 'root');
if (!$con) {
    die("Connection Error: " . mysqli_connect_error());
}
mysqli_select_db($con, 'web_technology_lab_project');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact_no = mysqli_real_escape_string($con, $_POST['contact_no']);
    $branch = mysqli_real_escape_string($con, $_POST['branch']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);

    // Handling the uploaded photo
    $photo = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = base64_encode(file_get_contents($_FILES['photo']['tmp_name']));
    }

    // Insert into database
    $query = "INSERT INTO volunteers (first_name, last_name, email, contact_no, branch, address, photo, gender) VALUES ('$first_name', '$last_name', '$email', '$contact_no', '$branch', '$address', '$photo', '$gender')";

    if (mysqli_query($con, $query)) {
        echo json_encode(["message" => "Volunteer registered successfully."]);
    } else {
        echo json_encode(["message" => "Error registering volunteer: " . mysqli_error($con)]);
    }
} else {
    echo json_encode(["message" => "Invalid request."]);
}

mysqli_close($con);
?>
