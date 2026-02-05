<?php include 'header.php'; ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Barang Baru</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="barang_proses.php" method="POST">
                <div class="form-group">
                    <label>Kategori Barang</label>
                    <select name="category_id" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php
                        $cat_query = mysqli_query($conn, "SELECT * FROM categories");
                        while($cat = mysqli_fetch_assoc($cat_query)) {
                            echo "<option value='".$cat['id']."'>".$cat['nama_kategori']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kode Barang</label>
                    <input type="text" name="kode_barang" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Satuan</label> <input type="text" name="satuan" class="form-control" placeholder="Pcs / Box / Unit" required>
                    </div>
                </div>
                <button type="submit" name="simpan" class="btn btn-primary">Simpan Data</button>
                <a href="barang_list.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>