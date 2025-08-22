<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Withdraw Funds</title>
  <link rel="stylesheet" href="path/to/your/styles.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-slate-900 via-sky-800 to-cyan-700">
  <main class="p-4">
    <?php
    // Database connection
    $con = mysqli_connect('localhost', 'root', '', 'web_technology_lab_project');
    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Get the category from the URL
    $category = $_GET['Category'];

    // Fetch the current total donation for the selected category
    $query = "SELECT `Category`, `TotalDonation` FROM `totaldonations` WHERE `Category` = '$category'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
      $totalDonation = $row['TotalDonation'];
    } else {
      die("Category not found.");
    }
    ?>

    <h1 class="text-3xl text-white mb-4">Withdraw Funds</h1>
    <p class="text-white mb-4">Category: <?php echo htmlspecialchars($category); ?></p>
    <p class="text-white mb-4">Available Balance: <?php echo htmlspecialchars($totalDonation); ?></p>

    <form action="withdraw_process.php" method="post">
      <input type="hidden" name="category" value="<?php echo htmlspecialchars($category); ?>">
      <div class="mb-4">
        <label class="block text-gray-700">Withdraw Amount</label>
        <input type="number" name="amount" class="w-full px-3 py-2 border rounded" required>
      </div>
      <button type="submit" class="btn btn-primary">Withdraw</button>
    </form>
  </main>
  <footer>
  </footer>
</body>
</html>
