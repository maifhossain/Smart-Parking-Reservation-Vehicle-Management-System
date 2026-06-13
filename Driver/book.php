<?php
session_start();
include "config.php";

if (!isset($_POST['slot_id'])) {
    die("Invalid Request");
}

$slot_id = intval($_POST['slot_id']);
$user_id = 1; // পরে session থেকে নিবে

$otp = rand(100000, 999999);
$reservation_code = "SP-" . time();

$stmt = $conn->prepare("
INSERT INTO bookings 
(user_id, slot_id, reservation_code, booking_date, time_slot, status, otp_code, otp_created_at, created_at)
VALUES (?, ?, ?, CURDATE(), 'ANY', 'pending', ?, NOW(), NOW())
");

$stmt->bind_param(
    "iisi",
    $user_id,
    $slot_id,
    $reservation_code,
    $otp
);

$stmt->execute();

$_SESSION['booking_id'] = $stmt->insert_id;
$_SESSION['otp'] = $otp;

header("Location: 2.3_OTP_CheckIn_Page.php");
exit();
?>