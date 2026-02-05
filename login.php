<?php
include 'koneksi/koneksi.php';

// Langsung redirect jika sudah login
if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
    header("location:admin/index.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Ambil data user dalam satu baris
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $data   = mysqli_fetch_assoc($result);

    if ($data) {
        $_SESSION['status'] = "login";
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
        session_write_close(); 
        header("location:admin/index.php");
        exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Inventaris</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <div class="max-w-md w-full p-6">
        <div class="bg-white shadow-lg rounded-xl p-8 border border-gray-200">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-900">Sign In</h1>
                <p class="text-gray-500 text-sm">Manajemen Inventaris Barang</p>
            </div>

            <?php if ($error): ?>
                <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded text-sm text-center">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input name="username" type="text" required placeholder="Username"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input name="password" type="password" required placeholder="••••••••"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <button type="submit" class="w-full bg-black text-white py-2 rounded-lg font-semibold hover:bg-gray-800 transition">
                    Sign In
                </button>
            </form>
        </div>
    </div>

</body>
</html>