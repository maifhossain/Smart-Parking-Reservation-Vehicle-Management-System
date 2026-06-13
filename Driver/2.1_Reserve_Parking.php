<?php
include "config.php";

$where = "WHERE status='available'";

if (!empty($_GET['location'])) {
    $location = $conn->real_escape_string($_GET['location']);
    $where .= " AND location LIKE '%$location%'";
}

if (!empty($_GET['date'])) {
    $date = $conn->real_escape_string($_GET['date']);
    $where .= " AND available_date = '$date'";
}

if (!empty($_GET['time_slot'])) {
    $time = $conn->real_escape_string($_GET['time_slot']);
    $where .= " AND time_slot = '$time'";
}

$sql = "SELECT * FROM parking_slots $where";
$result = $conn->query($sql);
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Parking Reservation | Smart Parking System</title>
    <!-- Tailwind CSS v3 CDN with plugins -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />


    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e3b8a', // Deep Blue based on THEME_2 custom_color
                        accent: '#F59E0B',  // Soft Orange
                        success: '#10B981', // Emerald Green
                        background: '#F8FAFC' // Light Gray
                    },
                    borderRadius: {
                        'twelve': '12px', // custom roundness based on THEME_2
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style data-purpose=" custom-animations">
        .card-hover {
            transition: transform 0.2s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="flex min-h-screen bg-background">
    <!-- BEGIN: LeftSidebar -->
    <aside class="w-72 bg-white border-r border-slate-200 flex flex-col min-h-screen sticky top-0">
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
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary text-white shadow-lg shadow-primary/20 transition-all"
                    href="2.1_Reserve_Parking.html">
                    <span class="material-symbols-outlined text-slate-400 group-hover:text-primary">add_circle</span>
                    <span class="font-medium">Reserve Parking</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-slate-50 transition-all group"
                    href="3_History_Driver.html">
                    <span class="material-symbols-outlined text-slate-400 group-hover:text-primary">history</span>
                    <span class="font-medium">History</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-slate-50 transition-all group"
                    href="4.1_Report_Issue_1_Driver.html">
                    <span
                        class="material-symbols-outlined text-slate-400 group-hover:text-primary">report_problem</span>
                    <span class="font-medium">Report Issue</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-slate-50 transition-all group"
                    href="5_Chat_Driver.html">
                    <span class="material-symbols-outlined text-slate-400 group-hover:text-primary">chat_bubble</span>
                    <span class="font-medium">Support Chat</span>
                </a>
            </nav>
        </div>
        <div class="mt-auto p-8 border-t border-slate-100 shrink-0">
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
    <!-- END: LeftSidebar -->
    <!-- BEGIN: MainContent -->
    <main class="flex-1 flex flex-col min-h-screen">
        <!-- BEGIN: Header -->
        <header class="bg-white border-b border-slate-200 px-8 py-6 sticky top-0 z-10" data-purpose="main-header">
            <div class="flex justify-between items-center max-w-7xl mx-auto">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Parking Reservation</h1>
                    <p class="text-slate-500 text-sm mt-1">Search and reserve your parking space easily.</p>
                </div>
                <div class="flex items-center gap-4">
                    <button class="relative p-2 text-slate-400 hover:text-primary transition-colors">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                </div>
            </div>
        </header>
        <!-- END: Header -->
        <!-- BEGIN: ContentArea -->
        <section class="p-8 max-w-7xl mx-auto w-full flex-1">
            <!-- BEGIN: FiltersSection -->
            <div class="mb-10" data-purpose="search-filters">
                <!-- FILTER FORM START -->
                <form method="GET">

                    <div class="mb-10" data-purpose="search-filters">

                        <div
                            class="bg-white p-6 rounded-twelve shadow-sm border border-slate-100 grid grid-cols-1 md:grid-cols-4 gap-6 items-end card-hover">

                            <!-- LOCATION -->
                            <div class="space-y-2">
                                <label class="text-xs font-semibold uppercase">Location</label>
                                <input name="location" class="block w-full border-slate-200 rounded-lg p-2"
                                    placeholder="Select City/Area">
                            </div>

                            <!-- DATE -->
                            <div class="space-y-2">
                                <label class="text-xs font-semibold uppercase">Date</label>
                                <input name="available_date" type="date" class="block w-full border-slate-200 rounded-lg p-2">
                            </div>

                            <!-- TIME -->
                            <div class="space-y-2">
                                <label class="text-xs font-semibold uppercase">Time Slot</label>
                                <select name="time_slot" class="block w-full border-slate-200 rounded-lg p-2">
                                    <option>09:00 AM - 12:00 PM</option>
                                    <option>12:00 PM - 03:00 PM</option>
                                    <option>03:00 PM - 06:00 PM</option>
                                    <option>06:00 PM - 09:00 PM</option>
                                </select>
                            </div>

                            <!-- BUTTON -->
                            <div>
                                <button type="submit" class="w-full bg-orange-500 text-white p-3 rounded-lg">
                                    Search Spaces
                                </button>
                            </div>

                        </div>

                    </div>

                </form>
                <!-- FILTER FORM END -->
                
            </div>
            <!-- END: FiltersSection -->
            <!-- BEGIN: ResultsSection -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <?php while ($row = $result->fetch_assoc()) { ?>

                    <div
                        class="bg-white rounded-twelve overflow-hidden shadow-sm border border-slate-100 flex flex-col card-hover">

                        <!-- IMAGE -->
                        <img src="<?php echo $row['image']; ?>" class="h-40 w-full object-cover" alt="Parking Image">

                        <div class="p-6 flex flex-col flex-1">

                            <!-- SLOT NAME (BOLD) -->
                            <h3 class="font-bold text-xl text-slate-900">
                                <?php echo $row['slot_name']; ?>
                            </h3>

                            <!-- LOCATION -->
                            <p class="text-sm text-slate-500 mt-1">
                                📍 <?php echo $row['location']; ?>
                            </p>

                            <!-- SPACE AVAILABLE -->
                            <p class="text-sm mt-2">
                                🟢 Space Available:
                                <span class="font-semibold">
                                    <?php echo $row['available_spaces']; ?>
                                </span>
                            </p>

                            <!-- PRICE -->
                            <div class="mt-4">
                                <span class="text-2xl font-bold text-slate-900">
                                    $<?php echo $row['price_per_hour']; ?>
                                </span>
                                <span class="text-xs text-slate-400">/ hour</span>
                            </div>

                            <!-- BUTTON -->
                            <form action="book.php" method="POST" class="mt-auto pt-6">
                                <input type="hidden" name="slot_id" value="<?php echo $row['id']; ?>">

                                <button type="submit"
                                    class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-2.5 rounded-twelve transition-all">
                                    Reserve
                                </button>
                            </form>

                        </div>
                    </div>

                <?php } ?>

            </div>
            <!-- END: ResultsSection -->
        </section>
        <!-- END: ContentArea -->
        <!-- BEGIN: Footer -->
        <footer class="bg-slate-100 border-t border-slate-200 p-8" data-purpose="driver-panel-footer">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-slate-500 text-xs font-medium">Smart Parking Reservation &amp; Vehicle Management System
                    – Driver Panel</p>
                <div class="flex gap-6">
                    <a class="text-slate-400 hover:text-primary text-xs transition-colors" href="#">Privacy Policy</a>
                    <a class="text-slate-400 hover:text-primary text-xs transition-colors" href="#">Terms of Service</a>
                    <a class="text-slate-400 hover:text-primary text-xs transition-colors" href="#">Support</a>
                </div>
            </div>
        </footer>
        <!-- END: Footer -->
    </main>
    <!-- END: MainContent -->
</body>

</html>