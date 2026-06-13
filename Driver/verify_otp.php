<?php
session_start();
include "config.php";

$booking_id = $_SESSION['booking_id'] ?? null;

if (!$booking_id) {
    die("Session expired");
}

// OTP combine kora
$otp = $_POST['otp1'] . $_POST['otp2'] . $_POST['otp3'] .
       $_POST['otp4'] . $_POST['otp5'] . $_POST['otp6'];

// DB theke OTP check
$stmt = $conn->prepare("SELECT otp_code FROM bookings WHERE id = ?");
$stmt->bind_param("i", $booking_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row && $row['otp_code'] == $otp) {

    $update = $conn->prepare("UPDATE bookings 
        SET otp_verified = 1,
            status = 'confirmed',
            checkin_time = NOW()
        WHERE id = ?");

    $update->bind_param("i", $booking_id);
    $update->execute();

    echo "OTP Verified Successfully!";
    // redirect to dashboard or success page

} else {
    echo "Invalid OTP";
}
?>