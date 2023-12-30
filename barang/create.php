<?php


session_start();


if(isset($_POST['submit'])){


   require '../config.php';
   $barang = $db->barang;


   $result = $barang->insertOne([
       '_id' => $_POST['kode_barang'],
       'nama_barang' => $_POST['nama_barang'],
       'satuan' => $_POST['satuan'],
       'stok' => $_POST['stok'],
       'harga' => $_POST['harga'],
   ]);


   $_SESSION['success'] = "Data berhasil di tambah";
   header("Location: index.php");
}


?>


<!DOCTYPE html>
<html>
<head>
   <title>Aplikasi AnMart</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>


<div class="container mt-3">
   <form method="POST">
      <div class="form-group">
         <strong>Kode Barang:</strong>
         <input type="text" name="kode_barang" required="" class="form-control" placeholder="Kode Barang">
      </div>
      <div class="form-group">
         <strong>Nama Barang:</strong>
         <input type="text" name="nama_barang" required="" class="form-control" placeholder="Nama Barang">
      </div>
      <div class="form-group">
         <strong>Satuan:</strong>
         <input type="text" name="satuan" required="" class="form-control" placeholder="Satuan">
      </div>
      <div class="form-group">
         <strong>Stok:</strong>
         <input type="number" name="stok" required="" class="form-control" placeholder="Stok">
      </div>
      <div class="form-group">
         <strong>Harga:</strong>
         <input type="number" name="harga" required="" class="form-control" placeholder="Harga">
      </div>
      <div class="form-group">
          <button type="submit" name="submit" class="btn btn-primary mt-3">Tambah</button>
          <a href="index.php" class="btn btn-danger mt-3 ">Kembali</a>
      </div>
   </form>
</div>


</body>
</html>