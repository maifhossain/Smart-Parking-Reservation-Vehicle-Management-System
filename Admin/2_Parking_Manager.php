<?php
include __DIR__ . "/../config.php";

/* ✅ ADD MANAGER */
if (isset($_POST['add_manager'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $nid = $_POST['nid'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];

    $conn->query("
        INSERT INTO managers (name, email, nid, address, phone, location)
        VALUES ('$name', '$email', '$nid', '$address', '$phone', '$location')
    ");

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

/* ✏️ UPDATE MANAGER */
if (isset($_POST['update_manager'])) {

    $id = $_POST['id'];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $nid = $_POST['nid'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];

    $conn->query("
        UPDATE managers
        SET
            name='$name',
            email='$email',
            nid='$nid',
            address='$address',
            phone='$phone',
            location='$location'
        WHERE id=$id
    ");

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$editData = null;

if (isset($_GET['edit'])) {
    $id = (int) $_GET['edit'];
    $res = $conn->query("SELECT * FROM managers WHERE id=$id");
    $editData = $res->fetch_assoc();
}
/* ❌ DELETE MANAGER (OUTSIDE) */
if (isset($_GET['delete'])) {

    $id = (int) $_GET['delete'];

    $conn->query("DELETE FROM managers WHERE id = $id");

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Admin Panel - Smart Parking Reservation</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {

            theme: {
                extend: {
                    colors: {
                        "primary": "#1E3A8A",
                        "secondary": "#10B981",
                        "accent-start": "#3B82F6",
                        "accent-end": "#8B5CF6",
                        "cta": "#F59E0B",
                        "background-light": "#F8FAFC",

                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .bg-gradient-accent {
            background: linear-gradient(135deg, #3B82F6 0%, #8B5CF6 100%);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(8px);
        }
    </style>
</head>

<body class="overflow-hidden">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="flex h-screen overflow-hidden">
            <!-- Sidebar -->
            <aside class="w-72 fixed inset-y-0 left-0 bg-white border-r">
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
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-primary/10 text-primary transition-colors"
                        href="2_Parking_Manager.php">
                        <span class="material-symbols-outlined text-[22px]">manage_accounts</span>
                        <span class="text-sm font-medium">Parking Managers</span>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600  hover:bg-slate-50  transition-colors"
                        href="3_Parking_Locations.html">
                        <span class="material-symbols-outlined text-[22px]">location_on</span>
                        <span class="text-sm font-medium">Parking Locations</span>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600  hover:bg-slate-50  transition-colors"
                        href="4_Drivers_Approval.html">
                        <span class="material-symbols-outlined text-[22px]"
                            style="font-variation-settings: 'FILL' 1">verified_user</span>
                        <span class="text-sm font-semibold">Drivers Approval</span>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600  hover:bg-slate-50  transition-colors"
                        href="5_Pricing_Rules.html">
                        <span class="material-symbols-outlined text-[22px]">payments</span>
                        <span class="text-sm font-medium">Pricing Rules</span>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600  hover:bg-slate-50  transition-colors"
                        href="6.1_Violations_AdminPart.html">
                        <span class="material-symbols-outlined text-[22px]">report_problem</span>
                        <span class="text-sm font-medium">Violations</span>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600  hover:bg-slate-50  transition-colors"
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
            <!-- Main Content -->
            <main class="flex-1 ml-72 flex flex-col h-screen overflow-y-auto">
                <!-- Header -->
                <header class="bg-white border-b border-slate-200 px-8 py-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Manage Parking
                                Managers</h2>
                            <p class="text-slate-500  mt-1">Add, edit, or remove parking managers
                                responsible for managing parking locations.</p>
                        </div>

                    </div>
                </header>
                <div class="p-8 space-y-8">
                    <!-- Table Section -->
                    <div class="bg-white  rounded-xl shadow-sm border border-slate-200  overflow-hidden">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-slate-50/50  border-b border-slate-200 ">
                                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">Name
                                    </th>
                                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Email
                                    </th>
                                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                        NID No.
                                    </th>
                                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Address
                                    </th>
                                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Phone Number
                                    </th>
                                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Assigned Location
                                    </th>
                                    <th
                                        class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 text-right">
                                        Action</th>
                                </tr>
                            </thead>
                            <?php
                            $result = $conn->query("SELECT * FROM managers ORDER BY id DESC");

                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr class="hover:bg-slate-50 transition-colors">

                                    <td class="px-6 py-4 flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-xs">
                                            <?php echo strtoupper(substr($row['name'], 0, 2)); ?>
                                        </div>
                                        <span class="text-sm font-semibold">
                                            <?php echo $row['name']; ?>
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        <?php echo $row['email']; ?>
                                    </td>

                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        <?php echo $row['nid']; ?>
                                    </td>

                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        <?php echo $row['address']; ?>
                                    </td>

                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        <?php echo $row['phone']; ?>
                                    </td>

                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        <?php echo $row['location']; ?>
                                    </td>

                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end gap-2">

                                            <a href="?edit=<?php echo $row['id']; ?>"
                                                class="p-1.5 text-slate-400 hover:text-primary">
                                                <span class="material-symbols-outlined text-[20px]">edit</span>
                                            </a>

                                            <a href="?delete=<?php echo $row['id']; ?>"
                                                onclick="return confirm('Are you sure you want to delete this manager?');"
                                                class="p-1.5 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-md transition-all">
                                                <span class="material-symbols-outlined text-[20px]">delete</span>
                                            </a>

                                        </div>
                                    </td>

                                </tr>
                            <?php } ?>
                        </table>
                        <div
                            class="p-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500 font-medium">
                            <p>Showing 3 of 12 managers</p>
                            <div class="flex gap-2">
                                <button
                                    class="px-3 py-1 border border-slate-200 rounded hover:bg-slate-50">Previous</button>
                                <button
                                    class="px-3 py-1 border border-slate-200 rounded hover:bg-slate-50">Next</button>
                            </div>
                        </div>
                    </div>
                    <!-- Modals Section (Demo layouts for context) -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-12">
                        <!-- Add Manager Section (Modal Equivalent) -->
                        <div class="bg-white  rounded-xl shadow-lg border border-slate-200 p-8">
                            <form method="POST">

                                <input type="hidden" name="id" value="<?php echo $editData['id'] ?? ''; ?>">

                                <div class="flex items-center gap-2 mb-6">
                                    <span class="material-symbols-outlined text-primary">person_add</span>

                                    <h3 class="text-lg font-bold">
                                        <?php echo $editData ? 'Edit Manager' : 'Add New Manager'; ?>
                                    </h3>
                                </div>

                                <div class="space-y-4">

                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-1">
                                            Manager Name
                                        </label>

                                        <input type="text" name="name" value="<?php echo $editData['name'] ?? ''; ?>"
                                            class="w-full rounded-lg border-slate-200 focus:border-primary focus:ring-primary h-11"
                                            placeholder="e.g. Robert Smith">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-1">
                                            Email Address
                                        </label>

                                        <input type="email" name="email" value="<?php echo $editData['email'] ?? ''; ?>"
                                            class="w-full rounded-lg border-slate-200 focus:border-primary focus:ring-primary h-11"
                                            placeholder="robert@parking.com">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-1">
                                            NID No.
                                        </label>

                                        <input type="text" name="nid" value="<?php echo $editData['nid'] ?? ''; ?>"
                                            class="w-full rounded-lg border-slate-200 focus:border-primary focus:ring-primary h-11"
                                            placeholder="Enter NID Number">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-1">
                                            Address
                                        </label>

                                        <input type="text" name="address"
                                            value="<?php echo $editData['address'] ?? ''; ?>"
                                            class="w-full rounded-lg border-slate-200 focus:border-primary focus:ring-primary h-11"
                                            placeholder="Enter Address">
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">

                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-1">
                                                Phone Number
                                            </label>

                                            <input type="tel" name="phone"
                                                value="<?php echo $editData['phone'] ?? ''; ?>"
                                                class="w-full rounded-lg border-slate-200 focus:border-primary focus:ring-primary h-11"
                                                placeholder="+8801XXXXXXXXX">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-1">
                                                Assigned Location
                                            </label>

                                            <select name="location"
                                                class="w-full rounded-lg border-slate-200 focus:border-primary focus:ring-primary h-11">

                                                <option value="Downtown Plaza" <?php if (($editData['location'] ?? '') == 'Downtown Plaza')
                                                    echo 'selected'; ?>>
                                                    Downtown Plaza
                                                </option>

                                                <option value="North Wing Terminal" <?php if (($editData['location'] ?? '') == 'North Wing Terminal')
                                                    echo 'selected'; ?>>
                                                    North Wing Terminal
                                                </option>

                                                <option value="East Side Garage" <?php if (($editData['location'] ?? '') == 'East Side Garage')
                                                    echo 'selected'; ?>>
                                                    East Side Garage
                                                </option>

                                            </select>
                                        </div>

                                    </div>

                                    <button type="submit"
                                        name="<?php echo $editData ? 'update_manager' : 'add_manager'; ?>"
                                        class="w-full bg-primary text-white font-bold py-2.5 rounded-lg">

                                        <?php echo $editData ? 'Update Manager' : 'Add Manager'; ?>

                                    </button>

                                </div>

                            </form>
                        </div>

                    </div>
                </div>
                <!-- Footer -->
                <footer class="mt-auto py-8 px-8 border-t border-slate-200 text-center">
                    <p class="text-sm text-slate-500">Smart Parking Reservation &amp; Vehicle Management System – Admin
                        Panel</p>
                    <div class="flex justify-center gap-6 mt-2">
                        <a class="text-xs text-slate-400 hover:text-primary" href="#">Terms of Service</a>
                        <a class="text-xs text-slate-400 hover:text-primary" href="#">Privacy Policy</a>
                        <a class="text-xs text-slate-400 hover:text-primary" href="#">Help Center</a>
                    </div>
                </footer>
            </main>
        </div>
</body>

</html>