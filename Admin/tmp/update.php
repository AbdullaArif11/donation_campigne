<?php
$con = mysqli_connect('localhost', 'root');
if ($con) {
  echo "";
} else {
  echo "Connection Error!";
}
mysqli_select_db($con, 'temp');

if (isset($_GET['NID'])) { // Update the condition to 'NID'
  $NID = $_GET['NID']; // Change the variable name to 'NID' as well
  
  // Fetch the row with the specified NID from the police_admin table
  $query = "SELECT * FROM police_admin WHERE ID = '$NID'"; // Use 'ID' column instead of 'NID'
  $result = mysqli_query($con, $query);
  
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    
    // Display the update form with the fetched row data
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Admin-Panel(Traffic admin panel)</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="../style.css">
    </head>
    <body>
      <div class="w-50 m-auto">
        <form action="update_process.php" method="POST">

          <input type="hidden" name="NID" value="' . $row["ID"] . '">
          
          <div class="form-group">
            <label>NAME:</label>
            <input type="text" name="Name" class="form-control" value="' . $row["Name"] . '">
          </div>

          <div class="form-group">
            <label>ID:</label>
            <input type="text" name="ID" class="form-control" value="' . $row["ID"] . '">
          </div>

          <div class="form-group">
            <label>Email:</label>
            <input type="text" name="Email" class="form-control" value="' . $row["Email"] . '">
          </div>

          <div class="form-group">
            <label>Rank:</label>
            <input type="text" name="Rank" class="form-control" value="' . $row["Rank"] . '">
          </div>

          <div class="form-group">
            <label>OTP:</label>
            <input type="text" name="OTP" class="form-control" value="' . $row["OTP"] . '">
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
