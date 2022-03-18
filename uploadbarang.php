<?php
require 'functions.php';

session_start();

if (!isset($_SESSION["loginadmin"])) {
  header("Location: signin.php");
  exit;
}


$getidbarang = mysqli_query($conn, "SELECT count(id) from barang");
$getjumlahbarang = mysqli_fetch_assoc($getidbarang);
$b = $getjumlahbarang["count(id)"] ++;
$jumlahbarangsekarang = $b;


if (isset($_POST["submit"])) {

  
  
  // cek apakah data berhasil di tambahkan atau tidak
  if (uploadbarang($_POST)>0) {
      echo "
      <script>
              alert('data berhasil ditambahkan');

          </script>
      ";
  }else{

      echo "
          <script>
              alert('data gagal ditambahkan');

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

    <title>Checkout example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Form Penambahan Barang</h2>
      </div>

      <div class="row">
        
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" action="" method="post" enctype="multipart/form-data">


          <input type="hidden" name="idbarang" value="<?= $jumlahbarangsekarang+1; ?>">

            <div class="mb-3">
              <label for="username">Nama Barang</label>
                <input name="namabarang" type="text" class="form-control" id="username" placeholder="Nama Barang" required>
            </div>


            <div class="row">

              <div class="col-md-6 mb-3">
                <label for="hargasatuan">harga satuan</label>
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp. </span>
                  <input name="hargasatuan" type="number" class="form-control" id="hargasatuan" value="" required>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="stok">stok</label>
                <div class="input-group-prepend">
                  <input name="stok" type="number" class="form-control" id="stok" placeholder="" value="" required>
                  <span class="input-group-text">buah</span>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="hargaasli">harga asli</label>
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp. </span>
                  <input name="hargaasli" type="number" class="form-control" id="hargaasli" value="" required>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="hargajual">harga jual</label>
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp. </span>
                  <input name="hargajual" type="number" class="form-control" id="hargajual" value="" required>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="hargaecer">harga ecer</label>
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp. </span>
                  <input name="hargaecer" type="number" class="form-control" id="hargaecer" value="" required>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="merek">merek</label>
                <div class="input-group-prepend">
                  <input name="merek" type="text" class="form-control" id="merek"  required>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="kategori">kategori</label>
                <div class="input-group-prepend">
                  <input name="kategori" type="text" class="form-control" id="kategori" required>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="warna">warna</label>
                <div class="input-group-prepend">
                  <input name="warna" type="text" class="form-control" id="warna"  required>
                </div>
              </div>
            </div>
            
            <div class="mb-3">
              <label for="ketlain">keterangan lain</label>
                <input name="ketlain" type="text" class="form-control" id="ketlain" placeholder="keterangan lain" required>
            </div>

            <div class="input-group mb-3">
              <div class="custom-file">
                <input name="gambar" type="file" class="custom-file-input" id="inputGroupFile01" >
                <label class="custom-file-label" for="inputGroupFile01">pilih gambar</label>
              </div>
            </div>

          
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">create data</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
