<!-- HTML Form -->
<!DOCTYPE html>
  <html lang="en">
  <head>
  <title>Admin-Panel(Assign Traffic_admin)</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../indexstyle.css">
</head>
<body>
  <header class="">
    <div class="logo">
      <img src="../black-logo.jpg" alt="">
      <h3>Admin Port</h3>
    </div>
    <nav>
      <ul>
        <li><a href="../index.html">Home</a></li>
        <li>
          <a href="#">Vehicle</a>
          <ul class="dropdown">
            <li><a href="http://localhost/Driving%20License%20Management/Super%20admin/Vehicle/Vehicle.php">Registration</a></li>
            <li><a href="http://localhost/Driving%20License%20Management/Super%20admin/Vehicle/vehicle_detail.php">List</a></li>
            <li><a href="http://localhost/Driving%20License%20Management/Super%20admin/Vehicle/v%20delete%20&%20update.php">Update/Delete</a></li>
          </ul>
        </li>
        <li>
          <a href="#">License</a>
          <ul class="dropdown">
            <li><a href="http://localhost/Driving%20License%20Management/Super%20admin/License/License.php">Registration</a></li>
            <li><a href="http://localhost/Driving%20License%20Management/Super%20admin/License/License_detail.php">List</a></li>
            <li><a href="http://localhost/Driving%20License%20Management/Super%20admin/License/delete%20&%20update.php">Update/Delete</a></li>
          </ul>
        </li>
        <li>
          <a href="#">Traffic-Admin</a>
          <ul class="dropdown">
            <li><a href="http://localhost/Driving%20License%20Management/Super%20admin/Traffic%20admin/Traffic%20admin.php">Registration</a></li>
            <li><a href="http://localhost/Driving%20License%20Management/Super%20admin/Traffic%20admin/Traffic%20admin%20list.php">List</a></li>
            <li><a href="http://localhost/Driving%20License%20Management/Super%20admin/Traffic%20admin/T-delete%20&%20update.php">Update/Delete</a></li>
          </ul>
        </li>
        <li><a href="#">About</a></li>
      </ul>
  </nav>
  </header>
  <div class="w-50 m-auto">
    <form action="" method="POST">
      <div class="form-group">
        <label>NID:</label>
        <input type="text" name="NID" class="form-control" autocomplete="off">
      </div>
      <button type="submit" class="btn btn-primary">Check NID</button>
    </form>
  </div>

  <br>
  <footer>
    <p class="p-3 bg-dark text-white text-center">Driving License Management System</p>
  </footer>
</body>
</html>


<?php
$con = mysqli_connect('localhost', 'root');
if ($con) {
  echo "";
} else {
  echo "Connection Error!";
}
mysqli_select_db($con, 'temp');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nid = $_POST['NID'];

  // Check if the NID exists in the Traffic_admin table
  $query = "SELECT * FROM police_admin WHERE ID = '$nid'";
  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {
    // NID exists, display details and options
    echo 'NID exists. Details:';
    echo '<div class="details">';
    
    // Display additional details of the record
    $row = mysqli_fetch_assoc($result);
    echo '<p>Name: ' . $row["Name"] . '</p>';
    echo '<p>Email: ' . $row["Email"] . '</p>';
    
    echo '<a href="delete.php?NID=' . $nid . '"><button class="option-button">Delete</button></a>';
    echo '<a href="update.php?NID=' . $nid . '"><button class="option-button">Update</button></a>';
    
    echo '</div>';
  } else {
    // NID does not exist
    echo "NID does not exist.";
  }
}

mysqli_close($con);
?>