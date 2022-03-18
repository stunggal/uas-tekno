<?php
// ambil dari database
$conn = mysqli_connect("localhost", "root", "", "bangjgrosir");

// card barang
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;

}



function pesan($pesan){
    global $conn;

    // ambil data dari setiap element dalam input
    $idbarang = $pesan["idbarang"];
    $jumlahpesanan = $pesan["jumlah"];
    $iduser = $pesan["iduser"];
    $plantanggalambil = $pesan["plantanggalambil"];
    $planwaktuambil = $pesan["planwaktuambil"];
    $currentdate = $pesan["currentdate"];
    $currenttime = $pesan["currenttime"];
    $jumlahpembelian = $pesan["jumlah"];
    $hargasatuan = $pesan["hargasatuan"]; 

    $totalharga = $hargasatuan*$jumlahpembelian;


    // query insert
    $queryinsert = "INSERT INTO pemesanan VALUES
    ('$iduser', '$idbarang', '$jumlahpesanan', '$totalharga', '$plantanggalambil', '','$currenttime','','$planwaktuambil', '$currentdate', 'masih disiapkan', '')
";

    // qwery insert pesanan
    mysqli_query($conn, $queryinsert);

    return mysqli_affected_rows($conn);

}


// tabel pesanan
function querytampil($querytampil) {
    global $conn;
    $resulttampil = mysqli_query($conn, $querytampil);
    $tampils = [];
    while($tampil = mysqli_fetch_assoc($resulttampil)) {
        $tampils[] = $tampil;
    }
    return $tampils;

}


function registrasi($data){
    global $conn;

    $idreal = $data["idreal"];
    $username = strtolower(stripslashes($data["username"]));
    $pass = mysqli_real_escape_string($conn, $data["pass"]);
    $konpass = mysqli_real_escape_string($conn, $data["konpass"]);
    

    // cek username udah ada apa belum
    $result = mysqli_query($conn, "SELECT namauser from user where namauser = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "
      <script>
              alert('username sudah dipakai');
          </script>
      ";
      return false;
    }

    //cek konfirmasi password
    if ( $pass !== $konpass ) {
        echo "
      <script>
              alert('passwor tidak sesuai');
          </script>
      ";
      return false;
    }
    
    //enskripsi password
    $password = password_hash($pass, PASSWORD_DEFAULT);

    // tambahkan user baru k database
    mysqli_query($conn, "INSERT INTO user VALUES ('$idreal', '$username', '$password', '')");

    return mysqli_affected_rows($conn);

}

function gantikesiap($gantikesiap){
    global $conn;
    // query pindah ke siap diambil
    $idpemesanan = $gantikesiap["idpemesanan"];
    $querypindahkesiap = "UPDATE pemesanan SET status = 'siap diambil' where idpemesanan = '$idpemesanan'";

    mysqli_query($conn, $querypindahkesiap);

    return mysqli_affected_rows($conn);
}



function gantikesudah($gantikesudah){
    global $conn;
    // query pindah ke siap diambil
    $idpemesanan = $gantikesudah["idpemesanan"];
    $querypindahkesudah = "UPDATE pemesanan SET status = 'sudah diambil' where idpemesanan = '$idpemesanan'";

    mysqli_query($conn, $querypindahkesudah);

    return mysqli_affected_rows($conn);
}




function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE from pemesanan where idpemesanan = $id");

    return mysqli_affected_rows($conn);
}


function uploadbarang($data){
    global $conn;

    $idnow = $_POST["idbarang"];
    $namabarang = $_POST["namabarang"];
    $hargasatuan = $_POST["hargasatuan"];
    $stok = $_POST["stok"];
    $hargaasli = $_POST["hargaasli"];
    $hargaecer = $_POST["hargaecer"];
    $merek = $_POST["merek"];
    $kategori = $_POST["kategori"];
    $warna = $_POST["warna"];
    $ketlain = $_POST["ketlain"];
    $hargajual = $_POST["hargajual"];

    $gambar = upgambar();
    if (!$gambar) {
        return false;
    }
    
    $idnyabarang = 'b'; 
    $finalid = $idnyabarang.$idnow;
    

    // query upbarang
    $queryupbarang = "INSERT into barang values ('$finalid', '$namabarang', '$hargasatuan', '$stok', '$hargaasli', '$hargajual', '$hargaecer', '$merek', '$kategori', '$warna', '$ketlain', '$gambar', '') ";

    mysqli_query($conn, $queryupbarang);

    echo $queryupbarang;

    return mysqli_affected_rows($conn);

}


function upgambar(){
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];

    // cek apakah ada gambar yg d upload
    if ($error === 4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu')
        </script>";
        return false;
    }

    // cek apakah gambara yang di upload
    $ekstensivalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensivalid)) {
        echo "<script>
        alert('ekstensi yang anda upload tidak valid')
        </script>";
        return false;
    }

    // lolos pengecekan , gambar siap di upload
    // generate nama gambar baru
    $namafilebaru = uniqid();
    $namafilebaru .='.';
    $namafilebaru .=$ekstensigambar;

    move_uploaded_file($tmpname, 'img/barang/'.$namafilebaru);

    return $namafilebaru;
    
}


function ubahdat(){
    global $conn;

    $idnow = $_POST["id"];
    $namabarang = $_POST["namabarang"];
    $hargasatuan = $_POST["hargasatuan"];
    $stok = $_POST["stok"];
    $hargaasli = $_POST["hargaasli"];
    $hargaecer = $_POST["hargaecer"];
    $merek = $_POST["merek"];
    $kategori = $_POST["kategori"];
    $warna = $_POST["warna"];
    $ketlain = $_POST["ketlain"];
    $hargajual = $_POST["hargajual"];

    $gambar = upgambar();
    if (!$gambar) {
        return false;
    }
    
    $idnyabarang = 'b'; 
    $finalid = $idnyabarang.$idnow;
    // $idnoww = 
    echo "idnya ini".$idnow;
    

    // query upbarang
    $queryupbarang = "UPDATE barang set 
                        namabarang = '$namabarang',
                        hargasatuan = '$hargasatuan',
                        stok = '$stok',
                        hargaasli = '$hargaasli',
                        hargajual = '$hargajual',
                        hargaecer = '$hargaecer',
                        merek = '$merek',
                        kategori = '$kategori',
                        warna = '$warna',
                        keteranganlain = '$ketlain',
                        gambar = '$gambar'
                        where idbarang = '$idnow'
     ";

    mysqli_query($conn, $queryupbarang);

    echo $queryupbarang;

    return mysqli_affected_rows($conn);
}


function cari($keyword) {
    $query = "SELECT * from barang
                where
                namabarang LIKE '%$keyword%' OR
                merek LIKE '%$keyword%' OR
                kategori LIKE '%$keyword%' OR
                keteranganlain LIKE '%$keyword%' 
    ";
    return query($query);
}



?>