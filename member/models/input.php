<?php

require '../../include/fungsi.php';
date_default_timezone_set('Asia/Jakarta');
$date = new DateTime();
$tgl = $date->format('Y-m-d  H:i:s');
$tang = $date->format('Y-m-d');
$jam = $date->format('H:i:s');

if (isset($_POST["inputakun"])) {

    $email = $_POST["email"];
    $aff = $_POST["aff"];
    $noakun = $_POST["noakun"];
    $passwordinvestor = $_POST["passwordinvestor"];
    $server = $_POST["server"];
    $created_at = $tgl;
    $updated_at = $tgl;
    $status = 2;

    /*query insert data*/
    $query = "INSERT INTO validasi 
                VALUES 
                ('','$tang','$jam','$email','$passwordinvestor','$server','$noakun','$aff','$status')
            ";

    $masuk_data = mysqli_query($conn, $query);

    //cek apakah data berhasil di input
    if (mysqli_affected_rows($conn) > 0) {
        echo "          
            <script>
                alert('input berhasil');
                document.location.href = '../index';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('input gagal');
                document.location.href = '../index';
            </script>
            ";
    }
}