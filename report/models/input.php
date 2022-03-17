<?php

require '../../include/fungsi.php';
date_default_timezone_set('Asia/Jakarta');
$date = new DateTime();
$tgl = $date->format('Y-m-d  H:i:s');
$tang = date('Y-m-d');
$jam = date('H:i:s');
$tanggal = $tang . " : " . $jam;

if (isset($_POST["klaimprofitspp21"])) {

    $set = query("SELECT * FROM wallet WHERE email ='spp21indonesia@gmail.com' AND kategori='PROFIT' ORDER BY id DESC LIMIT 1")[0];
    $saldoprofit = $set['saldo'];
    $kategori = "PROFIT";
    $totalsaldo = $saldoprofit - $saldoprofit;
    $keterangan = "Klaim Bonus to Wallet";
    $emailspp = "spp21indonesia@gmail.com";
    /*query insert data*/
    $query = "INSERT INTO wallet 
    VALUES 
        ('','$emailspp','$tang','$jam','$kategori','$keterangan','0','$saldoprofit','$totalsaldo')
    ";
    mysqli_query($conn, $query);

    $setw = query("SELECT * FROM wallet WHERE email ='spp21indonesia@gmail.com' AND kategori='PROFIT' ORDER BY id DESC LIMIT 1")[0];
    $saldowallet = $setw['saldo'];
    $kategori = "WALLET";
    $totalsaldo = $saldowallet + $saldoprofit;
    $keterangan = "Klaim Bonus";
    $emailspp = "spp21indonesia@gmail.com";
    /*query insert data*/
    $query = "INSERT INTO wallet 
    VALUES 
        ('','$emailspp','$tang','$jam','$kategori','$keterangan','$saldoprofit','0','$totalsaldo')
    ";
    mysqli_query($conn, $query);


    /*cek apakah data berhasil di input*/
    if (mysqli_affected_rows($conn) > 0) {
        echo "          
            <script>
                
                document.location.href = '../report';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('input gagal');
                document.location.href = '../report';
            </script>
            ";
    }
} elseif (isset($_POST["wdwalletspp21"])) {
    $email = "spp21indonesia@gmail.com";
    $keterangan = $_POST["keterangan"];
    $output = $_POST["jumlahwd"];
    $kategori = "WALLET";

    $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='$email' AND kategori='WALLET' ");
    if (mysqli_num_rows($cekdata) < 1) {
        $saldo = 0;
    } else {
        $set = query("SELECT * FROM wallet WHERE email ='$email' AND kategori='WALLET' ORDER BY id DESC LIMIT 1")[0];
        $saldo = $set['saldo'];
    }

    $totalsaldo = $saldo - $output;

    /*query insert data*/
    $query = "INSERT INTO wallet 
    VALUES 
        ('','$email','$tang','$jam','$kategori','$keterangan','0','$output','$totalsaldo')
    ";
    mysqli_query($conn, $query);

    //cek apakah data berhasil di input
    if (mysqli_affected_rows($conn) > 0) {
        echo "          
            <script>
                alert('input berhasil');
                document.location.href = '../report';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('input gagal');
                document.location.href = '../report';
            </script>
            ";
    }
}