<?php
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <title>Aplikasi AnMart</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<!-- <div class="container"> -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">AnMart</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" aria-current="page" href="../pembeli/index.php">Pembeli</a>
        <a class="nav-link" href="../barang/index.php">Barang</a>
        <a class="nav-link active" href="index.php">Transaksi</a>
      </div>
    </div>
  </div>
</nav>
<!-- </div> -->

<div class="container mt-3">
<h2>Data Transaksi</h2>


<a href="create.php" class="btn btn-primary mb-2 mt-1">Tambah</a>


<?php


   if(isset($_SESSION['success'])){
      echo "<div class='alert alert-primary'>".$_SESSION['success']."</div>";
   }


?>

   <div class="table-responsive">
      <table class="table table-striped table-hover">
         <tr>
            <th>Kode Transaksi</th>
            <th>Nama Pembeli</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Action</th>
         </tr>
         <?php

            require '../config.php';
            $aggregate = [
                [
                    '$lookup' => [
                        'from' => 'pembeli',
                        'localField' => 'pembeli_id',
                        'foreignField' => '_id',
                        'as' => 'data_pembeli'
                    ]
                ],
                [
                    '$lookup' => [
                        'from' => 'barang',
                        'localField' => 'barang_id',
                        'foreignField' => '_id',
                        'as' => 'data_barang'
                    ]
                ],
                ['$unwind' => '$data_pembeli'],
                ['$unwind' => '$data_barang'],
                    
              ];
            $transaksi = $db->transaksi->aggregate($aggregate);

            foreach($transaksi as $tr) {
               echo "<tr>";
               echo "<td>".$tr->_id."</td>";
               echo "<td>".$tr->data_pembeli->nama."</td>";
               echo "<td>".$tr->data_barang->nama_barang."</td>";
               echo "<td>".$tr->data_barang->satuan."</td>";
               echo "<td>".$tr->data_barang->harga."</td>";
               echo "<td>".$tr->tanggal."</td>";
               echo "<td>".$tr->jumlah."</td>";
               echo "<td>".$tr->jumlah * $tr->data_barang->harga."</td>";
               echo "<td>";
               echo "<a href='edit.php?id=".$tr->_id."' class='btn btn-primary'>Edit</a>";
               echo "<a href='delete.php?id=".$tr->_id."' class='btn btn-danger'>Hapus</a>";
               echo "</td>";
               echo "</tr>";
            };


         ?>
      </table>
   </div>
</div>
</body>
</html>