<?php

require 'functions.php';



// $getid = mysqli_query($conn, "SELECT * from user");
// $getjumlah = mysqli_fetch_assoc($getid);
// $counting = count($getjumlah);

// $no = 2;
// while ($roww = mysqli_fetch_assoc($getid)) {
//   $no++;
//   $idnya = "usr";
//   $getidreal = $idnya.$no;
// }


if ( isset($_POST["register"]) ) {
  if (registrasi($_POST) > 0 ) {
    echo "
      <script>
              alert('data berhasil ditambahkan');
              document.location.href = 'signin.php';
          </script>
      ";
  }else{
      echo mysqli_error($conn);
  }
};





?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  
  <body class="text-center">

  



    <form class="form-signin" action="" method="post">
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Masuk</h1>

      <label for="inputnamadepan" class="sr-only">Nama depan</label>
      <input name="namadepan" type="text" id="inputnamadepan" class="form-control" placeholder="Nama depan" required autofocus>

      <label for="inputnamabelakang" class="sr-only">Nama belakang</label>
      <input name="namabelakang" type="text" id="inputnamabelakang" class="form-control" placeholder="Nama belakang" required autofocus>

      <label for="inputnohp" class="sr-only">No. hp</label>
      <input name="nohp" type="text" id="inputnohp" class="form-control" placeholder="No. hp" required autofocus>

      <label for="inputusername" class="sr-only">User name</label>
      <input name="username" type="text" id="inputusername" class="form-control" placeholder="Username" required autofocus>

      <label for="inputPassword" class="sr-only">Password</label>
      <input name="pass" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

      <label for="inputkonfirmasiPassword" class="sr-only">Konformasi Password</label>
      <input name="konpass" type="password" id="inputkonfirmasiPassword" class="form-control" placeholder="Konfirmasi Password" required>

      <button name="register" class="btn btn-lg btn-primary btn-block" type="submit">Daftar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>
    </form>
  </body>
</html>
