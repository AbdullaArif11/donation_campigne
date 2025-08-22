<?php
// Database connection
$con = mysqli_connect('localhost', 'root');
if (!$con) {
    die("Connection Error: " . mysqli_connect_error());
}

// Select the database
mysqli_select_db($con, 'web_technology_lab_project');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $id = $_POST['id'];
  $picture = $_POST['Picture'];
  $pictureR = $_POST['PictureR'];
  $title = $_POST['Title'];
  $category = $_POST['Category'];
  $category_bg = $_POST['Category_bg'];
  $card_bg = $_POST['Card_bg'];
  $text_button_bg = $_POST['Text_button_bg'];
  $description = $_POST['Description'];
  $price = $_POST['Price'];

  // Update the row in the donation_cards table with the new values
  $query = "UPDATE charity_organizations SET
    Picture = '$picture',
    PictureR = '$pictureR',
    Title = '$title',
    Category = '$category',
    Category_bg = '$category_bg',
    Card_bg = '$card_bg',
    Text_button_bg = '$text_button_bg',
    Description = '$description',
    Price = '$price'
    WHERE id = '$id'";

  // Execute the query
  $result = mysqli_query($con, $query);

  if ($result) {
    echo "Row updated successfully.";
    echo "<script>
      setTimeout(function(){
          window.location.href = 'org_list.php';
      }, 1000);
    </script>";
  } else {
    echo "Error updating row: " . mysqli_error($con);
  }
} else {
  echo "Invalid request.";
}

// Close the connection
mysqli_close($con);
?>
