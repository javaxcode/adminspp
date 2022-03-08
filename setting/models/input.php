<?php

require '../../include/fungsi.php';
date_default_timezone_set('Asia/Jakarta');
$date = new DateTime();
$tgl = $date->format('Y-m-d  H:i:s');

if (isset($_POST["inputrank"])) {

    $nama_rank = $_POST["nama_rank"];
    $profit_sharing = $_POST["profit_sharing"];
    $direct_sponsor = $_POST["direct_sponsor"];
    $direct_omset = $_POST["direct_omset"];
    $created_at = $tgl;
    $updated_at = $tgl;

    /*query insert data*/
    $query = "INSERT INTO ranks 
                VALUES 
                ('','$nama_rank','$profit_sharing','$direct_sponsor','$direct_omset','$created_at','$updated_at')
            ";

    $masuk_data = mysqli_query($conn, $query);

    //cek apakah data berhasil di input
    if (mysqli_affected_rows($conn) > 0) {
        echo "          
            <script>
                alert('input berhasil');
                document.location.href = '../rank';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('input gagal');
                document.location.href = '../rank';
            </script>
            ";
    }
}
