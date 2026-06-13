<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Smart Parking Admin - Violation Categories</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {

            theme: {
                extend: {
                    colors: {
                        "primary": "#1e378a",
                        "accent-orange": "#F59E0B",
                        "accent-emerald": "#10B981",
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

        .sidebar-item-active {
            @apply bg-primary/10 text-primary border-r-4 border-primary;
        }
    </style>
</head>

<body class="bg-background-light  font-display text-slate-900  antialiased">
    <div class="flex min-h-screen">
        <!-- Sidebar Navigation -->
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
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600  hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors"
                    href="1_Admin_Dashboard.php">
                    <span class="material-symbols-outlined text-[22px]">dashboard</span>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors"
                    href="2_Parking_Manager.php">
                    <span class="material-symbols-outlined text-[22px]">manage_accounts</span>
                    <span class="text-sm font-medium">Parking Managers</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors"
                    href="3_Parking_Locations.php">
                    <span class="material-symbols-outlined text-[22px]">location_on</span>
                    <span class="text-sm font-medium">Parking Locations</span>
                </a>
                <a class="fflex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors"
                    href="4_Drivers_Approval.php">
                    <span class="material-symbols-outlined text-[22px]"
                        style="font-variation-settings: 'FILL' 1">verified_user</span>
                    <span class="text-sm font-semibold">Drivers Approval</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors"
                    href="5_Pricing_Rules.php">
                    <span class="material-symbols-outlined text-[22px]">payments</span>
                    <span class="text-sm font-medium">Pricing Rules</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-primary/10 text-primary transition-colors"
                    href="6.1_Violations_AdminPart.php">
                    <span class="material-symbols-outlined text-[22px]">report_problem</span>
                    <span class="text-sm font-medium">Violations</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors"
                    href="7_Reports_AdminPart.html">
                    <span class="material-symbols-outlined text-[22px]">bar_chart</span>
                    <span class="text-sm font-medium">Reports</span>
                </a>
            </nav>
            <div class="p-4 border-t border-slate-200 ">
                <div class="flex items-center gap-3 p-2">
                    <div class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden">
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
        <main class="flex-1 flex flex-col min-h-screen">
            <!-- Top Header -->
            <header
                class="h-20 bg-white  border-b border-slate-200  flex items-center justify-between px-8 sticky top-0 z-10">
                <div class="flex items-center gap-4 text-slate-500 text-sm">
                    <span class="">Admin</span>
                    <span class="material-symbols-outlined text-xs">chevron_right</span>
                    <span class="text-slate-900  font-medium">Violations Management</span>
                </div>
                <div class="flex items-center gap-6">
                    <div class="relative">
                        <span class="material-symbols-outlined text-slate-400">notifications</span>
                        <span
                            class="absolute -top-1 -right-1 w-2 h-2 bg-red-500 rounded-full border-2 border-white "></span>
                    </div>
                    <div class="h-8 w-[1px] bg-slate-200 "></div>
                    <button class="flex items-center gap-2 text-slate-600 hover:text-primary transition-colors">
                        <span class="material-symbols-outlined">settings</span>
                    </button>
                </div>
            </header>
            <!-- Content -->
            <div class="p-8 flex-1">
                <div class="max-w-6xl mx-auto">
                    <!-- Page Header Section -->
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                        <div>
                            <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 ">Violation
                                Categories</h2>
                            <p class="text-slate-500  mt-1">Manage and configure different types of
                                parking violations in the system.</p>
                        </div>
                        <button type="button" onclick="window.location.href='6.2_Violations_AdminPart.php'"
                            class="bg-accent-orange hover:bg-amber-600 text-white font-bold py-3 px-6 rounded-lg transition-all shadow-lg shadow-amber-500/20 flex items-center gap-2">
                            <span class="material-symbols-outlined">add</span>
                            Add Category
                        </button>
                    </div>
                    <!-- Violation Table Card -->
                    <div class="bg-white  rounded-xl shadow-sm border border-slate-200  overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead>
                                    <tr class="bg-slate-50  border-b border-slate-200 ">
                                        <th
                                            class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                                            Category Name</th>
                                        <th
                                            class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                                            Description</th>
                                        <th
                                            class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-right">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">

                                    <?php

                                    include "../db.php";

                                    $query = mysqli_query(
                                        $conn,
                                        "SELECT * FROM violations ORDER BY id DESC"
                                    );

                                    while ($row = mysqli_fetch_assoc($query)) {
                                        ?>

                                        <tr>

                                            <td class="px-6 py-5">
                                                <?php echo $row['category_name']; ?>
                                            </td>

                                            <td class="px-6 py-5">
                                                <?php echo $row['description']; ?>
                                            </td>

                                            <td class="px-6 py-5 text-right">

                                               <a href="6.2_Violations_AdminPart.php?id=<?php echo $row['id']; ?>">

                                                    <button class="p-2 text-primary hover:bg-primary/10 rounded-lg">

                                                        <span class="material-symbols-outlined">
                                                            edit
                                                        </span>

                                                    </button>

                                                </a>

                                                <a href="delete_violation.php?id=<?php echo $row['id']; ?>"
                                                    onclick="return confirm('Delete this category?')">

                                                    <button class="p-2 text-red-500 hover:bg-red-50 rounded-lg">

                                                        <span class="material-symbols-outlined">
                                                            delete
                                                        </span>

                                                    </button>

                                                </a>

                                            </td>

                                        </tr>

                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                        <div
                            class="px-6 py-4 bg-slate-50/50  border-t border-slate-200  flex justify-between items-center">
                            <span class="text-xs text-slate-500">Showing 3 of 3 categories</span>
                            <div class="flex gap-2">
                                <button class="px-3 py-1 border border-slate-200  rounded text-xs disabled:opacity-50"
                                    disabled="">Previous</button>
                                <button class="px-3 py-1 bg-primary text-white rounded text-xs">1</button>
                                <button class="px-3 py-1 border border-slate-200  rounded text-xs">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="mt-auto py-6 px-8 bg-white  border-t border-slate-200  text-center">
                <p class="text-slate-400 text-sm">Smart Parking Reservation &amp; Vehicle Management System – Admin
                    Panel © 2024</p>
            </footer>
        </main>
    </div>
    <!-- Add Category Modal Overlay (Hidden by default in real implementation, visible here for demonstration) -->



</body>

</html>