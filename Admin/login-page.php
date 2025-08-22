<?php
    include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.0/dist/full.css" rel="stylesheet" type="text/css" />
  <title>Login page</title>
  <style>
    main {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;

      /* background: linear-gradient(to top, #1E293B, #0083B0, #4FD1C5); */
      /* background: linear-gradient(to bottom, #1E293B, #0083B0 50%, #4FD1C5); */
      background: linear-gradient(to top, #04080F, #00425A, #1B6468);
      color: white;
    }
    
    /* New CSS to move the label up */
    .label-up {
      transform: translateY(-1.25rem);
      font-size: 0.75rem;
      color: #ccc;
    }


  </style>
  <script>
    // JavaScript to handle label animation on click and focus
    document.addEventListener("DOMContentLoaded", function() {
      const inputs = document.querySelectorAll(".input");
      const labels = document.querySelectorAll(".label");
      
      inputs.forEach(input => {
        input.addEventListener("focus", () => {
          input.previousElementSibling.classList.add("label-up");
        });
        input.addEventListener("blur", () => {
          if (input.value === "") {
            input.previousElementSibling.classList.remove("label-up");
          }
        });
      });
      
      labels.forEach(label => {
        label.addEventListener("click", () => {
          const input = label.nextElementSibling;
          input.focus();
          input.previousElementSibling.classList.add("label-up");
        });
      });
    });
  </script>

</head>
<body>

<header>
  <nav>
  <div class="navbar text-white" style="background-color: #1A2633;">
  <div class="navbar-start">
    <a href="#" class="logo"><img class="w-20 h-10" src="./image/Logo2.jpg"></a>
  </div>
  <div class="navbar-center hidden lg:flex">
    <h1 class="text-white font-bold text-3xl">Admin Login</h1>
  </div>
</div>
  </nav>
</header>

<main>
  <div class="hero bg-transparent backdrop-blur-sm h-500 max-w-[64.5rem] border-solid border-2 border-gray-200 rounded-2xl p-10 shadow-2xl text-white">
    <div class="hero-content flex-col lg:flex-row-reverse">

      <div class="text-center lg:text-left">
        <h1 class="text-4xl font-bold">Please log in to access the Admin control panel.</h1>
        <p class="mt-6">If you forget your user ID or password, there is no recovery option available for security purposes. Please access the database directly to retrieve or update your credentials.</p>
        
        <p class="py-2 font-medium">Unauthorized Access Prohibited!</p>
      </div>

      <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-transparent backdrop-blur-md">
        <div class="card-body">
          
        <form action="login.php" action="login.php" method="post">
          <div class="form-control border-solid border-b-2 border-gray-200 relative ">
            <label class="label absolute ease-in-out cursor-text">
              <span class="text-white text-xl">Email</span>
            </label>
            <input type="text" name="Email" class="input input-bordered bg-transparent border-0 outline-0 focus:outline-none" required>
          </div>

          <div class="form-control border-solid border-b-2 border-gray-200 relative mt-5">
            <label class="label absolute ease-in-out cursor-text">
              <span class="text-white text-xl">Password</span>
            </label>
            <input type="password" name="pass" class="input input-bordered bg-transparent border-0 outline-0 focus:outline-none" required>
          </div>

          <div class="form-control mt-6">
            <input class="btn  rounded-full border-1 border-white" type="submit" name="submit" value="Login">
          </div>
        </form>
          <p>Forgot user-id or password? <a class="hover:underline" href="http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=web_technology_lab_project&table=admin">Goto</a></p>
        </div>
      </div>
    </div>
  </div>
</main>

<footer class="footer footer-center p-10 text-base-content rounded" style="background-color: black;">
  <div class="grid grid-flow-col gap-4">
    <a class="link link-hover">Donation campigne Admin portal</a> 
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