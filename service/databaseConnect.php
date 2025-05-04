<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "stockbarang";

$db = mysqli_connect($hostname, $username, $password, $database_name);

