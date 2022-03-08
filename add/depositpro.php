<?php

require '../include/header.php';

$idd = $_GET["id"];

$wp = query("SELECT * FROM deposit WHERE id = $idd")[0];

if ($wp['bank'] != "Dompet") {
    if ($wp['broker'] == "insta forex") {
        $sst = query("SELECT * FROM lst2 ORDER BY id DESC LIMIT 1")[0];
        $saldost = $sst["saldo"];
        $tang = $wp['tang'];
        $jam = $wp['jam'];
        $inputt = $wp['deposit'];
        $input = $inputt * 100;
        $keterangan = "Selisih Rate Beli IF $" . $inputt . " ST";
        $output = 0;
        $saldo = $saldost + ($input - $output);

        $query = "INSERT INTO lst2 
            VALUES 
            ('','$tang','$jam','$keterangan','$input','$output','$saldo')
        ";
        mysqli_query($conn, $query);
    }
}

$id = $wp["id"];
$status = 2;

//query edit data
$query = "UPDATE deposit 
               SET status = '$status'                
                WHERE id = $id
            ";
mysqli_query($conn, $query);

//cek apakah data berhasil di edit
if (mysqli_affected_rows($conn) > 0) {
    echo "          
            <script>
                alert('deposit sukses');
                document.location.href = '../deposit';
            </script>
            ";
} else {
    echo "
            <script>
                alert('deposit gagal');
                document.location.href = '../deposit';
            </script>
            ";
}
