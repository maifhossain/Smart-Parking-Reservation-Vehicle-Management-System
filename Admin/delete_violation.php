<?php

include "../db.php";

$id = $_GET['id'];

mysqli_query($conn,
"DELETE FROM violations WHERE id='$id'");

header("Location: 6.1_Violations_AdminPart.php");

?>