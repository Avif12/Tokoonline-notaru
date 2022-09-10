<?php
session_start();

//koneksi ke database
include 'koneksi.php';

if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])){
  echo "<script>alert('Keranjang kosong, silahkan pilih produk!');</script>";
  echo "<script>location='index.php';</script>";
}

// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang Belanja</title>
  <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'templates/navbar.php'; ?>

<section class="content">
  <div class="container">
  <h1>keranjang Belanja</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subharga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; ?>
        <?php foreach($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
        <!-- Menampilkan produk yang sedang duperulangkan berdasarkan id_produk -->
        <?php
        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
        $pecah = $ambil->fetch_assoc();
        
        $subharga = $pecah['harga_produk'] * $jumlah;
        // echo "<pre>";
        // print_r($pecah);
        // echo "</pre>";
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $pecah['nama_produk']; ?></td>
          <td>Rp. <?= number_format($pecah['harga_produk']); ?>,-</td>
          <td><?= $jumlah; ?></td>
          <td>Rp. <?= number_format($subharga); ?>,-</td>
          <td>
            <a href="detail.php?id=<?= $id_produk; ?>" class="btn btn-info btn-xs">detail</a>
            <a href="hapuskeranjang.php?id=<?= $id_produk; ?>" class="btn btn-danger btn-xs">hapus</a>

          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
  
   <p><a href="https://wa.me/6281390606249/?>&text=Hai, saya tertarik dengan produk Anda.">
            Hubungin via Whatsapp
            <img src="admin/assets/img/wa.png" width="50px"></a>
   </p>

  </div>
</section>
  
</body>
</html>