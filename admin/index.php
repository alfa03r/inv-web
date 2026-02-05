<?php 
include 'header.php'; 
// Logika mengambil statistik data untuk Dashboard
$q_barang    = mysqli_query($conn, "SELECT COUNT(*) as total FROM items");
$total_barang = mysqli_fetch_assoc($q_barang)['total'];

$q_kategori  = mysqli_query($conn, "SELECT COUNT(*) as total FROM categories");
$total_cat    = mysqli_fetch_assoc($q_kategori)['total'];
?>


<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Barang</div>
                            <?php
                            $query = mysqli_query($conn, "SELECT COUNT(*) as total FROM items");
                            $data = mysqli_fetch_assoc($query);
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['total']; ?> Item</div>
                        </div>
                        <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>