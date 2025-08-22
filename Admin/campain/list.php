<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin panel</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-slate-900 via-sky-800 to-cyan-700">
  <head>
  <nav>
  <div class="navbar text-white" style="background-color: #1A2633;">
  <div class="navbar-start">
    <div class="dropdown">
      <label tabindex="0" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
      </label>

    </div>
    <a href="#" class="logo"><img class="w-20 h-10" src="../image/Logo2.jpg"></a>
    <!-- <a href="#" class="btn btn-ghost normal-case text-xl w-10"></a> -->
  </div>
  <div class="navbar-center hidden lg:flex">
    <h1 class="text-white font-bold text-3xl">Admin Panel</h1>
  </div>
  <div class="navbar-end">
    <!-- <a class="btn">Button</a> -->
    <a href="http://localhost/Web%20Technology/Admin/welcome.php" class="btn bg-gradient-to-r from-slate-900 via-sky-800 to-cyan-700 border-1 border-white  text-white">Home</a>
  </div>
</div>
  </nav>
  </head>
  <main>
  <?php
$con = mysqli_connect('localhost','root');
if($con){
  echo "Connection Successful";
}else{
  echo "Connection Error!";
}
mysqli_select_db($con, 'web_technology_lab_project');

$query = "SELECT * FROM donation_cards";
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
        <a href='delete.php?id=" . $row["id"] . "' role='button' class='bg-gray-100 m-4'><button>Delete</button></a>
        <a href='update.php?id=" . $row["id"] . "' class='bg-gray-100 m-4 mt-8'><button>Update</button></a>
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
