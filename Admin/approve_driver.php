<?php

include "../db.php";

$id = $_GET['id'];

$user =
mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM users
WHERE id='$id'"
));

mysqli_query(
$conn,
"UPDATE users
SET status='Approved'
WHERE id='$id'"
);

mysqli_query(
$conn,
"INSERT INTO driver_approvals
(
user_id,
email,
fullname,
phone,
vehicle_plate,
nid_number,
driving_license
)

VALUES

(
'".$user['id']."',
'".$user['email']."',
'".$user['fullname']."',
'".$user['phone']."',
'".$user['vehicle_plate']."',
'".$user['nid_number']."',
'".$user['driving_license']."'
)"
);

header("Location:4_Drivers_Approval.php");