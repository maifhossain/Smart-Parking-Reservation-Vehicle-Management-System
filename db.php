<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "smart_parking"
);

if(!$conn){
    die("Connection Failed");
}

?>