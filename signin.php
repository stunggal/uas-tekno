<?php
session_start();

require 'functions.php';
if (isset($_SESSION["login"])) {
  header("Location: index.php");
}


if (isset($_POST["login"])) {
  $usernamelogin = $_POST["usernamelogin"];
  $passlogin = $_POST["passlogin"];

  $result = mysqli_query($conn, "SELECT * from user where 
                        namauser = '$usernamelogin'
  ");

  $resultid = mysqli_query($conn, "SELECT * from user where 
  namauser = '$usernamelogin'
  ");

  $idnya = mysqli_fetch_assoc($resultid);

  // cek username
  if (mysqli_num_rows($result) === 1) {

    //cek pass
    $row = mysqli_fetch_assoc($result);

    if (password_verify($passlogin, $row["passworduser"])) {
      // set session
      $_SESSION["login"] = true;
      $id = $idnya["iduser"];
      $_SESSION["bawadataid"] = $id;
      header("Location: index.php");
      exit;
    }
  }

  $error =true;

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

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  
  <body class="text-center">

  


    <form class="form-signin" action="" method="post">
    <form class="form-signin" action="index.php?id=1" method="get">
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Masuk</h1>
      
      <?php if (isset($error)) { ?>
        <p style="color: red; font-style: italic;">username / password salah</p>
      <?php } ?>

      <label for="inputEmail" class="sr-only">User name</label>
      <input name="usernamelogin" type="text" id="inputEmail" class="form-control" placeholder="User name" required autofocus >

      <label for="inputPassword" class="sr-only">Password</label>
      <input name="passlogin" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button name="login" class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
      <p>Belum mempunyai akun?<a href="daftar.php">daftar</a> sekarang</p>
      <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>
    </form>
    </form>
  </body>
</html>
