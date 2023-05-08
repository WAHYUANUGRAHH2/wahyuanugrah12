<?php
session_start();

if (!$_SESSION['login']) {
    header('Location: login.php');
    exit;
}
require 'function.php';

// ambil data di URL
$id = $_GET['id'];
// query data pengunjung berdasarkan id

$pengunjung = query("SELECT * FROM pengunjung WHERE id = $id")[0];

// cek apakah tombol submit sudah di tekan atau belum
if (isset($_POST['submit'])) {
    // cek apakah data berhasil di ubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah');
                document.location.href = 'ubah.php';
            </script>
        ";
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>TAMPILAN UBAH</title>
  </head>
  <body>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Ubah Data Pengunjung</h1>

        <form class="col-sm-5" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $pengunjung['id']; ?>">
            <input type="hidden" name="gambarlama" value="<?php echo $pengunjung['gambar']; ?>">
            <div class="form-group row">
                <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
                <div class="col-sm-8">
                    <input type="nama" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required value="<?php echo $pengunjung['nama']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="no_handphone" class="col-sm-4 col-form-label">No Handphone</label>
                <div class="col-sm-8">
                    <input type="no_handphone" class="form-control" id="no_handphone" name="no_handphone" placeholder="No Handphone" required value="<?php echo $pengunjung['no_handphone']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jenis_kelamin" class="col-sm-4 col-form-label">jenis Kelamin</label>
                <div class="col-sm-8">
                    <input type="jenis_kelamin" class="form-control" id="jenis_kelamin" name="jenis_kelamin" placeholder="jenis_kelamin" required value="<?php echo $pengunjung['jenis_kelamin']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="<?php echo $pengunjung['email']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="gambar" class="col-sm-4 col-form-label" >Photo</label>
                <div class="col-sm-8">
                <img src="image/<?php echo $pengunjung['gambar']; ?>" width="50">
                    <input type="file" name="gambar" id="gambar">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-4">
                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
            </div>
        </div>
        </form>
        
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>