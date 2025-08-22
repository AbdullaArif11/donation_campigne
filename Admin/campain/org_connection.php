// connection.php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_technology_lab_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO charity_organizations (Picture, PictureR, Title, Category, Category_bg, Card_bg, Text_button_bg, Description, Price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $Picture, $PictureR, $Title, $Category, $Category_bg, $Card_bg, $Text_button_bg, $Description, $Price);

// Set parameters and execute
$Picture = $_POST['Picture'];
$PictureR = $_POST['PictureR'];
$Title = $_POST['Title'];
$Category = $_POST['Category'];
$Category_bg = $_POST['Category_bg'];
$Card_bg = $_POST['Card_bg'];
$Text_button_bg = $_POST['Text_button_bg'];
$Description = $_POST['Description'];
$Price = $_POST['Price'];

$stmt->execute();

echo "New record created successfully";
echo "<script>
      setTimeout(function(){
          window.location.href = 'org_list.php';
      }, 1300);
    </script>";

$stmt->close();
$conn->close();
?>
