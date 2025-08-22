<?php
$con = mysqli_connect('localhost', 'root');
if ($con) {
  echo "";
} else {
  echo "Connection Error!";
}
mysqli_select_db($con, 'web_technology_lab_project');

if (isset($_GET['id'])) { 
  $id = $_GET['id']; 
  
  // Fetch the row with the specified id
  $query = "SELECT * FROM donation_cards WHERE id = '$id'"; 
  $result = mysqli_query($con, $query);
  
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    

    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Admin Panel - Edit Donation Card</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="../style.css">
    </head>
    <body>
      <div class="w-50 m-auto">
        <form action="update_process.php" method="POST">

          <input type="hidden" name="id" value="' . $row["id"] . '">
          
          <div class="form-group">
            <label>Picture URL:</label>
            <input type="text" name="Picture" class="form-control" value="' . $row["Picture"] . '">
          </div>

          <div class="form-group">
            <label>Retina Picture URL:</label>
            <input type="text" name="PictureR" class="form-control" value="' . $row["PictureR"] . '">
          </div>

          <div class="form-group">
            <label>Title:</label>
            <input type="text" name="Title" class="form-control" value="' . $row["Title"] . '">
          </div>

          <div class="form-group">
            <label>Category:</label>
            <input type="text" name="Category" class="form-control" value="' . $row["Category"] . '">
          </div>

          <div class="form-group">
            <label>Category Background Color:</label>
            <input type="text" name="Category_bg" class="form-control" value="' . $row["Category_bg"] . '">
          </div>

          <div class="form-group">
            <label>Card Background Color:</label>
            <input type="text" name="Card_bg" class="form-control" value="' . $row["Card_bg"] . '">
          </div>

          <div class="form-group">
            <label>Text Button Background Color:</label>
            <input type="text" name="Text_button_bg" class="form-control" value="' . $row["Text_button_bg"] . '">
          </div>

          <div class="form-group">
            <label>Description:</label>
            <textarea name="Description" class="form-control" rows="4">' . $row["Description"] . '</textarea>
          </div>

          <div class="form-group">
            <label>Price:</label>
            <input type="text" name="Price" class="form-control" value="' . $row["Price"] . '">
          </div>

          <div>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>

        </form>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>';
  } else {
    echo "No results found for the specified ID.";
  }
} else {
  echo "Invalid request.";
}

mysqli_close($con);
?>
