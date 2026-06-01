<?php

$conn = new mysqli("localhost", "root", "", "smart_parking");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fullname = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$vehicle = $_POST['vehicle'];
$nid = $_POST['NID_number'];
$license = $_POST['Driving_License'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users 
(fullname, email, phone, vehicle_plate, nid_number, driving_license, password)
VALUES 
('$fullname', '$email', '$phone', '$vehicle', '$nid', '$license', '$password')";

if ($conn->query($sql) === TRUE) {
    header("Location: 6_Successfull_Registration.html");
    exit();
} else {
    echo "Error: " . $conn->error;
}

?>