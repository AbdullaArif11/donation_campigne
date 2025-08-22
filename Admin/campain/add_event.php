<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin Panel - Add Donation Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .form-control {
      @apply input input-bordered w-full mb-4;
    }
    .btn-primary {
      @apply btn btn-primary;
    }
    .error {
      @apply border-red-500;
    }
  </style>
</head>


<body class="bg-gray-100">
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
  <div class="container mx-auto p-6">
    <h3 class="text-center text-2xl font-bold mb-6">Add Donation Card Form</h3>
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
      <form action="connection.php" method="POST" onsubmit="return validateForm()">

        <div class="mb-4 text-black">
          <label class="block text-black font-semibold">Picture URL:</label>
          <input type="text" name="Picture" class="form-control bg-white border border-solide" autocomplete="off">
        </div>

        <div class="mb-4 text-black">
          <label class="block text-gray-700 font-semibold">Picture (Retina) URL:</label>
          <input type="text" name="PictureR" class="form-control bg-white border border-solide" autocomplete="off">
        </div>

        <div class="mb-4 text-black">
          <label class="block text-gray-700 font-semibold">Title:</label>
          <input type="text" name="Title" class="form-control bg-white border border-solide" autocomplete="off">
        </div>

        <div class="mb-4 text-black">
          <label class="block text-gray-700 font-semibold">Category:</label>
          <input type="text" name="Category" class="form-control bg-white border border-solide" autocomplete="off">
        </div>

        <div class="mb-4 text-black">
          <label class="block text-gray-700 font-semibold">Category Background Color:</label>
          <input type="text" name="Category_bg" class="form-control bg-white border border-solide" autocomplete="off">
        </div>

        <div class="mb-4 text-black">
          <label class="block text-gray-700 font-semibold">Card Background Color:</label>
          <input type="text" name="Card_bg" class="form-control bg-white border border-solide" autocomplete="off">
        </div>

        <div class="mb-4 text-black">
          <label class="block text-gray-700 font-semibold">Text Button Background Color:</label>
          <input type="text" name="Text_button_bg" class="form-control bg-white border border-solide" autocomplete="off">
        </div>

        <div class="mb-4 text-black">
          <label class="block text-gray-700 font-semibold">Description:</label>
          <textarea name="Description" class="form-control bg-white border border-solide" rows="4" autocomplete="off"></textarea>
        </div>

        <div class="mb-6 text-black">
          <label class="block text-gray-700 font-semibold">Price:</label>
          <input type="text" name="Price" class="form-control bg-white border border-solide" autocomplete="off">
        </div>

        <div>
          <button type="submit" class="btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>

  <footer class="bg-dark text-white text-center p-3 mt-6">
    Donation Campaign Management System
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    function validateForm() {
      var inputs = document.getElementsByTagName('input');
      var textarea = document.getElementsByTagName('textarea')[0];
      var incompleteFields = [];

      for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].type === 'text' && inputs[i].value === '') {
          inputs[i].classList.add('error');
          incompleteFields.push(inputs[i].name);
        } else {
          inputs[i].classList.remove('error');
        }
      }
      if (textarea.value === '') {
        textarea.classList.add('error');
        incompleteFields.push(textarea.name);
      } else {
        textarea.classList.remove('error');
      }

      if (incompleteFields.length > 0) {
        var message = 'Please fill in the following fields:\n';
        for (var k = 0; k < incompleteFields.length; k++) {
          message += '- ' + incompleteFields[k] + '\n';
        }
        alert(message);
        return false;
      }

      return true;
    }
  </script>
</body>

</html>
