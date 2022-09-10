<?php
$semuadata = [];
$ambil = $koneksi->query("SELECT * FROM kategori");
while($tiap = $ambil->fetch_assoc()){
  $semuadata[] = $tiap;
}

// echo "<pre>";
// print_r($semuadata);
// echo "</pre>";

?>


<h2>Data Kategori</h2>


<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Kategori</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($semuadata as $key => $value): ?>
    <tr>
      <td><?= $key+1; ?>.</td>
      <td><?= $value['nama_kategori']; ?></td>
      <td>
        <a href="index.php?halaman=ubahkategori&id=<?= $value['id_kategori']; ?>" class="btn btn-warning btn-xs">ubah</a>
        <a href="index.php?halaman=hapuskategori&id=<?= $value['id_kategori']; ?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs">hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="index.php?halaman=tambahkategori" class="btn btn-primary">Tambah Data Kategori</a>





