<?php

require '../../include/fungsi.php';
date_default_timezone_set('Asia/Jakarta');
$date = new DateTime();
$updated_at = $date->format('Y-m-d  H:i:s');

if (isset($_POST["editlevel"])) {
    $id = $_POST["id"];
    $level = $_POST["level"];
    $profit_sharing = $_POST["profit_sharing"];

    /*query edit data*/
    $query = "UPDATE levels SET
                nama_level = '$level',
                profit_sharing = '$profit_sharing',
                updated_at = $updated_at
                WHERE id = $id
            ";
    mysqli_query($conn, $query);

    //cek apakah data berhasil di edit
    if (mysqli_affected_rows($conn) > 0) {
        echo "          
            <script>
                alert('edit berhasil');
                document.location.href = '../level';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('edit gagal');
                document.location.href = '../level';
            </script>
            ";
    }
} elseif (isset($_POST["rank"])) {
    $id = $_POST["id"];
    $nama_rank = $_POST["nama_rank"];
    $profit_sharing = $_POST["profit_sharing"];
    $direct_sponsor = $_POST["direct_sponsor"];
    $direct_omset = $_POST["direct_omset"];

    /*query edit data*/
    $query = "UPDATE ranks SET
                nama_rank = '$nama_rank',
                profit_sharing = '$profit_sharing',
                direct_sponsor = '$direct_sponsor',
                direct_omset = '$direct_omset',
                updated_at = $updated_at
                WHERE id = $id
            ";
    mysqli_query($conn, $query);

    //cek apakah data berhasil di edit
    if (mysqli_affected_rows($conn) > 0) {
        echo "          
            <script>
                alert('edit berhasil');
                document.location.href = '../rank';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('edit gagal');
                document.location.href = '../rank';
            </script>
            ";
    }
}
