<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "market";
$con = mysqli_connect($host, $user, $password, $database);
return $con;
if (mysqli_connect_errno()) {
    echo "Connection Fail: " . mysqli_connect_errno();
    exit;
}
