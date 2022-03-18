<?php
require 'functions.php';

session_start();

if (!isset($_SESSION["loginadmin"])) {
  header("Location: signin.php");
  exit;
}

$id = $_GET["id"];

if (hapus($id)>0) {
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


?>