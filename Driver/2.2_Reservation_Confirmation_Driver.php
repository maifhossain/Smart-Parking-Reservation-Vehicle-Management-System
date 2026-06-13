<?php
session_start();
include "config.php";

if (!isset($_SESSION['pending_booking'])) {
    echo "No booking found!";
    exit;
}

$slot_id = $_SESSION['pending_booking']['slot_id'];

$sql = "SELECT * FROM parking_slots WHERE id=$slot_id";
$result = $conn->query($sql);

if (!$result || $result->num_rows == 0) {
    echo "Slot not found!";
    exit;
}

$slot = $result->fetch_assoc();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Reservation Confirmation - Smart Parking</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@300;400;500;600&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-primary-fixed-variant": "#264191",
                        "on-tertiary-fixed": "#002113",
                        "primary": "#00236f",
                        "on-tertiary-fixed-variant": "#005236",
                        "on-tertiary": "#ffffff",
                        "secondary-container": "#fea619",
                        "tertiary": "#00311f",
                        "on-primary-container": "#90a8ff",
                        "inverse-primary": "#b6c4ff",
                        "on-primary-fixed": "#00164e",
                        "surface-tint": "#4059aa",
                        "error": "#ba1a1a",
                        "primary-fixed": "#dce1ff",
                        "surface-bright": "#f7f9fb",
                        "error-container": "#ffdad6",
                        "inverse-surface": "#2d3133",
                        "inverse-on-surface": "#eff1f3",
                        "on-surface-variant": "#444651",
                        "on-secondary-fixed-variant": "#653e00",
                        "outline-variant": "#c5c5d3",
                        "surface-dim": "#d8dadc",
                        "secondary-fixed": "#ffddb8",
                        "surface-container-low": "#f2f4f6",
                        "on-error-container": "#93000a",
                        "secondary-fixed-dim": "#ffb95f",
                        "on-secondary-container": "#684000",
                        "on-surface": "#191c1e",
                        "on-error": "#ffffff",
                        "surface-variant": "#e0e3e5",
                        "on-primary": "#ffffff",
                        "surface-container-high": "#e6e8ea",
                        "on-secondary-fixed": "#2a1700",
                        "on-background": "#191c1e",
                        "surface-container": "#eceef0",
                        "surface-container-highest": "#e0e3e5",
                        "background": "#f7f9fb",
                        "outline": "#757682",
                        "primary-fixed-dim": "#b6c4ff",
                        "on-secondary": "#ffffff",
                        "tertiary-fixed-dim": "#4edea3",
                        "primary-container": "#1e3a8a",
                        "tertiary-fixed": "#6ffbbe",
                        "tertiary-container": "#004a31",
                        "on-tertiary-container": "#27c38a",
                        "secondary": "#855300",
                        "surface": "#f7f9fb",
                        "surface-container-lowest": "#ffffff"
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
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }

        .tonal-depth {
            background: linear-gradient(to bottom, rgba(247, 249, 251, 0.7), rgba(247, 249, 251, 0.4));
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(197, 197, 211, 0.2);
        }

        .soft-lift {
            box-shadow: 0 12px 32px -4px rgba(25, 28, 30, 0.06);
        }
    </style>
</head>

<body class="bg-background font-body text-on-surface">
    <!-- Sidebar Navigation -->
    <aside class="w-72 bg-white border-r border-slate-200 flex flex-col sticky top-0 h-screen">
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
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary text-white shadow-lg shadow-primary/20 transition-all"
                    href="1_Driver_Dashboard.html">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="font-medium">Dashboard</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-slate-50 transition-all group"
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
    <main class="ml-64 min-h-screen flex flex-col">
        <!-- Top Navigation -->
        <header
            class="flex items-center justify-between px-8 w-full h-20 bg-[#f7f9fb]/70 backdrop-blur-xl sticky top-0 z-30">
            <div class="flex items-center gap-2">
                <span class="text-primary font-headline font-extrabold text-lg">Smart Parking</span>
            </div>
            <div class="flex items-center gap-6">
                <button class="text-slate-500 hover:opacity-80 transition-opacity">
                    <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                </button>
                <div class="flex items-center gap-3 pl-4 border-l border-outline-variant/30">
                    <span class="text-sm font-medium text-on-surface">Alex Thompson</span>
                    <span class="material-symbols-outlined text-primary"
                        data-icon="account_circle">account_circle</span>
                </div>
            </div>
        </header>
        <!-- Canvas Container -->
        <div class="flex-1 px-12 py-10 max-w-7xl mx-auto w-full">
            <!-- Page Header -->
            <div class="mb-10">
                <h2 class="text-4xl font-extrabold font-headline text-primary tracking-tight mb-2">Reservation
                    Confirmation</h2>
                <p class="text-on-surface-variant text-lg max-w-2xl">Review your parking reservation details before
                    confirming.</p>
            </div>
            <div class="grid grid-cols-12 gap-8 items-start">
                <!-- Main Confirmation Card (8 cols) -->
                <div class="col-span-8">
                    <div class="glass-panel soft-lift rounded-xl overflow-hidden">
                        <!-- Card Header Image -->
                        <div class="h-48 w-full relative">
                            <img alt="Parking Garage" class="w-full h-full object-cover"
                                data-alt="modern luxury underground parking garage with bright LED lighting and clean gray concrete floor"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCRMh7BnL_cB-sVAnQXWALHrAyEOMqiX2zqXdqI6h42WzcWGmva_YPtviYnzoM54SOwSHqgIv3uoYZi9CIsKb2rOfR6ehCdeEQpxo4SixY5sbnNFQkHpNh3mQzZAcQYc6m15B9FVjzpL8n8Zl-vAF9rJRmp-yDYbSADK1vzd6axIsANudDJNTSzH-9ZGZTcxsQuzD_Ltfey1_EW-61N8dEwqlk9QJUewetcUnYNc0qbaDA5ukc_eNCuQlMD6YZclX0cte7fE8sEp7M" />
                            <div class="absolute top-4 right-4">
                                <span
                                    class="bg-tertiary-container text-on-tertiary-container px-4 py-1.5 rounded-full text-xs font-bold font-label flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[14px]" data-icon="check_circle"
                                        style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                    Reserved Slot Available
                                </span>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="p-8 space-y-8">
                            <div class="grid grid-cols-2 gap-x-12 gap-y-8">
                                <!-- Location -->
                                <div class="flex items-start gap-4">
                                    <div class="bg-surface-container-low p-3 rounded-lg text-primary">
                                        <span class="material-symbols-outlined"
                                            data-icon="location_on">location_on</span>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-label text-outline uppercase tracking-widest mb-1">
                                            Location</p>
                                        <h3 class="font-headline font-bold text-lg text-on-surface"><?= $slot['location'] ?></h3>
                                    </div>
                                </div>
                                <!-- Time -->
                                <div class="flex items-start gap-4">
                                    <div class="bg-surface-container-low p-3 rounded-lg text-primary">
                                        <span class="material-symbols-outlined" data-icon="schedule">schedule</span>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-label text-outline uppercase tracking-widest mb-1">
                                            Time &amp; Date</p>
                                        <h3 class="font-headline font-bold text-lg text-on-surface"><?= $slot['available_date'] ?></h3>
                                        <p class="text-sm text-on-surface-variant"><?= $slot['time_slot'] ?></p>
                                    </div>
                                </div>
                                <!-- Price -->
                                <div class="flex items-start gap-4">
                                    <div class="bg-surface-container-low p-3 rounded-lg text-primary">
                                        <span class="material-symbols-outlined" data-icon="payments">payments</span>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-label text-outline uppercase tracking-widest mb-1">
                                            Total Price</p>
                                        <h3 class="font-headline font-bold text-lg text-on-surface">৳<?= $slot['price'] ?> <span
                                                class="text-sm font-normal text-outline">/ 2 Hours</span></h3>
                                    </div>
                                </div>
                                <!-- Vehicle -->
                                <div class="flex items-start gap-4">
                                    <div class="bg-surface-container-low p-3 rounded-lg text-primary">
                                        <span class="material-symbols-outlined"
                                            data-icon="directions_car">directions_car</span>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-label text-outline uppercase tracking-widest mb-1">
                                            Vehicle ID</p>
                                        <h3 class="font-headline font-bold text-lg text-on-surface">DHAKA-METRO-KA-1234
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Divider-less separation -->
                            <div class="bg-surface-container-low/50 rounded-xl p-6 flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <span class="material-symbols-outlined text-outline" data-icon="info">info</span>
                                    <p class="text-sm text-on-surface-variant italic">A digital ticket will be sent to
                                        your registered mobile number upon confirmation.</p>
                                </div>
                            </div>
                            <!-- Buttons -->
                            <div class="flex items-center gap-4 pt-4">
                                <form action="book.php" method="POST">
    <input type="hidden" name="slot_id" value="<?= $slot['id'] ?>">
    
    <button type="submit"
        class="flex-1 bg-secondary-container text-on-secondary-container py-4 rounded-xl font-bold text-lg">
        Confirm Reservation
    </button>
</form>
                                <button type="button"
    class="flex-1 border border-outline-variant/40 text-on-surface-variant py-4 rounded-xl font-headline font-semibold text-lg hover:bg-surface-variant/20 transition-all active:scale-95"
    onclick="location.href='2.1_Reserve_Parking.php'">
    Back to Reservation
</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Summary Side Panel (4 cols) -->
                <aside class="col-span-4 space-y-6">
                    <div class="bg-surface-container-low rounded-xl p-8 space-y-6">
                        <h4 class="font-headline font-bold text-xl text-primary flex items-center gap-2">
                            <span class="material-symbols-outlined" data-icon="analytics">analytics</span>
                            Spot Summary
                        </h4>
                        <div class="space-y-4">
                            <!-- Slot Details -->
                            <div class="bg-white rounded-lg p-5 flex items-center justify-between soft-lift">
                                <div>
                                    <p class="text-[10px] font-label text-outline uppercase tracking-widest">Parking
                                        Slot</p>
                                    <p class="font-headline font-extrabold text-2xl text-primary"><?= $slot['slot_number'] ?></p>
                                </div>
                                <div class="text-right">
                                    <p class="text-[10px] font-label text-outline uppercase tracking-widest">Zone</p>
                                    <p class="font-headline font-bold text-lg text-on-surface"><?= $slot['zone'] ?></p>
                                </div>
                            </div>
                            <!-- Duration -->
                            <div class="bg-white rounded-lg p-5 flex items-center justify-between soft-lift">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="h-10 w-10 rounded-full bg-primary-fixed flex items-center justify-center text-primary">
                                        <span class="material-symbols-outlined" data-icon="timer">timer</span>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-label text-outline uppercase tracking-widest">Est.
                                            Duration</p>
                                        <p class="font-headline font-bold text-on-surface">2 Hours 00 Mins</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Map Mini Visual -->
                            <div class="rounded-lg overflow-hidden h-32 relative group cursor-pointer">
                                <img alt="Map Location"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                    data-alt="abstract architectural blueprint map of a parking complex with clean blue lines"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAWIPo0yZVbq3ABAnBRwYgUxfS34O_cI5x1rAo1ibD2V6iLQ5aZyUz-Hgn_LxQt5OLkGQT1T0x5dwgb1XeKq56BtEqMFpx0JciSmvGrOX_0KqP0XF4Jo456CMaRRQdZ-fD_io-D5sEQW6kwT_zdE1CE6ZJCvdE93OaY-rhBb-uG4rb9LRP4Ttqh2Y__4iovZecd6h8QD0bT3P-GKNl5zkTTjTac5uX0ebwPYIFCBpFCQwrfKa8iSJl3iv8XeShiMshwnDSMIynfctU" />
                                <div class="absolute inset-0 bg-primary/20 flex items-center justify-center">
                                    <span
                                        class="bg-white/90 px-3 py-1.5 rounded-full text-xs font-bold text-primary shadow-sm flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[16px]" data-icon="map">map</span>
                                        View Map
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Mini Visual Icons -->
                        <div class="flex justify-center gap-8 pt-4 opacity-40">
                            <span class="material-symbols-outlined text-4xl" data-icon="garage">garage</span>
                            <span class="material-symbols-outlined text-4xl"
                                data-icon="electric_car">electric_car</span>
                            <span class="material-symbols-outlined text-4xl" data-icon="security">security</span>
                        </div>
                    </div>
                    <!-- Trust Badge -->
                    <div class="px-4 text-center">
                        <p class="text-xs text-outline leading-relaxed">Secure payment and guaranteed slot placement are
                            handled via our encrypted Smart Parking core.</p>
                    </div>
                </aside>
            </div>
        </div>
        <!-- Footer -->
        <footer class="w-full py-6 ml-64 w-[calc(100%-16rem)] flex justify-center items-center opacity-60">
            <p class="font-inter text-xs tracking-wide uppercase text-[#1E3A8A]">
                Smart Parking Reservation &amp; Vehicle Management System – Driver Panel
            </p>
        </footer>
    </main>
</body>

</html>