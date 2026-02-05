<?php 
include 'header.php'; 

// Ambil ID dari URL
$id = mysqli_real_escape_string($conn, $_GET['id']);

// Query data barang yang akan diedit
$query = mysqli_query($conn, "SELECT * FROM items WHERE id = '$id'");
$data  = mysqli_fetch_assoc($query);

// Jika data tidak ditemukan, kembalikan ke list
if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='barang_list.php';</script>";
    exit;
}
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Barang</h1>

    <div class="row">
        <div class="col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Perubahan Data</h6>
                </div>
                <div class="card-body">
                    <form action="barang_proses.php" method="POST">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">

                        <div class="form-group">
                            <label>Kode Barang (Tidak dapat diubah)</label>
                            <input type="text" class="form-control" value="<?= $data['kode_barang'] ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" value="<?= $data['nama_barang'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="category_id" class="form-control" required>
                                <?php
                                $cat_query = mysqli_query($conn, "SELECT * FROM categories");
                                while($cat = mysqli_fetch_assoc($cat_query)) {
                                    $selected = ($cat['id'] == $data['category_id']) ? "selected" : "";
                                    echo "<option value='".$cat['id']."' $selected>".$cat['nama_kategori']."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="number" name="stok" class="form-control" value="<?= $data['stok'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <input type="text" name="satuan" class="form-control" value="<?= $data['satuan'] ?>" placeholder="Pcs, Box, dll">
                                </div>
                            </div>
                        </div>

                        <hr>
                        <button type="submit" name="update" class="btn btn-success">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                        <a href="barang_list.php" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>