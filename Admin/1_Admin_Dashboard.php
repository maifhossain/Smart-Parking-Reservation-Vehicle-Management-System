<?php
include __DIR__ . "/../config.php";

$driversCount = $conn->query("SELECT COUNT(*) as total FROM users");
$totalDrivers = $driversCount->fetch_assoc()['total'];

$result = $conn->query("
SELECT 
    b.id,
    u.fullname,
    u.vehicle_plate,
    p.location AS parking_location,
    b.start_time,
    b.end_time,
    b.status
FROM bookings b
JOIN users u ON b.user_id = u.id
JOIN parking_slots p ON b.slot_id = p.id
ORDER BY b.id DESC
LIMIT 10
");
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Smart Parking - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap"
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
                        "primary": "#1e3b8a",
                        "background-light": "#f8fafc",

                        "emerald-accent": "#10b981",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .sidebar-gradient {
            background: linear-gradient(180deg, #1e3b8a 0%, #3b82f6 100%);
        }
    </style>
</head>

<body class="overflow-hidden">
    <div class="flex">
        <!-- Sidebar -->
        <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside
            class="w-72 fixed inset-y-0 left-0 bg-white border-r">
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
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-primary/10 text-primary transition-colors"
                    href="1_Admin_Dashboard.php">
                    <span class="material-symbols-outlined text-[22px]">dashboard</span>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600  hover:bg-slate-50  transition-colors"
                    href="2_Parking_Manager.php">
                    <span class="material-symbols-outlined text-[22px]">manage_accounts</span>
                    <span class="text-sm font-medium">Parking Managers</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600  hover:bg-slate-50  transition-colors"
                    href="3_Parking_Locations.html">
                    <span class="material-symbols-outlined text-[22px]">location_on</span>
                    <span class="text-sm font-medium">Parking Locations</span>
                </a>
                <a class="fflex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-50  transition-colors"
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
            <div class="p-4 border-t border-slate-200 mt-auto">
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
        <!-- Main Content Area -->
        <main class="flex-1 ml-72 h-screen overflow-y-auto">
            <!-- Top Header -->
            <header
                class="h-20 bg-white text-slate-800 border-b border-slate-200  flex items-center justify-between px-8 flex-shrink-0 sticky top-0 z-10">
                <h2 class="text-xl font-bold text-slate-800">Admin Dashboard</h2>
                <div class="flex items-center gap-6">
                    <div class="relative w-80">
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                        <input
                            class="w-full pl-10 pr-4 py-2 bg-slate-100 border-none rounded-lg text-sm focus:ring-2 focus:ring-primary/50"
                            placeholder="Search reservations, drivers..." type="text" />
                    </div>
                    <button class="relative p-2 text-slate-500 hover:bg-slate-100  rounded-full transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                        <span
                            class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                    <div class="flex items-center gap-3 pl-4 border-l border-slate-200 ">
                        <div class="bg-slate-200 w-10 h-10 rounded-full bg-cover bg-center"
                            data-alt="Admin user profile avatar thumbnail"
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCZfjcCQHh3SCh4MsIhzIzbd9oENKZDmKf75thnq3KntcpRuOFPn8XkImOn2dHBtCPZkRZFDEH7mUhQ4AJ-tegGq9nqf4sJgu7xdsCXcbFN0p5rwzdIeE0L9I7R6wrZMethR3y9RV7LeZ4AGTKQCR0adqUVsrRSJH1IkA97H5CTcfqHTwd0XBHw5p9fUQQNjIXLGmGcI0Z18uTiPNb4wwfYY3xbeT86LPI34vGFwbJNzuJU11uM_bbDfwJFTAraec_JEviuUoh_pUO7')">
                        </div>
                    </div>
                </div>
            </header>
            <!-- Dashboard Content -->
            <div class="p-8 space-y-8">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 ">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-2 bg-primary/10 text-primary rounded-lg">
                                <span class="material-symbols-outlined">person</span>
                            </div>
                            <span
                                class="text-emerald-500 text-xs font-bold bg-emerald-50 px-2 py-1 rounded-full">+12%</span>
                        </div>
                        <p class="text-slate-500  text-sm font-medium">Total Drivers</p>
                        <p class="text-3xl font-bold mt-1 text-slate-800 ">
    <?= $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total']; ?>
</p>
                    </div>
                    <div class="bg-white  p-6 rounded-xl shadow-sm border border-slate-200 ">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-2 bg-primary/10 text-primary rounded-lg">
                                <span class="material-symbols-outlined">book_online</span>
                            </div>
                            <span
                                class="text-emerald-500 text-xs font-bold bg-emerald-50 px-2 py-1 rounded-full">+5%</span>
                        </div>
                        <p class="text-slate-500  text-sm font-medium">Total Reservations</p>
                        <p class="text-3xl font-bold mt-1 text-slate-800">
    <?= $conn->query("SELECT COUNT(*) AS total FROM bookings")->fetch_assoc()['total']; ?>
</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-2 bg-primary/10 text-primary rounded-lg">
                                <span class="material-symbols-outlined">account_balance_wallet</span>
                            </div>
                            <span
                                class="text-emerald-500 text-xs font-bold bg-emerald-50 px-2 py-1 rounded-full">+18%</span>
                        </div>
                        <p class="text-slate-500  text-sm font-medium">Total Earnings</p>
                        <p class="text-3xl font-bold mt-1 text-slate-800">$18,450</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 ">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-2 bg-primary/10 text-primary rounded-lg">
                                <span class="material-symbols-outlined">sensor_window</span>
                            </div>
                            <span class="text-red-500 text-xs font-bold bg-red-50 px-2 py-1 rounded-full">-2%</span>
                        </div>
                        <p class="text-slate-500  text-sm font-medium">Parking Occupancy</p>
                        <p class="text-3xl font-bold mt-1 text-slate-800">72%</p>
                    </div>
                </div>
                <!-- Charts & Quick Actions -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Occupancy Chart -->
                    <div
                        class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm border border-slate-200 ">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="text-lg font-bold text-slate-800 ">Parking Occupancy Overview
                            </h3>
                            <select
                                class="bg-slate-50 text-slate-700 rounded-lg text-xs font-medium focus:ring-primary/50">
                                <option>Last 7 Days</option>
                                <option>Last 30 Days</option>
                            </select>
                        </div>
                        <div class="flex items-end justify-between h-64 px-4">
                            <div class="flex flex-col items-center gap-4 w-full group">
                                <div class="bg-primary/20 hover:bg-primary w-12 rounded-t-lg transition-all duration-300"
                                    style="height: 85%;"></div>
                                <span class="text-xs font-semibold text-slate-500">Downtown</span>
                            </div>
                            <div class="flex flex-col items-center gap-4 w-full group">
                                <div class="bg-primary/20 hover:bg-primary w-12 rounded-t-lg transition-all duration-300"
                                    style="height: 65%;"></div>
                                <span class="text-xs font-semibold text-slate-500">City
                                    Center</span>
                            </div>
                            <div class="flex flex-col items-center gap-4 w-full group">
                                <div class="bg-primary/20 hover:bg-primary w-12 rounded-t-lg transition-all duration-300"
                                    style="height: 45%;"></div>
                                <span class="text-xs font-semibold text-slate-500">Mall</span>
                            </div>
                            <div class="flex flex-col items-center gap-4 w-full group">
                                <div class="bg-primary/20 hover:bg-primary w-12 rounded-t-lg transition-all duration-300"
                                    style="height: 75%;"></div>
                                <span class="text-xs font-semibold text-slate-500 ">Airport</span>
                            </div>
                        </div>
                    </div>
                    <!-- Quick Actions -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 ">
                        <h3 class="text-lg font-bold text-slate-800 mb-6">Quick Actions</h3>
                        <div class="space-y-4">
                            <button
                                class="w-full flex items-center gap-3 p-4 rounded-xl border-2 border-dashed border-slate-200  hover:border-primary/40 hover:bg-primary/5 transition-all group text-left">
                                <div
                                    class="bg-primary/10 text-primary p-2 rounded-lg group-hover:bg-primary group-hover:text-white transition-colors">
                                    <span class="material-symbols-outlined">add_location</span>
                                </div>
                                <span class="font-semibold text-slate-700 d">Add Parking
                                    Location</span>
                            </button>
                            <button
                                class="w-full flex items-center gap-3 p-4 rounded-xl border-2 border-dashed border-slate-200  hover:border-primary/40 hover:bg-primary/5 transition-all group text-left">
                                <div
                                    class="bg-primary/10 text-primary p-2 rounded-lg group-hover:bg-primary group-hover:text-white transition-colors">
                                    <span class="material-symbols-outlined">person_add</span>
                                </div>
                                <span class="font-semibold text-slate-700">Add Parking
                                    Manager</span>
                            </button>
                            <button
                                class="w-full flex items-center gap-3 p-4 rounded-xl border-2 border-dashed border-slate-200  hover:border-primary/40 hover:bg-primary/5 transition-all group text-left">
                                <div
                                    class="bg-primary/10 text-primary p-2 rounded-lg group-hover:bg-primary group-hover:text-white transition-colors">
                                    <span class="material-symbols-outlined">summarize</span>
                                </div>
                                <span class="font-semibold text-slate-700">View Reports</span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Recent Reservations Table -->
                <div class="bg-white rounded-xl shadow-sm border border-slate-200  overflow-hidden">
                    <div class="px-8 py-6 border-b border-slate-200  flex items-center justify-between">
                        <h3 class="text-lg font-bold text-slate-800 r:underline">View All</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider font-bold">
                                <tr>
                                    <th class="px-8 py-4">Driver Name</th>
                                    <th class="px-8 py-4">Vehicle Number</th>
                                    <th class="px-8 py-4">Location</th>
                                    <th class="px-8 py-4">Time</th>
                                    <th class="px-8 py-4">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
<?php while($row = $result->fetch_assoc()) { ?>
<tr class="hover:bg-slate-50 transition-colors">

    <!-- Driver Name -->
    <td class="px-8 py-5">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-xs font-bold">
                <?= strtoupper(substr($row['fullname'],0,2)) ?>
            </div>
            <span class="font-medium text-slate-800">
                <?= $row['fullname'] ?>
            </span>
        </div>
    </td>

    <!-- Vehicle -->
    <td class="px-8 py-5 text-slate-600 font-mono text-sm">
        <?= $row['vehicle_plate'] ?>
    </td>

    <!-- Location -->
    <td class="px-8 py-5 text-slate-600">
        <?= $row['parking_location'] ?>
    </td>

    <!-- Time -->
    <td class="px-8 py-5 text-slate-600">
        <?= $row['start_time'] ?> - <?= $row['end_time'] ?>
    </td>

    <!-- Status -->
    <td class="px-8 py-5">
        <?php if($row['status']=='confirmed'){ ?>
            <span class="px-3 py-1 text-xs bg-green-100 text-green-600 rounded-full">
                Confirmed
            </span>
        <?php } elseif($row['status']=='pending'){ ?>
            <span class="px-3 py-1 text-xs bg-yellow-100 text-yellow-600 rounded-full">
                Pending
            </span>
        <?php } else { ?>
            <span class="px-3 py-1 text-xs bg-red-100 text-red-600 rounded-full">
                Cancelled
            </span>
        <?php } ?>
    </td>

</tr>
<?php } ?>
</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>