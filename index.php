<?php
session_start();
//koneksi ke database
include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Notaru-Pelanggan</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li><a class="dropdown-item" href="#!">Home</a></li>
                        <li><a class="dropdown-item" href="keranjang.php">Keranjang</a></li>
                        <li><a class="dropdown-item" href="login.php">Login</a></li>
                        <li><a class="dropdown-item" href="daftar.php">Daftar</a></li>
                    </ul>
               </div>
         </nav>

        
<!-- konten   -->
         <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Notaru Shop</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Selamat Berbelanja</p>
                </div>
            </div>
        </header>
        
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
     <?php
      $ambil = $koneksi->query("SELECT * FROM produk");
      while($perproduk = $ambil->fetch_assoc()):
      ?>
                    <div class="col mb-5">
                     <div class="card h-100">
                      <img src="foto_produk/<?= $perproduk['foto_produk']; ?>">
                      <div class="card-body p-4">
                      <div class="text-center">
                         <h3><?= $perproduk['nama_produk']; ?></h3>
            <h5>Rp. <?= number_format($perproduk['harga_produk']); ?>,-</h5>
            <a href="beli.php?id=<?= $perproduk['id_produk']; ?>" class="btn btn-primary">beli</a>
            <a href="detail.php?id=<?= $perproduk['id_produk']; ?>" class="btn btn-default">detail</a>
          </div>
                                </div>
                            </div>
                        </div>
                   <?php endwhile; ?>
                    </div>
                </div>
            </section>

        <!-- Section-->
    
                            <!-- Product details-->
 
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Notaru 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        
    </body>
</html>
