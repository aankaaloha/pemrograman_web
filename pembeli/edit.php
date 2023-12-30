<?php


session_start();


require '../config.php';


if (isset($_GET['id'])) {
   $collection = $db->pembeli;
   $pembeli = $collection->findOne(['_id' => $_GET['id']]);
}


if(isset($_POST['submit'])){


   $collection->updateOne(
       ['_id' => $_GET['id']],
       ['$set' => ['nama' => $_POST['nama'], 'jenis_kelamin' => $_POST['jenis_kelamin'], 'alamat' => $_POST['alamat'], 'no_telp' => $_POST['no_telp']]
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
         <strong>ID Pembeli:</strong>
         <input type="text" value="<?php echo $_GET['id']; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
         <strong>Nama:</strong>
         <input type="text" name="nama" value="<?php echo $pembeli->nama; ?>" required="" class="form-control" placeholder="Nama">
      </div>
      <div class="form-group">
         <strong>Jenis Kelamin:</strong>
         <select name="jenis_kelamin" class="form-control" required="">
            <option value="Laki-laki" <?php if($pembeli->jenis_kelamin === "Laki-laki"){echo "selected";}?>>Laki-laki</option>

            <option value="Perempuan" <?php if($pembeli->jenis_kelamin === "Perempuan"){echo "selected";}?>>Perempuan</option>
         </select>
      </div>
      <div class="form-group">
         <strong>Alamat:</strong>
         <textarea class="form-control" name="alamat" placeholder="Alamat" placeholder="Alamat"><?php echo $pembeli->alamat; ?></textarea>
      </div>
       <div class="form-group">
         <strong>No Telepon:</strong>
         <input type="text" name="no_telp" value="<?php echo $pembeli->no_telp; ?>" required="" class="form-control" placeholder="No Telepon">
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-primary mt-3">Edit</button>
          <a href="index.php" class="btn btn-danger mt-3">Kembali</a>
      </div>
   </form>
</div>


</body>
</html>