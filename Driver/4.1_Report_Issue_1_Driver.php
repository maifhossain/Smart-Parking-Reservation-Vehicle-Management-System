<?php
session_start();
include "config.php";



$locations = $conn->query("
SELECT id, parking_name, location
FROM parking_slots
");

if (isset($_POST['issue_category'])) {
    $user_id = 1;

    $location_id = $_POST['location_id'];

    $category = $_POST['issue_category'];

    $description = $_POST['description'];

    $image = "";

    if (!empty($_FILES['issue_image']['name'])) {
        $image =
            time() . "_" .
            $_FILES['issue_image']['name'];

        move_uploaded_file(
            $_FILES['issue_image']['tmp_name'],
            "uploads/" . $image
        );
    }

    $stmt = $conn->prepare("
    INSERT INTO issues
    (
    user_id,
    location_id,
    issue_category,
    description,
    image
    )
    VALUES
    (?,?,?,?,?)
    ");

    $stmt->bind_param(
        "iisss",
        $user_id,
        $location_id,
        $category,
        $description,
        $image
    );

    $stmt->execute();

    header(
        "Location: 4.2_Report_Issue_2_Driver.html"
    );

    exit();
}
?>
<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Report Issue - Smart Parking</title>
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
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-primary-fixed-variant": "#264191",
                        "background": "#f7f9fb",
                        "on-secondary-fixed-variant": "#653e00",
                        "tertiary": "#00311f",
                        "secondary-container": "#fea619",
                        "surface-tint": "#4059aa",
                        "on-secondary-container": "#684000",
                        "surface-container-high": "#e6e8ea",
                        "on-tertiary": "#ffffff",
                        "secondary": "#855300",
                        "on-surface": "#191c1e",
                        "on-tertiary-fixed": "#002113",
                        "error-container": "#ffdad6",
                        "surface-dim": "#d8dadc",
                        "secondary-fixed": "#ffddb8",
                        "on-error": "#ffffff",
                        "primary": "#00236f",
                        "primary-fixed-dim": "#b6c4ff",
                        "surface-bright": "#f7f9fb",
                        "on-background": "#191c1e",
                        "on-error-container": "#93000a",
                        "inverse-surface": "#2d3133",
                        "primary-fixed": "#dce1ff",
                        "on-primary-fixed": "#00164e",
                        "secondary-fixed-dim": "#ffb95f",
                        "inverse-primary": "#b6c4ff",
                        "error": "#ba1a1a",
                        "on-primary": "#ffffff",
                        "surface-container": "#eceef0",
                        "surface-container-low": "#f2f4f6",
                        "surface-variant": "#e0e3e5",
                        "outline-variant": "#c5c5d3",
                        "on-secondary-fixed": "#2a1700",
                        "tertiary-fixed": "#6ffbbe",
                        "inverse-on-surface": "#eff1f3",
                        "surface-container-lowest": "#ffffff",
                        "on-tertiary-container": "#27c38a",
                        "on-tertiary-fixed-variant": "#005236",
                        "on-secondary": "#ffffff",
                        "tertiary-fixed-dim": "#4edea3",
                        "primary-container": "#1e3a8a",
                        "surface-container-highest": "#e0e3e5",
                        "outline": "#757682",
                        "on-primary-container": "#90a8ff",
                        "surface": "#f7f9fb",
                        "tertiary-container": "#004a31",
                        "on-surface-variant": "#444651"
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
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3 {
            font-family: 'Manrope', sans-serif;
        }
    </style>
</head>

<body class="bg-background text-on-surface">
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
                        href="2.1_Reserve_Parking.html">
                        <span
                            class="material-symbols-outlined text-slate-400 group-hover:text-primary">add_circle</span>
                        <span class="font-medium">Reserve Parking</span>
                    </a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-slate-50 transition-all group"
                        href="3_History_Driver.html">
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-primary">history</span>
                        <span class="font-medium">History</span>
                    </a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary text-white shadow-lg shadow-primary/20 transition-all"
                        href="4.1_Report_Issue_1_Driver.html">
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
        <main class="flex-1 flex flex-col min-w-0">
            <!-- TopAppBar -->
            <header
                class="flex justify-between items-center px-8 w-full h-16 bg-white/80  backdrop-blur-xl border-b border-slate-100  shadow-sm sticky top-0 z-40">
                <div class="flex items-center gap-4">
                    <h1 class="font-['Manrope'] font-bold text-blue-900  text-lg">Smart Parking</h1>
                </div>
                <div class="flex items-center gap-6">
                    <div
                        class="hidden md:flex items-center bg-surface-container-low rounded-md px-4 py-1.5 border border-outline-variant/15">
                        <span class="material-symbols-outlined text-outline text-sm" data-icon="search">search</span>
                        <input class="bg-transparent border-none focus:ring-0 text-sm w-48 text-on-surface-variant"
                            placeholder="Search resources..." type="text" />
                    </div>
                    <div class="flex items-center gap-4">
                        <button class="text-slate-500  hover:opacity-80 transition-opacity">
                            <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                        </button>
                        <button class="text-slate-500  hover:opacity-80 transition-opacity">
                            <span class="material-symbols-outlined" data-icon="help_outline">help_outline</span>
                        </button>
                        <div
                            class="w-8 h-8 rounded-full bg-primary-fixed flex items-center justify-center overflow-hidden">
                            <img alt="User Avatar" class="w-full h-full object-cover"
                                data-alt="close-up profile photo of a male professional with a neutral background"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuC0-UGCCRB5lhSLrq8wGI3zIQOgp-yIlWlil4zsFM8Lo6JLvOKzUJ8cFAXUwABSIdT2RQcc8kUCaW3oCamETHTkcdwSFBr0GsR1pITRILt1VCLsrScSbmrePCsUXRfkuKRoA8Qz6Sl9s6hOtZgcNjPwJFeYv0IwGmZAcwQinj9gD-kPgo-w_w0oU0IDFsjsmwNSTOsqHKbtqdSPVfHRaFnUVtPrthf81AoKRU0mV33oD6aLnDP4jqg5S5oZvPMnJ166DKPL88dZq64M" />
                        </div>
                    </div>
                </div>
            </header>
            <!-- Page Content -->
            <div class="p-12 flex-1 w-full">
                <div class="grid grid-cols-12 gap-8">
                    <!-- Form Section -->
                    <div class="col-span-12 lg:col-span-8">
                        <div
                            class="bg-white  rounded-xl p-8 shadow-[0_12px_32px_-4px_rgba(25,28,30,0.04)] border border-white/20">
                            <div class="mb-10">
                                <h2 class="text-2xl font-bold text-primary  mb-2">Report Parking Issue
                                </h2>
                                <p class="text-on-surface-variant text-sm">Encountered an obstacle or a technical
                                    failure?
                                    Let us know and we'll resolve it immediately.</p>
                            </div>
                            <form method="POST" action="" enctype="multipart/form-data" class="space-y-8">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <label
                                            class="text-xs font-bold uppercase tracking-widest text-on-surface-variant ml-1">Select
                                            Location</label>
                                        <div class="relative">
                                            <select name="location_id">

                                                <option value="">Choose parking location</option>

                                                <?php while ($loc = $locations->fetch_assoc()) { ?>

                                                    <option value="<?= $loc['id'] ?>">

                                                        <?= $loc['parking_name'] ?> -
                                                        <?= $loc['location'] ?>

                                                    </option>

                                                <?php } ?>

                                            </select>
                                            <span
                                                class="material-symbols-outlined absolute right-4 top-3 pointer-events-none text-outline"
                                                data-icon="expand_more">expand_more</span>
                                        </div>
                                    </div>
                                    <div class="space-y-2">
                                        <label
                                            class="text-xs font-bold uppercase tracking-widest text-on-surface-variant ml-1">Issue
                                            Category</label>
                                        <div class="relative">
                                            <select name="issue_category"
                                                class="w-full bg-surface-container-low border-none rounded-md py-3 px-4 text-on-surface appearance-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary/20 transition-all outline-none">
                                                <option>Blocked Space</option>
                                                <option>Technical Fault (Sensor/Gate)</option>
                                                <option>Maintenance Required</option>
                                                <option>Security Concern</option>
                                                <option>Other</option>
                                            </select>
                                            <span
                                                class="material-symbols-outlined absolute right-4 top-3 pointer-events-none text-outline"
                                                data-icon="expand_more">expand_more</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-xs font-bold uppercase tracking-widest text-on-surface-variant ml-1">Problem
                                        Description</label>
                                    <textarea name="description"
                                        class="w-full bg-surface-container-low border-none rounded-md py-3 px-4 text-on-surface focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary/20 transition-all outline-none resize-none"
                                        placeholder="Describe the issue in detail..." rows="4"></textarea>
                                </div>
                               <div class="space-y-2">
    <label>Upload Image</label>

    <input
    type="file"
    name="issue_image"
    class="w-full mt-3 border p-2 rounded">

</div>
                                <div class="flex items-center justify-end pt-4">
                                    <button type="submit"
                                        class="px-8 py-3.5 bg-gradient-to-br from-secondary to-secondary-container text-white font-bold rounded-full">
                                        <span>Submit Report</span>
                                        <span class="material-symbols-outlined text-sm" data-icon="send">send</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Side Info Panels -->
                    <div class="col-span-12 lg:col-span-4 space-y-6">
                        <!-- Resolution Info Card -->
                        <div class="bg-primary text-white rounded-xl p-8 relative overflow-hidden">
                            <div class="relative z-10">
                                <span class="material-symbols-outlined text-tertiary-fixed text-4xl mb-4"
                                    data-icon="verified_user"
                                    style="font-variation-settings: 'FILL' 1;">verified_user</span>
                                <h3 class="text-xl font-bold mb-4">Priority Review</h3>
                                <p class="text-primary-fixed-dim text-sm leading-relaxed mb-6">Your issue will be
                                    reviewed
                                    by the parking manager. We aim to address all safety and technical reports within 15
                                    minutes.</p>
                                <div
                                    class="bg-primary-container/50 rounded-lg p-4 backdrop-blur-sm border border-white/5">
                                    <div class="flex gap-3">
                                        <span class="material-symbols-outlined text-secondary-fixed"
                                            data-icon="tips_and_updates">tips_and_updates</span>
                                        <p class="text-xs leading-tight">Tip: You may upload a photo for faster
                                            resolution
                                            by our technical team.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Decorative element -->
                            <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-white/5 rounded-full blur-3xl"></div>
                        </div>
                        <!-- Status Timeline Preview -->
                        <div class="bg-surface-container-low rounded-xl p-8 border border-outline-variant/10">
                            <h3 class="text-sm font-bold uppercase tracking-widest text-on-surface-variant mb-6">Recent
                                Reports</h3>
                            <div class="space-y-6">
                                <div class="flex gap-4">
                                    <div class="flex flex-col items-center">
                                        <div
                                            class="w-2 h-2 rounded-full bg-tertiary-fixed-dim ring-4 ring-tertiary-fixed-dim/20">
                                        </div>
                                        <div class="w-0.5 h-12 bg-outline-variant/30 mt-2"></div>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-bold text-on-surface">Gate Sensor Failure</p>
                                        <p class="text-xs text-on-surface-variant">Resolved • 2 hours ago</p>
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex flex-col items-center">
                                        <div
                                            class="w-2 h-2 rounded-full bg-secondary-container ring-4 ring-secondary-container/20">
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-bold text-on-surface">Electric Charger Offline</p>
                                        <p class="text-xs text-on-surface-variant">In Progress • 4 hours ago</p>
                                    </div>
                                </div>
                            </div>
                            <button
                                class="w-full mt-8 py-2 text-xs font-bold text-primary hover:text-on-primary-fixed-variant transition-colors">View
                                All History</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="flex justify-center items-center w-full py-6 bg-slate-50  border-t border-slate-200 ">
                <span class="font-['Inter'] text-[10px] uppercase tracking-[0.2em] font-semibold text-slate-400">
                    Smart Parking Reservation &amp; Vehicle Management System – Driver Panel © 2024
                </span>
            </footer>
        </main>


    </div>



</body>

</html>