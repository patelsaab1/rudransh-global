<?php
session_start();

$host = "localhost";
$user = "";
$pass = "";
$db   = "";
$port = 3306;

if (is_file(__DIR__ . '/db.local.php')) {
    require __DIR__ . '/db.local.php';
}

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
    die("Database Connection Failed");
}

mysqli_set_charset($conn, "utf8mb4");
