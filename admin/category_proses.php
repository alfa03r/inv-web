<?php
include '../koneksi/koneksi.php';

// Simpan Kategori
if (isset($_POST['simpan'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama_kategori']);
    mysqli_query($conn, "INSERT INTO categories (nama_kategori) VALUES ('$nama')");
    header("location:category_list.php?pesan=berhasil_tambah");
}

// Hapus Kategori
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM categories WHERE id='$id'");
    header("location:category_list.php?pesan=berhasil_hapus");
}
?>