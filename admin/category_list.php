<?php include 'header.php'; ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Manajemen Kategori</h1>

    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori</h6>
                </div>
                <div class="card-body">
                    <form action="category_proses.php" method="POST">
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control" required placeholder="Contoh: Elektronik">
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary btn-block">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $res = mysqli_query($conn, "SELECT * FROM categories ORDER BY id DESC");
                                while($row = mysqli_fetch_assoc($res)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['nama_kategori']; ?></td>
                                    <td>
                                        <a href="category_proses.php?hapus=<?php echo $row['id']; ?>" 
                                           class="btn btn-danger btn-sm" 
                                           onclick="return confirm('Hapus kategori? Barang dengan kategori ini akan menjadi NULL.')">
                                           <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>