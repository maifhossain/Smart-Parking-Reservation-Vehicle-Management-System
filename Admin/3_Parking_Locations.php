<?php
include __DIR__ . "/../config.php";

/* ADD LOCATION */
if (isset($_POST['add_location'])) {

  $location_name = $_POST['location_name'];
  $address = $_POST['address'];
  $status = $_POST['status'];
  $spaces = $_POST['spaces'];
  $price = $_POST['price'];

  $conn->query("
        INSERT INTO parking_locations
        (location_name,address,status,spaces,price)
        VALUES
        ('$location_name','$address','$status','$spaces','$price')
    ");

  header("Location: " . $_SERVER['PHP_SELF']);
  exit();
}

/* EDIT DATA LOAD */

$editData = null;

if (isset($_GET['edit'])) {

  $id = (int) $_GET['edit'];

  $result = $conn->query("
        SELECT *
        FROM parking_locations
        WHERE id=$id
    ");

  $editData = $result->fetch_assoc();
}

/* UPDATE */

if (isset($_POST['update_location'])) {

  $id = $_POST['id'];

  $location_name = $_POST['location_name'];
  $address = $_POST['address'];
  $status = $_POST['status'];
  $spaces = $_POST['spaces'];
  $price = $_POST['price'];

  $conn->query("
        UPDATE parking_locations
        SET
        location_name='$location_name',
        address='$address',
        status='$status',
        spaces='$spaces',
        price='$price'
        WHERE id=$id
    ");

  header("Location: " . $_SERVER['PHP_SELF']);
  exit();
}

/* DELETE */

if (isset($_GET['delete'])) {

  $id = (int) $_GET['delete'];

  $conn->query("
        DELETE FROM parking_locations
        WHERE id=$id
    ");

  header("Location: " . $_SERVER['PHP_SELF']);
  exit();
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Parking Locations Management | Smart Parking Admin</title>
  <!-- BEGIN: Scripts and Fonts -->
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#1e3b8a', // Custom Color from Theme
            secondary: '#10B981', // Emerald Green accent
            background: '#F8FAFC', // Light Gray background
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
          },
          borderRadius: {
            'custom': '8px', // ROUND_EIGHT from Theme
          }
        }
      }
    }
  </script>
  <!-- END: Scripts and Fonts -->
  <style data-purpose="custom-layout">
    body {
      background-color: #F8FAFC;
    }

    .sidebar-active {
      background-color: rgba(30, 59, 138, 0.1);
      border-left: 4px solid #1e3b8a;
    }

    .gradient-btn {
      background: linear-gradient(135deg, #1e3b8a 0%, #10B981 100%);
    }

    .table-row-hover:hover {
      background-color: #F1F5F9;
    }
  </style>
</head>

<body class="font-sans text-slate-900">
  <!-- BEGIN: Dashboard Wrapper -->
  <div class="flex min-h-screen">
    <!-- BEGIN: Sidebar Navigation -->
    <aside class="w-72 bg-white  border-r border-slate-200  flex flex-col shrink-0">
      <div class="p-6 flex items-center gap-3">
        <div class="w-10 h-10 rounded-lg bg-primary flex items-center justify-center text-white">
          <span class="material-symbols-outlined">local_parking</span>
        </div>
        <div>
          <h1 class="text-primary font-bold text-lg leading-tight">Smart Parking</h1>
          <p class="text-slate-500 text-xs font-medium">Admin Management</p>
        </div>
      </div>
      <nav class="flex-1 px-4 space-y-1 overflow-y-auto">
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600  hover:bg-slate-50  transition-colors"
          href="1_Admin_Dashboard.php">
          <span class="material-symbols-outlined text-[22px]">dashboard</span>
          <span class="text-sm font-medium">Dashboard</span>
        </a>
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600  hover:bg-slate-50  transition-colors"
          href="2_Parking_Manager.php">
          <span class="material-symbols-outlined text-[22px]">manage_accounts</span>
          <span class="text-sm font-medium">Parking Managers</span>
        </a>
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-primary/10 text-primary transition-colors"
          href="3_Parking_Locations.php">
          <span class="material-symbols-outlined text-[22px]">location_on</span>
          <span class="text-sm font-medium">Parking Locations</span>
        </a>
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600  hover:bg-slate-50  transition-colors"
          href="4_Drivers_Approval.php">
          <span class="material-symbols-outlined text-[22px]"
            style="font-variation-settings: 'FILL' 1">verified_user</span>
          <span class="text-sm font-semibold">Drivers Approval</span>
        </a>
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600  hover:bg-slate-50  transition-colors"
          href="5_Pricing_Rules.php">
          <span class="material-symbols-outlined text-[22px]">payments</span>
          <span class="text-sm font-medium">Pricing Rules</span>
        </a>
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600  hover:bg-slate-50  transition-colors"
          href="6.1_Violations_AdminPart.html">
          <span class="material-symbols-outlined text-[22px]">report_problem</span>
          <span class="text-sm font-medium">Violations</span>
        </a>
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600  hover:bg-slate-500 transition-colors"
          href="7_Reports_AdminPart.html">
          <span class="material-symbols-outlined text-[22px]">bar_chart</span>
          <span class="text-sm font-medium">Reports</span>
        </a>
      </nav>
      <div class="p-4 border-t border-slate-200 ">
        <div class="flex items-center gap-3 p-2">
          <div class="w-8 h-8 rounded-full bg-slate-200  overflow-hidden">
            <img alt="Admin Avatar" data-alt="Profile picture of the system administrator"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuDOshUztbYmBfZEQzcpVwqeyDVJhjXaLHQgOZKojCc0RN3hO421Wt7LVRJGmmb8_Ahg8oqyp3r3ICjJUvyUeIKgjdUoyDXN85JaubDz3SMk40NWRSih6I7UQ5Z0H9F99aSs2D4VpFrvDhhB9ApFdLnWxpm83dlDLH9rElJZMLDLOOrdEKCDy7my-xPXNHfDQiNS8RsE53Cc72BxeSc1c3hOBjnjBmgnwYEmRjZJUXXUcWqk1hrTHflykIo7gANnMhf4NPTK1RdVk4IQ" />
          </div>
          <div class="flex-1 min-w-0">
            <p class="text-sm font-medium truncate">System Admin</p>
            <p class="text-xs text-slate-500 truncate">admin@smartparking.io</p>
          </div>
        </div>
      </div>
    </aside>
    <!-- END: Sidebar Navigation -->
    <!-- BEGIN: Main Content Area -->
    <main class="flex-1 p-8 flex flex-col min-h-screen">
      <!-- BEGIN: Content Header -->
      <header class="flex justify-between items-center mb-8" data-purpose="header">
        <div>
          <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Parking Locations Management</h1>
          <p class="text-slate-500 mt-1">Manage parking areas, total spaces, and pricing information.</p>
        </div>

      </header>
      <!-- END: Content Header -->
      <!-- BEGIN: Table Section -->
      <section class="bg-white rounded-custom border border-slate-200 shadow-sm flex-1 overflow-hidden"
        data-purpose="locations-table-card">
        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse" id="pricing-table">
            <thead>
              <tr class="bg-slate-50 border-b border-slate-200">
                <th class="px-6 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Location</th>
                <th class="px-6 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Spaces</th>
                <th class="px-6 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Price (per hour)
                </th>
                <th class="px-6 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider text-right">Action
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">

              <?php

              $result = $conn->query("
    SELECT *
    FROM parking_locations
    ORDER BY id DESC
");

              while ($row = $result->fetch_assoc()) {

                ?>

                <tr class="table-row-hover transition-colors">

                  <td class="px-6 py-4">
                    <div>
                      <p class="font-semibold text-slate-800">
                        <?php echo $row['location_name']; ?>
                      </p>

                      <p class="text-xs text-slate-400">
                        <?php echo $row['address']; ?>
                      </p>
                    </div>
                  </td>

                  <td class="px-6 py-4">

                    <?php if ($row['status'] == "Active") { ?>

                      <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                        Active
                      </span>

                    <?php } else { ?>

                      <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                        Inactive
                      </span>

                    <?php } ?>

                  </td>

                  <td class="px-6 py-4">
                    <?php echo $row['spaces']; ?>
                  </td>

                  <td class="px-6 py-4">
                    $<?php echo $row['price']; ?>/hr
                  </td>

                  <td class="px-6 py-4 text-right">

                    <a href="?edit=<?php echo $row['id']; ?>">
                      ✏️
                    </a>

                    <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this location?');">
                      🗑️
                    </a>

                  </td>

                </tr>

              <?php } ?>

            </tbody>
          </table>
        </div>
        <!-- Table Pagination Placeholder -->
        <div class="p-4 bg-slate-50 border-t border-slate-200 flex justify-between items-center">
          <span class="text-xs text-slate-500">Showing 1 to 4 of 4 results</span>
          <div class="flex gap-2">
            <button
              class="px-3 py-1 text-xs border border-slate-300 rounded-custom text-slate-400 cursor-not-allowed">Previous</button>
            <button
              class="px-3 py-1 text-xs border border-slate-300 rounded-custom text-slate-600 bg-white">Next</button>
          </div>
        </div>
      </section>
      <!-- END: Table Section -->
      <section class="bg-white rounded-custom border border-slate-200 shadow-sm p-6 mt-8"
        data-purpose="add-location-form">
        <div class="mb-6">
          <h2 class="text-lg font-bold text-slate-900">Add New Location</h2>
          <p class="text-sm text-slate-500">Register a new parking facility in the system.</p>
        </div>
        <form method="POST" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-end">
          <input type="hidden" name="id" value="<?php echo $editData['id'] ?? ''; ?>">
          <div class="space-y-1.5">
            <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider" for="loc-name">Location
              Name</label>
            <input name="location_name" value="<?php echo $editData['location_name'] ?? ''; ?>" id="loc-name"
              type="text" class="w-full px-4 py-2 text-sm border-slate-200 rounded-custom">
          </div>
          <div class="space-y-1.5">
            <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider"
              for="loc-address">Address</label>
            <input name="address" value="<?php echo $editData['address'] ?? ''; ?>" id="loc-address" type="text"
              class="w-full px-4 py-2 text-sm border-slate-200 rounded-custom">
          </div>
          <div class="space-y-1.5">
            <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider" for="loc-spaces">Total
              Spaces</label>
            <input
name="spaces"
value="<?php echo $editData['spaces'] ?? ''; ?>"
id="loc-spaces"
type="number">
          </div>
          <div class="space-y-1.5">
            <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider" for="loc-price">Price per
              Hour</label>
            <div class="space-y-1.5">

              <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider">
                Status
              </label>

              <select name="status" class="w-full px-4 py-2 text-sm border-slate-200 rounded-custom">

                <option value="Active" <?php if (($editData['status'] ?? '') == 'Active')
                  echo 'selected'; ?>>
                  Active
                </option>

                <option value="Inactive" <?php if (($editData['status'] ?? '') == 'Inactive')
                  echo 'selected'; ?>>
                  Inactive
                </option>

              </select>

            </div>
            <div class="relative">
              <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">$</span>
              <input name="price" value="<?php echo $editData['price'] ?? ''; ?>" id="loc-price" type="text">
            </div>
            <div class="md:col-span-2 lg:col-span-4 flex justify-end gap-3 mt-2">
              <button type="button"
                class="px-6 py-2 text-sm font-semibold text-slate-600 border border-slate-300 rounded-custom hover:bg-slate-50 transition-colors">Cancel</button>
              <button
type="submit"
name="<?php echo $editData ? 'update_location' : 'add_location'; ?>"
class="gradient-btn text-white px-6 py-2 text-sm font-semibold rounded-custom">

<?php echo $editData ? 'Update Location' : 'Add Location'; ?>

</button>
            </div>
        </form>
      </section>
      <!-- BEGIN: Footer -->
      <footer class="mt-auto pt-8 border-t border-slate-200 text-center">
        <p class="text-sm text-slate-400">Smart Parking Reservation &amp; Vehicle Management System – Admin Panel</p>
        <p class="text-xs text-slate-300 mt-1">© 2023 SmartPark Inc. All rights reserved.</p>
      </footer>
      <!-- END: Footer -->
    </main>
    <!-- END: Main Content Area -->
  </div>
  <!-- END: Dashboard Wrapper -->
</body>

</html>