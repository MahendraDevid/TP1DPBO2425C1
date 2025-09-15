<?php
require_once 'tokoelektronik.php'; 
session_start();

// kalau belum ada session, bikin array kosong
if (isset($_SESSION['tokoList'])) {
    $tokoList = $_SESSION['tokoList'];//ambil list dari session
}else {
    $tokoList = array();//bikin array kosong
}

//menambahkan data awal hanya sekali
if (!isset($_SESSION['initialized'])) {
    $toko1 = new Tokoelektronik("E001", "Samsung Galaxy S25 Ultra", "Smartphone", "2000000", "samsung_s25u.jpg");
    $toko2 = new Tokoelektronik("E002", "Alienware M18", "Laptop", "15000000", "alienware.jpg");

    array_push($tokoList, $toko1);
    array_push($tokoList, $toko2);

    $_SESSION['initialized'] = true;
}

// Membuat menu tambah data
if (isset($_POST['action']) && $_POST['action'] == 'add') {
    $id = $_POST['id'];
    $nama = $_POST['nama']; 
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $imageName = $_POST['image'];

    $newToko = new TokoElektronik();
    $newToko->setId($id);
    $newToko->setNama($nama);
    $newToko->setKategori($kategori);
    $newToko->setHarga($harga);
    $newToko->setImage($imageName); 

    array_push($tokoList, $newToko);

    $_SESSION['tokoList'] = $tokoList; //simpan list ke session
}

// membuat edit data
if (isset($_POST['action']) && $_POST['action'] == 'edit') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $imageName = $_POST['image'];

    foreach ($tokoList as $toko) {
        if ($toko->getId() === $id) {
            $toko->setNama($nama);
            $toko->setKategori($kategori);
            $toko->setHarga($harga);

            // Update gambar hanya jika user mengisi field image
            if (!empty($imageName)) {
                $toko->setImage($imageName);
            }
        }
    }
    $_SESSION['tokoList'] = $tokoList; //simpan list ke session
}

//membuat hapus data
if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = $_POST['id'];
    foreach ($tokoList as $index => $toko) {
        if ($toko->getId() === $id) {
            unset($tokoList[$index]);
            // Reindex array setelah penghapusan
            $tokoList = array_values($tokoList);
        }
    }
    $_SESSION['tokoList'] = $tokoList; //simpan list ke session
}

//membuat cari data
$searchResults = array(); //list untuk menyimpan hasil pencarian
if (isset($_POST['action']) && $_POST['action'] == 'search') {
    $searchId = $_POST['search_id'];
    foreach ($tokoList as $toko) {
        if ($toko->getId() === $searchId) {
            array_push($searchResults, $toko);
        }
    }
}

$_SESSION['tokoList'] = $tokoList; //simpan list ke session

?>

<doctype html>
<html>
<head> 
    <title>Toko Elektronik</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head> 

<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Toko Elektronik</h1>

        <!-- Form untuk pencarian data -->
        <div class="mb-4">
            <form method="POST" action="">
                <input type="hidden" name="action" value="search">
                <div class="input-group">
                    <input type="text" name="search_id" class="form-control" placeholder="Masukkan ID untuk mencari..." required>
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a href="main.php" class="btn btn-secondary ms-2">Reset</a>
                </div>
            </form>
        </div>

        <!-- Tampilkan hasil pencarian jika ada -->
        <?php if (!empty($searchResults)): ?>
            <h3>Hasil Pencarian:</h3>
            <?php foreach ($searchResults as $toko): ?>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo 'images/' . $toko->getImage(); ?>" class="img-fluid rounded-start" alt="<?php echo $toko->getNama(); ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $toko->getNama(); ?></h5>
                                <p class="card-text">ID: <?php echo $toko->getId(); ?></p>
                                <p class="card-text">Kategori: <?php echo $toko->getKategori(); ?></p>
                                <p class="card-text">Harga: Rp <?php echo number_format($toko->getHarga(), 0, ',', '.'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php elseif (isset($_POST['action']) && $_POST['action'] == 'search'): ?>
            <p class="text-danger">Data dengan ID tersebut tidak ditemukan.</p>
        <?php endif; ?>
        <!-- Tampilkan semua data -->
        <h2 class="mb-3">Daftar Produk</h2>
        <?php if (!empty($tokoList)): ?>
            <?php foreach ($tokoList as $toko): ?>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo 'images/' . $toko->getImage(); ?>" class="img-fluid rounded-start" alt="<?php echo $toko->getNama(); ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $toko->getNama(); ?></h5>
                                <p class="card-text">ID: <?php echo $toko->getId(); ?></p>
                                <p class="card-text">Kategori: <?php echo $toko->getKategori(); ?></p>
                                <p class="card-text">Harga: Rp <?php echo number_format($toko->getHarga(), 0, ',', '.'); ?></p>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $toko->getId(); ?>">Edit</button>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $toko->getId(); ?>">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Edit -->
                <div class="modal fade" id="editModal<?php echo $toko->getId(); ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $toko->getId(); ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Hapus enctype karena tidak upload file -->
                            <form method="POST" action="">
                                <input type="hidden" name="action" value="edit">
                                <input type="hidden" name="id" value="<?php echo $toko->getId(); ?>">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel<?php echo $toko->getId(); ?>">Edit Produk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama:</label>
                                        <input type="text" class="form-control" name="nama" value="<?php echo $toko->getNama(); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Kategori:</label>
                                        <input type="text" class="form-control" name="kategori" value="<?php echo $toko->getKategori(); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga" class="form-label">Harga:</label>
                                        <input type="number" class="form-control" name="harga" value="<?php echo $toko->getHarga(); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Nama File Gambar:</label>
                                        <!-- Ganti file jadi text -->
                                        <input type="text" class="form-control" name="image" value="<?php echo $toko->getImage(); ?>" placeholder="contoh: samsung_s25u.jpg">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Hapus -->
                <div class="modal fade" id="deleteModal<?php echo $toko->getId(); ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $toko->getId(); ?>">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Hapus Produk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus produk "<?php echo $toko->getNama(); ?>"?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-muted">Belum ada data produk.</p>
        <?php endif; ?>
        <!-- Button trigger modal Tambah Data -->
        <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Produk</button>
        <!-- Modal Tambah Data -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Hapus enctype karena tidak upload file -->
                    <form method="POST" action="">
                        <input type="hidden" name="action" value="add">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">Tambah Produk Baru</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="id" class="form-label">ID:</label>
                                <input type="text" class="form-control" name="id" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama:</label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori:</label>
                                <input type="text" class="form-control" name="kategori" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga:</label>
                                <input type="number" class="form-control" name="harga" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Nama File Gambar:</label>
                                <!-- Ganti file jadi text -->
                                <input type="text" class="form-control" name="image" placeholder="contoh: samsung_s25u.jpg" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
