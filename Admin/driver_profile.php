<?php
include "../db.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");

if(!$result || mysqli_num_rows($result) == 0){
    die("
    <div style='font-family:Arial; padding:40px; text-align:center;'>
        <h2>🚫 No Driver Found</h2>
        <p>Invalid Driver ID</p>
    </div>");
}

$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Driver Profile</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Inter', sans-serif;
}
</style>
</head>

<body class="bg-slate-100">

<div class="max-w-4xl mx-auto py-10 px-4">

    <!-- Back Button -->
    <a href="4_Drivers_Approval.php" 
       class="text-sm text-blue-600 hover:underline">
       ← Back to Drivers
    </a>

    <!-- Profile Card -->
    <div class="mt-4 bg-white rounded-2xl shadow-lg overflow-hidden">

        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-900 to-indigo-700 p-6 text-white">
            <h2 class="text-2xl font-bold">
                <?php echo $data['fullname']; ?>
            </h2>
            <p class="text-sm opacity-80">
                Driver Profile Details
            </p>
        </div>

        <!-- Body -->
        <div class="p-6 grid md:grid-cols-2 gap-6">

            <!-- Left Info -->
            <div class="space-y-4">

                <div>
                    <p class="text-gray-500 text-sm">Full Name</p>
                    <p class="font-semibold text-lg">
                        <?php echo $data['fullname']; ?>
                    </p>
                </div>

                <div>
                    <p class="text-gray-500 text-sm">Vehicle Number</p>
                    <p class="font-semibold text-lg">
                        <?php echo $data['vehicle_plate']; ?>
                    </p>
                </div>

                <div>
                    <p class="text-gray-500 text-sm">Email</p>
                    <p class="font-semibold text-lg">
                        <?php echo $data['email'] ?? 'N/A'; ?>
                    </p>
                </div>

                <div>
                    <p class="text-gray-500 text-sm">Phone</p>
                    <p class="font-semibold text-lg">
                        <?php echo $data['phone'] ?? 'N/A'; ?>
                    </p>
                </div>

            </div>

            <!-- Right Info -->
            <div class="space-y-4">

                <div>
                    <p class="text-gray-500 text-sm">Status</p>

                    <?php if($data['status'] == "Approved"){ ?>
                        <span class="inline-block px-3 py-1 text-sm bg-green-100 text-green-700 rounded-full font-semibold">
                            Approved
                        </span>
                    <?php } else { ?>
                        <span class="inline-block px-3 py-1 text-sm bg-yellow-100 text-yellow-700 rounded-full font-semibold">
                            Pending
                        </span>
                    <?php } ?>

                </div>

                <div>
                    <p class="text-gray-500 text-sm">Driver ID</p>
                    <p class="font-semibold text-lg">
                        #<?php echo $data['id']; ?>
                    </p>
                </div>

                <div>
                    <p class="text-gray-500 text-sm">Registered At</p>
                    <p class="font-semibold text-lg">
                        <?php echo $data['created_at'] ?? 'N/A'; ?>
                    </p>
                </div>

            </div>

        </div>

        <!-- Actions -->
        <div class="px-6 py-4 bg-slate-50 flex gap-3">

            <a href="approve_driver.php?id=<?php echo $data['id']; ?>"
               class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm font-semibold hover:bg-green-700">
               Approve
            </a>

            <a href="reject_driver.php?id=<?php echo $data['id']; ?>"
               onclick="return confirm('Reject this driver?')"
               class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-semibold hover:bg-red-700">
               Reject
            </a>

        </div>

    </div>

</div>

</body>
</html>