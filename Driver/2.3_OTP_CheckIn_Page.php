<?php
session_start();

if (!isset($_SESSION['otp'])) {
    echo "OTP not found in session";
}
?>

<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>OTP Check-in Verification | Premium Valet</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Manrope:wght@600;700;800&amp;display=swap"
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
                        "on-secondary": "#ffffff",
                        "primary-container": "#5c3800",
                        "inverse-surface": "#2d3133",
                        "inverse-on-surface": "#eff1f3",
                        "inverse-primary": "#ffb95f",
                        "secondary-fixed-dim": "#b6c4ff",
                        "outline": "#757682",
                        "on-primary": "#ffffff",
                        "on-error-container": "#93000a",
                        "on-surface": "#191c1e",
                        "error": "#ba1a1a",
                        "on-secondary-fixed": "#00164e",
                        "on-primary-fixed": "#2a1700",
                        "on-tertiary-container": "#27c38a",
                        "on-surface-variant": "#444651",
                        "primary-fixed": "#ffddb8",
                        "on-primary-fixed-variant": "#653e00",
                        "on-error": "#ffffff",
                        "surface": "#f7f9fb",
                        "on-primary-container": "#ef9900",
                        "surface-container-lowest": "#ffffff",
                        "surface-dim": "#d8dadc",
                        "secondary": "#4059aa",
                        "on-tertiary-fixed": "#002113",
                        "surface-container-highest": "#e0e3e5",
                        "surface-bright": "#f7f9fb",
                        "background": "#f7f9fb",
                        "primary": "#3e2500",
                        "surface-container-low": "#f2f4f6",
                        "on-tertiary-fixed-variant": "#005236",
                        "on-secondary-fixed-variant": "#264191",
                        "surface-container-high": "#e6e8ea",
                        "tertiary": "#00311f",
                        "secondary-fixed": "#dce1ff",
                        "tertiary-container": "#004a31",
                        "surface-tint": "#855300",
                        "tertiary-fixed-dim": "#4edea3",
                        "surface-variant": "#e0e3e5",
                        "tertiary-fixed": "#6ffbbe",
                        "error-container": "#ffdad6",
                        "secondary-container": "#8fa7fe",
                        "primary-fixed-dim": "#ffb95f",
                        "on-secondary-container": "#1d3989",
                        "on-background": "#191c1e",
                        "surface-container": "#eceef0",
                        "on-tertiary": "#ffffff",
                        "outline-variant": "#c5c5d3"
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

        .glass-effect {
            background: rgba(143, 167, 254, 0.15);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        .metallic-gradient {
            background: linear-gradient(135deg, #ef9900 0%, #855300 100%);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9fb;
        }

        h1,
        h2,
        h3,
        .font-headline {
            font-family: 'Manrope', sans-serif;
        }
    </style>
</head>

<body class="bg-surface text-on-surface antialiased">
    <!-- SideNavBar Shell -->
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
    <!-- TopNavBar Shell -->
    <header
        class="flex items-center justify-between px-8 w-full sticky top-0 z-40 ml-64 max-w-[calc(100%-16rem)] bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl h-20 shadow-sm">
        <div class="flex flex-col">
            <h1 class="text-lg font-bold text-slate-900 dark:text-white font-headline leading-tight">OTP Check-in
                Verification</h1>
            <p class="text-xs text-on-surface-variant font-medium">Verify your reservation to complete parking check-in.
            </p>
        </div>
        <div class="flex items-center gap-6">
            <div class="flex items-center gap-4">
                <button
                    class="p-2 text-on-surface-variant hover:bg-surface-container-low rounded-full transition-colors">
                    <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                </button>
                <button
                    class="p-2 text-on-surface-variant hover:bg-surface-container-low rounded-full transition-colors">
                    <span class="material-symbols-outlined" data-icon="settings">settings</span>
                </button>
            </div>
            <div class="h-8 w-px bg-outline-variant/30"></div>
            <button
                class="text-sm font-semibold text-secondary-container bg-on-secondary-container/10 px-4 py-2 rounded-lg hover:bg-on-secondary-container/20 transition-all">
                Support
            </button>
        </div>
    </header>
    <!-- Main Content Canvas -->
    <main class="ml-64 p-12 min-h-[calc(100vh-160px)] max-w-[calc(100%-16rem)]">
        <div class="max-w-6xl mx-auto">
            <!-- Grid Layout -->
            <div class="grid grid-cols-12 gap-8 items-start">
                <!-- Left Section: OTP Form -->
                <div class="col-span-12 lg:col-span-7">
                    <div
                        class="bg-surface-container-lowest rounded-xl p-10 shadow-[0_20px_40px_rgba(30,58,138,0.05)] border-none relative overflow-hidden">
                        <!-- Subtle glass decorative element -->
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-secondary/5 rounded-full blur-3xl"></div>
                        <div class="relative z-10">

                            <div style="padding:10px;background:#000;color:#fff">
                                DEBUG OTP: <?= $_SESSION['otp'] ?? 'NOT SET' ?>
                            </div>

                            
                            <h2 class="text-2xl font-bold text-on-surface font-headline mb-2">Check-in Verification</h2>
                            <p class="text-on-surface-variant mb-8">Please enter your booking credentials to authorize
                                slot access.</p>
                            <form action="verify_otp.php" method="POST" class="space-y-6">
                                
                                <div>
                                    <label
                                        class="block text-xs font-bold uppercase tracking-widest text-outline mb-2">6-Digit
                                        OTP Code</label>
                                    <div class="flex gap-3">
                                        <input name="otp1" maxlength="1" type="text"
                                            class="w-full h-16 text-center text-2xl font-bold bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-secondary/20 focus:bg-white transition-all text-on-surface">

                                        <input name="otp2" maxlength="1" type="text"
                                            class="w-full h-16 text-center text-2xl font-bold bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-secondary/20 focus:bg-white transition-all text-on-surface">

                                        <input name="otp3" maxlength="1" type="text"
                                            class="w-full h-16 text-center text-2xl font-bold bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-secondary/20 focus:bg-white transition-all text-on-surface">

                                        <input name="otp4" maxlength="1" type="text"
                                            class="w-full h-16 text-center text-2xl font-bold bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-secondary/20 focus:bg-white transition-all text-on-surface">

                                        <input name="otp5" maxlength="1" type="text"
                                            class="w-full h-16 text-center text-2xl font-bold bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-secondary/20 focus:bg-white transition-all text-on-surface">

                                        <input name="otp6" maxlength="1" type="text"
                                            class="w-full h-16 text-center text-2xl font-bold bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-secondary/20 focus:bg-white transition-all text-on-surface">
                                    </div>
                                    <p class="mt-4 text-sm text-on-surface-variant">Didn't receive code? <button
                                            class="text-on-secondary-container font-semibold hover:underline"
                                            type="button">Resend via SMS</button></p>
                                </div>
                                <button
                                    class="w-full py-4 px-6 rounded-xl metallic-gradient text-white font-bold text-lg shadow-lg shadow-on-primary-container/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2 mt-8"
                                    type="submit">
                                    <span>Verify &amp; Check-in</span>
                                    <span class="material-symbols-outlined"
                                        data-icon="arrow_forward">arrow_forward</span>
                                </button>
                            </form>
                            <!-- Success State Placeholder (Hidden by default, shown here for structure) -->
                            <div
                                class="hidden mt-8 p-4 bg-tertiary-container/10 border border-tertiary-fixed-dim/20 rounded-xl flex items-center gap-3">
                                <span class="material-symbols-outlined text-on-tertiary-container"
                                    data-icon="check_circle"
                                    style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                <span class="text-on-tertiary-container font-medium text-sm">OTP verified successfully.
                                    Your parking check-in is complete.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right Section: Reservation Preview -->
                <div class="col-span-12 lg:col-span-5 space-y-6">
                    <div class="bg-surface-container-low rounded-xl p-8 border-none relative overflow-hidden group">
                        <div class="absolute top-0 left-0 w-1.5 h-full bg-tertiary-fixed-dim"></div>
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-tertiary-fixed-dim/20 text-on-tertiary-fixed-variant text-xs font-bold uppercase tracking-wider mb-3">
                                    <span class="w-2 h-2 rounded-full bg-tertiary-fixed-dim animate-pulse"></span>
                                    Pending Check-in
                                </span>
                                <h3 class="text-xl font-bold text-on-surface font-headline">Active Reservation</h3>
                            </div>
                            <span class="text-outline-variant material-symbols-outlined text-3xl"
                                data-icon="local_parking">local_parking</span>
                        </div>
                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-lg bg-white flex items-center justify-center shadow-sm">
                                    <span class="material-symbols-outlined text-secondary"
                                        data-icon="location_on">location_on</span>
                                </div>
                                <div>
                                    <p class="text-xs text-on-surface-variant font-bold uppercase tracking-tighter">
                                        Parking Location</p>
                                    <p class="text-on-surface font-semibold">City Center Premium Parking</p>
                                    <p class="text-xs text-outline">122 North Avenue, Downtown District</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="p-4 bg-white rounded-xl shadow-sm">
                                    <p
                                        class="text-xs text-on-surface-variant font-bold uppercase tracking-tighter mb-1">
                                        Slot ID</p>
                                    <p class="text-2xl font-extrabold text-on-surface font-headline">A-12</p>
                                </div>
                                <div class="p-4 bg-white rounded-xl shadow-sm">
                                    <p
                                        class="text-xs text-on-surface-variant font-bold uppercase tracking-tighter mb-1">
                                        Level</p>
                                    <p class="text-2xl font-extrabold text-on-surface font-headline">P2</p>
                                </div>
                            </div>
                            <div class="pt-6 border-t border-outline-variant/20">
                                <div class="flex items-center gap-3 text-on-surface">
                                    <span class="material-symbols-outlined text-secondary text-sm"
                                        data-icon="calendar_today">calendar_today</span>
                                    <span class="text-sm font-medium">28 March 2026</span>
                                </div>
                                <div class="flex items-center gap-3 text-on-surface mt-2">
                                    <span class="material-symbols-outlined text-secondary text-sm"
                                        data-icon="schedule">schedule</span>
                                    <span class="text-sm font-medium">2:00 PM – 4:00 PM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Mini Map View -->
                    <div class="rounded-xl overflow-hidden h-48 relative shadow-sm">
                        <img class="w-full h-full object-cover"
                            data-alt="clean minimal digital map interface showing a blue circular location marker over a modern city grid with soft gray and blue tones"
                            data-location="Chicago"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuD23qqWbiQYR3hAts4UFIglPdPnEn9QXlPeB6RepuEG9UkNpvpXXX8ij6MVJwRIp8D0RP5JkdaKxgAFtPliqzwBmTy45zO69uxHWUiF_g8vVBugHKv9DW-G6YgqY9i9UhkI64lChW0QgX9QIANniUzybRdDwHgqFsnnIWC8BcoxrzgzEf5QgTdIv0qernWVNb5NoYBXind5VxvEOvXiuHpkunkEOMFOd_YxPJd7rmchNZyMsIh6KwZEtHFV9aiIsadn8T8Z_6YcqrWG" />
                        <div class="absolute inset-0 bg-gradient-to-t from-on-surface/40 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4 flex justify-between items-center">
                            <span
                                class="text-white text-xs font-bold uppercase tracking-widest drop-shadow-md">Navigation
                                Ready</span>
                            <button
                                class="bg-white/90 backdrop-blur p-2 rounded-lg text-on-surface shadow-lg hover:bg-white transition-colors">
                                <span class="material-symbols-outlined text-sm"
                                    data-icon="open_in_new">open_in_new</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer Shell -->
    <footer class="ml-64 p-8 flex justify-between items-center max-w-[calc(100%-16rem)] bg-transparent">
        <div class="flex items-center gap-2">
            <span class="text-slate-400 font-inter text-xs uppercase tracking-widest">Smart Parking Reservation &amp;
                Vehicle Management System – Driver Panel</span>
        </div>
        <div class="flex gap-6">
            <a class="text-slate-400 font-inter text-xs uppercase tracking-widest hover:text-blue-600 transition-colors"
                href="#">Privacy Policy</a>
            <a class="text-slate-400 font-inter text-xs uppercase tracking-widest hover:text-blue-600 transition-colors"
                href="#">Terms of Service</a>
            <a class="text-slate-400 font-inter text-xs uppercase tracking-widest hover:text-blue-600 transition-colors"
                href="#">Help Center</a>
        </div>
        <div class="text-slate-400 font-inter text-xs uppercase tracking-widest">
            © 2024 Urban Navigator Premium Parking. All rights reserved.
        </div>
    </footer>

    <script>
        document.querySelectorAll('input[name^="otp"]').forEach((input, index, arr) => {
            input.addEventListener('input', () => {
                if (input.value.length === 1 && arr[index + 1]) {
                    arr[index + 1].focus();
                }
            });
        });
    </script>

    <script>
        console.log("OTP: <?= $_SESSION['otp'] ?? 'NOT SET' ?>");
    </script>

    <div style="padding:10px;background:#000;color:#fff">
        DEBUG OTP: <?= $_SESSION['otp'] ?? 'NOT SET' ?>
    </div>
</body>

</html>