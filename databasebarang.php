<?php

session_start();

if (!isset($_SESSION["loginadmin"])) {
  header("Location: signin.php");
  exit;
}

// sambung ke fuction
require 'functions.php';

// query tabel
$tampil = query("SELECT * FROM barang ");

// tombol cari ditekan
if (isset($_POST["cari"])) {
  $tampil = cari($_POST["keyword"]);
}

// query buat nerubah ke siap di ambil




if (isset($_POST["gantikesiap"])) {
  
    // cek apakah data berhasil di tambahkan atau tidak
    if (gantikesiap($_POST)>0) {
        echo "
        <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'halamanAdmin.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal ditambahkan');
                document.location.href = 'halamanAdmin.php';
            </script>
        ";
    }
  
  }



?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>
    <form action="" method="post">
    <nav class="navbar navbar-primary sticky-top bg-primary flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php" style="color: wheat !important;">Bang J Grsoir</a>
        <input name="keyword" class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <button name="cari" class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>
        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <a class="nav-link" href="logout.php" style="color: wheat !important;">Log out</a>
          </li>
        </ul>
      </nav>
    </form>  

    
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column ">
              <li class="nav-item">
                <a class="nav-link " href="halamanadmin.php">
                  <span data-feather="gift"></span>
                  Pesanan 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="halamanadminsiap.php">
                  <span data-feather="shopping-cart"></span>
                  Siap Diambil
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="halamanadminsudah.php">
                  <span data-feather="layers"></span>
                  Sudah Diambil
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="databasebarang.php">
                  <span data-feather="file-text"></span>
                  database barang
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="uploadbarang.php">
                  <span data-feather="file-text"></span>
                  upload barang
                </a>
              </li>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Pesananku</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
          </div>

          
          <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Nomor</th>
                <th scope="col">Id Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga Satuan</th>
                <th scope="col">Stok</th>
                <th scope="col">Harga Asli</th>
                <th scope="col">Harga Jual</th>
                <th scope="col">Harga Ecer</th>
                <th scope="col">Merek</th>
                <th scope="col">Kategori</th>
                <th scope="col">Warna</th>
                <th scope="col">Keterangan Lain</th>
                <th scope="col">Gambar</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            <?php foreach($tampil as $tampils) {?>
            <form action="" method="post">
                <th scope="row"><?= $i ?></th>
                <td><?= $tampils["idbarang"]; ?></td>
                <td><?= $tampils["namabarang"]; ?></td>
                <td><?= $tampils["hargasatuan"]; ?></td>
                <td><?= $tampils["stok"]; ?></td>
                <td><?= $tampils["hargaasli"]; ?></td>
                <td><?= $tampils["hargajual"]; ?></td>
                <td><?= $tampils["hargaecer"]; ?></td>
                <td><?= $tampils["merek"]; ?></td>
                <td><?= $tampils["kategori"]; ?></td>
                <td><?= $tampils["warna"]; ?></td>
                <td><?= $tampils["keteranganlain"]; ?></td>
                <td><img class="d-block mx-auto mb-4" src="img/barang/<?= $tampils["gambar"]; ?>" style="height:70px ; width: 70px; !important" alt=""></td>
                <td> 
                    <button name="ubah" type="submit" class="btn btn-primary"><a href="ubahbarang.php?id=<?= $tampils["idbarang"]; ?>" style="text-decoration: none; color: wheat;">Ubah Data</a></button>
                </td>
              </tr>
            </form>
              <?php $i++; ?>
            <?php } ?>
            </tbody>
          </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
  </body>
</html>
