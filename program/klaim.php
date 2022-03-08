<?php
include '../include/header.php';
date_default_timezone_set('Asia/Jakarta');
$date = new DateTime();
$tgl = $date->format('Y-m-d  H:i:s');
$tang = date('Y-m-d');
$jam = date('H:i:s');
$tanggal = $tang . " : " . $jam;

$member = query("SELECT * FROM users ORDER BY id DESC");
$sw = 0;
foreach ($member as $row) {
    $email = $row['email'];
    $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='$email' AND kategori='WALLET' ");
    if (mysqli_num_rows($cekdata) < 1) {
        $saldowallet = 0;
    } else {
        $set = query("SELECT * FROM wallet WHERE email ='$email' AND kategori='WALLET' ORDER BY id DESC LIMIT 1")[0];
        $saldowallet = $set['saldo'];
    }
    echo $email . ' - ' . $saldowallet . '<br>';
    $sw += $saldowallet;
}

echo $sw;

// $email = "afsablenk@gmail.com";
// // $email = $_SESSION['email'];

// $jumlahip = "SELECT SUM(input) AS total_id FROM wallet WHERE email ='$email' AND kategori='REBATE' "; //perintah untuk menjumlahkan
// $hasilip = mysqli_query($conn, $jumlahip); //melakukan query dengan varibel $jumlahkan
// $tip = mysqli_fetch_array($hasilip); //menyimpan hasil query ke variabel $t
// $tinput = $tip['total_id'];

// $jumlahop = "SELECT SUM(output) AS total_id FROM wallet WHERE email ='$email' AND kategori='REBATE' "; //perintah untuk menjumlahkan
// $hasilop = mysqli_query($conn, $jumlahop); //melakukan query dengan varibel $jumlahkan
// $top = mysqli_fetch_array($hasilop); //menyimpan hasil query ke variabel $t
// $toutput = $top['total_id'];

// $totalbonus = $tinput - $toutput;

// /*query insert data wd bonus*/
// $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='$email' AND kategori='REBATE' ");
// if (mysqli_num_rows($cekdata) < 1) {
//     $saldorebate = 0;
// } else {
//     $set = query("SELECT * FROM wallet WHERE email ='$email' AND kategori='REBATE' ORDER BY id DESC LIMIT 1")[0];
//     $saldorebate = $set['saldo'];
// }
// $kategori = "REBATE";
// $totalsaldorebate = $saldorebate - $saldorebate;
// $keterangan = "Klaim Rebate to Wallet ";
// /*query insert data*/
// $query = "INSERT INTO wallet 
//                     VALUES 
//                         ('','$email','$tang','$jam','$kategori','$keterangan','0','$saldorebate','$totalsaldorebate')
//                     ";
// mysqli_query($conn, $query);

// /*query insert data wd wallet*/
// $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='$email' AND kategori='WALLET' ");
// if (mysqli_num_rows($cekdata) < 1) {
//     $saldo = 0;
// } else {
//     $set = query("SELECT * FROM wallet WHERE email ='$email' AND kategori='WALLET' ORDER BY id DESC LIMIT 1")[0];
//     $saldo = $set['saldo'];
// }
// $kategori = "WALLET";
// $totalsaldo = $saldo + $saldorebate;
// $keterangan = "Klaim Rebate";
// /*query insert data*/
// $query = "INSERT INTO wallet 
//                     VALUES 
//                         ('','$email','$tang','$jam','$kategori','$keterangan','$saldorebate','0','$totalsaldo')
//                     ";
// mysqli_query($conn, $query);



// $jumlahip = "SELECT SUM(input) AS total_id FROM wallet WHERE email ='$email' AND kategori='PROFIT' "; //perintah untuk menjumlahkan
// $hasilip = mysqli_query($conn, $jumlahip); //melakukan query dengan varibel $jumlahkan
// $tip = mysqli_fetch_array($hasilip); //menyimpan hasil query ke variabel $t
// $tinput = $tip['total_id'];

// $jumlahop = "SELECT SUM(output) AS total_id FROM wallet WHERE email ='$email' AND kategori='PROFIT' "; //perintah untuk menjumlahkan
// $hasilop = mysqli_query($conn, $jumlahop); //melakukan query dengan varibel $jumlahkan
// $top = mysqli_fetch_array($hasilop); //menyimpan hasil query ke variabel $t
// $toutput = $top['total_id'];

// $totalbonus = $tinput - $toutput;

// /*query insert data wd bonus*/
// $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='$email' AND kategori='PROFIT' ");
// if (mysqli_num_rows($cekdata) < 1) {
//     $saldoprofit = 0;
// } else {
//     $set = query("SELECT * FROM wallet WHERE email ='$email' AND kategori='PROFIT' ORDER BY id DESC LIMIT 1")[0];
//     $saldoprofit = $set['saldo'];
// }
// $kategori = "PROFIT";
// $totalsaldoprofit = $saldoprofit - $saldoprofit;
// $keterangan = "Klaim Bonus to Wallet ";
// /*query insert data*/
// $query = "INSERT INTO wallet 
//                     VALUES 
//                         ('','$email','$tang','$jam','$kategori','$keterangan','0','$saldoprofit','$totalsaldoprofit')
//                     ";
// mysqli_query($conn, $query);

// /*query insert data wd wallet*/
// $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='$email' AND kategori='WALLET' ");
// if (mysqli_num_rows($cekdata) < 1) {
//     $saldo = 0;
// } else {
//     $set = query("SELECT * FROM wallet WHERE email ='$email' AND kategori='WALLET' ORDER BY id DESC LIMIT 1")[0];
//     $saldo = $set['saldo'];
// }
// $kategori = "WALLET";
// $totalsaldo = $saldo + $saldoprofit;
// $keterangan = "Klaim Bonus";
// /*query insert data*/
// $query = "INSERT INTO wallet 
//                     VALUES 
//                         ('','$email','$tang','$jam','$kategori','$keterangan','$saldoprofit','0','$totalsaldo')
//                     ";
// mysqli_query($conn, $query);