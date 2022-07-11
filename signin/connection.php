<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "sate_mafazapwt";

$connection = mysqli_connect($hostname, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo "Connection to Database Failed!";
}
