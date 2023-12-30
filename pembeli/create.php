<?php


session_start();


if(isset($_POST['submit'])){


   require '../config.php';
   $pembeli = $db->pembeli;


   $hasil = $pembeli->insertOne([
       '_id' => $_POST['id_pembeli'],
       'nama' => $_POST['nama'],
       'jenis_kelamin' => $_POST['jenis_kelamin'],
       'alamat' => $_POST['alamat'],
       'no_telp' => $_POST['no_telp'],
       
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
         <strong>ID Pembeli:</strong>
         <input type="text" name="id_pembeli" required="" class="form-control" placeholder="ID Pembeli">
      </div>
      <div class="form-group">
         <strong>Nama:</strong>
         <input type="text" name="nama" required="" class="form-control" placeholder="Nama">
      </div>
      <div class="form-group">
         <strong>Jenis Kelamin:</strong>
         <select name="jenis_kelamin" class="form-control" required="">
            <option selected>-- Pilih --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
         </select>
      </div>
      <div class="form-group">
         <strong>Alamat:</strong>
         <textarea class="form-control" name="alamat" placeholder="Alamat" placeholder="Alamat"></textarea>
      </div>
      <div class="form-group">
         <strong>No Telepon:</strong>
         <input type="text" name="no_telp" required="" class="form-control" placeholder="No Telepon">
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-primary mt-3">Tambah</button>
          <a href="index.php" class="btn btn-danger mt-3">Kembali</a>
      </div>
   </form>
</div>
</body>
</html>