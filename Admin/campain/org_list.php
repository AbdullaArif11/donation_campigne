<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin panel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../indexstyle.css">
</head>
<body class="bg-gradient-to-r from-slate-900 via-sky-800 to-cyan-700">
  <main>
  <?php
$con = mysqli_connect('localhost','root');
if($con){
  echo "Connection Successful";
}else{
  echo "Connection Error!";
}
mysqli_select_db($con, 'web_technology_lab_project');

$query = "SELECT * FROM charity_organizations";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) { // check if any rows were returned
  echo '<table style="border: 5px solid black;" class="m-4 bg-white">
  <tr>
    <th style="border: 3px solid black;">ID:</th>
    <th style="border: 3px solid black;">Title:</th>
    <th style="border: 3px solid black;">Category:</th>
    <th style="border: 3px solid black;">Description:</th>
    <th style="border: 3px solid black;">Per unit cost:</th>
    <th style="border: 3px solid black;">picture:</th>
    <th style="border: 3px solid black;">picture s:</th>
    <th style="border: 3px solid black;">Category bg:</th>
    <th style="border: 3px solid black;">Card bg:</th>
    <th style="border: 3px solid black;">Text button bg:</th>
    <th style="border: 3px solid black;">Action:</th>
  </tr>';
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
      <td style='border: 2px solid black;' class='font-bold'>".$row["id"]."</td>
      <td style='border: 2px solid black;' class='font-bold'>".$row["Title"]."</td>
      <td style='border: 2px solid black;'>".$row["Category"]."</td>
      <td style='border: 2px solid black;'>".$row["Description"]."</td>
      <td style='border: 2px solid black;'>".$row["Price"]."</td>
      <td style='border: 2px solid black;'><img src=$row[Picture]></td>
      <td style='border: 2px solid black;'><img src=$row[PictureR]></td>
      <td style='border: 2px solid black; background-color: ".$row["Category_bg"].";'>".$row["Category_bg"]."</td>
      <td style='border: 2px solid black; background-color: ".$row["Card_bg"].";'>".$row["Card_bg"]."</td>
      <td style='border: 2px solid black; background-color: ".$row["Text_button_bg"].";'>".$row["Text_button_bg"]."</td>
      <td style='border: 2px solid black;'>
        <a href='org_delete.php?id=" . $row["id"] . "' role='button' class='bg-gray-100 m-4'><button>Delete</button></a>
        <a href='org_update.php?id=" . $row["id"] . "' class='bg-gray-100 m-4 mt-8'><button>Update</button></a>
      </td>
    </tr>";
  }
  echo "</table>";
} else {
  echo "No results found.";
}

mysqli_close($con);
?>
  </main>
  <footer>
  </footer>
</body>
</html>


