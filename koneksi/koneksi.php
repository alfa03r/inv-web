<?php

// $host = "localhost";
// $user = "root";
// $pass = "";
// $db   = "inventory_db";

// $conn = mysqli_connect($host, $user, $pass, $db);

// if (!$conn) {
//     die("Koneksi gagal: " . mysqli_connect_error());
// } 
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }


$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$db   = getenv('DB_NAME');
$port = getenv('DB_PORT');

// Koneksi menggunakan MySQLi dengan Port 4000 untuk TiDB
$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


?>