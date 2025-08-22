<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin panel</title>
  <script src="https://cdn.tailwindcss.com"></script>
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
  <main>

  </main>
  <footer>
  </footer>
</body>
</html>

<?php
$con = mysqli_connect('localhost','root');
if($con){
  echo "Connection Successful";
}else{
  echo "Connection Error!";
}
mysqli_select_db($con, 'temp');

$query = "SELECT * FROM police_admin";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) { // check if any rows were returned
  echo '<table style="border: 5px solid black;">
  <tr>
    <th style="border: 3px solid black;">Name:</th>
    <th style="border: 3px solid black;">ID:</th>
    <th style="border: 3px solid black;">Email:</th>
    <th style="border: 3px solid black;">Rank:</th>
    <th style="border: 3px solid black;">Password:</th>
    <th style="border: 3px solid black;">Temporary OTP:</th>
    <th style="border: 3px solid black;">Action:</th>
  </tr>';
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
      <td style='border: 2px solid black;'>".$row["Name"]."</td>
      <td style='border: 2px solid black;'>".$row["ID"]."</td>
      <td style='border: 2px solid black;'>".$row["Email"]."</td>
      <td style='border: 2px solid black;'>".$row["Rank"]."</td>
      <td style='border: 2px solid black;'>".$row["pass"]."</td>
      <td style='border: 2px solid black;'>".$row["OTP"]."</td>
      <td style='border: 2px solid black;'>
        <a href='delete.php?NID=" . $row["ID"] . "'><button>Delete</button></a>
        <a href='update.php?NID=" . $row["ID"] . "'><button>Update</button></a>
      </td>
    </tr>";
  }
  echo "</table>";
} else {
  echo "No results found.";
}

mysqli_close($con);
?>
