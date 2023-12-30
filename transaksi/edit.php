<?php


session_start();


require '../config.php';


if (isset($_GET['id'])) {
   $collection = $db->transaksi;
   $transaksi = $collection->findOne(['_id' => $_GET['id']]);
}


if(isset($_POST['submit'])){


   $collection->updateOne(
       ['_id' => $_GET['id']],
       ['$set' => ['pembeli_id' => $_POST['pembeli_id'], 'barang_id' => $_POST['kode_barang'], 'tanggal' => $_POST['tanggal'], 'jumlah' => $_POST['jumlah']]
   ]);


   $_SESSION['success'] = "Data berhasil di edit";
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
         <strong>Kode Transaksi:</strong>
         <input type="text" value="<?php echo $_GET['id']; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
         <strong>ID Pembeli:</strong>
         <input type="text" name="pembeli_id" value="<?php echo $transaksi->pembeli_id; ?>" required="" class="form-control" placeholder="ID Pembeli">
      </div>
      <div class="form-group">
         <strong>Kode Barang</strong>
         <input type="text" name="kode_barang" value="<?php echo $transaksi->barang_id; ?>" required="" class="form-control" placeholder="Kode Barang">
      </div>
       <div class="form-group">
         <strong>Tanggal:</strong>
         <input type="date" name="tanggal" value="<?php echo $transaksi->tanggal; ?>" required="" class="form-control" placeholder="Tanggal">
      </div>
      <div class="form-group">
         <strong>Jumlah:</strong>
         <input type="number" name="jumlah" value="<?php echo $transaksi->jumlah; ?>" required="" class="form-control" placeholder="Jumlah">
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-primary mt-3">Edit</button>
          <a href="index.php" class="btn btn-danger mt-3">Kembali</a>
      </div>
   </form>
</div>


</body>
</html>