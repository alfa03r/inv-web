<?php
include '../koneksi/koneksi.php';

// PROSES SIMPAN (CREATE)
if (isset($_POST['simpan'])) {
    $kode   = $_POST['kode_barang'];
    $nama   = mysqli_real_escape_string($conn, $_POST['nama_barang']);
    $cat_id = $_POST['category_id'];
    $stok   = $_POST['stok'];
    $satuan = mysqli_real_escape_string($conn, $_POST['satuan']); // Tangkap Satuan

    $sql = "INSERT INTO items (kode_barang, nama_barang, category_id, stok, satuan) 
            VALUES ('$kode', '$nama', '$cat_id', '$stok', '$satuan')";
    
    if (mysqli_query($conn, $sql)) {
        header("location:barang_list.php?pesan=berhasil_simpan");
    }
}

// PROSES UPDATE
if (isset($_POST['update'])) {
    $id     = $_POST['id'];
    $nama   = mysqli_real_escape_string($conn, $_POST['nama_barang']);
    $cat_id = $_POST['category_id'];
    $stok   = $_POST['stok'];
    $satuan = mysqli_real_escape_string($conn, $_POST['satuan']); // Tangkap Satuan

    $sql = "UPDATE items SET 
            nama_barang = '$nama', 
            category_id = '$cat_id', 
            stok = '$stok', 
            satuan = '$satuan' 
            WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("location:barang_list.php?pesan=berhasil_update");
    }
}

// LOGIKA HAPUS (DELETE)
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM items WHERE id='$id'");
    header("location:barang_list.php?status=sukses_hapus");
}
?>