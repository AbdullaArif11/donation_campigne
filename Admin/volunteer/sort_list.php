<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Volunteers</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function searchVolunteers(event) {
      event.preventDefault(); // Prevent form from submitting normally

      const branch = document.getElementById('branch').value;

      if (!branch) {
        alert('Please select a branch.');
        return;
      }

      fetch(`fetch_volunteers.php?branch=${encodeURIComponent(branch)}`)
        .then(response => response.json())
        .then(data => {
          const resultsContainer = document.getElementById('results');
          resultsContainer.innerHTML = ''; // Clear previous results

          if (data.length === 0) {
            resultsContainer.innerHTML = '<p class="text-white">No volunteers found in the selected branch.</p>';
            return;
          }

          let tableHtml = `
            <div class="overflow-x-auto m-4">
              <table class="table bg-black w-full">
                <thead>
                  <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Branch</th>
                    <th>Email</th>
                    <th>Contact No</th>
                  </tr>
                </thead>
                <tbody>
          `;

          data.forEach(volunteer => {
            const photo = `data:image/jpeg;base64,${volunteer.photo}`;
            tableHtml += `
              <tr>
                <td><img src="${photo}" alt="Volunteer Photo" class="w-16 h-16 object-cover" /></td>
                <td>${volunteer.first_name} ${volunteer.last_name}</td>
                <td>${volunteer.branch}</td>
                <td>${volunteer.email}</td>
                <td>${volunteer.contact_no}</td>
              </tr>
            `;
          });

          tableHtml += `
                </tbody>
              </table>
            </div>
          `;

          resultsContainer.innerHTML = tableHtml;
        })
        .catch(error => {
          console.error('Error fetching data:', error);
        });
    }
  </script>
</head>
<body class="bg-gradient-to-r from-slate-900 via-sky-800 to-cyan-700">
  <main class="p-4">
    <h1 class="text-3xl text-white mb-4">Search Volunteers by Branch</h1>
    <form onsubmit="searchVolunteers(event)">
      <div class="mb-4">
        <label class="block text-gray-700">Branch</label>
        <select id="branch" class="w-full px-3 py-2 border rounded" required>
          <option value="">Select Branch</option>
          <optgroup label="Dhaka Division">
            <option value="Dhaka, Dhaka">Dhaka, Dhaka</option>
            <option value="Dhaka, Faridpur">Dhaka, Faridpur</option>
            <option value="Dhaka, Gazipur">Dhaka, Gazipur</option>
            <option value="Dhaka, Gopalganj">Dhaka, Gopalganj</option>
            <option value="Dhaka, Kishoreganj">Dhaka, Kishoreganj</option>
            <option value="Dhaka, Madaripur">Dhaka, Madaripur</option>
            <option value="Dhaka, Manikganj">Dhaka, Manikganj</option>
            <option value="Dhaka, Munshiganj">Dhaka, Munshiganj</option>
            <option value="Dhaka, Narayanganj">Dhaka, Narayanganj</option>
            <option value="Dhaka, Narsingdi">Dhaka, Narsingdi</option>
            <option value="Dhaka, Rajbari">Dhaka, Rajbari</option>
            <option value="Dhaka, Shariatpur">Dhaka, Shariatpur</option>
            <option value="Dhaka, Tangail">Dhaka, Tangail</option>
          </optgroup>
          <optgroup label="Chittagong Division">
            <option value="Chittagong, Bandarban">Chittagong, Bandarban</option>
            <option value="Chittagong, Brahmanbaria">Chittagong, Brahmanbaria</option>
            <option value="Chittagong, Chandpur">Chittagong, Chandpur</option>
            <option value="Chittagong, Chattogram">Chittagong, Chattogram</option>
            <option value="Chittagong, Cox's Bazar">Chittagong, Cox's Bazar</option>
            <option value="Chittagong, Cumilla">Chittagong, Cumilla</option>
            <option value="Chittagong, Feni">Chittagong, Feni</option>
            <option value="Chittagong, Khagrachari">Chittagong, Khagrachari</option>
            <option value="Chittagong, Lakshmipur">Chittagong, Lakshmipur</option>
            <option value="Chittagong, Noakhali">Chittagong, Noakhali</option>
            <option value="Chittagong, Rangamati">Chittagong, Rangamati</option>
          </optgroup>
          <optgroup label="Rajshahi Division">
            <option value="Rajshahi, Bogura">Rajshahi, Bogura</option>
            <option value="Rajshahi, Joypurhat">Rajshahi, Joypurhat</option>
            <option value="Rajshahi, Naogaon">Rajshahi, Naogaon</option>
            <option value="Rajshahi, Natore">Rajshahi, Natore</option>
            <option value="Rajshahi, Chapainawabganj">Rajshahi, Chapainawabganj</option>
            <option value="Rajshahi, Pabna">Rajshahi, Pabna</option>
            <option value="Rajshahi, Rajshahi">Rajshahi, Rajshahi</option>
            <option value="Rajshahi, Sirajganj">Rajshahi, Sirajganj</option>
          </optgroup>
          <optgroup label="Khulna Division">
            <option value="Khulna, Bagerhat">Khulna, Bagerhat</option>
            <option value="Khulna, Chuadanga">Khulna, Chuadanga</option>
            <option value="Khulna, Jashore">Khulna, Jashore</option>
            <option value="Khulna, Jhenaidah">Khulna, Jhenaidah</option>
            <option value="Khulna, Khulna">Khulna, Khulna</option>
            <option value="Khulna, Kushtia">Khulna, Kushtia</option>
            <option value="Khulna, Magura">Khulna, Magura</option>
            <option value="Khulna, Meherpur">Khulna, Meherpur</option>
            <option value="Khulna, Narail">Khulna, Narail</option>
            <option value="Khulna, Satkhira">Khulna, Satkhira</option>
          </optgroup>
          <optgroup label="Barisal Division">
            <option value="Barisal, Barguna">Barisal, Barguna</option>
            <option value="Barisal, Barishal">Barisal, Barishal</option>
            <option value="Barisal, Bhola">Barisal, Bhola</option>
            <option value="Barisal, Jhalokati">Barisal, Jhalokati</option>
            <option value="Barisal, Patuakhali">Barisal, Patuakhali</option>
            <option value="Barisal, Pirojpur">Barisal, Pirojpur</option>
          </optgroup>
          <optgroup label="Sylhet Division">
            <option value="Sylhet, Habiganj">Sylhet, Habiganj</option>
            <option value="Sylhet, Moulvibazar">Sylhet, Moulvibazar</option>
            <option value="Sylhet, Sunamganj">Sylhet, Sunamganj</option>
            <option value="Sylhet, Sylhet">Sylhet, Sylhet</option>
          </optgroup>
          <optgroup label="Rangpur Division">
            <option value="Rangpur, Dinajpur">Rangpur, Dinajpur</option>
            <option value="Rangpur, Gaibandha">Rangpur, Gaibandha</option>
            <option value="Rangpur, Kurigram">Rangpur, Kurigram</option>
            <option value="Rangpur, Lalmonirhat">Rangpur, Lalmonirhat</option>
            <option value="Rangpur, Nilphamari">Rangpur, Nilphamari</option>
            <option value="Rangpur, Panchagarh">Rangpur, Panchagarh</option>
            <option value="Rangpur, Rangpur">Rangpur, Rangpur</option>
            <option value="Rangpur, Thakurgaon">Rangpur, Thakurgaon</option>
          </optgroup>
          <optgroup label="Mymensingh Division">
            <option value="Mymensingh, Jamalpur">Mymensingh, Jamalpur</option>
            <option value="Mymensingh, Mymensingh">Mymensingh, Mymensingh</option>
            <option value="Mymensingh, Netrokona">Mymensingh, Netrokona</option>
            <option value="Mymensingh, Sherpur">Mymensingh, Sherpur</option>
          </optgroup>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <div id="results" class="mt-4"></div>
  </main>
</body>
</html>
