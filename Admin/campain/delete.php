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

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Confirm delete when the form is submitted
    $query = "DELETE FROM donation_cards WHERE id = '$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
      echo "Row deleted successfully.";
      echo "<script>
      setTimeout(function(){
          window.location.href = 'list.php';
      }, 1300);
    </script>";
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
