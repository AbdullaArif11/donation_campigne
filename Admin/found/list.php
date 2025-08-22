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

$query = "SELECT * FROM donationrecords";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) { // check if any rows were returned
  echo '<table style="border: 5px solid black;" class="m-4 bg-white">
  <tr>
    <th style="border: 3px solid black;">Record ID:</th>
    <th style="border: 3px solid black;">Title:</th>
    <th style="border: 3px solid black;">Category:</th>
    <th style="border: 3px solid black;">Amount:</th>
    <th style="border: 3px solid black;">Date & Time:</th>
  </tr>';
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
      <td style='border: 2px solid black;'>".$row["rid"]."</td>
      <td style='border: 2px solid black;' class='font-bold'>".$row["Title"]."</td>
      <td style='border: 2px solid black;' class='font-bold'>".$row["Category"]."</td>
      <td style='border: 2px solid black;'>".$row["Donation"]."</td>
      <td style='border: 2px solid black;'>".$row["DonationTime"]."</td>
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
