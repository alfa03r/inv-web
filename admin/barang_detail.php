<?php 
include 'header.php'; 

// Ambil ID dari URL
$id = mysqli_real_escape_string($conn, $_GET['id']);

// Query data barang spesifik dan relasi kategorinya
$query = mysqli_query($conn, "SELECT items.*, categories.nama_kategori 
                              FROM items 
                              LEFT JOIN categories ON items.category_id = categories.id 
                              WHERE items.id = '$id'");
$data = mysqli_fetch_assoc($query);

// Jika data tidak ditemukan
if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='barang_list.php';</script>";
}
?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Barang: <?php echo $data['nama_barang']; ?></h1>
        <a href="barang_list.php" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left fa-sm"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Produk</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-4 font-weight-bold">Kode Barang (SKU)</div>
                        <div class="col-sm-8 text-gray-900">: <?php echo $data['kode_barang']; ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 font-weight-bold">Nama Barang</div>
                        <div class="col-sm-8 text-gray-900">: <?php echo $data['nama_barang']; ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 font-weight-bold">Kategori</div>
                        <div class="col-sm-8 text-gray-900">: <?php echo $data['nama_kategori'] ?? 'Tanpa Kategori'; ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 font-weight-bold">Stok & Satuan</div>
                        <div class="col-sm-8 text-gray-900">
                            : <?php echo $data['stok']; ?> <?php echo $data['satuan']; ?> </div>
                    </div>
                    <hr>
                    <div class="text-right">
                        <a href="barang_edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit Data
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="fas fa-box-open fa-5x text-gray-300"></i>
                    </div>
                    <h5 class="font-weight-bold"><?php echo $data['nama_barang']; ?></h5>
                    <p class="text-muted">Terdaftar pada sistem inventaris.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>