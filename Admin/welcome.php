<?php
session_start();
if(isset($_SESSION["user"])){

}else{
  header("Location: login-page.php");
}

include("connection.php");
?>

<?php
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: login-page.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Admin</title>
</head>
<body>
<header>
  <nav>
  <div class="navbar text-white" style="background-color: #1A2633;">
  <div class="navbar-start">
    <div class="dropdown">
      <label tabindex="0" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
      </label>

    </div>
    <a href="#" class="logo"><img class="w-20 h-10" src="./image/Logo2.jpg"></a>
    <!-- <a href="#" class="btn btn-ghost normal-case text-xl w-10"></a> -->
  </div>
  <div class="navbar-center hidden lg:flex">
    <h1 class="text-white font-bold text-3xl">Admin Panel</h1>
  </div>
  <div class="navbar-end">
    <!-- <a class="btn">Button</a> -->
    <a href="?logout" class="btn bg-gradient-to-r from-slate-900 via-sky-800 to-cyan-700 border-1 border-white  text-white">Logout</a>
  </div>
</div>
  </nav>
</header>

<main class="bg-gradient-to-r from-slate-900 via-sky-800 to-cyan-700 text-white min-h-screen p-5  md:p-[4rem] lg:p-[6rem]">
  <!-- section 1-->
  <div class="card card-side glass shadow-xl mb-20">
    <figure class="w-[20rem]">
      <img
        src="./image/campine_management.jpeg"
        alt="Campine Management" />
    </figure>
    <div class="card-body">
      <h2 class="card-title">Campaign Management</h2>
      <a href="http://localhost/Web%20Technology/Admin/campain/list.php"><button class="btn w-[35rem]">Campaign event card list(update & delete)</button></a>
      <a href="http://localhost/Web%20Technology/Admin/campain/add_event.php"><button class="btn w-[35rem]">Add new Event card</button></a>
      <a href="http://localhost/Web%20Technology/Admin/campain/org_list.php"><button class="btn w-[35rem]">Other organizations list(update & delete)</button></a>
      <a href="http://localhost/Web%20Technology/Admin/campain/add_organization.php"><button class="btn w-[35rem]">Add a organization card</button></a>
    </div>
  </div>

  <!-- section 2 -->
  <div class="card card-side glass shadow-xl mb-20">
    <div class="card-body text-right">
      <h2 class="text-xl font-bold">Volunteer Management</h2>
      <a href="http://localhost/Web%20Technology/Admin/volunteer/list.php"><button class="btn w-[35rem]">Volunteer List</button></a>
      <a href="http://localhost/Web%20Technology/Admin/volunteer/sort_list.php"><button class="btn w-[35rem]">Sort Nearby Volunteers for Effective Charity Outreach</button></a>
    </div>
    <figure class="w-[14rem]">
      <img
        src="./image/volunteer_management.jpeg"
        alt="Movie" />
    </figure>
  </div>

  <!-- section 3 -->
  <div class="card card-side glass shadow-xl mb-20">
    <figure class="w-[14rem]">
      <img
        src="./image/found_management.jpeg"
        alt="Movie" />
    </figure>
    <div class="card-body">
      <h2 class="card-title">Fund Management</h2>
      <a href="http://localhost/Web%20Technology/Admin/found/list.php"><button class="btn w-[35rem]">Donations Record</button></a>
      <a href="http://localhost/Web%20Technology/Admin/found/fund_list.php"><button class="btn w-[35rem]">Total Fund & Withdraw</button></a>
    </div>
  </div>

<!--  -->
</main>

<footer class="footer footer-center p-5 text-base-content rounded" style="background-color: #1A2633;">
  <div class="grid grid-flow-col gap-4">
    <a class="link link-hover">*Donation campigne*</a> 
  </div> 
  <div>
    <div class="grid grid-flow-col gap-4">
      <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a> 
      <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a> 
      <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
    </div>
  </div> 
  <div>
    <p>Copyright © 2023 - All right reserved .</p>
  </div>
</footer>

</body>
</html>