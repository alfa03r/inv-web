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


// Mengambil data dari Environment Variables Vercel
$host = getenv('DB_HOST');
$port = getenv('DB_PORT') ?: '4000'; // TiDB menggunakan port 4000
$db   = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASSWORD');

try {
    // TiDB Cloud mewajibkan koneksi SSL aman
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_SSL_CA => true, 
    ];
    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Koneksi ke TiDB Gagal: " . $e->getMessage());
}

?>