<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Smart Parking - Admin Panel</title>
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
                        "primary": "#1e3b8a",
                        "secondary": "#10b981",
                        "background-light": "#f8fafc",

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

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="bg-background-light  font-display text-slate-900 ">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
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
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600  hover:bg-slate-50  transition-colors"
                    href="3_Parking_Locations.php">
                    <span class="material-symbols-outlined text-[22px]">location_on</span>
                    <span class="text-sm font-medium">Parking Locations</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-primary/10 text-primary transition-colors"
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
        <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <!-- Header -->
            <header
                class="bg-white  border-b border-slate-200  px-8 py-6 flex flex-wrap justify-between items-center gap-4">
                <div class="min-w-0">
                    <h2 class="text-2xl font-extrabold text-slate-900  tracking-tight">Driver
                        Approval Management</h2>
                    <p class="text-slate-500 text-sm mt-1">Review and approve driver registrations before they can
                        reserve parking.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button
                        class="flex items-center gap-2 px-4 py-2 border border-slate-200  rounded-lg bg-white  text-sm font-medium hover:bg-slate-50 transition-all">
                        <span class="material-symbols-outlined text-sm">filter_list</span>
                        <a href="?filter=all">ALL</a>

                        <a href="?filter=pending">Pending</a>

                        <a href="?filter=approved">Approved</a>
                        <span class="material-symbols-outlined text-sm">expand_more</span>
                    </button>
                    <div class="h-8 w-px bg-slate-200  mx-2"></div>
                    <button
                        class="bg-primary text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-all shadow-lg shadow-primary/20 flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">download</span>
                        Export Report
                    </button>
                </div>
            </header>
            <!-- Table Content -->
            <div class="flex-1 overflow-auto p-8">
                <div class="bg-white  rounded-xl shadow-sm border border-slate-200  overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50/50 ">
                                    <th
                                        class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 border-b border-slate-200 ">
                                        Driver Name</th>
                                    <th
                                        class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 border-b border-slate-200">
                                        Vehicle Number</th>
                                    <th
                                        class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 border-b border-slate-200 ">
                                        Status</th>
                                    <th
                                        class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 border-b border-slate-200 ">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 ">
                                <?php

                                include("../db.php");

                                $filter = $_GET['filter'] ?? 'all';

                                if ($filter == 'pending') {
                                    $query =
                                        mysqli_query(
                                            $conn,
                                            "SELECT * FROM users
        WHERE status='Pending'"
                                        );
                                } elseif ($filter == 'approved') {
                                    $query =
                                        mysqli_query(
                                            $conn,
                                            "SELECT * FROM users
        WHERE status='Approved'"
                                        );
                                } else {
                                    $query =
                                        mysqli_query(
                                            $conn,
                                            "SELECT * FROM users"
                                        );
                                }

                                while ($row = mysqli_fetch_assoc($query)) {

                                    ?>

                                    <tr>

                                        <td class="px-6 py-5">
                                            <?php echo $row['fullname']; ?>
                                        </td>

                                        <td class="px-6 py-5">
                                            <?php echo $row['vehicle_plate']; ?>
                                        </td>

                                        <td class="px-6 py-5">

                                            <?php

                                            if ($row['status'] == "Approved") {
                                                ?>
                                                <span class="text-green-600 font-bold">
                                                    Approved
                                                </span>
                                                <?php
                                            } else {
                                                ?>
                                                <span class="text-yellow-600 font-bold">
                                                    Pending
                                                </span>
                                                <?php
                                            }

                                            ?>

                                        </td>

                                        <td class="px-6 py-5">
    <div class="flex items-center gap-2">

        <!-- View Profile -->
        <a href="driver_profile.php?id=<?php echo $row['id']; ?>"
           class="px-3 py-1.5 rounded-lg border border-slate-200 text-xs font-semibold text-slate-700 hover:bg-slate-50 transition">
            View Profile
        </a>

        <!-- Approve -->
        <a href="approve_driver.php?id=<?php echo $row['id']; ?>"
           class="w-9 h-9 flex items-center justify-center rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-500 hover:text-white transition"
           title="Approve">
            <span class="material-symbols-outlined text-lg">check_circle</span>
        </a>

        <!-- Reject -->
        <a onclick="return confirm('Delete Driver?')"
           href="reject_driver.php?id=<?php echo $row['id']; ?>"
           class="w-9 h-9 flex items-center justify-center rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-500 hover:text-white transition"
           title="Reject">
            <span class="material-symbols-outlined text-lg">cancel</span>
        </a>

    </div>
</td>

                                    </tr>

                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination (Added for modern look) -->
                    <div class="px-6 py-4 border-t border-slate-100  flex items-center justify-between">
                        <p class="text-xs text-slate-500 font-medium">Showing 1 to 4 of 24 entries</p>
                        <div class="flex items-center gap-2">
                            <button class="p-1.5 rounded border border-slate-200 d text-slate-400 cursor-not-allowed">
                                <span class="material-symbols-outlined text-sm">chevron_left</span>
                            </button>
                            <button class="w-8 h-8 rounded bg-primary text-white text-xs font-bold">1</button>
                            <button
                                class="w-8 h-8 rounded border border-slate-200  text-xs font-bold hover:bg-slate-50 ">2</button>
                            <button
                                class="w-8 h-8 rounded border border-slate-200 d text-xs font-bold hover:bg-slate-50 ">3</button>
                            <button class="p-1.5 rounded border border-slate-200  hover:bg-slate-50 text-slate-600">
                                <span class="material-symbols-outlined text-sm">chevron_right</span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Footer Summary Cards (Optional touch) -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                    <div class="bg-gradient-to-br from-primary to-indigo-700 p-6 rounded-xl text-white shadow-lg">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-primary-100/70 text-sm font-medium">Pending Approvals</p>
                                <h3 class="text-3xl font-black mt-1"><?php
$pending = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users WHERE status='Pending'"));
echo $pending;
?></h3>
                            </div>
                            <span class="material-symbols-outlined text-3xl opacity-50">pending_actions</span>
                        </div>
                        <div class="mt-4 pt-4 border-t border-white/10 flex items-center gap-2 text-xs">
                            <span class="material-symbols-outlined text-xs">trending_up</span>
                            <span>4 new since yesterday</span>
                        </div>
                    </div>
                    <div class="bg-white  p-6 rounded-xl border border-slate-200 d shadow-sm">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-slate-500 text-sm font-medium">Total Registered</p>
                                <h3 class="text-3xl font-black mt-1"><?php
$total = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users"));
echo $total;
?></h3>
                            </div>
                            <span class="material-symbols-outlined text-3xl text-primary/40">groups</span>
                        </div>
                        <p class="text-emerald-500 text-xs font-bold mt-4 flex items-center gap-1">
                            <span class="material-symbols-outlined text-xs">arrow_upward</span>
                            12% monthly growth
                        </p>
                    </div>
                    <div class="bg-white  p-6 rounded-xl border border-slate-200  shadow-sm">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-slate-500 text-sm font-medium">Rejection Rate</p>
                                <h3 class="text-3xl font-black mt-1"><?php
$approved = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users WHERE status='Approved'"));
$rejected = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM rejection_log"));

$totalProcessed = $approved + $rejected;

$rate = ($totalProcessed > 0) ? ($rejected/$totalProcessed)*100 : 0;

echo round($rate,2) . "%";
?></h3>
                            </div>
                            <span class="material-symbols-outlined text-3xl text-rose-400/40">block</span>
                        </div>
                        <p class="text-slate-400 text-xs font-medium mt-4">Maintaining system security</p>
                    </div>
                </div>
            </div>
            <footer class="px-8 py-6 border-t border-slate-200  text-center">
                <p class="text-slate-500 text-xs font-medium uppercase tracking-widest">Smart Parking Reservation &amp;
                    Vehicle Management System – Admin Panel</p>
                <p class="text-slate-400 text-[10px] mt-1">© 2024 SmartParking SaaS solutions. All rights reserved.</p>
            </footer>
        </main>
    </div>
</body>

</html>