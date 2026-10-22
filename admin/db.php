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

mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect($host, $user, $pass, $db, $port);

$isAdmin = isset($_SERVER['SCRIPT_NAME']) && str_contains($_SERVER['SCRIPT_NAME'], '/admin/');
if (!$conn && $isAdmin) {
    die("Database Connection Failed");
}

if ($conn) {
    mysqli_set_charset($conn, "utf8mb4");
}
