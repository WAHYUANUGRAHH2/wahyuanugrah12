<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location:login.php");
    exit;
}



if (isset($_POST["cari"])) { 
    $pengunjung = cari($_POST["keyword"]);

} 

require 'function.php';

$pengunjung = query("SELECT * FROM pengunjung");



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>TAMPILAN UTAMA</title>
  </head>
  <body>
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <div class="container-fluid">
                <a><h2>Club Bola</h2></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page">Daftar Pengunjung</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Menu
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href=""></a></li>
                                <li><a class="dropdown-item" href="tambah.php">Tambah</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    
                    </ul>

                    <form class="" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" name="keyword" size="40" autofocus placeholder="Mau Cari Apa?" autocomplete="off">
                            <button class="btn btn-outline-success" type="submit" name="cari">Cari</button>
                        </div>    
                    </form>
                </div>
            </div>
        </nav>
        <br>
                    
        <table class="table" border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Photo</th>
                    <th>Nama</th>
                    <th>No.Handphone</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($pengunjung as $row) { ?>
                    <tr>

                        <td>
                            <?php echo $i; ?> 
                        </td>
                        <td><img src="image/<?php echo $row['gambar']; ?>" width="50"></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['no_handphone']; ?></td>
                        <td><?php echo $row['jenis_kelamin']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>       
                            <a href="ubah.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Ubah</a> 
                            <a href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin Nih Mau Dihapus?');  " class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php ++$i; ?>
                <?php } ?>
            </tbody>
        </table>
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
  <style>

    table {
        justify-content: center;
        align-items: center;
        
    }

    table th {
        background: #3f729b;
        color: #e9967a;
        font-weight: bold;
        font-size: 14px;
    }
    table th,
    table td {
        vertical-align: center;
        padding: 10px 20px;
        
    }

    .container-fluid a {
        flex-direction: column;
        margin-right: 30px;
        font-size: 17px;
        font-weight: bold;
    }
  </style>
</html>