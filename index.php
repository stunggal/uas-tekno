<?php
session_start();

// if (!isset($_SESSION["login"])) {
//   header("Location: signin.php");
//   exit;
// }

// sambung ke fuction
require 'functions.php';

// query card
$barang = query("SELECT * FROM barang");
$jumlahbarang = count(query("select * from barang"));

// tombol cari ditekan
if (isset($_POST["cari"])) {
  $barang = cari($_POST["keyword"]);
}




//cek apakah tombol pesan sekarang sudah di tekn apa belum
if (isset($_POST["submit"])) {

  if (!isset($_SESSION["login"])) {
    header("Location: signin.php");
    exit;
  }
  
  // cek apakah data berhasil di tambahkan atau tidak
  if (pesan($_POST)>0) {
      echo "
      <script>
              alert('data berhasil ditambahkan');
              document.location.href = 'index.php';
          </script>
      ";
  }else{
      echo "
          <script>
              alert('data gagal ditambahkan');
              document.location.href = 'index.php';
          </script>
      ";
  }

}

$jam = date("H")+6;
$waktusekarang = $jam . ":" . date("i:s");
$tglsekarang = date("d-m-y");







?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="favicon.ico">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="carousel.css" rel="stylesheet">
    <link href="album.css" rel="stylesheet">

    <title>king mart</title>
  </head>

  <!-- start body -->
  <body>

  <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
        <a class="navbar-brand" href="#">king mart</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="halamanpesan.php">Pesananku</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0" action="" method="post">
            <input name="keyword" class="form-control mr-sm-2" type="text" placeholder="Ketikkan sesuatu" aria-label="Search">
            <button name="cari" class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>
            <ul class="navbar-nav px-3">
              <li class="nav-item text-nowrap">
              <a class="nav-link" href="logout.php" style="color: wheat !important;">Log out</a>
              </li>
            </ul>
          </form>
        </div>
      </nav>
    </header>

    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="img/slides/11.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Penjual Terpercaya.</h1>
                <p>beli sekarang di toko kami yang insyaallah aman dan terpercaya 100% anamah atau bisa pesan disini dengan mambuat akun baru</p>
                <p><a class="btn btn-lg btn-primary" href="daftar.php" role="button">Daftar Sekarang</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="img/slides/2.jpg" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>Siap untuk berbelanja apapun itu?.</h1>
                <p>tanpa harus berfikir panjang langsung pesan di toko kami dengan kesepakatan yang sangat luar biasa dan yang terpenting hanya ada di toko kami</p>
                <p><a class="btn btn-lg btn-primary" href="signin.php" role="button">Masuk Sekarang</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="img/slides/3.webp" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>Tim pengembang</h1>
                <p>website ini di buat oleh tim kami untuk menyelesaikan tugas technopreurship pada mata kuliah di semester 6 </p>
                <p><a class="btn btn-lg btn-primary" href="profile.php" role="button">lihat profil</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <h2 class="text-center">STAFF ADMIN</h2>
        <br>
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/wahid.jpeg" alt="Generic placeholder image" width="140" height="140">
            <h2>Wahid alfaridsi</h2>
            <p>seorang web programmer yang sedang belajar di universitas darussalam gontor proram studi teknik informatika dan sedang semester 6</p>
            <p><a class="btn btn-primary" href="profile.php" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/siraj.jpeg" alt="Generic placeholder image" width="140" height="140">
            <h2>Siraj Hammam</h2>
            <p>setelah mengerjakan semua tugas yang ada, dia langsung mengerjakan website ini</p>
            <p><a class="btn btn-primary" href="profile.php" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/wahyu.jpeg" alt="Generic placeholder image" width="140" height="140">
            <h2>Wahyu Prasetyo Aji</h2>
            <p>disela-sela kesibukannya, dia masih menyempatkan diri untuk mengembangkan website ini</p>
            <p><a class="btn btn-primary" href="profile.php" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/taufan.jpeg" alt="Generic placeholder image" width="140" height="140">
            <h2>Taufan Eka</h2>
            <p>selain menjabat sebagai pres mahasiswa, sebagai projek managemen masih bisa digolongkan sebagai orang sukses</p>
            <p><a class="btn btn-primary" href="profile.php" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/satriyo.jpeg" alt="Generic placeholder image" width="140" height="140">
            <h2>Satriyo Pudjo</h2>
            <p>untuk seseorang yang tergolong sibuk dia masih bisa menyempatkan diri untuk membantu tim yang sedang membangun website ini</p>
            <p><a class="btn btn-primary" href="profile.php" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->






        <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">

          <?php foreach($barang as $row) {?>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top " style="width: 100%; height: 300px; !imortant" src="img/barang/<?= $row["gambar"]; ?>" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text"><strong><?= $row["namabarang"]; ?></strong></p>
                  <p class="card-text"><?= $row["keteranganlain"]; ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-primary" data-target="#<?= $row["idbarang"]; ?>" data-toggle="modal"> Pesan </button>

                    </div>
                    <small class="text-muted">Rp. <?= $row["hargasatuan"]; ?></small>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>




          <!-- Modal -->
          <?php for ($i=0; $i < $jumlahbarang ; $i++) { ?>

          <!-- Modal -->
          <div class="modal fade" id="<?= $barang["$i"]["idbarang"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                      <form action="" method="post">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                      <div class="col-md-6">
                        <img src="img/barang/<?= $barang["$i"]["gambar"]; ?>" style="width: 100%; height: auto; !imortant" class="rounded float-left" alt="">
                      </div>
                      <div class="col-md-6">
                        <table class="table table-borderless">
                        <input type="hidden" name="idbarang" value="<?= $barang["$i"]["idbarang"]; ?>">
                        <input type="hidden" name="iduser" value="<?= $_SESSION["bawadataid"]; ?>">
                        <input type="hidden" name="currentdate" value="<?= $tglsekarang; ?>">
                        <input type="hidden" name="currenttime" value="<?= $waktusekarang; ?>">
                        <input type="hidden" name="hargasatuan" value="<?= $barang["$i"]["hargasatuan"]; ?>">
                          <tr>
                            <th>Nama Barang</th>
                            <td><?= $barang["$i"]["namabarang"]; ?></td>
                          </tr>
                          <tr>
                            <th>Merek/Type</th>
                            <td><?= $barang["$i"]["merek"]; ?></td>
                          </tr>
                          <tr>
                            <th>Warna</th>
                            <td><?= $barang["$i"]["warna"]; ?></td>
                          </tr>
                          <tr>
                            <th>Kategori</th>
                            <td><?= $barang["$i"]["kategori"]; ?></td>
                          </tr>
                          <tr>
                            <th>Harga</th>
                            <td><?= $barang["$i"]["hargasatuan"]; ?></td>
                          </tr>
                          <tr>
                            <th>Stok</th>
                            <td><?= $barang["$i"]["stok"]; ?></td>
                          </tr>
                          <tr>
                            <th>Keterangan</th>
                            <td><?= $barang["$i"]["keteranganlain"]; ?></td>
                          </tr>
                          <tr>
                            <th>Harga Asli</th>
                            <td><?= $barang["$i"]["hargaasli"]; ?></td>
                          </tr>
                          <tr>
                            <th>Harga Ecer</th>
                            <td><?= $barang["$i"]["hargaecer"]; ?></td>
                          </tr>
                          <tr>
                            <div class="form-group row">
                              <div class="col-10">
                                <th>Tanggal Ambil</th>
                                <td><input name="plantanggalambil" class="form-control" type="date" value="2011-08-19" id="example-date-input"></td>
                              </div>
                            </div>
                          </tr>
                          <tr>
                            <div class="form-group row">
                              <div class="col-10">
                                <th>Waktu Ambil</th>
                                <td><input name="planwaktuambil" class="form-control" type="time" value="13:45:00" id="example-time-input"></td>
                              </div>
                            </div>
                          </tr>
                          <tr>
                            <th>Jumlah</th>
                            <td><input type="number" name="jumlah" required></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                  <button type="submit" class="btn btn-primary" name="submit">  Pesan Sekarang</button>
                </div>
              </div>
                      </form>
            </div>
          </div>
          <?php } ?>

            
          </div>
        </div>
      </div>









        <hr class="featurette-divider">
      </div>




      




      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>