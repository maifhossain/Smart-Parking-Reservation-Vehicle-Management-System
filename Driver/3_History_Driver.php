<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include "config.php";
$user_id = 1;

$query = "SELECT b.*, 
       s.parking_name,
       s.location,
       s.price_per_hour
FROM bookings b
JOIN parking_slots s ON b.slot_id = s.id
WHERE b.user_id = ?
ORDER BY b.id DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Parking History - Smart Parking System</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@300;400;500;600;700&amp;display=swap"
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
                        "tertiary-fixed": "#6ffbbe",
                        "on-error-container": "#93000a",
                        "on-primary-container": "#90a8ff",
                        "inverse-on-surface": "#eff1f3",
                        "surface-container-highest": "#e0e3e5",
                        "primary": "#00236f",
                        "on-secondary": "#ffffff",
                        "secondary-container": "#fea619",
                        "surface-container": "#eceef0",
                        "surface-container-low": "#f2f4f6",
                        "surface-variant": "#e0e3e5",
                        "on-secondary-fixed": "#2a1700",
                        "outline": "#757682",
                        "on-secondary-fixed-variant": "#653e00",
                        "on-primary": "#ffffff",
                        "inverse-primary": "#b6c4ff",
                        "on-error": "#ffffff",
                        "on-tertiary-fixed": "#002113",
                        "tertiary-fixed-dim": "#4edea3",
                        "tertiary": "#00311f",
                        "surface-bright": "#f7f9fb",
                        "secondary": "#855300",
                        "surface": "#f7f9fb",
                        "background": "#f7f9fb",
                        "primary-container": "#1e3a8a",
                        "surface-container-lowest": "#ffffff",
                        "secondary-fixed-dim": "#ffb95f",
                        "inverse-surface": "#2d3133",
                        "surface-container-high": "#e6e8ea",
                        "primary-fixed-dim": "#b6c4ff",
                        "on-tertiary": "#ffffff",
                        "primary-fixed": "#dce1ff",
                        "on-tertiary-fixed-variant": "#005236",
                        "on-primary-fixed-variant": "#264191",
                        "surface-tint": "#4059aa",
                        "outline-variant": "#c5c5d3",
                        "on-primary-fixed": "#00164e",
                        "on-surface-variant": "#444651",
                        "on-tertiary-container": "#27c38a",
                        "error-container": "#ffdad6",
                        "surface-dim": "#d8dadc",
                        "secondary-fixed": "#ffddb8",
                        "on-background": "#191c1e",
                        "on-secondary-container": "#684000",
                        "on-surface": "#191c1e",
                        "tertiary-container": "#004a31",
                        "error": "#ba1a1a"
                    },
                    fontFamily: {
                        "headline": ["Manrope"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9fb;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .editorial-shadow {
            box-shadow: 0 20px 40px rgba(25, 28, 30, 0.06);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
        }
    </style>
</head>

<body class="text-on-surface">
    <div class="flex min-h-screen">

        <!-- SideNavBar -->
        <aside class="w-72 shrink-0 bg-white border-r border-slate-200 flex flex-col sticky top-0 h-screen">
            <div class="p-8">
                <div class="flex items-center gap-3 mb-10">
                    <div class="bg-primary rounded-xl p-2 text-white">
                        <span class="material-symbols-outlined text-2xl">local_parking</span>
                    </div>
                    <div>
                        <h1 class="text-primary font-bold text-lg leading-tight">Smart Parking</h1>
                        <p class="text-slate-500 text-xs font-medium uppercase tracking-wider">Driver Panel</p>
                    </div>
                </div>
                <nav class="flex flex-col gap-2">
                    <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-slate-50 transition-all group"
                        href="1_Driver_Dashboard.html">
                        <span class="material-symbols-outlined">dashboard</span>
                        <span class="font-medium">Dashboard</span>
                    </a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-slate-50 transition-all group"
                        href="2.1_Reserve_Parking.php">
                        <span
                            class="material-symbols-outlined text-slate-400 group-hover:text-primary">add_circle</span>
                        <span class="font-medium">Reserve Parking</span>
                    </a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary text-white shadow-lg shadow-primary/20 transition-all"
                        href="3_History_Driver.php">
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-primary">history</span>
                        <span class="font-medium">History</span>
                    </a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-slate-50 transition-all group"
                        href="4.1_Report_Issue_1_Driver.php">
                        <span
                            class="material-symbols-outlined text-slate-400 group-hover:text-primary">report_problem</span>
                        <span class="font-medium">Report Issue</span>
                    </a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-slate-50 transition-all group"
                        href="5_Chat_Driver.html">
                        <span
                            class="material-symbols-outlined text-slate-400 group-hover:text-primary">chat_bubble</span>
                        <span class="font-medium">Support Chat</span>
                    </a>
                </nav>
            </div>
            <div class="mt-auto p-8 border-t border-slate-100">
                <div class="flex items-center gap-3">
                    <img alt="Profile" class="w-10 h-10 rounded-full object-cover"
                        data-alt="Professional driver profile photo portrait"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCp8iXIrOXCHI83d1Z0wnGiJ1CH8v7uVLdaX6zlW-OrNKzhUZ9CrXTe3zeE6COsVyvy48W3vQx0SzsfledeBEoszaQJWbgEVUvt1K67dpmfJrQ_kpLs7meaCoYcjHq5KOQ1_Ug2LmQvvdS8zfkg4mWgPukpjZ9Pf8Bf9_B3cyX1uLN_iE61-l0FZCyxPog3LON4EGQe1TydAMV0_5hbSGMXd0jVzlbG7FCvkE9Xg7jDm8nor0KV87f3iCenvT3JcwmWfmEokryJs8Uh" />
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Alex Johnson</p>
                        <p class="text-xs text-slate-500">Gold Member</p>
                    </div>
                </div>
            </div>
        </aside>
        <!-- Main Content Area -->
        <main class="flex-1 min-w-0 flex flex-col">
            <!-- TopNavBar -->
            <header
                class="sticky top-0 z-30 flex flex-col justify-center px-8 py-6 w-full bg-white/80  backdrop-blur-xl shadow-sm dark:shadow-none">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="font-['Manrope'] text-2xl font-bold text-blue-900 ">Parking History
                        </h2>
                        <p class="font-['Inter'] text-sm text-slate-500">View your previous parking reservations and
                            download receipts.</p>
                    </div>
                    <div class="flex items-center gap-6">
                        <div class="flex items-center gap-4">
                            <button class="p-2 text-slate-500 hover:opacity-70 transition-opacity">
                                <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                            </button>
                            <button class="p-2 text-slate-500 hover:opacity-70 transition-opacity">
                                <span class="material-symbols-outlined" data-icon="settings">settings</span>
                            </button>
                        </div>
                        <button
                            class="px-6 py-2.5 bg-gradient-to-r from-primary to-primary-container text-white rounded-xl font-medium text-sm shadow-lg shadow-primary/20 transition-transform active:scale-95">
                            Download Receipts
                        </button>
                    </div>
                </div>
            </header>
            <!-- Canvas Area -->
            <div class="p-8 space-y-12">
                <!-- Reservation Summary Cards (Bento-lite) -->
                <section class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div
                        class="editorial-shadow glass-card p-6 rounded-xl border-b-2 border-primary/5 relative overflow-hidden">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-primary-fixed rounded-lg text-primary">
                                <span class="material-symbols-outlined" data-icon="calendar_today">calendar_today</span>
                            </div>
                            <span
                                class="text-label-sm font-semibold text-primary uppercase tracking-wider opacity-50">Usage</span>
                        </div>
                        <h3 class="text-display-sm font-headline text-3xl font-bold text-primary mb-1">12</h3>
                        <p class="text-body-md text-slate-500">Total Visits</p>
                        <div class="absolute -right-4 -bottom-4 opacity-5 text-primary">
                            <span class="material-symbols-outlined text-8xl"
                                data-icon="directions_car">directions_car</span>
                        </div>
                    </div>
                    <div
                        class="editorial-shadow glass-card p-6 rounded-xl border-b-2 border-secondary/5 relative overflow-hidden">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-secondary-fixed rounded-lg text-secondary">
                                <span class="material-symbols-outlined" data-icon="payments">payments</span>
                            </div>
                            <span
                                class="text-label-sm font-semibold text-secondary uppercase tracking-wider opacity-50">Spending</span>
                        </div>
                        <h3 class="text-display-sm font-headline text-3xl font-bold text-secondary mb-1">৳1,450</h3>
                        <p class="text-body-md text-slate-500">Total Spent</p>
                        <div class="absolute -right-4 -bottom-4 opacity-5 text-secondary">
                            <span class="material-symbols-outlined text-8xl"
                                data-icon="receipt_long">receipt_long</span>
                        </div>
                    </div>
                    <div
                        class="editorial-shadow glass-card p-6 rounded-xl border-b-2 border-tertiary-container/5 relative overflow-hidden">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-tertiary-fixed rounded-lg text-on-tertiary-fixed-variant">
                                <span class="material-symbols-outlined" data-icon="history">history</span>
                            </div>
                            <span
                                class="text-label-sm font-semibold text-on-tertiary-fixed-variant uppercase tracking-wider opacity-50">Latest</span>
                        </div>
                        <h3
                            class="text-display-sm font-headline text-3xl font-bold text-on-tertiary-fixed-variant mb-1">
                            22
                            March</h3>
                        <p class="text-body-md text-slate-500">Last Reservation</p>
                        <div class="absolute -right-4 -bottom-4 opacity-5 text-on-tertiary-fixed-variant">
                            <span class="material-symbols-outlined text-8xl" data-icon="update">update</span>
                        </div>
                    </div>
                </section>
                <!-- Parking History Table Section -->
                <section class="editorial-shadow bg-surface-container-lowest rounded-xl overflow-hidden">
                    <div class="px-8 py-6 flex justify-between items-center border-b border-surface-container">
                        <h3 class="font-headline text-xl font-bold text-primary">Recent Transactions</h3>
                        <div class="flex gap-2">
                            <div class="relative">
                                <input
                                    class="pl-10 pr-4 py-2 bg-surface-container-highest border-none rounded-lg text-sm focus:ring-2 focus:ring-primary w-64"
                                    placeholder="Search locations..." type="text" />
                                <span class="material-symbols-outlined absolute left-3 top-2 text-slate-400 text-sm"
                                    data-icon="search">search</span>
                            </div>
                            <button
                                class="p-2 bg-surface-container hover:bg-surface-container-high rounded-lg transition-colors">
                                <span class="material-symbols-outlined text-slate-600"
                                    data-icon="filter_list">filter_list</span>
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-surface-container-low">
                                    <th
                                        class="px-8 py-4 font-headline text-sm font-bold text-primary uppercase tracking-widest opacity-70">
                                        Location</th>
                                    <th
                                        class="px-8 py-4 font-headline text-sm font-bold text-primary uppercase tracking-widest opacity-70">
                                        Date</th>
                                    <th
                                        class="px-8 py-4 font-headline text-sm font-bold text-primary uppercase tracking-widest opacity-70">
                                        Duration</th>
                                    <th
                                        class="px-8 py-4 font-headline text-sm font-bold text-primary uppercase tracking-widest opacity-70">
                                        Price</th>
                                    <th
                                        class="px-8 py-4 font-headline text-sm font-bold text-primary uppercase tracking-widest opacity-70 text-right">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <tr>

                                        <td class="px-8 py-6">
                                            <div class="flex items-center gap-4">
                                                <div
                                                    class="w-10 h-10 rounded-lg bg-primary-fixed flex items-center justify-center text-primary">
                                                    <span class="material-symbols-outlined">local_parking</span>
                                                </div>

                                                <div>
                                                    <p class="font-bold text-on-surface">
                                                        <?= $row['parking_name'] ?>
                                                    </p>
                                                    <p class="text-xs text-slate-500">
                                                        <?= $row['location'] ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-8 py-6 text-sm text-slate-600">
                                            <?= $row['booking_date'] ?>
                                        </td>

                                        <td class="px-8 py-6">
                                            <span class="px-3 py-1 bg-surface-container text-xs rounded-full">
                                                <?= $row['time_slot'] ?>
                                            </span>
                                        </td>

                                        <td class="px-8 py-6 font-bold text-primary">
                                            ৳<?= $row['price_per_hour'] ?>
                                        </td>

                                        <td class="px-8 py-6 text-right">
                                            <button class="px-4 py-2 bg-secondary-container rounded-lg text-xs font-bold">
                                                Download Receipt
                                            </button>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>


                        </table>
                    </div>
                    <div class="px-8 py-6 bg-surface-container-low flex justify-between items-center">
                        <p class="text-xs text-slate-500 font-medium italic">Showing 3 of 12 reservations</p>
                        <div class="flex gap-2">
                            <button
                                class="w-8 h-8 flex items-center justify-center rounded-lg bg-surface-container-highest text-primary disabled:opacity-30">
                                <span class="material-symbols-outlined text-sm"
                                    data-icon="chevron_left">chevron_left</span>
                            </button>
                            <button
                                class="w-8 h-8 flex items-center justify-center rounded-lg bg-primary text-white text-xs font-bold">1</button>
                            <button
                                class="w-8 h-8 flex items-center justify-center rounded-lg bg-surface-container text-on-surface text-xs font-bold">2</button>
                            <button
                                class="w-8 h-8 flex items-center justify-center rounded-lg bg-surface-container-highest text-primary">
                                <span class="material-symbols-outlined text-sm"
                                    data-icon="chevron_right">chevron_right</span>
                            </button>
                        </div>
                    </div>
                </section>
                <!-- Bottom Accents/Status (Optional Editorial Touch) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div
                        class="bg-tertiary-fixed/30 p-8 rounded-xl border border-tertiary-fixed/50 flex gap-6 items-center">
                        <div
                            class="w-16 h-16 rounded-full bg-tertiary-fixed flex items-center justify-center text-on-tertiary-fixed">
                            <span class="material-symbols-outlined text-3xl" data-icon="verified">verified</span>
                        </div>
                        <div>
                            <h4 class="font-headline font-bold text-on-tertiary-fixed text-lg">Identity Verified</h4>
                            <p class="text-on-tertiary-fixed-variant text-sm opacity-80">Your vehicle profile is fully
                                verified for seamless express entry at all smart parking locations.</p>
                        </div>
                    </div>
                    <div
                        class="bg-surface-container-highest p-8 rounded-xl flex items-center justify-center border border-surface-variant group cursor-pointer hover:bg-surface-container-high transition-colors">
                        <div class="text-center">
                            <span
                                class="material-symbols-outlined text-primary text-4xl mb-2 block group-hover:scale-110 transition-transform"
                                data-icon="add_circle">add_circle</span>
                            <p class="font-bold text-primary">Book New Parking Slot</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer
                class="flex justify-center items-center w-full py-6 mt-auto border-t border-slate-100  bg-slate-50 ">
                <div class="text-center px-8">
                    <p class="font-['Inter'] text-xs font-medium tracking-wide text-slate-400">
                        Smart Parking Reservation &amp; Vehicle Management System – Driver Panel
                    </p>
                    <div class="flex justify-center gap-6 mt-2">
                        <a class="text-xs text-slate-400 hover:text-blue-700 transition-colors" href="#">Privacy
                            Policy</a>
                        <a class="text-xs text-slate-400 hover:text-blue-700 transition-colors" href="#">Terms of
                            Service</a>
                    </div>
                </div>
            </footer>
        </main>

    </div>

</body>

</html>