<?php

require '../../include/fungsi.php';
date_default_timezone_set('Asia/Jakarta');
$date = new DateTime();
$tgl = $date->format('Y-m-d  H:i:s');
$tang = date('Y-m-d');
$jam = date('H:i:s');
$tanggal = $tang . " : " . $jam;

if (isset($_POST["bagi-profit"])) {

    $id = $_POST["id"];

    $jumlahprofit = $_POST["jumlahprofit"];
    $email = $_POST["email"];
    $un = query("SELECT email,username,aff FROM users WHERE email='$email'")[0];
    $memberusername = $un['username'];
    $aff = $un['aff'];

    $kategori = "PROFIT";

    $rank = query("SELECT paket FROM usersnetwork WHERE email='$email'")[0];
    $rankmember = $rank['paket'];
    if ($rankmember == "Advanced") {
        $profitmember = ($jumlahprofit * 10) / 100;
        $profispp21 = ($jumlahprofit * 10) / 100;
    } else if ($rankmember == "Expert") {
        $profitmember = ($jumlahprofit * 15) / 100;
        $profispp21 = ($jumlahprofit * 5) / 100;
    } else if ($rankmember == "Basic") {
        $profitmember = 0;
        $profispp21 = ($jumlahprofit * 20) / 100;
    }

    $total = 10;

    for ($i = 1; $i < $total; $i++) {
        $lvl = "level" . $i;
        $lvl1 = "level " . $i;
        $ambillevelaffiliasi = query("SELECT * FROM usersnetwork WHERE email='$email' ")[0];
        $levelaff = $ambillevelaffiliasi[$lvl];
        $ambillevels = query("SELECT profit_sharing FROM levels WHERE nama_level='$lvl1' ")[0];
        $levelshare = $ambillevels['profit_sharing'];

        $sharingprofit = ($jumlahprofit * $levelshare) / 100;

        if ($levelaff != "kss21") {
            $elvlaff = query("SELECT email,aff FROM users WHERE username='$levelaff'")[0];
            $emailaff = $elvlaff['email'];

            $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='$emailaff' AND kategori='PROFIT' ");
            if (mysqli_num_rows($cekdata) < 1) {
                $saldo = 0;
            } else {
                $set = query("SELECT * FROM wallet WHERE email ='$emailaff' AND kategori='PROFIT' ORDER BY id DESC LIMIT 1")[0];
                $saldo = $set['saldo'];
            }

            $totalsaldo = $saldo + $sharingprofit;
            $keterangan = "Share Profit Level " . $i . ' - ' . $memberusername;

            //echo 'Level ' . $i . ' - ' . $emailaff . ' - ' . $levelaff . ' - ' . $levelshare . ' - ' . $sharingprofit . ' - ' . $totalsaldo . '<br>';

            /*query insert data*/
            $query = "INSERT INTO wallet 
            VALUES 
                ('','$emailaff','$tang','$jam','$kategori','$keterangan','$sharingprofit','0','$totalsaldo')
            ";
            mysqli_query($conn, $query);
        } else {
            $usernamelevelaff = "spp21";
            $elvlaff = query("SELECT email,aff FROM users WHERE username='$usernamelevelaff'")[0];
            $emailaff = $elvlaff['email'];

            $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='$emailaff' AND kategori='PROFIT' ");
            if (mysqli_num_rows($cekdata) < 1) {
                $saldo = 0;
            } else {
                $set = query("SELECT * FROM wallet WHERE email ='$emailaff' AND kategori='PROFIT' ORDER BY id DESC LIMIT 1")[0];
                $saldo = $set['saldo'];
            }
            $totalsaldo = $saldo + $sharingprofit;
            $keterangan = "Share Profit Level " . $i . ' - ' . $memberusername;

            //echo 'Level ' . $i . ' - ' . $emailaff . ' - ' . $usernamelevelaff . ' - ' . $levelshare . ' - ' . $sharingprofit . ' - ' . $totalsaldo . '<br>';
            /*query insert data*/
            $query = "INSERT INTO wallet 
            VALUES 
                ('','$emailaff','$tang','$jam','$kategori','$keterangan','$sharingprofit','0','$totalsaldo')
            ";
            mysqli_query($conn, $query);
        }
    }

    //echo 'Share SPP21 ' . $profispp21 . '<br>';
    /*query insert data profit perusahaan*/

    $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='spp21indonesia@gmail.com' AND kategori='PROFIT' ");
    if (mysqli_num_rows($cekdata) < 1) {
        $saldo = 0;
    } else {
        $set = query("SELECT * FROM wallet WHERE email ='spp21indonesia@gmail.com' AND kategori='PROFIT' ORDER BY id DESC LIMIT 1")[0];
        $saldo = $set['saldo'];
    }
    $totalsaldo = $saldo + $profispp21;
    $keterangan = "Share Profit " . $memberusername;
    $emailspp = "spp21indonesia@gmail.com";
    /*query insert data*/
    $query = "INSERT INTO wallet 
    VALUES 
        ('','$emailspp','$tang','$jam','$kategori','$keterangan','$profispp21','0','$totalsaldo')
    ";
    mysqli_query($conn, $query);


    //echo $email . ' - ' . $rankmember . ' - ' . $profitmember . '<br>';
    /*query insert data profit member*/
    if ($rankmember != "Basic") {
        $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='$email' AND kategori='PROFIT' ");
        if (mysqli_num_rows($cekdata) < 1) {
            $saldo = 0;
        } else {
            $set = query("SELECT * FROM wallet WHERE email ='$email' AND kategori='PROFIT' ORDER BY id DESC LIMIT 1")[0];
            $saldo = $set['saldo'];
        }
        $totalsaldo = $saldo + $profitmember;
        $keterangan = "Share Profit";
        /*query insert data*/
        $query = "INSERT INTO wallet 
    VALUES 
        ('','$email','$tang','$jam','$kategori','$keterangan','$profitmember','0','$totalsaldo')
    ";
        mysqli_query($conn, $query);
    }

    /*cek apakah data berhasil di input*/
    if (mysqli_affected_rows($conn) > 0) {
        echo "          
            <script>
                alert('input berhasil');
                document.location.href = '../sharing-profit';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('input gagal');
                document.location.href = '../sharing-profit';
            </script>
            ";
    }
} elseif (isset($_POST["bagi-rebate"])) {

    $id = $_POST["id"];
    $email = $_POST["email"];
    $input = $_POST["jumlahrebate"];
    $keterangan = "Rebate";
    $kategori = "REBATE";

    $cekdata = mysqli_query($conn, "SELECT email FROM wallet WHERE email ='$email' AND kategori='REBATE' ");
    if (mysqli_num_rows($cekdata) < 1) {
        $saldo = 0;
    } else {
        $set = query("SELECT * FROM wallet WHERE email ='$email' AND kategori='REBATE' ORDER BY id DESC LIMIT 1")[0];
        $saldo = $set['saldo'];
    }

    $totalsaldo = $saldo + $input;

    /*query insert data*/
    $query = "INSERT INTO wallet 
    VALUES 
        ('','$email','$tang','$jam','$kategori','$keterangan','$input','0','$totalsaldo')
    ";
    mysqli_query($conn, $query);

    //cek apakah data berhasil di input
    if (mysqli_affected_rows($conn) > 0) {
        echo "          
            <script>
                alert('input berhasil');
                document.location.href = '../rebate';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('input gagal');
                document.location.href = '../rebate';
            </script>
            ";
    }
}