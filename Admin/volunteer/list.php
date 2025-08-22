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
  <main>
    <?php
    // Establish connection
    $con = mysqli_connect('localhost', 'root');
    if ($con) {
      echo "Connection Successful";
    } else {
      echo "Connection Error!";
    }
    mysqli_select_db($con, 'web_technology_lab_project');

    // Fetch volunteers from the database
    $query = "SELECT * FROM volunteers";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
      // Generate table structure with dynamic rows
      echo '
      <div class="overflow-x-auto m-4">
        <table class="table bg-black w-full">
          <thead>
            <tr>
              <th><label><input type="checkbox" class="checkbox border border-white" /></label></th>
              <th>Name</th>
              <th>Branch</th>
              <th>Email</th>
              <th>Contact No</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>';
      
      // Populate rows with data from the database
      while($row = mysqli_fetch_assoc($result)) {
        $photo = base64_encode($row["photo"]);
        echo "
          <tr>
            <th><label><input type='checkbox' class='checkbox border border-white' /></label></th>
            <td>
              <div class='flex items-center gap-3'>
                <div class='avatar'>
                  <div class='mask mask-squircle h-12 w-12'>
                    <img src='data:image/jpeg;base64,{$photo}' alt='Volunteer Photo' class='w-16 h-16 object-cover'/>
                  </div>
                </div>
                <div>
                  <div class='font-bold'>".$row["first_name"]." ".$row["last_name"]."</div>
                  <div class='text-sm opacity-50'>".$row["branch"]."</div>
                </div>
              </div>
            </td>
            <td>".$row["branch"]."</td>
            <td>".$row["email"]."</td>
            <td>".$row["contact_no"]."</td>
            <td>
              <a href='delete.php?email=" . $row["email"] . "' role='button' class='btn btn-ghost btn-xs'>Delete</a>
            </td>
          </tr>";
      }
      echo '
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th>Name</th>
              <th>Branch</th>
              <th>Email</th>
              <th>Contact No</th>
              <th>Actions</th>
            </tr>
          </tfoot>
        </table>
      </div>';
    } else {
      echo "No results found.";
    }

    // Close connection
    mysqli_close($con);
    ?>
  </main>
  <footer>
  </footer>
</body>
</html>
