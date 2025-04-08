<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>IT Asset Management Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      margin: 0;
      padding: 20px;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }

    h1 {
      margin: 0;
    }

    .logout-btn {
      background-color: #dc3545;
      color: white;
      padding: 10px 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }

    .logout-btn:hover {
      background-color: #c82333;
    }

    .dashboard {
      max-width: 1000px;
      margin: auto;
    }

    .cards {
      display: flex;
      gap: 20px;
      justify-content: space-between;
      margin-bottom: 30px;
    }

    .card {
      flex: 1;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      text-align: center;
    }

    .card h2 {
      margin: 10px 0;
      font-size: 2em;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      border-radius: 10px;
      overflow: hidden;
    }

    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background: #007bff;
      color: white;
    }
  </style>
</head>
<body>
  <div class="dashboard">
    <div class="header">
      <h1>IT Asset Management Dashboard</h1>
      <button class="logout-btn" onclick="logout()">Logout</button>
    </div>

    <div class="cards">
      <div class="card">
        <p>Total Assets</p>
        <h2 id="totalAssets">--</h2>
      </div>
      <div class="card">
        <p>Assigned</p>
        <h2 id="assignedAssets">--</h2>
      </div>
      <div class="card">
        <p>In Maintenance</p>
        <h2 id="maintenanceAssets">--</h2>
      </div>
    </div>

    <h2>Recent Assets</h2>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Category</th>
          <th>Status</th>
          <th>Assigned To</th>
          <th>Purchase Date</th>
        </tr>
      </thead>
      <tbody id="assetTable">
        <!-- Filled via JS -->
      </tbody>
    </table>
  </div>

  <script>
    // Simulated data (replace with actual API/data fetch)
    const assetData = [
      { name: "Dell Laptop XPS 13", category: "Laptop", status: "Assigned", assigned_to: "John Doe", purchase_date: "2023-06-15" },
      { name: "HP Monitor 24\"", category: "Monitor", status: "Available", assigned_to: "", purchase_date: "2023-08-10" },
      { name: "MacBook Pro M2", category: "Laptop", status: "Maintenance", assigned_to: "", purchase_date: "2022-11-25" },
    ];

    function populateDashboard() {
      const total = assetData.length;
      const assigned = assetData.filter(a => a.status === "Assigned").length;
      const maintenance = assetData.filter(a => a.status === "Maintenance").length;

      document.getElementById("totalAssets").textContent = total;
      document.getElementById("assignedAssets").textContent = assigned;
      document.getElementById("maintenanceAssets").textContent = maintenance;

      const table = document.getElementById("assetTable");
      table.innerHTML = "";
      assetData.forEach(asset => {
        table.innerHTML += `
          <tr>
            <td>${asset.name}</td>
            <td>${asset.category}</td>
            <td>${asset.status}</td>
            <td>${asset.assigned_to || "-"}</td>
            <td>${asset.purchase_date}</td>
          </tr>
        `;
      });
    }

    function logout() {
      // You could also clear session/localStorage here if needed
      window.location.href = "login.html";
    }

    window.onload = populateDashboard;
  </script>
</body>
</html>
<!-- This is a simple IT Asset Management Dashboard using HTML, CSS, and JavaScript.
     It displays total assets, assigned assets, and assets in maintenance,
     along with a table of recent assets. The data is simulated for demonstration purposes. -->
<!-- You can replace the simulated data with actual API calls to fetch real asset data.
     The logout function redirects to a login page (login.html) when the logout button is clicked. -->
<!-- The dashboard is styled using CSS for a clean and modern look.
     The layout is responsive and adjusts to different screen sizes. -->
<!-- The JavaScript code populates the dashboard with data when the page loads.
     It also handles the logout functionality. -->
<!-- This code is a basic template and can be expanded with additional features
     such as asset management, filtering, and sorting. -->
<!-- You can also integrate a backend framework like Laravel or Express.js
     to handle user authentication and data management. -->
<!-- This code is a starting point for building a more comprehensive IT Asset Management System.
     You can customize it further based on your requirements and design preferences. -->
<!-- Feel free to modify the styles, layout, and functionality as needed.
     You can also add more features like search, filter, and sorting options
     to enhance the user experience and make asset management more efficient. -->
<!-- This code is a simple and effective way to create an IT Asset Management Dashboard
