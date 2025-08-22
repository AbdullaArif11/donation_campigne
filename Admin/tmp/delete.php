<?php
$con = mysqli_connect('localhost', 'root');
if ($con) {
  echo "";
} else {
  echo "Connection Error!";
}
mysqli_select_db($con, 'temp');

if (isset($_GET['NID'])) {
  $id = $_GET['NID'];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Confirm delete when the form is submitted
    $query = "DELETE FROM police_admin WHERE ID = '$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
      echo "Row deleted successfully.";
    } else {
      echo "Error deleting row: " . mysqli_error($con);
    }
  } else {
    // Display confirmation form
    echo '<form action="" method="POST">
      <button type="submit" class="btn btn-primary">Confirm Delete!</button>
    </form>';
  }
} else {
  echo "Invalid request.";
}

mysqli_close($con);
?>
