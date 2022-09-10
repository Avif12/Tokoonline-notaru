<?php
$ambil = $koneksi->query("SELECT * FROM kategori WHERE id_kategori = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$datakategori = [];
$ambil = $koneksi->query("SELECT * FROM kategori");
while($tiap = $ambil->fetch_assoc()){
	$datakategori[] = $tiap;
}

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

// echo "<pre>";
// print_r($datakategori);
// echo "</pre>";

if(isset($_POST['ubah'])){
  

  

    $koneksi->query("UPDATE produk SET nama_kategori='$_POST[nama]' WHERE id_kategori='$_GET[id]'");
  }
  

  echo "<script>alert('Data berhasil diubah');</script>";
  echo "<script>location='index.php?halaman=produk';</script>";
}

?>


<h2>Ubah Produk</h2>

<div class="row">
	<div class="col-md-8">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="">Nama kategori</label>
        <input type="text" name="nama" class="form-control" value="<?= $pecah['nama_kategori']; ?>">
      </div>
      
      <button name="ubah" class="btn btn-primary">Ubah</button>
    </form>
  </div>
</div>




